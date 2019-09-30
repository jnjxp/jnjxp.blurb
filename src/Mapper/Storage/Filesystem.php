<?php

namespace Jnjxp\Blurb\Mapper\Storage;

class Filesystem implements StorageInterface
{
    protected $root;

    public function __construct(string $root)
    {
        $this->root = realpath($root);
        if (! $this->root) {
            throw new \Exception("Root does not exist: $root");
        }
    }

    protected function path(string $name) : string
    {
        $path = $this->root . '/' . trim($name, '/.');
        if (! $this->isValid($path)) {
            throw new \Exception("Bad name: $name");
        }
        return $path;
    }

    protected function isValid($path) : bool
    {
        $parent = realpath(pathinfo($path, PATHINFO_DIRNAME)) . '/';
        $start  = substr($parent, 0, strlen($this->root . '/'));
        return $start === $this->root . '/';
    }

    public function exists(string $name) : bool
    {
        $path = $this->path($name);
        return file_exists($path);
    }

    public function read(string $name) : string
    {
        $path  = $this->path($name);
        $data  = @file_get_contents($path);

        if (false !== $data) {
            return $data;
        }

        $error = error_get_last();
        throw new \Exception($error['message']);
    }

    public function write(string $name, string $data) : bool
    {
        $path   = $this->path($name);
        if (! is_writable($path)) {
            throw new \Exception("Not writable: $path");
        }
        $result = @file_put_contents($path, $data);

        if ($result !== false) {
            return true;
        }

        $error = error_get_last();
        throw new \Exception($error['message']);
    }
}
