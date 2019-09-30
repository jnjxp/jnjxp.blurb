<?php

namespace Jnjxp\Blurb\Mapper;

use Jnjxp\Blurb\BlurbInterface;

interface MapperInterface
{
    public function has(string $blurb_id) : bool;

    public function get($blurb_id) : BlurbInterface;

    public function save(BlurbInterface $blurb) : bool;
}
