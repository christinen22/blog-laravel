<?php

namespace App\Http\Controllers;

// app/Http/Controllers/ContactController.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Send email using Laravel's Mail
        Mail::to('christine.elin.louise@gmail.com')->send(new ContactFormMail($request->all()));

        return response()->json(['message' => 'Email sent successfully']);
    }
}
