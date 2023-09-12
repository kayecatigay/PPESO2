<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
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

