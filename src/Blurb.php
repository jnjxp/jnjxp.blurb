<?php

namespace Jnjxp\Blurb;

class Blurb implements BlurbInterface
{
    protected $blurb_id;

    protected $content;

    public function __construct(string $blurb_id, $content)
    {
        $this->blurb_id = $blurb_id;
        $this->content = $content;
    }

    public function getBlurbId() : string
    {
        return $this->blurb_id;
    }

    public function getType() : string
    {
        return pathinfo($this->getBlurbId(), PATHINFO_EXTENSION);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function update($content)
    {
        $this->content = $content;
    }
}
