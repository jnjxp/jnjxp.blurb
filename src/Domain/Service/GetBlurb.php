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

use Exception;

use Aura\Payload_Interface\PayloadStatus as Status;

/**
 * GetBlurb
 *
 * @category Serice
 * @package  Jnjxp\Blurb
 * @author   Jake Johns <jake@jakejohns.net>
 * @license  http://jnj.mit-license.org/ MIT License
 * @link     http://github.com/jnjxp/jnjxp.blurb
 */
class GetBlurb extends AbstractService
{

    /**
     * __invoke
     *
     * @param mixed $blurb_id DESCRIPTION
     *
     * @return Aura\Payload_Interface\PayloadInterface
     *
     * @access public
     */
    public function __invoke($blurb_id)
    {

        $payload = $this->payload();
        $payload->setInput(['blurb_id' => $blurb_id]);

        try {

            $blurb = $this->gateway->fetch($blurb_id);

            if (! $blurb) {
                return $payload->setStatus(Status::NOT_FOUND);
            }

            return $payload
                ->setStatus(Status::FOUND)
                ->setOutput($blurb);

        } catch (Exception $exception) {
            return $payload
                ->setStatus(Status::ERROR)
                ->setOutput($exception);
        }
    }
}

