<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\View;

use Jnjxp\Blurb\Mapper\MapperInterface;
use Psr\Container\ContainerInterface;

class BlurbViewHelperFactory
{
    public function __invoke(ContainerInterface $container) : BlurbViewHelper
    {
        return new BlurbViewHelper(
            $container->get(MapperInterface::class)
        );
    }
}
