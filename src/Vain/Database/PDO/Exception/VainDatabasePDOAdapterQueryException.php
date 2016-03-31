<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/31/16
 * Time: 9:27 AM
 */

namespace Vain\Database\PDO\Exception;

use Vain\Database\VainDatabaseInterface;

class VainDatabasePDOAdapterQueryException extends VainDatabasePDOAdapterException
{
    /**
     * VainDatabasePDOAdapterQueryException constructor.
     * @param VainDatabaseInterface $vainDatabase
     * @param string $errorCode
     * @param array $erroInfo
     */
    public function __construct(VainDatabaseInterface $vainDatabase, $errorCode, array $erroInfo)
    {
        parent::__construct($vainDatabase, $errorCode, implode(', ', $erroInfo));
    }
}