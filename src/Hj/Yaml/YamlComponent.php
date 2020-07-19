<?php
/**
 * User: h.jacquir
 * Date: 11/07/2020
 * Time: 15:46
 */

namespace Hj\Yaml;

use Hj\Validator\Validator;

/**
 * Interface YamlComponent
 * @package Hj\Yaml
 */
interface YamlComponent
{
    /**
     * @return string
     */
    public function getKeyLabel();

    /**
     * @param array $parsedValues
     * @return mixed
     */
    public function getValue(array $parsedValues);

    /**
     * @return Validator
     */
    public function getValidator();
}