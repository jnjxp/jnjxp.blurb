<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb;

use Aura\Di\ConfigCollection;

class Config extends ConfigCollection
{
    public function __construct()
    {
        parent::__construct(
            [
                Data\Config::class,
                Domain\Config::class,
                Web\Config::class
            ]
        );
    }
}
