<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:36 AM
 */

namespace Vain\Database\Generator\Exception;

use Vain\Database\Exception\VainDatabaseException;
use Vain\Database\Generator\VainDatabaseGeneratorInterface;
use Vain\Database\VainDatabaseInterface;

class VainDatabaseGeneratorRewindException extends VainDatabaseException
{
    private $generator;

    /**
     * @return VainDatabaseGeneratorInterface
     */
    public function getGenerator()
    {
        return $this->generator;
    }
    
    public function __construct(VainDatabaseGeneratorInterface $databaseGenerator, VainDatabaseInterface $vainDatabase)
    {
        $this->generator = $databaseGenerator;
        parent::__construct($vainDatabase, sprintf('Generators are non-rewindable'), 0);
    }
}