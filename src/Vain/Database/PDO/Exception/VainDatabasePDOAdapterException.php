<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:16 AM
 */

namespace Vain\Database\PDO\Exception;

use Vain\Database\VainDatabaseInterface;
use Vain\Database\Exception\VainDatabaseException;

class VainDatabasePDOAdapterException extends VainDatabaseException
{
    /**
     * VainDatabasePDOAdapterException constructor.
     * @param VainDatabaseInterface $vainDatabase
     * @param \PDOException $e
     */
    public function __construct(VainDatabaseInterface $vainDatabase, $errorCode, $errorMessage, \PDOException $e = null)
    {
        parent::__construct($vainDatabase, sprintf('Unable to communicate to the database: %d - %s', $errorCode, $errorMessage), 0, $e);
    }
}