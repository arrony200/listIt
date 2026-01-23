<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Jobs\ProcessContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function propertyInquiry(Request $request,$property_id){

        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:255',
        ]);

       $contact = new Contact();
       $contact->name = $request->name;
       $contact->phone = $request->phone;
       $contact->email = $request->email;
       $contact->message = $request->message. ' \n This property sent via'.route('single-property',$property_id ).' website.';
       $contact->save();

        // send user and admin message
        ProcessContactMail::dispatch($contact);
       //  Mail::send( new ContactMail($contact) );

       return redirect(route('single-property',$property_id ))->with(['message' => 'Your message has been sent.']);
    }

    // public function test(){
    //     Mail::send( new ContactMail());
    //     dd('SENT');
    // }


    public function contact_us(){
        return view('contact.index');
    }

    public function contactFormSubmit(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:255',
        ]);

       $contact = new Contact();
       $contact->name = $request->name;
       $contact->phone = $request->phone;
       $contact->email = $request->email;
    //    $contact->subject = $request->subject;
       $contact->message = $request->message;
       $contact->save();

       return redirect(route('contact'))->with(['message' => 'Your message has been sent.']);
    }

    // public function contact_us(Request $request){
    //     return view('location.index',[
    //         'all_locations' => $latest_locations
    //     ]);
    // }

}
