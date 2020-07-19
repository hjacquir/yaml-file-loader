<?php
/**
 * User: h.jacquir
 * Date: 11/07/2020
 * Time: 16:54
 */

namespace Hj\Yaml;

use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlFile
 * @package Hj\Yaml
 */
class YamlFile
{
    /**
     * @var AbstractRootComponent[]
     */
    private $rootComponents = [];

    /**
     * @var string
     */
    private $yamlFilePath;

    /**
     * YamlFile constructor.
     * @param AbstractRootComponent[] $rootComponents
     * @param string $yamlFilePath
     */
    public function __construct(array $rootComponents, $yamlFilePath)
    {
        $this->rootComponents = $rootComponents;
        $this->yamlFilePath = $yamlFilePath;
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        $values = Yaml::parse($this->yamlFilePath);

        foreach ($this->rootComponents as $rootComponent) {
            $currentValue = $rootComponent->getValue($values);
            $rootComponent->getValidator()->valid($currentValue);

            if ($rootComponent->hasChildComponent()) {
                foreach ($rootComponent->getChildComponents() as $childComponent) {

                    $childComponentCurrentValue = $childComponent->getValue($values);
                    $childComponent->getValidator()->valid($childComponentCurrentValue);
                }
            }
        }
    }
}