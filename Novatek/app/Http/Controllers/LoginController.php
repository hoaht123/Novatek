<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Social;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
session_start();

class LoginController extends Controller
{
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function login(){
        return view('client.login');
    }

    

    public function login_facebook_callback(){
        //lấy thông tin facebook đăng nhập
        $provider = Socialite::driver('facebook')->user();
        // echo '<pre>';
        //     print_r($provider);
        //     echo '</pre>';
        //     die();
        //kiểm tra nếu đăng nhập trước đó hay chưa
        $account = Social::where('provider','facebook')->where('provider_id',$provider->getId())->first();
        if($account){
            $account_name = Users::where('user_id',$account->user_id)->first();
            Session::put('user_name',$account_name->name);
            Session::put('user_id',$account_name->user_id);
            return redirect()->route('client.home');
        }else{
            //tạo mới tài khoản đăng nhập facebook thêm vào bảng Model Social bảng Social
            $social_login = new Social([
                'provider_id' => $provider->getId(),
                'provider' => 'facebook',
            ]);
            //kiểm tra nếu email facebook trùng với email trong bảng Users, thì đăng nhập
            $users = Users::where('email',$provider->getEmail())->first();
            if(!$users){
                //nếu không có trong bảng admini thì add dữ liệu vào bản admin
                $users = Users::create([
                    'name' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'password' => '',
                    'phone'=>'',
                    'roles'=>1,
                    'address'=>'',
                ]);
            }
            $social_login->login()->associate($users);
            $social_login->save();
            $account_name = Users::where('user_id',$social_login->user_id)->first();
            Session::put('user_name',$account_name->name);
            Session::put('user_id',$account_name->user_id);
            return redirect()->route('client.home');
        }

    }

    public function login_google(){
        return Socialite::driver('google')->redirect();
    }

    public function login_google_callback(){
        $users = Socialite::driver('google')->user(); 
        return $this->findOrCreateUser($users,'google');

    }

    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_id', $users->id)->first();
        // echo '<pre>';
        //     print_r($authUser);
        //     echo '</pre>';
        //     die();
        if($authUser){
            $account_name = Users::where('user_id',$authUser->user_id)->first();
            Session::put('user_name',$account_name->name);
            Session::put('user_id',$account_name->user_id);
            return redirect()->route('client.home');
        }else{
            $social = new Social([
                'provider_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);
            $check = Users::where('email',$users->email)->first();
                if(!$check){
                    $check = Users::create([
                        'name' => $users->name,
                        'email' => $users->email,
                        'password' => '',
                        'phone' => '',
                        'roles'=>1,
                        'address'=>'',
                    ]);
                }
            $social->login()->associate($check);
            $social->save();
            $account_name = Users::where('user_id',$social->user_id)->first();
            Session::put('user_name',$account_name->name);
            Session::put('user_id',$account_name->user_id);
            return redirect()->route('client.home');
        }
    }

    public function register(Request $request){
        $data = $request->validate([
            'user_name' => 'required|not_regex:/^[0-9\+]+$/',
            'user_phone'=> array('required','numeric','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'),
            'user_email'=>'required|email:rfc,dns',
            'user_address'=>'required',
            'user_password'=>'required|min:8',
            'user_repeat_password'=>'required|same:user_password',
        ],[
            'user_name.required' => 'Name cannot blank',
            'user_name.not_regex'=>'Names cannot contain numbers ',
            'user_phone.required'=> 'Phone cannot blank',
            'user_phone.numeric'=> 'Phone must be digits',
            'user_phone.min:10' => 'Phone at least 8 digits',
            'user_phone.regex' => 'Phone incorrect format',
            'user_email.required' => 'Email cannot blank',
            'user_email.email:rfc,dns' => 'Email invalid format',
            'user_address.required' =>'Address cannot blank',
            'user_password.required' => 'Password cannot blank',
            'user_password.min:8'=>'Password at least 8 characters',
            'user_repeat_password.required' => 'Repeat password cannot blank ',
            'user_repeat_password.same:user_password' => 'Repeat password not same password'
        ]);
        $data = $request->all();
        $values = array();
        $check_user_email = Users::where('email', $data['user_email'])->first();
        if($check_user_email){
            Session::put('register','Email exists .Try another email');
        return Redirect::back();
        }else{
            $values['name'] = $data['user_name'];
            $values['phone'] = $data['user_phone'];
            $values['email'] = $data['user_email'];
            $values['roles'] = 1;
            $values['address'] = $data['user_address'];
            $values['password'] = md5($data['user_password']);
            DB::table('users')->insert($values);
            Session::put('register','Register successfully!!');
            return Redirect::back();
        }
       
    }


    public function checkLogin(Request $request){
        $data = $request->all();
        $check = DB::table('users')->where('email',$data['user_email'])->where('password',md5($data['user_password']))->first();
        if($check){
             Session::put('user_name',$check->name); 
            Session::put('user_id',$check->user_id);
            return  Redirect::to('/');
        }else{
            Session::put('message','Email or password incorrect . Try again!');
            return Redirect::back();
        }
           
    }





    public function logout(){
        Session::flush();
        return redirect()->route('client.home');
    }

    public function forget_password(){
        return view('client.forget_password');
    }

    public function send_mail_forget(Request $request){
        $data = $request->all();
        $to_name = "Novatek";
        $to_email = $data['user_email'];
        $random_pass = substr(md5(microtime()),rand(0,26),8);
        DB::table('users')->where('email',$data['user_email'])->update(['password'=>md5($random_pass)]);
        // dd($random_pass);
        $data = array("name"=>"Mail sent from Novatek to get your new password","body"=>"Your new password is : ".$random_pass,"user_email"=>"Hi ". $to_email);
        Mail::send('client.sendmail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Forget password');
            $message->from($to_email,$to_name);
        });
        Session::put('sendmail','Email has been sent');
        return Redirect::to('login');
    }
}
