<?php

declare(strict_types=1);

namespace Jnjxp\Blurb;

use Mezzio\Application;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke() : array
    {
        return [
            'plates'       => $this->getPlatesConfig(),
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'factories'  => [
                Handler\DisplayPageHandler::class      => Handler\DisplayPageHandlerFactory::class,
                Handler\EditBlurbHandler::class        => Handler\EditBlurbHandlerFactory::class,
                Mapper\Codec\CodecInterface::class     => Mapper\Codec\CodecStrategyFactory::class,
                Mapper\MapperInterface::class          => Mapper\MapperFactory::class,
                Mapper\Storage\StorageInterface::class => Mapper\Storage\FilesystemFactory::class,
                Page\PageSettings::class               => Page\PageSettingsFactory::class,
                View\BlurbViewHelper::class            => View\BlurbViewHelperFactory::class,
            ],
            'aliases' => [
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'blurb'    => [__DIR__ . '/../resources/templates/'],
            ],
        ];
    }

    public function registerRoutes(Application $app) : void
    {
        $app->route(
            '/admin/edit-blurb/{blurb_id}',
            Handler\EditBlurbHandler::class,
            ['GET', 'POST'],
            'blurb.edit'
        );
    }

    public function getPlatesConfig()
    {
        return [
            'extensions' => [
                View\BlurbViewHelper::class,
            ]
        ];
    }
}
