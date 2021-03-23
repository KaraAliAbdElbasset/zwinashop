<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactComponent extends Component
{
    public $email;
    public $message;
    public $loading = false;
    protected $rules = [
        'email' => 'required|email',
        'message' => 'required|string|max:250',
    ];

    public function render()
    {
        return view('livewire.contact-component');
    }


    public function sendEmail()
    {
        $data = $this->validate($this->rules);
        try {
            Mail::to('test@test.com')->send(new ContactMail($data));
            session()->flash('success','Email Was sent Successfully');
            $this->clear();
        }catch (\Exception $exception)
        {
            session()->flash('error','Oops! Something went wrong');
        }

    }

    private function clear()
    {
        $this->email = '';
        $this->message = '';
    }
}
