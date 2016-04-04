<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:21 AM
 */

namespace Vain\Database\Generator;


interface VainDatabaseGeneratorInterface extends \Iterator, \Countable
{
    public function getSingleRow($mode);

    public function getAllRows($mode);
}