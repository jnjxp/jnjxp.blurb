<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\Page;

use Psr\Container\ContainerInterface;

class PageSettingsFactory
{
    public function __invoke(ContainerInterface $container) : PageSettings
    {
        $pages = $container->get('config')['blurb']['pages'] ?? [];
        return new PageSettings($pages);
    }
}
