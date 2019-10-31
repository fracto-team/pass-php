<?php

namespace Fracto\PassPHP\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command
{
    // Todo: Show command shouldn't be accessed with `show`. Its should be;
    // Usage: pass [pass-entry]
    protected static $defaultName = 'show';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // ...
    }
}
