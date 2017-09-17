<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Web\Action\Update;

use Jnjxp\Blurb\Web\Action\AbstractResponder;

class Responder extends AbstractResponder
{

    protected $redirectTo = '/';

    protected function updated()
    {
        $this->messages()
            ->success('Updated blurb');

        return $this->redirect($this->redirectTo);
    }
}
