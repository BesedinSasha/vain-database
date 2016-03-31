<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 9:47 AM
 */

namespace Vain\Database\PDO;

use Vain\Database\PDO\Exception\VainDatabasePDOAdapterException;
use Vain\Database\PDO\Iterator\VainDatabasePDOCursor;
use Vain\Database\VainDatabaseInterface;
use Vain\Database\Exception\VainDatabaseLevelIntegrityException;
use Vain\Database\Generator\Factory\VainDatabaseGeneratorFactoryInterface;

class VainDatabasePDOAdapter implements VainDatabaseInterface
{
    
    private $pdoInstance;
    
    private $generatorFactory;
    
    private $level = 0;

    /**
     * VainDatabasePDOAdapter constructor.
     * @param \PDO $pdoInstance
     * @param VainDatabaseGeneratorFactoryInterface $generatorFactory
     */
    public function __construct(\PDO $pdoInstance, VainDatabaseGeneratorFactoryInterface $generatorFactory)
    {
        $this->pdoInstance = $pdoInstance;
        $this->generatorFactory = $generatorFactory;
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
            throw new VainDatabaseLevelIntegrityException($this, $this->level);
        }

        try {
            return $this->pdoInstance->beginTransaction();
        } catch (\PDOException $e) {
            throw new VainDatabasePDOAdapterException($this, $this->pdoInstance->errorCode(), $this->pdoInstance->errorInfo(), $e);;
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
            throw new VainDatabaseLevelIntegrityException($this, $this->level);
        }
        
        try {
            return $this->pdoInstance->commit();
        } catch (\PDOException $e) {
            throw new VainDatabasePDOAdapterException($this, $this->pdoInstance->errorCode(), $this->pdoInstance->errorInfo(), $e);
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
            throw new VainDatabaseLevelIntegrityException($this, $this->level);
        }

        try {
            return $this->pdoInstance->rollBack();
        } catch (\PDOException $e) {
            throw new VainDatabasePDOAdapterException($this, $this->pdoInstance->errorCode(), $this->pdoInstance->errorInfo(), $e);
        }
    }

    /**
     * @inheritDoc
     */
    public function query($query, array $bindParams)
    {   
        $statement = $this->pdoInstance->prepare($query);

        if (false == $statement->execute($bindParams)) {
            throw new VainDatabasePDOAdapterException($this, $statement->errorCode(), $statement->errorInfo());
        }

        return $this->generatorFactory->createGenerator($this, new VainDatabasePDOCursor($statement));
    }
}