<?php

namespace Jnjxp\Blurb\Mapper;

use Jnjxp\Blurb\BlurbInterface;

class Mapper implements MapperInterface
{
    protected $storage;

    protected $codec;

    public function __construct(
        Storage\StorageInterface $storage,
        Codec\CodecInterface $codec
    ) {
        $this->storage = $storage;
        $this->codec   = $codec;
    }

    public function has(string $blurb_id) : bool
    {
        return $this->storage->exists($blurb_id);
    }

    public function get($blurb_id) : BlurbInterface
    {
        $content = $this->storage->read($blurb_id);
        return $this->codec->decode($blurb_id, $content);
    }

    public function save(BlurbInterface $blurb) : bool
    {
        $content = $this->codec->encode($blurb);
        return $this->storage->write($blurb->getBlurbId(), $content);
    }
}
