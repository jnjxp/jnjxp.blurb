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
 * @category  Input
 * @package   Jnjxp\Blurb
 * @author    Jake Johns <jake@jakejohns.net>
 * @copyright 2016 Jake Johns
 * @license   http://jnj.mit-license.org/2016 MIT License
 * @link      https://github.com/jnjxp/jnjxp.blurb
 */

namespace Jnjxp\Blurb;

use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Input
 *
 * @category Input
 * @package  Jnjxp\Blurb
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/2016 MIT License
 * @link     https://github.com/jnjxp/jnjxp.blurb
 */
class Input
{
    /**
     * Edit
     *
     * @param Request $request DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function edit(Request $request)
    {
        $blurb_id = $request->getAttribute('blurb_id');
        return [$blurb_id];
    }

    /**
     * Update
     *
     * @param Request $request DESCRIPTION
     *
     * @return mixed
     *
     * @access public
     */
    public function update(Request $request)
    {
        $blurb_id = $request->getAttribute('blurb_id');
        $post = $request->getParsedBody();
        return [
            $blurb_id,
            isset($post['content']) ? $post['content'] : null
        ];
    }
}
