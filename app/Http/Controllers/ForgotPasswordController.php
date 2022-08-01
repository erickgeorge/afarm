<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; 
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    
      public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token]
        );

        Mail::send('verify', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset password Notification');
            $message->from('support.esmis@udsm.ac.tz','AFARM');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

}
