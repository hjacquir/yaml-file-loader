<?php
/**
 * User: h.jacquir
 * Date: 11/07/2020
 * Time: 15:37
 */

namespace Hj\Yaml;

/**
 * Class Host
 * @package Hj\Yaml
 */
class Host extends AbstractChildComponent
{
    /**
     * @return string
     */
    public function getKeyLabel()
    {
        return 'host';
    }
}