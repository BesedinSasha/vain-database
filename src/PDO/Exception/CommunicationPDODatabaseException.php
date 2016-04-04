<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 9:29 AM
 */

namespace Vain\Database\PDO\Exception;

use Vain\Database\PDO\PDOAdapter;

class CommunicationPDODatabaseException extends PDODatabaseException
{
    /**
     * CommunicationPDODatabaseException constructor.
     * @param PDOAdapter $database
     * @param \PDOException $e
     */
    public function __construct(PDOAdapter $database, \PDOException $e)
    {
        parent::__construct($database, $e->getCode(), $e->getMessage(), $e);
    }
}