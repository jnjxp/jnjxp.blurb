<?php

namespace Jnjxp\Blurb\Mapper\Codec;

use Jnjxp\Blurb\BlurbInterface;

interface CodecInterface
{
    public function encode(BlurbInterface $blurb) : string;

    public function decode(string $blurb_id, string $content) : BlurbInterface;
}
