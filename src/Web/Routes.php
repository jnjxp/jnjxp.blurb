<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Web;

use Jnjxp\Blurb\Domain\Service;
use Aura\Router\Map;

class Routes
{

    public function __invoke($map)
    {
        $map->auth(true);
        $map->get('\\Edit', '/{blurb_id}', Service\GetBlurb::class);
        $map->post('\\Update', '/{blurb_id}', Service\UpdateBlurb::class);
    }
}
