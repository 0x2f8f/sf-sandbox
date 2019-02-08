<?php

namespace App\Command\Svy;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class QuestionsCommand extends Command
{
    private $output;

    private const MAX_LENGTH = 6;
    private const MAX_ITERATIONS = 10;

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:svy:questions';

    protected function configure()
    {
        // ...
    }

    /**
     * @return OutputInterface
     */
    private function getOutput()
    {
        return $this->output;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        //$this->q1();
        //$this->q2();
        //$this->q3();

        $this->q4();
    }

    private function q1()
    {
        //if ($user->getRole() === User::ADMIN_ROLE)

        /**
         * Правильнее проверять по hasRole, иначе будет много if по каждой роли. Одна роль может быть включена в другую роль.
         * Юзер может иметь несколько ролей
         */

        //правильный вариант:
        //if ($user->hasRole(User::ADMIN_ROLE))
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

        while ($item = array_pop($list)) {
            $assoc[$item]++;
            $j++;
        }

        $list = [];
        foreach ($assoc as $i => $item) {
            while($item-->0) {
                $list[]=$i;
                $this->output->writeln($i);
                $j++;
            }
        }

        $this->output->writeln('------');
        $this->output->writeln(count($list));
        $this->output->writeln($j);

        //big O(2n + 10)
    }

    private function q3()
    {
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

        $customMailer = $this->getContainer()->get('custom_mailer');
        $resultSend = $customMailer->mail('test message');
    }

    private function q4()
    {
        /*
        Что делает приведенный ниже код и какие в нём есть ошибки?
        private const MAX_LENGTH = 6;

        public function generateCode(): string
        {
          $code = [];
          for ($i = 0; $i < self::MAX_LENGTH; $i++) {
            $code[$i] = rand(0, 9);
          }

          if (array_count_values($code) < self::MAX_LENGTH / 2) {
            return $this->generateCode();
          }

          return implode('', $code);
        }
         */

        $code = $this->generateCode();
//        $this->getOutput()->writeln($code);

        $code = $this->generateCode2();
//        $this->getOutput()->writeln($code);
    }


    /**
     * 1ый алгоритм генерации кода для Q4
     *
     * @return string
     */
    public function generateCode(): string
    {
        $code = [];
        for ($i = 0; $i < self::MAX_LENGTH; $i++) {
            $code[$i] = rand(0, 9);
        }

        //if (array_count_values($code) < self::MAX_LENGTH / 2) {
        // 1. массив сравнивается с числом
        // 2. + не хватает итераций
        if (count(array_count_values($code)) < self::MAX_LENGTH / 2) {
            return $this->generateCode();
        }

        return implode('', $code);
    }

    /**
     * 2ой алгоритм генерации кода для Q4
     *
     * @return string
     */
    public function generateCode2(): string
    {
        /**
         * 1. Код плохо читаем.
         * 2. Меньше уникальности
         */
        $length = self::MAX_LENGTH;
        for ($i = 0; $i < self::MAX_ITERATIONS; $i++) {
            $code = sprintf("%0{$length}s", mt_rand(0, 10 ** $length) - 1);
            if (max(count_chars($code, 1)) < $length / 2) {
                return $code;
            }
        }

        return $code;
    }

}