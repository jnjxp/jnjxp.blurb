<?php

namespace Jnjxp\Blurb\Mapper\Codec;

use Jnjxp\Blurb\BlurbInterface;

class CodecStrategy implements CodecInterface
{
    private $codecs = [];

    public function __construct(array $codecs)
    {
        foreach ($codecs as $type => $codec) {
            $this->set($type, $codec);
        }
    }

    protected function has($type) : bool
    {
        return isset($this->codecs[$type]);
    }

    protected function get($type) : CodecInterface
    {
        if (!$this->has($type)) {
            throw new \Exception("Invalid Codec Type: $type");
        }

        return $this->codecs[$type];
    }

    protected function type(string $blurb_id) : string
    {
        return pathinfo($blurb_id, PATHINFO_EXTENSION);
    }

    public function set(string $type, CodecInterface $codec) : void
    {
        $this->codecs[$type] = $codec;
    }

    public function encode(BlurbInterface $blurb) : string
    {
        $codec = $this->get($blurb->getType());
        return $codec->encode($blurb);
    }

    public function decode(string $blurb_id, string $content) : BlurbInterface
    {
        $type  = $this->type($blurb_id);
        $codec = $this->get($type);
        return $codec->decode($blurb_id, $content);
    }
}
