<?php

namespace App\Http\Controllers;


use App\Mail\NotifMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function sendpNotif(Request $request)
    {
        $dateformat = date_create($request->input('datetime'));
        // echo date_format($dateformat,"F d, Y  -  g:i a");

        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messageBody = $request->input('message');
        $location = $request->input('location');
        $date = date_format($dateformat,"F d, Y  -  g:i a");

        // dd($date);
        $detail = [
            'title' => $subject,
            'name' => $name,
            'body' => $messageBody,
            'location' => $location,
            'date' => $date
        ];

        Mail::to($email)->send(new NotifMail($detail));
        return redirect('Pstatus');

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('mryktlynln@gmail.com')
        ->setPassword('jbtsuceqxtpfxiuo');
    }
    public function accpNotif($id)
    {
        $data = DB::select('
            SELECT users.email
            FROM users
            INNER JOIN scholarship ON users.id = scholarship.userid
            WHERE scholarship.id = :id', ['id' => $id]
        );
        $email = $data[0]->email;
        // if (!empty($data)) {
        //     $email = $data[0]->email;
        //     dd($email);
        // } else {
        //     // Handle the case where no data is found for the given ID
        //     dd('Email not found for the provided scholarship ID.');
        // }
    }


}
