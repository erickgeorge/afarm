<?php

namespace App\Http\Controllers;
use App\Models\users_farmer;
use App\Models\users_user;
use App\Models\users_villagechairman;
use App\Models\crops_farmerscrop;
use App\Models\crops_crop;
use App\Models\User;
use App\Models\subscriptions_subscription;
use App\Models\subscriptions_subscription_crops_regions_weights;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



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
         if($request['email'] !=  $update->email) {
             $request->validate([
                 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             ]);
         }
        $update->email = $request['email'];
        $update->phone = $request['phone'];
        $update->save();

        return back()->with(['message'=>'User Updated Successifully']);
    }

    public function newuser(Request $request)
    {
        $request->validate([

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);

        $update = new user();
        $update->name = $request['name'];
        $update->lname = $request['lname'];
        $update->fname = $request['fname'];
        $update->email = $request['email'];
        $update->phone = $request['phone'];
        $update->role = $request['role'];
        $update->password = Hash::make($request['name']);
        $update->save();

        return redirect()->route('users')->with(['message'=>'New User Added']);
    }


    public function deleteuser($id)
    {
        $del = user::where('id',$id)->first();
        $del->delete();

        return back()->with(['message'=>'User Deleted']);
    }


       public function changepassword(Request $request, $id)
    {
        $update = user::where('id',$id)->first();


        $oldpass = Hash::make($request['oldpass']);

        if (Hash::check($request['oldpass'], $update->password)){

        if($request['newpass'] != $request['confirmpass']){
            return redirect()->route('pass_myprofile',[$id])->withErrors(['message'=>'New Password and Confirm Password do not match.']);
           }


        $update->password = Hash::make($request['newpass']);
        $update->save();

        return redirect()->route('pass_myprofile',[$id])->with(['message'=>'Password Changed Successifully']);
          }
          else{
                return redirect()->route('pass_myprofile',[$id])->withErrors(['message'=>'Wrong Old Password']);

          }

    }

    public function mkulima()
    {
        $mkulima = crops_farmerscrop::all();
        return view('mkulima', ['mkulima'=> $mkulima]);
    }

    public function users()
    {
        $users = User::all();
        return view('users', ['user'=> $users]);
    }

    public function mazao($id)
    {
        $mazaoid = crops_crop::where('id', $id)->first();
        $mazao = crops_farmerscrop::where('crop_id', $id)->get();
        return view('mazao', ['mazao'=> $mazao , 'mazaoid'=> $mazaoid]);
    }

    public function taarifa()
    {
        $taarifa = subscriptions_subscription::where('package_id',1)->get();
        return view('taarifa', ['taarifa'=> $taarifa]);
    }

     public function manunuzi()
    {
        $taarifa = subscriptions_subscription::where('package_id',2)->get();
        return view('manunuzi', ['taarifa'=> $taarifa]);
    }


    public function add_user()
    {
        return view('add_user');
    }

        public function myprofile($id)
    {
        $myprofile = User::where('id',$id)->first();
        return view('myprofile', ['myprofile'=> $myprofile]);
    }

     public function passmyprofile($id)
    {
        $myprofile = User::where('id',$id)->first();
        return view('passmyprofile', ['myprofile'=> $myprofile]);
    }

    public function viewuser($id)
    {
        $myprofile = User::where('id',$id)->first();
        return view('viewuser', ['myprofile'=> $myprofile]);
    }

        public function viewtaarifa($id)
    {
         $taarifa = subscriptions_subscription_crops_regions_weights::where('subscription_id',$id)->get();
          $buyer = subscriptions_subscription::where('id',$id)->first();

        return view('view_taarifa', ['taarifa'=> $taarifa, 'buyer'=>$buyer]);
    }

        public function viewmanunuzi($id)
    {
         $taarifa = subscriptions_subscription_crops_regions_weights::where('subscription_id',$id)->get();
         $buyer = subscriptions_subscription::where('id',$id)->first();

        return view('view_manunuzi', ['taarifa'=> $taarifa, 'buyer'=>$buyer]);
    }

 
        public function viewmanunuzimkulima($id)
    {
         $taarifa = subscriptions_subscription_crops_regions_weights::where('subscription_id',$id)->get();


        return view('view_manunuzi_mkulima', ['taarifa'=> $taarifa]);
    }



}
