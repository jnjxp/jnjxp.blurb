<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Web;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

use Jnjxp\Blurb\Domain;
use Aura\View\View as AuraView;

class Config extends ContainerConfig
{

    /**
     * Define
     *
     * @param Container $di DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function define(Container $di)
    {
        $di->params[Action\AbstractResponder::class] = [
            'view' => $di->lazyGet(AuraView::class)
        ];

        $di->params[View\BlurbHelper::class] = [
            'gateway' => $di->lazyGet(Domain\GatewayInterface::class)
        ];
    }

    /**
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function modify(Container $di)
    {
        if ($di->has('radar/adr:router')) {
            $router = $di->get('radar/adr:router');
            $map    = $router->getMap();
            $routes = $di->newInstance(Routes::class);
            $map->attach(__NAMESPACE__ . '\\Action', '/blurbs', $routes);
        }

        if ($di->has(AuraView::class)) {
            $view    = $di->get(AuraView::class);
            $helpers = $view->getHelpers();
            $helpers->set('blurb', $di->lazyNew(View\BlurbHelper::class));

            $path = dirname(__DIR__) . '/../resources/views/';
            $templates = $view->getViewRegistry();
            $templates->appendPath($path);
        }
    }

}
