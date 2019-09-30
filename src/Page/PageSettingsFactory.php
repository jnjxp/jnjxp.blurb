<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\Page;

use Psr\Container\ContainerInterface;

class PageSettingsFactory
{
    public function __invoke(ContainerInterface $container) : PageSettings
    {
        return new PageSettings(
            $container->get('config-blurb.pages')
        );
    }
}
