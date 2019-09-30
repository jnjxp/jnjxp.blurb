<?php

namespace Jnjxp\Blurb;

interface BlurbInterface
{
    public function getBlurbId() : string;

    public function getType() : string;

    public function getContent();

    public function update($content);
}
