<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\Page;

use Zend\Expressive\Application;
use Jnjxp\Blurb\Handler\DisplayPageHandler;

class PageSettings
{
    protected $pages;

    public function __construct(array $pages)
    {
        $this->pages = $pages;
    }

    public function has(string $page) : bool
    {
        return isset($this->pages[$page]);
    }

    public function get(string $page)
    {
        return $this->pages[$page];
    }

    public function registerRoutes(Application $app) : void
    {
        $regex = implode('|', array_keys($this->pages));

        $app->route(
            "/{page:(?:$regex)}",
            DisplayPageHandler::class,
            ['GET'],
            'page'
        );
    }
}
