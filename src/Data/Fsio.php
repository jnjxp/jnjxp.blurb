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
 * @category  IO
 * @package   Jnjxp\Blurb
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      http://jakejohns.net
 */

namespace Jnjxp\Blurb\Data;

use Exception;

/**
 * Fsio
 *
 * @category CategoryName
 * @package  PackageName
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://jakejohns.net
 */
class Fsio
{
    /**
     * Get
     *
     * @param mixed $file DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function get($file)
    {
        $level = error_reporting(0);
        $result = file_get_contents($file);
        error_reporting($level);
        if ($result !== false) {
            return $result;
        }
        $error = error_get_last();
        throw new Exception($error['message']);
    }

    /**
     * Put
     *
     * @param mixed $file DESCRIPTION
     * @param mixed $data DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function put($file, $data)
    {
        $level = error_reporting(0);
        $result = file_put_contents($file, $data);
        error_reporting($level);
        if ($result !== false) {
            return $result;
        }
        $error = error_get_last();
        throw new Exception($error['message']);
    }

    /**
     * Exists
     *
     * @param mixed $file DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function exists($file)
    {
        return file_exists($file);
    }

    /**
     * Mtime
     *
     * @param mixed $file DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function mtime($file)
    {
        $level = error_reporting(0);
        $result = filemtime($file);
        error_reporting($level);
        if ($result !== false) {
            return $result;
        }
        $error = error_get_last();
        throw new Exception($error['message']);
    }
}
