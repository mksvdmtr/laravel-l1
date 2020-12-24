<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
//use Mosquitto\Exception;
use Exception;

class ContactController extends Controller
{
    public function submit(ContactRequest $req)
    {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        try {
            $contact->save();
        } catch (Exception $exeption) {
            if(str_contains($exeption->getMessage(), 'Duplicate')) {
                return redirect()->route('contacts')->with('danger', 'Такой email уже занят');
            }
        }

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    public function allData()
    {
        $contact = new Contact();
        return view('messages', ['data' => $contact->orderBy('id', 'desc')->get()]);
    }

    public function showOneMessage($id)
    {
        $contact = new Contact();
        return view('oneMessage', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id)
    {
        $contact = new Contact();
        return view('updateMessage', ['data' => $contact->find($id)]);
    }

    public function deleteMessage($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }

    public function updateMessageSubmit($id, ContactRequest $req)
    {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
    }
}
