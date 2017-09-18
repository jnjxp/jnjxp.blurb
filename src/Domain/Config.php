<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Domain;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

class Config extends ContainerConfig
{

    /**
     * Define
     *
     * @param Container $di DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function define(Container $di)
    {
        $di->params[Service\AbstractService::class] = [
            'gateway' => $di->lazyGet(GatewayInterface::class)
        ];
    }

}
