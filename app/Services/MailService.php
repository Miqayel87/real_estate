<?php

namespace App\Services;

use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;

class MailService
{
    /**
     * Sends an email using Laravel's Mail facade.
     *
     * @param array $data The data needed for sending the email.
     *                    It should contain at least the 'email' key with the recipient's email address.
     * @return void
     * @throws \Exception If there's an issue with sending the email.
     */
    public function send(array $data): void
    {
        Mail::to($data['to'])->send(new MailNotify($data));
    }
}
