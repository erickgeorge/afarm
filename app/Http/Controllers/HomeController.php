<?php

namespace App\Http\Controllers;
use App\Models\users_farmer;
use App\Models\users_user;
use App\Models\users_villagechairman;
use App\Models\crops_farmerscrop;
use App\Models\crops_crop;
use App\Models\User;
use App\Models\subscriptions_subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function usajili()
    {
        $user_farm = users_farmer::all();
        return view('usajili', ['user_farm'=> $user_farm]);
    }

    public function usajili_approved()
    {
        $user_farm = users_farmer::all();
        return view('usajili_approved', ['user_farm'=> $user_farm]);
    }

    public function approve_user($id)
    {
        $approve = users_farmer::where('user_id',$id)->first();

        $myuser = users_user::where('id',$approve->user_id)->first();
        $myuser->is_active = 1;
        $myuser->save();

        return back()->with(['message'=>'User Approved Successifully']);
    }


    public function updateuser(Request $request, $id)
    {
        $update = user::where('id',$id)->first();
        $update->name = $request['name'];
        $update->lname = $request['lname'];
        $update->fname = $request['fname'];
        $update->email = $request['email'];
        $update->phone = $request['phone'];
        $update->save();

        return back()->with(['message'=>'User Updated Successifully']);
    }


       public function changepassword(Request $request, $id)
    {
        $update = user::where('id',$id)->first();
        

        $oldpass = Hash::make($request['oldpass']);

        if (Hash::check($request['oldpass'], $update->password)){
        
        if($request['newpass'] != $request['confirmpass']){
            return back()->withErrors(['message'=>'New Password and Confirm Password do not match.']);
           }
      
      
        $update->password = Hash::make($request['newpass']);
        $update->save();

        return back()->with(['message'=>'Password Changed Successifully']);
          }
          else{
                return back()->withErrors(['message'=>'Wrong Old Password']);
         
          }

    }

    public function mkulima()
    {
        $mkulima = crops_farmerscrop::all();
        return view('mkulima', ['mkulima'=> $mkulima]);
    }

    public function mazao($id)
    {
        $mazaoid = crops_crop::where('id', $id)->first();
        $mazao = crops_farmerscrop::where('crop_id', $id)->get();
        return view('mazao', ['mazao'=> $mazao , 'mazaoid'=> $mazaoid]);
    }


    public function taarifa()
    {
        $taarifa = subscriptions_subscription::all();
        return view('taarifa', ['taarifa'=> $taarifa]);
    }

        public function myprofile($id)
    {
        $myprofile = User::where('id',$id)->first();
        return view('myprofile', ['myprofile'=> $myprofile]);
    }

}
