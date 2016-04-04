<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:02 AM
 */

namespace Vain\Database\Exception;

use Vain\Database\VainDatabaseInterface;

class VainDatabaseLevelIntegrityException extends VainDatabaseException
{
    public function __construct(VainDatabaseInterface $database, $level)
    {
        parent::__construct($database, sprintf('Level integrity check exception for level %d', $level), 0, null);
    }
}