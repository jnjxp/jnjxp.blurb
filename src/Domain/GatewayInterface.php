<?php
/**
 * Blurbs
 *
 * PHP version 5
 *
 * Copyright (C) 2016 Jake Johns
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 *
 * @category  Domain
 * @package   Jnjxp\Blurb
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      https://github.com/jnjxp/jnjxp.blurb
 */

namespace Jnjxp\Blurb\Domain;

/**
 * BlurbGatewayInterface
 *
 * @category CategoryName
 * @package  PackageName
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 */
interface GatewayInterface
{

    /**
     * Has
     *
     * @param string $blurb_id unique blurb id
     *
     * @return bool
     *
     * @access public
     */
    public function has(string $blurb_id) : bool;

    /**
     * Fetch
     *
     * @param string $blurb_id unique blurb id
     *
     * @return Blurb
     *
     * @access public
     */
    public function fetch(string $blurb_id) : Blurb;

    /**
     * Update
     *
     * @param string $blurb_id unique blurb id
     * @param string $content  blurb content
     *
     * @return Blurb
     *
     * @access public
     */
    public function update(string $blurb_id, string $content) : Blurb;
}
