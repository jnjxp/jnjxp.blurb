<?php
// @codingStandardsIgnoreFile

namespace Jnjxp\Blurb\Domain\Exception;

class BlurbNotFoundException extends \Exception
{

    public function __construct($blurb_id)
    {
        $msg = sprintf('Blurb "%s" not found', $blurb_id);
        parent::__construct($msg);
    }
}
