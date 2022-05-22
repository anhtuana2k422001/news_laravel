<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Mail\ContacMail;

class ContactController extends Controller
{
    public function create(){
        return view('contact');
    }

    public function store(){
        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'subject' => 'nullable|min:5|max:50',
            'message' => 'required|min:5|max:500' ,
        ]);

        Contact::create($attributes);

        // Mail::to("anhtuanlop10a2812001@gmail.com")->send(new ContacMail(
        Mail::to( env('ADMIN_EMAIL') )->send(new ContacMail(
            $attributes['first_name'],
            $attributes['last_name'],
            $attributes['email'],
            $attributes['subject'],
            $attributes['message']
        ));


        return redirect()->route('contact.create')->with('success', 
        'Bạn đã gửi liên hệ thành công. Chúng tôi sẽ phản hổi cho bạn sớm nhất có thể !');
    }
}
