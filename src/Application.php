<?php

namespace Fracto\PassPHP;

use Fracto\PassPHP\Commands\CopyCommand;
use Fracto\PassPHP\Commands\EditCommand;
use Fracto\PassPHP\Commands\FindCommand;
use Fracto\PassPHP\Commands\GenerateCommand;
use Fracto\PassPHP\Commands\GitCommand;
use Fracto\PassPHP\Commands\GrepCommand;
use Fracto\PassPHP\Commands\InitCommand;
use Fracto\PassPHP\Commands\InsertCommand;
use Fracto\PassPHP\Commands\ListCommand;
use Fracto\PassPHP\Commands\MoveCommand;
use Fracto\PassPHP\Commands\RemoveCommand;
use Fracto\PassPHP\Commands\ShowCommand;
use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\Console\Command\Command;

class Application
{

    protected $basePath = null;

    protected $commands = [
        InitCommand::class,
        ListCommand::class,
        FindCommand::class,
        ShowCommand::class,
        GrepCommand::class,
        InsertCommand::class,
        EditCommand::class,
        GenerateCommand::class,
        RemoveCommand::class,
        MoveCommand::class,
        CopyCommand::class,
        GitCommand::class,
    ];

    protected $defaultCommand = ListCommand::class;

    public function __construct($basePath = null, $extraCommands = [])
    {
        $this->basePath = $basePath;
        $this->commands = array_merge($this->commands, $extraCommands);
    }

    /**
     *
     *
     * @throws \Exception
     */
    public function run()
    {
        $app = new ConsoleApplication("Pass", "0.1.0");

        $commands = [];
        foreach($this->commands as $command){
            /** @var Command $cmd */
            $cmd = new $command($this->basePath);
            $commands[$cmd->getName()] = $cmd;
        }
        foreach($commands as $command)
            $app->add($command);
        /** @var string $defaultCommandName */
        $defaultCommandName = array_search($this->defaultCommand,$commands);
        $app->setDefaultCommand($defaultCommandName);

        $app->run();
    }
}