<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Jnjxp\Blurb\Mapper\MapperInterface;
use Jnjxp\Blurb\Page\PageSettings;

class DisplayPageHandler implements RequestHandlerInterface
{
    private $pages;

    private $mapper;

    private $notFoundHandler;

    private $template;

    public function __construct(
        PageSettings $pages,
        MapperInterface $mapper,
        TemplateRendererInterface $template,
        RequestHandlerInterface $notFoundHandler
    ) {
        $this->pages           = $pages;
        $this->mapper          = $mapper;
        $this->template        = $template;
        $this->notFoundHandler = $notFoundHandler;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $page_id = $request->getAttribute('page');

        if (! $page_id || ! $this->pages->has($page_id)) {
            return $this->notFoundHandler->handle($request);
        }

        $settings = $this->pages->get($page_id);

        $blurbs = [];

        foreach ($settings['blurbs'] as $blurb_id) {
            $blurb = $this->mapper->get($blurb_id);
            $blurbs[$blurb->getBlurbId()] = $blurb;
        }

        return new HtmlResponse(
            $this->template->render(
                $settings['template'] ?? 'blurb::page',
                [
                    'page'   => $settings,
                    'blurbs' => $blurbs
                ]
            )
        );
    }
}
