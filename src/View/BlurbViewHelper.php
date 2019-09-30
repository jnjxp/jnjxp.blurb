<?php

declare(strict_types=1);

namespace Jnjxp\Blurb\View;

use Jnjxp\Blurb\Mapper\MapperInterface;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class BlurbViewHelper implements ExtensionInterface
{
    protected $engine;

    protected $mapper;

    public function __construct(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    public function register(Engine $engine)
    {
        $this->engine = $engine;
        $engine->registerFunction('blurb', [$this, 'getObject']);
    }

    public function getObject()
    {
        return $this;
    }

    public function render(string $blurb_id) : string
    {
        $blurb = $this->mapper->get($blurb_id);
        return $this->engine->render(
            'blurb::blurb',
            ['blurb' => $blurb]
        );
    }
}
