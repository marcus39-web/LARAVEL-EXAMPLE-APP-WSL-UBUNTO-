<?php
namespace App\Services;

class MailService implements MailServiceInterface
{
    public function send(string $to, string $subject, string $body): void
    {
        // Simuliert das Senden einer E-Mail
        echo "E-Mail an $to mit Betreff '$subject' wurde gesendet. Inhalt: $body\n";
    }
}
