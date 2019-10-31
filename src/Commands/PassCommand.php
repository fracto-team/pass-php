<?php

namespace Fracto\PassPHP\Commands;

use Symfony\Component\Console\Command\Command;

abstract class PassCommand extends Command
{
    protected $basePath = null;

    public function __construct($basePath = null)
    {
        $this->basePath = $basePath;
        parent::__construct();
    }
}