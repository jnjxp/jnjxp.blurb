<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Mezzio\Template\TemplateRendererInterface;
use Jnjxp\Blurb\Mapper\MapperInterface;
use Jnjxp\Blurb\BlurbInterface;

class EditBlurbHandler implements RequestHandlerInterface
{
    private $mapper;

    private $notFoundHandler;

    private $template;

    public function __construct(
        MapperInterface $mapper,
        TemplateRendererInterface $template,
        RequestHandlerInterface $notFoundHandler
    ) {
        $this->mapper          = $mapper;
        $this->template        = $template;
        $this->notFoundHandler = $notFoundHandler;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $blurb_id = $request->getAttribute('blurb_id');

        if (! $blurb_id) {
            return $this->notFoundHandler->handle($request);
        }

        $blurb = $this->mapper->get($blurb_id);

        if (! $blurb_id) {
            return $this->notFoundHandler->handle($request);
        }

        if ('POST' === $request->getMethod()) {
            return $this->handleUpdate($request, $blurb);
        }

        return new HtmlResponse(
            $this->template->render(
                'blurb::edit',
                [
                    'blurb' => $blurb
                ]
            )
        );
    }

    protected function handleUpdate(ServerRequestInterface $request, BlurbInterface $blurb)
    {
        $blurb->update($request->getParsedBody()['content']);

        if (! $this->mapper->save($blurb)) {
            throw new \Exception('Something went wrong');
        }

        $request->getAttribute('flash')
                ->flash(
                    'success',
                    sprintf('Updated %s', $blurb->getBlurbId())
                );

        return new RedirectResponse('/', 303);
    }
}
