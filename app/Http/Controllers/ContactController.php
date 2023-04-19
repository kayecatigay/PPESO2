<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contactus');
    }

    public function test123()
    {
        $account_sid = "ACf8fbab9cbdb0851e4f57c7b72edaf1a7";
            $auth_token = "7ce8f94e0e05bf89e3dd2bf6d80f7dcc";
            $twilio_number = "+639369110641";
            $receiverNumber="+639272962299";
            $message="test text";
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
    }
}
?>