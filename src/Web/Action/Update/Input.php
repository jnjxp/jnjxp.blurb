<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Web\Action\Update;

use Psr\Http\Message\ServerRequestInterface as Request;

class Input
{
    public function __invoke(Request $request)
    {
        $post = $request->getParsedBody();

        return [
            'blurb_id' => $request->getAttribute('blurb_id'),
            'content'  => $post['content']
        ];
    }
}
