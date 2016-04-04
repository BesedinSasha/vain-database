<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 11:30 AM
 */

namespace Vain\Database\Generator\Factory;

use Vain\Database\Cursor\CursorInterface;
use Vain\Database\Generator\GeneratorInterface;
use Vain\Database\DatabaseInterface;

interface GeneratorFactoryInterface
{
    /**
     * @param DatabaseInterface $database
     * @param CursorInterface $cursor
     * 
     * @return GeneratorInterface
     */
    public function create(DatabaseInterface $database, CursorInterface $cursor);
}