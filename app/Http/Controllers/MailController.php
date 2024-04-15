<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use App\Services\PropertyService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function __construct()
    {
        $this->mailService = new MailService;
        $this->propertyService = new PropertyService;
    }

    public function send(Request $request, $id)
    {
        $property = $this->propertyService->getById($id);
        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'mailContent' => $request->mailContent,
            'referer' => $request->headers->get('referer'),
            'from' => $request->from,
            'property' => $property
        ];
        $this->mailService->send($data);
        return back();
    }
}
