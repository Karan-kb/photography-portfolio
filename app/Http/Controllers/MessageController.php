<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\YourMailClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function send_message(Request $request)
{
  
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    $message = new Message();
    $message->name = $request->input('name');
    $message->email = $request->input('email');
    $message->message = $request->input('message');
    $message->save();

    return redirect()->back();
}

}
