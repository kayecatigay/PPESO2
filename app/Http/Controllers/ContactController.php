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
        $account_sid = getenv('TWILIO_ACCOUNT_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
            $twilio_number = "+12705175379";
            $receiverNumber="+639190043771";
            $message="test text33 ";
            $client = new Client($account_sid, $auth_token);

            $client->messages->create(
                // Where to send a text message (your cell phone?)
                '+63 930 913 4109',
                array(
                    'from' => $twilio_number,
                    'body' => $message
                )
            );

                print($message);
    }
}
?>