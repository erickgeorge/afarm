<?php

namespace App\Http\Controllers;
use App\Models\users_farmer;
use App\Models\users_user;
use App\Models\users_villagechairman;
use App\Models\crops_farmerscrop;
use App\Models\crops_crop;
use App\Models\crops_cropunit;
use App\Models\User;
use App\Models\crops_farmerscropsunitprice;
use App\Models\subscriptions_cropregionsubscriptionweight;
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

        $mkulima = crops_farmerscrop::all();

        $mazaoid = crops_crop::all();

        $user_farm = users_farmer::select('users_farmer.id as id','users_user.is_active','users_farmer.first_name','users_farmer.last_name','users_farmer.phone_number','users_farmer.user_id','users_farmer.village_chairman_id','users_farmer.village_id')->join('users_user','users_farmer.user_id','=','users_user.id')->where('users_user.is_active', 0)->get();

        return view('home', ['mkulima'=> $mkulima , 'user_farm'=> $user_farm , 'mazaoid'=> $mazaoid]);
    }

    public function usajili()
    {
        
         $user_farm = users_farmer::select('users_farmer.id as id','users_user.is_active','users_farmer.first_name','users_farmer.last_name','users_farmer.phone_number','users_farmer.user_id','users_farmer.village_chairman_id','users_farmer.village_id')->join('users_user','users_farmer.user_id','=','users_user.id')->where('users_user.is_active', 0)->get();

        return view('usajili', ['user_farm'=> $user_farm]);
    }

    public function usajili_approved()
    {
                $user_farm = users_farmer::select('users_farmer.id as id','users_user.is_active','users_farmer.first_name','users_farmer.last_name','users_farmer.phone_number','users_farmer.user_id','users_farmer.village_chairman_id','users_farmer.village_id')->join('users_user','users_farmer.user_id','=','users_user.id')->where('users_user.is_active', 1)->get();

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



         public function editmkulimaok(Request $request, $id)
            {
                $update = crops_farmerscrop::where('id',$id)->first();
                $update->unit_count = $request['unitcount'];
                $update->total_price = $request['totalprice'];
                $update->crop_id = $request['zao'];
                $update->crop_unit_id = $request['kipimo'];

                $user = users_farmer::where('id',$update->id)->first();
                $user->first_name = $request['fname'];
                $user->last_name = $request['lname'];
                $user->phone_number = $request['phone'];
                $user->save();

                $update->save();
               

                return back()->with(['message'=>'Farmer Updated Successifully']);
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


 

      public function deleteuserusajiri($id)
    {
        
        $del = users_farmer::where('user_id',$id)->first();
        $myuser = users_user::where('id',$del->user_id)->first();
        $myuser->is_active = 2;
        $myuser->save();
    

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

        public function viewusermkulima($id)
    {
         $mkulima = crops_farmerscrop::where('id',$id)->first();

         $cropses = crops_crop::get();

         $cropunit = crops_cropunit::get();

        return view('viewmkulima', ['mkulima'=> $mkulima , 'cropses'=> $cropses , 'cropunit'=> $cropunit]);
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
        
         $taarifafirst = subscriptions_subscription_crops_regions_weights::where('id',$id)->first();

         $taarifaweight = subscriptions_cropregionsubscriptionweight::where('id',$taarifafirst->cropregionsubscriptionweight_id)->first();

         $cropsfarmer = subscriptions_subscription_crops_regions_weights::where('subscription_id',$id)->get();

         $taarifacrop = crops_farmerscrop::where('crop_id',$taarifaweight->crop_id)->get();

        return view('view_manunuzi_mkulima', ['taarifafirst'=> $taarifafirst , 'taarifacrop'=> $taarifacrop]);
    }




          public function viewmanunuzimkulimanext($id)
    {
      
         $mtu = crops_farmerscrop::where('id',$id)->first();

         $userfarmer = users_farmer::where('id',$mtu->farmer_id)->first();

         $unit = crops_farmerscropsunitprice::where('farmers_crop_id',$id)->get();

        return view('view_manunuzi_mkulima_next', ['mtu'=> $mtu , 'farmer'=> $userfarmer  , 'unit'=> $unit]);
    }



}
