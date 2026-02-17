<?php
namespace App\Services;

interface MailServiceInterface
{
    public function send(string $to, string $subject, string $body): void;
}
