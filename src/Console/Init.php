<?php

namespace Jnjxp\Blurb\Console;

class Init
{

    public function execute() : bool
    {
        $root = realpath(__DIR__ . '/../../../../../');
        $stub = dirname(__DIR__) . '/../resources/config/blurbs.global.php';
        $data = "$root/data/blurb";
        $config = "$root/config/autoload/blurbs.global.php";

        if (! is_dir($data)) {
            echo "Creating $data\n";
            mkdir($data, 0755, true);
        } else {
            echo "$data exists\n";
        }

        if (! file_exists($config)) {
            echo "Creating $config\n";
            copy($stub, $config);
        } else {
            echo "$config exists\n";
        }

        return true;
    }
}
