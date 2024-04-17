<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }

    public function store(ContactRequest $request){
        if($request->validate()){
            Contact::create($request->validate());
        }

        return back()->with([
            'success' => 'Thanks for contacting us!'
        ]);
    }
}
