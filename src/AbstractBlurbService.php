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

namespace Jnjxp\Blurb;

use Aura\Payload_Interface\PayloadInterface as Payload;
use Aura\Payload_Interface\PayloadStatus as Status;

use Jnjxp\Blurb\BlurbGatewayInterface as Gateway;

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
abstract class AbstractBlurbService
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
     * Payload
     *
     * @var Payload
     *
     * @access protected
     */
    protected $payload;

    /**
     * Gateway
     *
     * @var Gateway
     *
     * @access protected
     */
    protected $gateway;

    /**
     * __construct
     *
     * @param Payload $payload Domain Payload
     * @param Gateway $gateway Domain Gateway
     *
     * @access public
     */
    public function __construct(Payload $payload, Gateway $gateway)
    {
        $this->protoPayload = $payload;
        $this->gateway = $gateway;
    }

    /**
     * Initialize service
     *
     * @param array $input service input
     *
     * @return Payload
     *
     * @access protected
     */
    protected function init(array $input)
    {
        $this->payload = clone $this->protoPayload;
        $this->payload->setInput($input);
        return $this->payload;
    }

    /**
     * Blurb not found
     *
     * @param mixed $blurbId unique identifier
     *
     * @return Payload
     *
     * @access protected
     */
    protected function notFound($blurbId)
    {
        $msg = sprintf('Blurb "%s" not found', $blurbId);

        $this->payload
            ->setStatus(Status::NOT_FOUND)
            ->setMessages([$msg]);

        return $this->payload;
    }

    /**
     * Error
     *
     * @param Exception $exception exception
     *
     * @return Payload
     *
     * @access protected
     */
    protected function error(Exception $exception)
    {
        $this->payload
            ->setStatus(Status::ERROR)
            ->setMessages([$exception->getMessage()]);

        return $this->payload;
    }
}

