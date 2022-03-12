<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\Coupon;
class CouponController extends Controller
{
    public function create_coupon(){
        return view('admin.coupon.create_coupon');
    }
    
    public function save_coupon(Request $request){
        $data = $request->all();
        $check_code = Coupon::where('voucher_code',$data['coupon_code'])->first();
        if($check_code){
            Session::put('check_coupon','Coupon is available.Try again!!');
            return Redirect::back();
        }else{
            $coupon = new Coupon();
            $coupon['voucher_name'] = $data['coupon_name'];
            $coupon['voucher_code'] = $data['coupon_code'];
            $coupon['voucher_quantity'] = $data['coupon_quantity'];
            $coupon['voucher_options'] = $data['coupon_options'];
            $coupon['voucher_value'] = $data['coupon_value'];
            $coupon['created_at'] = now();
            $coupon->save();
            return Redirect::to('admin/view_coupon');
        }
    }

    public function view_coupon(){
        $coupons = Coupon::all();
        return view('admin.coupon.view_coupon',compact('coupons'));
    }

    public function update_coupon($coupon_id){
        $coupons = Coupon::find($coupon_id);
        return view('admin.coupon.update_coupon',compact('coupons'));
    }

    public function delete_coupon($coupon_id){
        Coupon::find($coupon_id)->delete();
        return Redirect::to('admin/view_coupon');
    }

    public function saveUpdate_coupon(Request $request,$coupon_id){
        $data = $request->all();
        $coupon = Coupon::find($coupon_id);
        $coupon['voucher_name'] = $data['coupon_name'];
        $coupon['voucher_code'] = $data['coupon_code'];
        $coupon['voucher_quantity'] = $data['coupon_quantity'];
        $coupon['voucher_options'] = $data['coupon_options'];
        $coupon['voucher_value'] = $data['coupon_value'];
        $coupon['created_at'] = now();
        $coupon->save();
        return Redirect::to('admin/view_coupon');
    }

    public function add_coupon(Request $request){
        $data = $request->all();
        $check_coupon = Coupon::where('voucher_code', $data['coupon_code'])->first();
        if($check_coupon == true){
            if($check_coupon->voucher_quantity == 0){
                Session::put('message','Coupon code has expired. Please try another code');
                return redirect()->back();
            }else{
                $session_coupon = Session::get('coupon');
                if($session_coupon == true){
                    $is_available = 0;
                    if($is_available ==0){
                        $cou[] = array(
                            'coupon_code' => $check_coupon->voucher_code,
                            'coupon_options' => $check_coupon->voucher_options,
                            'coupon_number' => $check_coupon->voucher_value
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $check_coupon->voucher_code,
                        'coupon_options' => $check_coupon->voucher_options,
                        'coupon_number' => $check_coupon->voucher_value
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                Session::put('message','Successfully added coupon code');
                return redirect()->back();
            }
                
        }else{
            Session::put('message','Invalid coupon code');
            return redirect()->back();
        }
            
        
    }
    public function delete_coupon_cart(){
        Session::forget('coupon');
        Session::put('message','Clear code successfully');
        return redirect()->back();
    }

    public function get_coupon(Request $request){
        $get_coupon = Coupon::inRandomOrder()->where('voucher_quantity','>',0)->first();
        $data = $request->all();
        $check_email = DB::table('users')->where('email',$request->user_mail)->first();
        if(!$check_email){
            Session::put('message_coupon','Email invalid.Try again');
            return redirect()->back();
        }else{
        $to_name = "Novatek";
        $to_email = $data['user_mail'];
        $data = array("name"=>"NEW OFFERS EVERY WEEK + DISCOUNT SYSTEM + BEST PRICES","body"=>"GOOD THINGS HAPPEN EVERY TIME YOU SHOP
        From big treats to little thank yous and a charity donation with every purchase","user_email"=>"Hi ". $to_email,"coupon"=>"Give you a coupon is ".$get_coupon->voucher_code);
        Mail::send('client.mail_getcoupon',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('SPECIAL OFFERS');
            $message->from($to_email,$to_name);
        });
        Session::put('message_coupon','Email has been sent');
        return Redirect::back();
        }

    }

    public function get_coupon_promo(Request $request){
        $get_coupon = Coupon::inRandomOrder()->where('voucher_quantity','>',0)->first();
        $data = $request->all();
        $check_email = DB::table('users')->where('email',$request->user_mail)->first();
        if(!$check_email){
            Session::put('message_coupon','Email invalid.Try again');
            return redirect()->back();
        }else{
        $to_name = "Novatek";
        $to_email = $data['user_mail'];
        $data = array("name"=>"ONLY 200 PROMO CODES ON DISCOUNT!","body"=>"GOOD THINGS HAPPEN EVERY TIME YOU SHOP
        From big treats to little thank yous and a charity donation with every purchase","user_email"=>"Hi ". $to_email,"coupon"=>"Give you a coupon is ".$get_coupon->voucher_code);
        Mail::send('client.mail_getcoupon',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('DONT MISS YOUR CHANCE');
            $message->from($to_email,$to_name);
        });
        Session::put('message_coupon','Email has been sent');
        return Redirect::back();
        }

    }
}

