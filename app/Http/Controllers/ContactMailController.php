<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMailController extends Controller
{
    public function sendMail(Request $request)
    {
        Mail::to('info@misbarbuilds.com')->send(new ContactFormMail($request));
       // return new ContactFormMail($request);
        return redirect()->back();
    }
}
