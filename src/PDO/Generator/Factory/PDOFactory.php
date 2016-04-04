<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 11:33 AM
 */

namespace Vain\Database\PDO\Generator\Factory;


use Vain\Database\Cursor\CursorInterface;
use Vain\Database\Generator\Factory\FactoryInterface;
use Vain\Database\Generator\Generator;
use Vain\Database\DatabaseInterface;

class PDOFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(DatabaseInterface $database, CursorInterface $cursor)
    {
        return new Generator($database, $cursor);
    }
}