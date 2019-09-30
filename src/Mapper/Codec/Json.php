<?php

namespace Jnjxp\Blurb\Mapper\Codec;

use Jnjxp\Blurb\BlurbInterface;
use Jnjxp\Blurb\Blurb;

class Json implements CodecInterface
{
    public function decode(string $blurb_id, string $content) : BlurbInterface
    {
        return new Blurb($blurb_id, json_decode($content));
    }

    public function encode(BlurbInterface $blurb) : string
    {
        json_encode($blurb->getContent());
    }
}
