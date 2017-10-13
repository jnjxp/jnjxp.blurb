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
 * @category  Data
 * @package   Jnjxp\Blurb
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      https://github.com/jnjxp/jnjxp.blurb
 */

namespace Jnjxp\Blurb\Data;

use Jnjxp\Blurb\Domain;

use Exception;

/**
 * Jnjxp\Blurb
 *
 * @category Data
 * @package  Jnjxp\Blurb
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     https://github.com/jnjxp/jnjxp.blurb
 */
class FileSystemGateway implements Domain\GatewayInterface
{

    /**
     * Root
     *
     * @var string
     *
     * @access protected
     */
    protected $root;

    /**
     * FSIO
     *
     * @var Fsio
     *
     * @access protected
     */
    protected $fsio;

    /**
     * __construct
     *
     * @param string $root path to storage
     * @param Fsio   $fsio fs reader
     *
     * @access public
     */
    public function __construct($root, Fsio $fsio)
    {
        $this->root = $root;
        $this->fsio = $fsio;
    }

    /**
     * Filepath
     *
     * @param string $blurb_id blurb identifier
     *
     * @return string
     *
     * @access protected
     */
    protected function filepath(string $blurb_id) : string
    {
        return $this->root . '/' . $blurb_id;
    }

    /**
     * Has
     *
     * @param mixed $blurb_id unique blurb id
     *
     * @return bool
     *
     * @access public
     */
    public function has(string $blurb_id) : bool
    {
        $path = $this->filepath($blurb_id);
        return $this->fsio->exists($path);
    }

    /**
     * Fetch
     *
     * @param mixed $blurb_id unique blurb id
     *
     * @return Domain\Blurb
     *
     * @access public
     */
    public function fetch(string $blurb_id) : Domain\Blurb
    {
        if (!$this->has($blurb_id)) {
            throw new Domain\Exception\BlurbNotFoundException($blurb_id);
        }
        return $this->load($blurb_id);
    }

    /**
     * Update
     *
     * @param string $blurb_id unique blurb id
     * @param string $content  blurb content
     *
     * @return Domain\Blurb
     *
     * @access public
     */
    public function update(string $blurb_id, string $content) : Domain\Blurb
    {
        if (!$this->has($blurb_id)) {
            throw new Domain\Exception\BlurbNotFoundException($blurb_id);
        }
        $this->fsio->put($this->filepath($blurb_id), $content);
        return $this->load($blurb_id);
    }

    /**
     * Load
     *
     * @param string $blurb_id DESCRIPTION
     *
     * @return Domain\Blurb
     *
     * @access protected
     */
    protected function load(string $blurb_id) : Domain\Blurb
    {
        $path    = $this->filepath($blurb_id);
        $content = $this->fsio->get($path);
        return new Domain\Blurb($blurb_id, $content);
    }
}
