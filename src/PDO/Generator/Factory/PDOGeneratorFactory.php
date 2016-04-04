<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 11:33 AM
 */

namespace Vain\Database\PDO\Generator\Factory;


use Vain\Database\Cursor\DatabaseCursorInterface;
use Vain\Database\Generator\Factory\DatabaseGeneratorFactoryInterface;
use Vain\Database\Generator\DatabaseGenerator;
use Vain\Database\DatabaseInterface;

class PDOGeneratorFactory implements DatabaseGeneratorFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createGenerator(DatabaseInterface $database, DatabaseCursorInterface $cursor)
    {
        return new DatabaseGenerator($database, $cursor);
    }
}