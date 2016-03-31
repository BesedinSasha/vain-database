<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 9:29 AM
 */

namespace Vain\Database\PDO\Exception;

use Vain\Database\VainDatabaseInterface;

class VainDatabaseAdapterCommunicationException extends VainDatabasePDOAdapterException
{
    public function __construct(VainDatabaseInterface $vainDatabase, \PDOException $e)
    {
        parent::__construct($vainDatabase, $e->getCode(), $e->getMessage(), $e);
    }
}