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

namespace Jnjxp\Blurb;

/**
 * Jnjxp\Blurb
 *
 * @category Domain
 * @package  Jnjxp\Blurb
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     https://github.com/jnjxp/jnjxp.blurb
 */
class Blurb
{
    /**
     * Unique identifier
     *
     * @var mixed
     *
     * @access protected
     */
    protected $blurb_id;

    /**
     * Content of blurb
     *
     * @var string
     *
     * @access protected
     */
    protected $content;

    /**
     * Create a blurb
     *
     * @param mixed $blurb_id DESCRIPTION
     * @param mixed $content  DESCRIPTION
     *
     * @access public
     */
    public function __construct($blurb_id, $content)
    {
        $this->blurb_id = $blurb_id;
        $this->content = $content;
    }

    /**
     * Gets the value of blurb_id
     *
     * @return blurb_id
     */
    public function getBlurbId()
    {
        return $this->blurb_id;
    }

    /**
     * Gets the value of content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * __get
     *
     * @param mixed $prop DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function __get($prop)
    {
        return $this->$prop;
    }

    /**
     * __toString
     *
     * @return mixed
     *
     * @access public
     */
    public function __toString()
    {
        return $this->content;
    }
}
