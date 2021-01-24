<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {   
        $this->validate($request, [
            'subscriber_email' => 'required|email|unique:subscribers,email'
        ]);
        
        $subscriber = new Subscriber();

        $subscriber->email = $request->subscriber_email;

        $subscriber->save();

        Toastr::success('You Are Successfully Added To Our Subscriber List !','Success');

        return redirect()->back();
    }
}
