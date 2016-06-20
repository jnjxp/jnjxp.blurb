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

namespace Jnjxp\Blurb\Service;

use Jnjxp\Blurb\AbstractBlurbService;

use Aura\Payload_Interface\PayloadStatus as Status;

use Exception;

/**
 * Update
 *
 * @category Serice
 * @package  Jnjxp\Blurb
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/jnjxp/jnjxp.blurb
 */
class Update extends AbstractBlurbService
{

    /**
     * __invoke
     *
     * @param mixed  $blurb_id DESCRIPTION
     * @param string $content  DESCRIPTION
     *
     * @return Aura\Payload_Interface\PayloadInterface
     *
     * @access public
     */
    public function __invoke($blurb_id, $content)
    {
        $this->init(['id' => $blurb_id, 'content' => $content]);

        try {

            if (! $this->gateway->has($blurb_id)) {
                return $this->notFound($blurb_id);
            }

            $blurb = $this->gateway->update($blurb_id, $content);

            if (! $blurb) {
                throw new Exception('Blurb not Updated!');
            }

            $this->payload
                ->setStatus(Status::UPDATED)
                ->setOutput(['blurb' => $blurb]);

        } catch (Exception $exception) {
            $this->error($exception);
        }

        return $this->payload;
    }
}

