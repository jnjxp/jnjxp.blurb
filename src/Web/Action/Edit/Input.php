<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Web\Action\Edit;

use Psr\Http\Message\ServerRequestInterface as Request;

class Input
{
    public function __invoke(Request $request)
    {
        return [
            'blurb_id' => $request->getAttribute('blurb_id')
        ];
    }
}
