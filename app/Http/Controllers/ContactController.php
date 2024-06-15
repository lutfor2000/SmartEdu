<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
    $this->middleware('checkadmin');
}
//========================Contact View Page Start=======================================>
function Contact(){
    $contacts = Contact::latest()->paginate(5);
    return view('contact.index',compact('contacts'));
}
//========================Contact View Page End=======================================>

//========================Contact Delete  Start=======================================>
function ContactDelete(Request $request){
    if (Contact::where('id',$request->contact_id)->exists()){
        Contact::find($request->contact_id)->delete();
       }
       return response()->json([
        'status' => 'success',
       ]);
}
//========================Contact Delete  End=======================================>

//========================Contact View Page Start=======================================>
//========================Contact View Page End=======================================>

//========================Contact View Page Start=======================================>
//========================Contact View Page End=======================================>

//========================Contact View Page Start=======================================>
//========================Contact View Page End=======================================>


}
