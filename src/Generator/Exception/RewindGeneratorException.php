<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 3/30/16
 * Time: 10:36 AM
 */

namespace Vain\Database\Generator\Exception;

use Vain\Database\Generator\GeneratorInterface;

class RewindGeneratorException extends GeneratorException
{
    private $generator;

    /**
     * @return GeneratorInterface
     */
    public function getGenerator()
    {
        return $this->generator;
    }

    /**
     * VainDatabaseGeneratorRewindException constructor.
     * @param GeneratorInterface $databaseGenerator
     */
    public function __construct(GeneratorInterface $databaseGenerator)
    {
        parent::__construct($databaseGenerator, 'Generators are non-rewindable', 0, null);
    }
}