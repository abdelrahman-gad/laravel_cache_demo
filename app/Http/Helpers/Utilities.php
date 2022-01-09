<?php

use Illuminate\Support\Facades\Mail;

function sendMail($template , $to , $subject , $data){
       // dd('test');
    info($to);
    info($subject);
    // Mail::send($template,$data->toArray(),function($message) use ($to, $subject){
    //   $message -> subject($subject);
    //   $message -> to($to);
    // });
}
