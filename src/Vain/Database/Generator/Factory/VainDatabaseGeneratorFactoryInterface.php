<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 11:30 AM
 */

namespace Vain\Database\Generator\Factory;

use Vain\Database\Cursor\VainDatabaseCursorInterface;
use Vain\Database\Generator\VainDatabaseGeneratorInterface;
use Vain\Database\VainDatabaseInterface;

interface VainDatabaseGeneratorFactoryInterface
{
    /**
     * @param VainDatabaseInterface $database
     * @param VainDatabaseCursorInterface $cursor
     * 
     * @return VainDatabaseGeneratorInterface
     */
    public function createGenerator(VainDatabaseInterface $database, VainDatabaseCursorInterface $cursor);
}