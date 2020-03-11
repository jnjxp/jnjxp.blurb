<?php

namespace Jnjxp\Blurb\Mapper\Storage;

use Psr\Container\ContainerInterface;

class FilesystemFactory
{
    public function __invoke(ContainerInterface $container) : StorageInterface
    {
        $root = $container->get('config')['blurb']['root'] ?? null;
        return new Filesystem($root);
    }
}
