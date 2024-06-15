<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Aboutsummery;
use App\Models\About;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\History;
use App\Models\Package;
use App\Models\Order;
use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Contact;
use Carbon\Carbon;
use Auth,Hash;

class FontendController extends Controller
{

function smartHome(){
    $setting = Setting::latest()->get();
    $abouts = About::latest()->limit(1)->get();
    $banners = Banner::latest()->get();
    $histories = History::latest()->get();
    $packages = Package::inRandomOrder()->get();
    return view('index',compact('abouts','setting','banners','histories','packages'));
}

//========================Fontend About Page View Start=======================================>
function AboutFontend(){
    $setting = Setting::All();
    $summares = Aboutsummery::latest()->limit(3)->get();
    $abouts = About::latest()->limit(1)->get();
    return view('about',compact('abouts','setting','summares'));
}
//========================Fontend About Page View End=======================================>

//========================Fontend Chackout End=======================================>
function Checkout($packag_id){
    $packag_id = Crypt::decrypt($packag_id);
    $package_info = Package::find($packag_id);
    return view('checkout',compact('package_info'));

}
//========================Fontend Chackout End=======================================>

//========================Fontend Chackout End=======================================>
function checkoutPost(Request $request){
    $request->validate([
        'customer_name'=>'required',  
        'customer_email'=>'required',  
        'customer_phone'=>'required',  
        'country_name'=>'required',  
        'city_name'=>'required',  
        'customer_address'=>'required',  
        'customer_note'=>'required',  
    ]);
    if ($request->payment_option == 1) {
        echo "online Pyment";
    } else {
        Order::insert($request->except('_token')+[
            'user_id' => Auth::id(),
            'payment_status' => 1,
            'order_package_price' => session('Session_package_price'),
            'order_package_date' => session('Session_package_date'),
            'order_package_email' => session('Session_package_email'),
            'order_package_storage' => session('Session_package_storage'),
            'order_package_database' => session('Session_package_database'),
            'order_package_domain' => session('Session_package_domain'),
            'order_package_support' => session('Session_package_support'),
            'created_at' => Carbon::now(),
        ]);
      return redirect()->route('smartedu');
    }
    
}
//========================Fontend Chackout End=======================================>

//========================Fontend Customer Registration Start=======================================>
function customerRegistration(){
    return view('customer.customer_registration');
}
//========================Fontend Customer Registration End=======================================>

//========================Fontend Customer Registration Post Start=======================================>
function customerPostregistration(Request $request){
    $validator = Validator::make($request->all(),[
        'name'=>'required',     
        'email'=>'required',     
        'password' =>'required',
        'confirm_password' =>'required',
    ]);

    if ($validator->passes()) {
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 2,
            'created_at' => Carbon::now()
        ]);

        session()->flash('customer_status',' Registration Successfull ');
        return response()->json([
            'status' => true,
            'errors' => []
         ]);
    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
         ]);
    }
    
}
//========================Fontend Customer Registration Post End=======================================>

//========================Fontend Customer Login Start=======================================>
function customerLogin(){
    return view('customer.customer_login');
}
//========================Fontend Customer Login End=======================================>

//=================Customer Login Post Start=========================================>
function customerLoginPost(Request $request){
    $validator = Validator::make($request->all(),[
        'email'=>'required',
        'password'=>'required',
    ]);
      if ($validator->passes()){

        if (User::where('email',$request->email)->exists()){ 
            $db_password = User::where('email',$request->email)->first()->password;
              //Customer Password Check Start---------------------------->
              if (Hash::check($request->password,$db_password)){
                  Auth::attempt($request->except('_token'));
              } else{
                session()->flash('customer_status',' Your Password is Wroing! ');
                return redirect()->route('customerlogin');
                
              }
             //Customer Password Check Start---------------------------->
            }
          else{
             session()->flash('customer_status',' Your Email is Wroing! ');
             return redirect()->route('customerlogin');
             }

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

      } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
      }
  
}
//=================Customer Login Post End=========================================>

//========================Fontend Customer Order Start=======================================>
function customerOrder(){
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('customer/order',compact('orders'));
}
//========================Fontend Customer Order End=======================================>

//========================Fontend Course Page Start=======================================>
function CoursePage(){
    $courses = Course::inRandomOrder()->get(); 
    return view('course',compact('courses'));
}
//========================Fontend Course Page End=======================================>

//========================Fontend Teacher All Start=======================================>
function TeacherAll(){
    $teachers = Teacher::latest()->get();
    return view('teachers',compact('teachers'));
}
//========================Fontend Teacher All End=======================================>

//========================Fontend Pricing Start=======================================>
function Pricing(){
    $packages = Package::inRandomOrder()->get();
    return view('pricing',compact('packages'));
}
//========================Fontend Pricing End=======================================>

//========================Fontend Contact Start=======================================>
function ContacsFontend (){
    $settings = Setting::all();
    return view('contacs',compact('settings'));
}
//========================Fontend Contact End=======================================>

//========================Fontend Contact Start=======================================>
function CotactPost(Request $request){
    $validator = Validator::make($request->all(),[
        'contact_first_name'=>'required',  
        'contact_last_name'=>'required',  
        'contact_email'=>'required',  
        'contact_phone'=>'required',  
        'contact_comments'=>'required', 
     ]);

    if ($validator->passes()) {
        Contact::insert($request->except('_token')+[
            'created_at' => Carbon::now(), 
        ]);
        session()->flash('contact_status','Send Your Message Successfull ');
        return response()->json([
            'status' => true,
            'errors' => []
         ]);

    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
         ]);
    }
    
}
//========================Fontend Contact End=======================================>

//========================Fontend Customer Registration Start=======================================>
//========================Fontend Customer Registration End=======================================>

}
