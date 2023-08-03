<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function form()
    {
        $title = 'Contatti';

        $text = 'Vuoi fare parte del nostro team? Scrivici ed analizzerermo la tua richiesta!';

        return view('contatti', compact('title', 'text'));
    }

    public function save(Request $request)
    {

        $mail = new ContactMail($request->name, $request->email,$request->message);

        // return $mail->render();   preview della mail

        Mail::to('admin@example.com')->send($mail);
        
        return redirect()->route('contacts')->with(['success'=>'Inviata con successo!']);
    }
}
