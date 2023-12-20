<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if (!($request->input('userid'))) {
            return redirect('/login'); //if no user logged in redirect to login
            exit; // do not read the remaing codes , exit public function
        }
        else
        {
            $showdata = DB:: select('select * from homepage');
            return view('emails.contactus',['show'=>$showdata]);
        }
    }

    public function sendmess(Request $request)
    {
        // dd($request->input('num'));
        $curl = curl_init();
        $datasms = array(
        'api_key' => "2PuNpyDN0KtI8wEsyKM3lj8Znth",
        'api_secret' => "0jJHZfp243ddp7RbGc0PVE1hKIaoG4scIMs9GDtP",
        'text' => "Hello! 
         
            PPESO",
        'to' => $request->input('num'),
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

    // var_dump($curl);
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
    function sendssms($mobile, $message, $apicode) 
    {
        $ch = curl_init();
        $heze = array('mobile' => $mobile, 'message' => $message, 'apicode' => $apicode);
        curl_setopt($ch, CURLOPT_URL,"https://hezesms.phserver.online/broadcast.php");
        curl_setopt($ch,CURLOPT_TIMEOUT, 60);
        //time out of the curl handler
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 60);
        //time out of the curl socket connection closing
        curl_setopt($ch,CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($heze));
        curl_setopt($ch,CURLOPT_HEADER, 0);
        curl_setopt($ch,CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1');
        //proxy as Mozilla browser
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec ($ch);
        curl_close ($ch);
        return json_decode($response, true);
        // redirect('SendSms');
    }
    public function sendSms(Request $request)
    {
        $mobile = $request->input('mobile');
        $message = $request->input('message');
        $apicode = $request->input('apicode');

        // dd($apicode);

        $response = $this->sendssms($mobile, $message, $apicode);

        if (isset($response['success']) && $response['success']) {
            // If the 'success' key is set to true in the response, you can return a success view
            return view('messages'); // Replace 'success' with the actual view name
        } else {
            // If there was an error sending the SMS or the 'success' key is not set, you can return an error view
            session()->flash('error', 'There was an error sending the SMS.');

            // Then, redirect back to the view where you want to display the alert
            return redirect()->back();    
        }
        
    }

}
?>