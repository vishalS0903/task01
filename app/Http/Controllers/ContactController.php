<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)

    {
        $data = new Contact();
        $data->c_fname =$request->c_fname ;
        $data->c_lname =$request->c_lname ;
        $data->c_email =$request->c_email ;
        $data->c_subject =$request->c_subject ;
        $data->c_message =$request->c_message ;
        $data->save();
        return redirect()->back()->with('msg','request has been submitted');
    }
    public function index()
    {
        $data=Contact::all();
        Return view('contact.index',compact('data'));
    }
}
