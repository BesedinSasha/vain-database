<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:02 AM
 */

namespace Vain\Database\Exception;

use Vain\Database\DatabaseInterface;

class LevelIntegrityException extends Exception
{
    /**
     * LevelIntegrityDatabaseException constructor.
     * @param DatabaseInterface $database
     * @param int $level
     */
    public function __construct(DatabaseInterface $database, $level)
    {
        parent::__construct($database, sprintf('Level integrity check exception for level %d', $level), 0, null);
    }
}