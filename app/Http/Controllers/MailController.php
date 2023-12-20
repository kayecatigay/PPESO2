<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $userid = $request->input('userid');
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messageBody = $request->input('message');

        // dd($email);
        $details = [
            'title' => $subject,
            'name' => $name,
            'body' => $messageBody
        ];

        DB::insert('insert into feedback(userid, name, email, subject, message, created_at) 
        values("' .$userid .'","' .$name .'","' .$email .'","' .$subject .'","' .$messageBody.'", NOW() )');

        Mail::to($email)->send(new TestMail($details));
        return redirect('contactus');

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('mryktlynln@gmail.com')
        ->setPassword('jbtsuceqxtpfxiuo');

    }

    // public function sendEmail(Request $request)
    // {
    //     // Retrieve form input data
    //     $name = $request->input('name');
    //     $email = $request->input('email');
    //     $subject = $request->input('subject');
    //     $messageBody = $request->input('message');
    //     // dd($messageBody);
    //     // Check if required fields are provided
    //     if (!$name || !$email || !$subject || !$messageBody) {
    //         return "All form fields are required.";
    //     }

    //     // Create an email message
    //     $details = [
    //         'title' => 'Mail from Provincial PESO',
    //         'body' => 'Hi good day!'
    //     ];

    //     // Send the email
    //     Mail::to($email)->send(new TestMail($details));

    //     return redirect('contactus');
        
    //     $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    //     ->setUsername('mryktlynln@gmail.com')
    //     ->setPassword('jbtsuceqxtpfxiuo');
    // }
}

