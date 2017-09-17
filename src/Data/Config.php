<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Data;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

use Jnjxp\Blurb\Domain;

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
        $di->params[FileSystemGateway::class] = [
            'root' => $di->lazyValue(Root::class),
            'fsio' => $di->lazyNew(Fsio::class)
        ];


        $di->set(
            Domain\GatewayInterface::class,
            $di->lazyNew(FileSystemGateway::class)
        );
    }

}
