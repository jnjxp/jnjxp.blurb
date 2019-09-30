<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\Handler;

use Jnjxp\Blurb\Page\PageSettings;
use Jnjxp\Blurb\Mapper\MapperInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Middleware\NotFoundHandler;
use Zend\Expressive\Template\TemplateRendererInterface;

class DisplayPageHandlerFactory
{
    public function __invoke(ContainerInterface $container) : DisplayPageHandler
    {
        return new DisplayPageHandler(
            $container->get(PageSettings::class),
            $container->get(MapperInterface::class),
            $container->get(TemplateRendererInterface::class),
            $container->get(NotFoundHandler::class)
        );
    }
}
