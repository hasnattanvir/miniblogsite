<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Contact::latest()->get();
        return view('admin.contact.index',compact('messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact , $id)
    {
        $message = Contact::find($id);
        if($message){
            return view('admin.contact.show',compact('message'));
        }else{
            session::flash('error','contact message not found');
            return redirect()->route('dashboard');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, $id)
    {
        $contact = Contact::find($id);
        if($contact){
            $contact->delete();
            Session::flash('sucess','Message Deleted Sucessfully');
        }
        return redirect()->back();
    }
}
