<?php
/**
 * Jnjxp\Blurb
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Config
 * @package   Jnjxp\Blurb
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      https://github.com/jnjxp/jnjxp.blurb
 */

namespace Jnjxp\Blurb;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

use Aura\Payload\Payload;

use Radar\Adr\Adr;
use Aura\Router\Map;

/**
 * Config
 *
 * @category CategoryName
 * @package  PackageName
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 */
class Config
{

    /**
     * Route prefix
     *
     * @var string
     *
     * @access protected
     */
    protected $prefix = 'Action\\Blurb\\';

    /**
     * Url
     *
     * @var string
     *
     * @access protected
     */
    protected $url = '/blurbs';

    /**
     * Responder
     *
     * @var string
     *
     * @access protected
     */
    protected $responder = 'Action\Blurb\Responder';

    /**
     * Configure Radar?
     *
     * @var mixed
     *
     * @access protected
     */
    protected $route = true;

    /**
     * SetRadar
     *
     * @param mixed $bool DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function setRoute($bool)
    {
        $this->route = $bool;
    }

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

        $di->set(
            'jnjxp/blurb:gateway',
            $di->lazyNew(Gateway\FileSystemGateway::class)
        );

        $di->params[AbstractBlurbService::class] = [
            'payload' => $di->lazyNew(Payload::class),
            'gateway' => $di->lazyGet('jnjxp/blurb:gateway')
        ];

        $di->params[Gateway\FileSystemGateway::class] = [
            'root' => $di->lazyValue('jnjxp/blurb:data_dir'),
            'fsio' => $di->lazyNew(Gateway\Fsio::class)
        ];

        $di->params[BlurbHelper::class] = [
            'gateway' => $di->lazyGet('jnjxp/blurb:gateway')
        ];
    }

    /**
     * Modify
     *
     * @param Container $di DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     *
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    public function modify(Container $di)
    {
        if ($this->route && $di->has('radar/adr:adr')) {
            $this->adr($di->get('radar/adr:adr'));
        }

        if ($di->has('aura/html:helpers')) {
            $helpers = $di->get('aura/html:helpers');
            $helpers->set('blurb', $di->lazyNew(BlurbHelper::class));
        }
    }

    /**
     * Adr
     *
     * @param Adr $adr ADR Container
     *
     * @return mixed
     *
     * @access public
     */
    public function adr(Adr $adr)
    {
        $adr->attach(
            $this->prefix,
            $this->url,
            [$this, 'attach']
        );
    }

    /**
     * Attach
     *
     * @param Map $map DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function attach(Map $map)
    {
        $map->auth(true);
        $map->responder($this->responder);

        $map->get('Edit', '/{blurb_id}/edit', Service\Edit::class)
            ->input([Input::class, 'edit']);

        $map->put('Update', '/{blurb_id}', Service\Update::class)
            ->input([Input::class, 'update']);
    }
}
