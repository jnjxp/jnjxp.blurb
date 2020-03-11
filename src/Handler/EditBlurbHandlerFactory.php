<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\Handler;

use Jnjxp\Blurb\PageSettings;
use Jnjxp\Blurb\Mapper\MapperInterface;
use Psr\Container\ContainerInterface;
use Mezzio\Handler\NotFoundHandler;
use Mezzio\Template\TemplateRendererInterface;

class EditBlurbHandlerFactory
{
    public function __invoke(ContainerInterface $container) : EditBlurbHandler
    {
        return new EditBlurbHandler(
            $container->get(MapperInterface::class),
            $container->get(TemplateRendererInterface::class),
            $container->get(NotFoundHandler::class)
        );
    }
}
