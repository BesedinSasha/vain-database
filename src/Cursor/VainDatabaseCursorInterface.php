<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:55 AM
 */

namespace Vain\Database\Cursor;


interface VainDatabaseCursorInterface
{
    public function valid();
    
    public function current();
    
    public function next();

    public function close();

    public function mode($mode);
    
    public function getSingle();
    
    public function getAll();
    
    public function count();
}