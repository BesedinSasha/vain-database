<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:26 AM
 */

namespace Vain\Database\PDO\Iterator;

use Vain\Database\Cursor\VainDatabaseCursorInterface;

class VainDatabasePDOCursor implements VainDatabaseCursorInterface
{
    
    private $pdoStatementInstance;

    private $mode;
    
    private $state;
    
    /**
     * VainDatabasePDOGenerator constructor.
     * @param \PDOStatement $pdoStatementInstance
     * @param int $mode
     */
    public function __construct(\PDOStatement $pdoStatementInstance, $mode = \PDO::FETCH_ASSOC)
    {
        $this->pdoStatementInstance = $pdoStatementInstance;
        $this->mode = $mode;
        $this->state = true;
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->pdoStatementInstance->fetch($this->mode);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->pdoStatementInstance->nextRowset();
    }
    
    /**
     * @inheritDoc
     */
    public function valid()
    {
        return ($this->pdoStatementInstance->errorCode() === '00000');
    }

    /**
     * @inheritDoc
     */
    public function close()
    {
        $this->pdoStatementInstance->closeCursor();

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function mode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->pdoStatementInstance->rowCount();
    }

    /**
     * @inheritDoc
     */
    public function getSingle()
    {
        return $this->pdoStatementInstance->fetch($this->mode);
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        return $this->pdoStatementInstance->fetchAll($this->mode);
    }
}