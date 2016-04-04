<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:36 AM
 */

namespace Vain\Database\Generator\Exception;

use Vain\Database\Generator\DatabaseGeneratorInterface;

class RewindDatabaseGeneratorException extends DatabaseGeneratorException
{
    private $generator;

    /**
     * @return DatabaseGeneratorInterface
     */
    public function getGenerator()
    {
        return $this->generator;
    }

    /**
     * VainDatabaseGeneratorRewindException constructor.
     * @param DatabaseGeneratorInterface $databaseGenerator
     */
    public function __construct(DatabaseGeneratorInterface $databaseGenerator)
    {
        parent::__construct($databaseGenerator, 'Generators are non-rewindable', 0, null);
    }
}