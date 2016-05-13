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

namespace Jnjxp\Blurb\Gateway;

use Jnjxp\Blurb\BlurbGatewayInterface;
use Jnjxp\Blurb\Blurb;

use Exception;

/**
 * Jnjxp\Blurb
 *
 * @category Domain
 * @package  Jnjxp\Blurb
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     https://github.com/jnjxp/jnjxp.blurb
 */
class FileSystemGateway implements BlurbGatewayInterface
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
     * @param mixed $root DESCRIPTION
     * @param Fsio  $fsio DESCRIPTION
     *
     * @return mixed
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
     * @param mixed $blurb_id DESCRIPTION
     *
     * @return mixed
     *
     * @access protected
     */
    protected function filepath($blurb_id)
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
    public function has($blurb_id)
    {
        return $this->fsio->exists($this->filepath($blurb_id));
    }

    /**
     * Fetch
     *
     * @param mixed $blurb_id unique blurb id
     *
     * @return Blurb|array
     *
     * @access public
     */
    public function fetch($blurb_id)
    {
        if (!$this->has($blurb_id)) {
            return null;
        }
        return $this->load($blurb_id);
    }

    /**
     * Update
     *
     * @param mixed  $blurb_id unique blurb id
     * @param string $content  blurb content
     *
     * @return Blurb
     *
     * @access public
     */
    public function update($blurb_id, $content)
    {
        if (!$this->has($blurb_id)) {
            $msg = sprintf('Blurb "%s" not found', $blurb_id);
            throw new Exception($msg);
        }
        $this->fsio->put($this->filepath($blurb_id), $content);
        return $this->load($blurb_id);
    }

    /**
     * Load
     *
     * @param mixed $blurb_id DESCRIPTION
     *
     * @return mixed
     *
     * @access protected
     */
    protected function load($blurb_id)
    {
        $path    = $this->filepath($blurb_id);
        $content = $this->fsio->get($path);
        return new Blurb($blurb_id, $content);
    }

}
