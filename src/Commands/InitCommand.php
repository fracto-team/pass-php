<?php

namespace Fracto\PassPHP\Commands;

use Fracto\PassPHP\Pass;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class InitCommand extends PassCommand
{
    protected static $defaultName = 'init';

    protected function configure()
    {
        $this
            ->addArgument('gpg-id', InputArgument::REQUIRED, 'GnuPG ID will be used for encryption.')
            ->addOption("path", "p", InputOption::VALUE_REQUIRED, 'Subfolder for multiple GnuPG ID usage.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $subFolder = $input->getOption("path");
        $gpgId = $input->getArgument("gpg-id");

        Pass::instance($this->basePath)->init($gpgId, $subFolder);
    }
}
