<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 11:33 AM
 */

namespace Vain\Database\PDO\Generator\Factory;


use Vain\Database\Cursor\VainDatabaseCursorInterface;
use Vain\Database\Generator\Factory\VainDatabaseGeneratorFactoryInterface;
use Vain\Database\Generator\VainDatabaseGenerator;
use Vain\Database\VainDatabaseInterface;

class VainDatabasePDOGeneratorFactory implements VainDatabaseGeneratorFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createGenerator(VainDatabaseInterface $database, VainDatabaseCursorInterface $cursor)
    {
        return new VainDatabaseGenerator($database, $cursor);
    }
}