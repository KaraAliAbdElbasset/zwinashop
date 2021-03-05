<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('website.pages.contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'subject' => 'required|string|max:100',
            'email' => 'required|string|email',
            'message' => 'required|string|max:200',
        ]);

        Mail::to(config('settings.contact_mail')?? 'contact@7clic.com')->send(new ContactMail($data));
        session()->flash('success','Mail Has Been Sent Successfully');
        return redirect()->route('contact');
    }
}
