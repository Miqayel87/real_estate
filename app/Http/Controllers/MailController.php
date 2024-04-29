<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Services\MailService;
use App\Services\PropertyService;

class MailController extends Controller
{
    public function __construct()
    {
        $this->mailService = new MailService;
        $this->propertyService = new PropertyService;
    }

    public function send(MailRequest $request, $id)
    {
        $property = $this->propertyService->getById($id);

        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'mailContent' => $request->mailContent,
            'referer' => $request->headers->get('referer'),
            'to' => $request->to,
            'property' => $property
        ];

        $this->mailService->send($data);

        return back();
    }
}
