<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function notification()
    {
        $data = [
            'email' => 'mryktlynln@gmail.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test notification email.'
        ];
        return view('email.notification', $data);
    }
    public function sendNotification(Request $request)
    {
        $emailNotification = new EmailNotification();
        $emailNotification->sendNotification('recipient@example.com', 'Test Subject', 'This is a test notification email.');

        // Additional code or response
    }
}
class EmailNotification
{
    public function sendNotification($email, $subject, $message)
    {
        $data = [
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ];

        Mail::send('email.notification', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject($data['subject']);
        });
        
        if (Mail::failures()) {
            return false;
        }

        return true;
    }
}
