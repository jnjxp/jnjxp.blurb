<?php

namespace Jnjxp\Blurb;

class Console
{
    protected $cmds = [
        'init'    => Console\Init::class
    ];

    public function execute($args) : bool
    {
        if (count($args) > 1) {
            array_shift($args); // executable
            $cmd = array_shift($args);
            if (array_key_exists($cmd, $this->cmds)) {
                return $this->command($this->cmds[$cmd], $args);
            }
            $this->outputHelp();
            return false;
        }

        $this->outputHelp();
        return false;
    }

    protected function command($class, $args)
    {
        $command = new $class();
        return $command->execute(...$args);
    }

    protected function outputHelp()
    {
        echo 'Available commands:' . PHP_EOL;
        foreach (array_keys($this->cmds) as $cmd) {
            echo 'blurb' . $cmd . PHP_EOL;
        }
    }
}
