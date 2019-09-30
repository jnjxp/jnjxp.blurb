<?php

namespace Jnjxp\Blurb\Mapper\Storage;

interface StorageInterface
{
    public function exists(string $name) : bool;

    public function read(string $name) : string;

    public function write(string $name, string $data) : bool;
}
