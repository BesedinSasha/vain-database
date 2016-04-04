<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 9:27 AM
 */

namespace Vain\Database\PDO\Exception;

use Vain\Database\PDO\PDOAdapter;

class QueryPDOException extends PDOException
{
    /**
     * VainDatabasePDOAdapterQueryException constructor.
     * @param PDOAdapter $database
     * @param string $errorCode
     * @param array $errorInfo
     */
    public function __construct(PDOAdapter $database, $errorCode, array $errorInfo)
    {
        parent::__construct($database, $errorCode, implode(', ', $errorInfo));
    }
}