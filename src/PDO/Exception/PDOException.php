<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:16 AM
 */

namespace Vain\Database\PDO\Exception;

use Vain\Database\Exception\Exception;
use Vain\Database\PDO\PDOAdapter;

class PDOException extends Exception
{
    /**
     * PDODatabaseException constructor.
     * @param PDOAdapter $database
     * @param \PDOException $e
     */
    public function __construct(PDOAdapter $database, $errorCode, $errorMessage, \PDOException $e = null)
    {
        parent::__construct($database, sprintf('Unable to communicate to the database: %d - %s', $errorCode, $errorMessage), 0, $e);
    }
}