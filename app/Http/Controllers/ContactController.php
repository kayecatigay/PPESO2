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

        $curl = curl_init();
        $datasms = array(
        'api_key' => "2PuNpyDN0KtI8wEsyKM3lj8Znth",
        'api_secret' => "0jJHZfp243ddp7RbGc0PVE1hKIaoG4scIMs9GDtP",
        'text' => "Hello! 
        
            PPESO",
        'to' => "639272962299",
        'from' => "PPESO"
        );

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.movider.co/v1/sms",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => http_build_query($datasms),
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/x-www-form-urlencoded",
        "cache-control: no-cache"
      ),
    ));

    var_dump($curl);
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    echo "Message sent!";
    // if ($err) {
    //   echo "cURL Error #:" . $err;
    // } else {
    //   echo $response;
    // }




        // $account_sid = getenv('TWILIO_ACCOUNT_SID');
        // $auth_token = getenv('TWILIO_AUTH_TOKEN');
        //     $twilio_number = "+12705175379";
        //     $receiverNumber="+639190043771";
        //     $message="test text33 ";
        //     $client = new Client($account_sid, $auth_token);

        //     $client->messages->create(
        //         // Where to send a text message (your cell phone?)
        //         '+63 927 296 2299',
        //         array(
        //             'from' => $twilio_number,
        //             'body' => $message
        //         )
        //     );

                // print($message);
    }
}
?>