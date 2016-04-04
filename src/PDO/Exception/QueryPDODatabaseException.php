<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 9:27 AM
 */

namespace Vain\Database\PDO\Exception;

use Vain\Database\PDO\PDODatabase;

class QueryPDODatabaseException extends PDODatabaseException
{
    /**
     * VainDatabasePDOAdapterQueryException constructor.
     * @param PDODatabase $database
     * @param string $errorCode
     * @param array $errorInfo
     */
    public function __construct(PDODatabase $database, $errorCode, array $errorInfo)
    {
        parent::__construct($database, $errorCode, implode(', ', $errorInfo));
    }
}