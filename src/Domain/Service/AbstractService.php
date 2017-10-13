<?php
/**
 * Blurb
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Service
 * @package   Jnjxp\Blurb
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      https://github.com/jnjxp/jnjxp.blurb
 */

namespace Jnjxp\Blurb\Domain\Service;

use Aura\Payload\Payload;
use Aura\Payload_Interface\PayloadStatus as Status;

use Jnjxp\Blurb\Domain\GatewayInterface;

use Exception;

/**
 * AbstractService
 *
 * @category Serice
 * @package  Jnjxp\Blurb
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/jnjxp/jnjxp.blurb
 *
 * @abstract
 */
abstract class AbstractService
{

    /**
     * Protopayload
     *
     * @var Payload
     *
     * @access protected
     */
    protected $protoPayload;

    /**
     * Gateway
     *
     * @var GatewayInterface
     *
     * @access protected
     */
    protected $gateway;

    /**
     * __construct
     *
     * @param Gateway $gateway Domain Gateway
     * @param Payload $payload Domain Payload
     *
     * @access public
     */
    public function __construct(GatewayInterface $gateway, Payload $payload = null)
    {
        $this->gateway = $gateway;
        $this->protoPayload = $payload ?? new Payload;
    }

    /**
     * Payload
     *
     * @return Payload
     * @throws exceptionclass [description]
     *
     * @access protected
     */
    protected function payload()
    {
        return clone $this->protoPayload;
    }

}

