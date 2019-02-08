<?php

namespace App\Command\Svy\HelpAdds;

interface Mailer
{
    public function mail(string $message);
}