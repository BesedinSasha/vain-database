<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 11:30 AM
 */

namespace Vain\Database\Generator\Factory;

use Vain\Database\Cursor\DatabaseCursorInterface;
use Vain\Database\Generator\DatabaseGeneratorInterface;
use Vain\Database\DatabaseInterface;

interface DatabaseGeneratorFactoryInterface
{
    /**
     * @param DatabaseInterface $database
     * @param DatabaseCursorInterface $cursor
     * 
     * @return DatabaseGeneratorInterface
     */
    public function createGenerator(DatabaseInterface $database, DatabaseCursorInterface $cursor);
}