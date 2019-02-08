<?php

namespace App\Command\Svy;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Q1Command extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:svy:q1';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //if ($user->getRole() === User::ADMIN_ROLE)

        /**
         * 1. Правильнее проверять по hasRole, иначе будет много if.
         * 2. У Role лучше объявить сущность Role, которая может в себя включать и другие роли.
         *    Тогда реализация будет не только через ===
         * 3. Если и обращаться к константам, то к UserRole::ADMIN_ROLE или Credential::ADMIN_ROLE,
         *    чтобы классы отвечали за свою область видимости
         */
    }
}