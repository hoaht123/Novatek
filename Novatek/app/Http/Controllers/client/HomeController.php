<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 
class HomeController extends Controller
{
    public function index(){
        $sliders = DB::select('select * from slider');
        $hotProducts = Product::inRandomOrder()->get();
        $newProducts = Product::inRandomOrder()->get();
        return view('client.home', compact('sliders','hotProducts','newProducts'));
    }
    public function cart(){
        return view('client.cart');
    }
    public function checkout(){
        return view('client.checkout');
    }
    public function contact(){
        return view('client.contact');
    }
    public function save_contact(Request $request){
        $data = $request->validate([
            'contact_name' =>'required',
            'contact_email' =>'required|email:rfc,dns',
            'contact_phone' => array('required','numeric','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'),
            'contact_message' => 'required'
        ],[
            'contact_name.required' => 'Contact cannot blank',
            'contact_email.required' => 'Email cannot blank',
            'contact_email.email' => 'Email incorrect format',
            'contact_phone.required' =>'Phone cannot blank',
            'contact_phone.numeric' => 'Phone must be digits',
            'contact_phone.regex' => 'Phone invalid.Try again',
            'contact_message.required' => 'Message cannot blank'
        ]);
        $contact = array();
        $contact['contact_name'] = $data['contact_name'];
        $contact['contact_mail'] = $data['contact_email'];
        $contact['contact_phone']  = $data['contact_phone'];
        $contact['contact_message'] = $data['contact_message'];
        
        DB::table('contact')->insert($contact);
        Session::put('correct','Thank you contacted !');
        return Redirect::back();
    }
    public function about(){
        return view('client.about');
    }

    public function search(Request $request){
        $output = '';
        if($request->get('query') != '')
        {
            $query = $request->get('query');
            $data = DB::table('product')
            ->where('product_name', 'LIKE', "%{$query}%")
            ->get();
           
            foreach($data as $row)
            { 
               $output .= '
               <div style="font-size:30px;margin-left:440px"><img style="width:50px;height:50px" src="images/product/'.$row->product_main_image.'" alt=""><a href="product/'.$row->product_id.'">'.$row->product_name.'</a></div>
               ';
           }
           echo $output;
       }else{
            $output = '';
            echo $output;
       }
    }
    
}
