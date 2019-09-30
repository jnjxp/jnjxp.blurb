<?php

namespace Jnjxp\Blurb\Mapper\Storage;

use Psr\Container\ContainerInterface;

class FilesystemFactory
{
    public function __invoke(ContainerInterface $container) : StorageInterface
    {
        $config = $container->get('config-blurb');

        if (! isset($config['root'])) {
            throw new \Exception('No blurb.root set');
        }

        return new Filesystem($config['root']);
    }
}
