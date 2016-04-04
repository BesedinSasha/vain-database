<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:21 AM
 */

namespace Vain\Database\Generator;


interface GeneratorInterface extends \Iterator, \Countable
{
    /**
     * @param int $mode
     *
     * @return array
     */
    public function getSingleRow($mode);

    /**
     * @param int $mode
     *
     * @return array
     */
    public function getAllRows($mode);
}