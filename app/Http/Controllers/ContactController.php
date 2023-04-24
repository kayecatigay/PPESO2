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
            $auth_token = "d3b38b4469145b7126598e0e6d992c57";
            $twilio_number = "+15303195438";
            $receiverNumber="+639272962299";
            $message="test text2 ";
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);

                print($message);
    }
}
?>