<?php

namespace App\Http\Controllers;


use App\Mail\NotifMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function sendpNotif(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messageBody = $request->input('message');

        // dd($email);
        $detail = [
            'title' => $subject,
            'name' => $name,
            'body' => $messageBody
        ];

        Mail::to($email)->send(new NotifMail($detail));
        return redirect('Pstatus');

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('mryktlynln@gmail.com')
        ->setPassword('jbtsuceqxtpfxiuo');
    }
}
