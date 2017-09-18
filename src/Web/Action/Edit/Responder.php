<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Web\Action\Edit;

use Jnjxp\Blurb\Web\Action\AbstractResponder;

class Responder extends AbstractResponder
{
    protected function found()
    {
        return $this->viewBody(
            'blurb/edit',
            ['blurb' => $this->payload->getOutput()]
        );
    }
}
