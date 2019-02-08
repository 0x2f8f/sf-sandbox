<?php

namespace App\Command\Svy;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class QuestionsCommand extends Command
{
    private $output;

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:svy:questions';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        //$this->q1();
        //$this->q2();
    }

    private function q1()
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

    private function q2()
    {
        /**
         * Дан массив из чисел от 1 до 10. Размер массива 1 ГБ.
         * Размер памяти 1 ГБ и 1 МБ.
         * Предложи способ быстро отсортировать массив (плюсом будет указание алгоритмической сложности).
         */
        $list = [10, 9, 8, 2, 3, 5, 6, 7, 1, 2, 3, 4, 5, 6, 7, 8, 10, 1, 2, 3, 9, 5];
        $assoc = [];
        for ($i=1;$i<=10;$i++) {
            $assoc[$i]=0;
        }
        $j = 0;
        foreach ($list as $item) {
            $assoc[$item]++;
            $j++;
        }
        foreach ($assoc as $i => $item) {
            while($item-->0) {
                $this->output->writeln($i);
                $j++;
            }
        }

        $this->output->writeln('------');
        $this->output->writeln(count($list));
        $this->output->writeln($j);
    }

    private function q3(){
        /*
            Напиши декоратор для класса DefaultMailer, который бы логировал каждое отправленное сообщение.
            class DefaultMailer implements Mailer
            {
              public function mail(string $message)
              {
                ...
              }
            }
         */

        //$customMailer = $this->getContainer()->get('custom_mailer');
        //$resultSend = $customMailer->mail('test message');
    }


}