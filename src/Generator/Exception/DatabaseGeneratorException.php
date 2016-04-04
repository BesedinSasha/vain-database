<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 8:47 PM
 */

namespace Vain\Database\Generator\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Database\Generator\DatabaseGeneratorInterface;

class DatabaseGeneratorException extends CoreException
{
    private $generator;

    /**
     * DatabaseGeneratorException constructor.
     * @param DatabaseGeneratorInterface $databaseGenerator
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(DatabaseGeneratorInterface $databaseGenerator, $message, $code, $previous)
    {
        $this->generator = $databaseGenerator;
        parent::__construct($message, $code, $previous);
    }
}