<?php

namespace App\Http\Controllers;


use App\Mail\NotifMail;
use App\Mail\AcceptanceM;
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
            SELECT *
            FROM users
            INNER JOIN scholarship ON users.id = scholarship.userid
            WHERE scholarship.id = :id', ['id' => $id]
        );

        $name = $data[0]->name;
        $email = $data[0]->email;

        $details = [
            'name' => $name,
            'email' => $email,
            'message' => "We are pleased to inform you that your application for Provincial 
            PESO Educational Assistance Program has been accepted! For more information, 
            please await further notices from Provincial PESO."
        ];

        Mail::to($email)->send(new AcceptanceM($details));
        return redirect('Pstatus');

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('mryktlynln@gmail.com')
        ->setPassword('jbtsuceqxtpfxiuo');
        // if (!empty($data)) {
        //     $email = $data[0]->email;
            // dd($name);
        // } else {
        //     // Handle the case where no data is found for the given ID
        //     dd('Email not found for the provided scholarship ID.');
        // }
    }
    public function acceNotif($id)
    {
        $data = DB::select('
            SELECT *
            FROM users
            INNER JOIN employment ON users.id = employment.userid
            WHERE employment.id = :id', ['id' => $id]
        );

        $name = $data[0]->name;
        $email = $data[0]->email;
        // dd($name);
        $details = [
            'name' => $name,
            'email' => $email,
            'message' => "We are pleased to inform you that your application for Provincial 
            Employment Services Office has been accepted! For more information, 
            please await further notices from Provincial PESO."
        ];

        Mail::to($email)->send(new AcceptanceM($details));
        return redirect('Estatus');

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('mryktlynln@gmail.com')
        ->setPassword('jbtsuceqxtpfxiuo');

    }
    public function accoNotif($id)
    {
        $data = DB::select('
            SELECT *
            FROM users
            INNER JOIN ofw ON users.id = ofw.userid
            WHERE ofw.id = :id', ['id' => $id]
        );

        $name = $data[0]->name;
        $email = $data[0]->email;
        // dd($name);
        $details = [
            'name' => $name,
            'email' => $email,
            'message' => "We are pleased to inform you that your application for Provincial 
            PESO Overseas Filipino Workers (OFW) Assistance Program  has been accepted! For more information, 
            please await further notices from Provincial PESO."
        ];

        Mail::to($email)->send(new AcceptanceM($details));
        return redirect('Ostatus');

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('mryktlynln@gmail.com')
        ->setPassword('jbtsuceqxtpfxiuo');

    }
}
