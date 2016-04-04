<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 9:47 AM
 */

namespace Vain\Database\PDO;

use Vain\Database\Exception\LevelIntegrityException;
use Vain\Database\PDO\Exception\CommunicationPDOException;
use Vain\Database\PDO\Exception\QueryPDOException;
use Vain\Database\DatabaseInterface;
use Vain\Database\Generator\Factory\FactoryInterface;
use Vain\Database\PDO\Iterator\PDOCursor;

class PDOAdapter implements DatabaseInterface
{
    
    private $pdoInstance;
    
    private $generatorFactory;
    
    private $level;

    private $dsn;
    
    private $username;
    
    private $password;
    
    private $options;
    
    /**
     * VainDatabasePDOAdapter constructor.
     * @param FactoryInterface $generatorFactory
     * @param string $dsn
     * @param string $username
     * @param string $password
     * @param array $options
     */
    public function __construct(FactoryInterface $generatorFactory, $dsn, $username, $password, array $options = [\PDO::ATTR_EMULATE_PREPARES => true])
    {
        $this->generatorFactory = $generatorFactory;
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
        $this->level = 0;
    }

    /**
     * @return \PDO
     */
    protected function getPdoInstance()
    {
        return $this->pdoInstance;
    }

    /**
     * @return int
     */
    protected function getLevel()
    {
        return $this->level;
    }

    /**
     * @return string
     */
    protected function getDsn()
    {
        return $this->dsn;
    }

    /**
     * @return string
     */
    protected function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    protected function getPassword()
    {
        return $this->password;
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return $this->options;
    }

    /**
     * @return FactoryInterface
     */
    protected function getGeneratorFactory()
    {
        return $this->generatorFactory;
    }
    
    /**
     * @return \PDO
     *
     * @throws CommunicationPDOException
     */
    protected function connect()
    {
        if ($this->pdoInstance) {
            return $this->pdoInstance;
        }
        try {
            $pdoInstance = new \PDO($this->dsn, $this->username, $this->password, $this->options);
            $this->pdoInstance = $pdoInstance;
            return $pdoInstance;
        } catch (\PDOException $e) {
            throw new CommunicationPDOException($this, $e);
        }
    }
    
    /**
     * @inheritDoc
     */
    public function transaction()
    {
        if (0 < $this->level) {
            $this->level++;
            return true;
        }
        
        if (0 > $this->level) {
            throw new LevelIntegrityException($this, $this->level);
        }

        try {
            return $this->connect()->beginTransaction();
        } catch (\PDOException $e) {
            throw new CommunicationPDOException($this, $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function commit()
    {
        if (0 < $this->level) {
            $this->level--;
            return true;
        }
        
        if (0 < $this->level) {
            throw new LevelIntegrityException($this, $this->level);
        }
        
        try {
            return $this->connect()->commit();
        } catch (\PDOException $e) {
            throw new CommunicationPDOException($this, $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function rollback()
    {
        if (0 < $this->level) {
            $this->level--;
            return true;
        }

        if (0 < $this->level) {
            throw new LevelIntegrityException($this, $this->level);
        }

        try {
            return $this->connect()->rollBack();
        } catch (\PDOException $e) {
            throw new CommunicationPDOException($this, $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function query($query, array $bindParams)
    {   
        $statement = $this->getPdoInstance()->prepare($query);

        if (false == $statement->execute($bindParams)) {
            throw new QueryPDOException($this, $statement->errorCode(), $statement->errorInfo());
        }

        return $this->generatorFactory->create($this, new PDOCursor($statement));
    }
}