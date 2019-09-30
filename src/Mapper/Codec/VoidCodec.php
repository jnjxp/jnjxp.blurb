<?php

namespace Jnjxp\Blurb\Mapper\Codec;

use Jnjxp\Blurb\BlurbInterface;
use Jnjxp\Blurb\Blurb;

class VoidCodec implements CodecInterface
{
    public function decode(string $blurb_id, string $content) : BlurbInterface
    {
        return new Blurb($blurb_id, $content);
    }

    public function encode(BlurbInterface $blurb) : string
    {
        return $blurb->getContent();
    }
}
