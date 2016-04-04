<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 9:50 AM
 */

namespace Vain\Database\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Database\DatabaseInterface;

class Exception extends CoreException
{
    private $database;

    /**
     * VainDatabaseException constructor.
     * @param DatabaseInterface $vainDatabase
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct(DatabaseInterface $vainDatabase, $message, $code, \Exception $previous = null)
    {
        $this->database = $vainDatabase;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return DatabaseInterface
     */
    public function getDatabase()
    {
        return $this->database;
    }
}