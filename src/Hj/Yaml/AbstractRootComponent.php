<?php
/**
 * User: h.jacquir
 * Date: 11/07/2020
 * Time: 15:32
 */

namespace Hj\Yaml;

use Exception;
use Hj\Validator\Validator;

/**
 * Class AbstractRootComponent
 * @package Hj\Yaml
 */
abstract class AbstractRootComponent implements YamlComponent
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     * FilePath constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
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
        if (false === isset($parsedValues[$this->getKeyLabel()])) {
            throw new Exception(
                "Wrong yaml file definition." .
                " The parent key {$this->getKeyLabel()} does not exist." .
                " Please check your yaml config file."
            );
        }

        return $parsedValues[$this->getKeyLabel()];
    }
}