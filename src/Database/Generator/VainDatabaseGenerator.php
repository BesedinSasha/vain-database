<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:38 AM
 */

namespace Vain\Database\Generator;


use Vain\Database\Cursor\VainDatabaseCursorInterface;
use Vain\Database\Generator\Exception\VainDatabaseGeneratorRewindException;
use Vain\Database\VainDatabaseInterface;

class VainDatabaseGenerator implements VainDatabaseGeneratorInterface
{
    private $database;
    
    private $cursor;
    
    private $count = 0;
    
    public function __construct(VainDatabaseInterface $database, VainDatabaseCursorInterface $cursor)
    {
        $this->database = $database;
        $this->cursor = $cursor;
    }

    /**
     * @return VainDatabaseInterface
     */
    protected function getDatabase()
    {
        return $this->database;
    }
    
    /**
     * @inheritDoc
     */
    public function rewind()
    {
        throw new VainDatabaseGeneratorRewindException($this, $this->database);
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->cursor->current();
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->count++;
        $this->cursor->next();
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return $this->cursor->valid();
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->count;
    }

    /**
     * @inheritDoc
     */
    public function getSingleRow($mode)
    {
        $this->cursor->mode($mode);
        $result = $this->cursor->getSingle();
        $this->count = 0;
        
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getAllRows($mode)
    {
        $this->cursor->mode($mode);
        $results = $this->cursor->getAll();
        $this->count = count($results);

        return $results;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return $this->cursor->count();
    }
}