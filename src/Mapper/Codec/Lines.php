<?php

namespace Jnjxp\Blurb\Mapper\Codec;

use Jnjxp\Blurb\BlurbInterface;
use Jnjxp\Blurb\Blurb;

class Lines implements CodecInterface
{
    public function decode(string $blurb_id, string $content) : BlurbInterface
    {
        return new Blurb($blurb_id, explode(PHP_EOL, $content));
    }

    public function encode(BlurbInterface $blurb) : string
    {
        implode(PHP_EOL, $blurb->getContent());
    }
}
