<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 9:45 AM
 */

namespace Vain\Database;

use Vain\Database\Generator\DatabaseGeneratorInterface;

interface DatabaseInterface
{
    /**
     * @return bool
     */
    public function transaction();

    /**
     * @return bool
     */
    public function commit();

    /**
     * @return bool
     */
    public function rollback();

    /**
     * @param string $query
     * @param array $bindParams
     * 
     * @return DatabaseGeneratorInterface
     */
    public function query($query, array $bindParams);
}