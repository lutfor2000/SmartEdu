<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Image;

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
//===========User Dashboard Data view Start=================>    
public function index(){
    $users = User::latest()->paginate(5);
    return view('home',compact('users'));
}
//===========User Dashboard Data view End=================>    

//===========User Dashboard Data view Start=================>    
public function User(){
    $users = User::latest()->paginate(5);
    return view('user.index',compact('users'));
}
//===========User Dashboard Data view End=================>    

//===========User profile Edit Start=================>   
function userEdit($user_id){
    $user_id = Crypt::decrypt($user_id);
    $user = User::find($user_id);
    return view('user.edit',compact('user'));
} 
//===========User profile Edit End=================>    

//===========User User Update Start=================> 
function userPost(Request $request,$user_id){
    $user_id = Crypt::decrypt($user_id);
    $request->validate([
        "name" => "required",
        "email" => "required",
        
    ]);

    if (User::find($user_id)->user_photo != "default.jpg"){

        if ($request->hasFile('user_photo')){

            $old_photo_path = base_path('public/uplods/user_photo/').User::find($user_id)->user_photo;
            unlink($old_photo_path);
    
            $random_photo_name = Str::random(10).time().".".$request->user_photo->getClientOriginalExtension();
            $user_photo = $request->file('user_photo');
            Image::make($user_photo)->resize(350, 350)->save(base_path('public/uplods/user_photo/').$random_photo_name);
    
            User::find($user_id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'user_photo' =>$random_photo_name,
           ]);
        }
            User::find($user_id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
           ]);
      
    } else {
            $random_photo_name_two = Str::random(10).time().".".$request->user_photo->getClientOriginalExtension();
            $user_photo = $request->file('user_photo');
            Image::make($user_photo)->resize(350, 350)->save(base_path('public/uplods/user_photo/').$random_photo_name_two);
            
            User::find($user_id)->update([
                'name' =>$request->name,
                'email' =>$request->email,
                'user_photo' =>$random_photo_name_two,
            ]);
     }

     return redirect('home')->with('profile_message','Profile Update Successfull');
}   
//===========User User Update End=================>

//===========================User Item Delete Start==========================================>
function userDelete(Request $request){
    if (User::where('id',$request->user_id)->exists()) {
        $old_photo_path = base_path('public/uplods/user_photo/').User::find($request->user_id)->user_photo;
        unlink($old_photo_path);
        User::find($request->user_id)->delete();
    } 
    return response()->json([
        'status' => 'success',
    ]);
}
//===========================User Item Delete End==========================================>   

//===========User Dashboard Data view Start=================>    
//===========User Dashboard Data view End=================>       



}
