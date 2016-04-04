<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:55 AM
 */

namespace Vain\Database\Cursor;


interface CursorInterface
{
    /**
     * @return bool
     */
    public function valid();

    /**
     * @return array
     */
    public function current();

    /**
     * @return array
     */
    public function next();

    /**
     * @return CursorInterface
     */
    public function close();

    /**
     * @param int $mode
     *
     * @return CursorInterface
     */
    public function mode($mode);

    /**
     * @return array
     */
    public function getSingle();

    /**
     * @return array
     */
    public function getAll();

    /**
     * @return int
     */
    public function count();
}