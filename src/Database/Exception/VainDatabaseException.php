<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 9:50 AM
 */

namespace Vain\Database\Exception;

use Vain\Core\Exception\VainCoreException;
use Vain\Database\VainDatabaseInterface;

class VainDatabaseException extends VainCoreException
{
    private $database;

    /**
     * VainDatabaseException constructor.
     * @param VainDatabaseInterface $vainDatabase
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct(VainDatabaseInterface $vainDatabase, $message, $code, \Exception $previous = null)
    {
        $this->database = $vainDatabase;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return VainDatabaseInterface
     */
    public function getDatabase()
    {
        return $this->database;
    }
}