<?php

namespace App\Services;

use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send($data){
        Mail::to($data['email'])->send(new MailNotify($data));
    }
}
