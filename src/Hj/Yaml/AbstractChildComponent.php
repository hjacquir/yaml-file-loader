<?php
/**
 * User: h.jacquir
 * Date: 11/07/2020
 * Time: 16:31
 */

namespace Hj\Yaml;

use Exception;
use Hj\Validator\Validator;

/**
 * Class AbstractChildComponent
 * @package Hj\Yaml
 */
abstract class AbstractChildComponent implements YamlComponent
{
    /**
     * @var AbstractRootComponent
     */
    private $parent;

    /**
     * @var Validator
     */
    private $validator;

    /**
     * Host constructor.
     * @param AbstractRootComponent $parent
     * @param Validator $validator
     */
    public function __construct(
        AbstractRootComponent $parent,
        Validator $validator
    )
    {
        $this->parent = $parent;
        $this->validator = $validator;
    }

    /**
     * @return Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param array $parsedValues
     * @return mixed
     * @throws Exception
     */
    public function getValue(array $parsedValues)
    {
        if (false === isset($parsedValues[$this->parent->getKeyLabel()][$this->getKeyLabel()])) {
            throw new Exception(
                "Wrong yaml file definition." .
                " The child key {$this->getKeyLabel()} does not exist for the parent key : {$this->parent->getKeyLabel()}" .
            " Please check your yaml config file."
            );
        }

        return $parsedValues[$this->parent->getKeyLabel()][$this->getKeyLabel()];
    }
}