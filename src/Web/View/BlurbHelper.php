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
 * @category  Helper
 * @package   Jnjxp\Blurb
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      https://github.com/jnjxp/jnjxp.blurb
 */

namespace Jnjxp\Blurb\Web\View;

use Jnjxp\Blurb\Domain\GatewayInterface;

/**
 * BlurbHelper
 *
 * @category CategoryName
 * @package  PackageName
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 */
class BlurbHelper
{
    /**
     * Gateway
     *
     * @var mixed
     *
     * @access protected
     */
    protected $gateway;

    /**
     * __construct
     *
     * @param BlurbGatewayInterface $gateway DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function __construct(GatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * __invoke
     *
     * @param mixed $blurbId DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function __invoke($blurbId)
    {
        return $this->gateway->fetch($blurbId);
    }
}
