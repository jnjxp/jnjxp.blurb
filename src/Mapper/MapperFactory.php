<?php

namespace Jnjxp\Blurb\Mapper;

use Psr\Container\ContainerInterface;

class MapperFactory
{
    public function __invoke(ContainerInterface $container) : MapperInterface
    {
        return new Mapper(
            $container->get(Storage\StorageInterface::class),
            $container->get(Codec\CodecInterface::class)
        );
    }
}
