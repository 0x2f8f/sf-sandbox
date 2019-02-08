<?php

namespace App\Command\Svy\HelpAdds;

class CustomMailer
{
    private $mailer;
    private $logegr;

    /**
     * CustomMailer constructor.
     * @param Mailer $mailer
     * @param $logger
     */
    public function __construct(Mailer $mailer, $logger)
    {
        $this->mailer = $mailer;
        $this->logegr = $logger;
    }

    /**
     * @param string $message
     * @return bool
     */
    public function mail(string $message)
    {
        $result = $this->getMailer($this->mailer)->mail($message);
        $this->getLogger()->add($message, $result);
        return $result;
    }
}