<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\About;
use Carbon\Carbon;
use Image;

class AboutComtroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//==========================About Page View Start===================================================>
function About(){
    $abouts = About::latest()->get();
   return view('about.index',compact('abouts'));
}
//==========================About Page View End===================================================>

//==========================About Post Start===================================================>
function aboutPost(Request $request){
    $request->validate([
        'about_title'=>'required|max:100',     
        'about_description'=>'required',     
        'about_photo'=>'required',
        'about_title_two'=>'required|max:100',     
        'about_description_two'=>'required',     
        'about_photo_two'=>'required',
    ]);

    $random_photo_name = Str::random(10).time().".".$request->about_photo->getClientOriginalExtension();
    $about_photo = $request->file('about_photo');
    Image::make($about_photo)->resize(800, 530)->save(base_path('public/uplods/about_photo/').$random_photo_name);

    $random_photo_name_two = Str::random(10).time().".".$request->about_photo_two->getClientOriginalExtension();
    $about_photo_two = $request->file('about_photo_two');
    Image::make($about_photo_two)->resize(800, 530)->save(base_path('public/uplods/about_photo/').$random_photo_name_two);

    About::insert($request->except('_token','about_photo','about_photo_two')+[
        'about_photo' =>$random_photo_name,
        'about_photo_two' =>$random_photo_name_two,
        'created_at' => Carbon::now(),   
    ]);
    return response()->json('File Update Successfull');
}
//==========================About Post End===================================================>

//==========================About Page Update Start===================================================>
function aboutUpdate(Request $request){
    $request->validate([
        'about_title'=>'required|max:100',     
        'about_description'=>'required',     
        'about_photo'=>'required',
        'about_title_two'=>'required|max:100',     
        'about_description_two'=>'required',     
        'about_photo_two'=>'required',
    ]);
    
    if ($request->hasFile('about_photo_new')){
        //Delete Old Photo Start
        $old_photo_path = base_path('public/uplods/about_photo/').About::find($request->id)->about_photo;
        unlink($old_photo_path);
        
        //Upload New Photo Start-------------------------------------->
        $random_photo_name = Str::random(10).time().".".$request->about_photo_new->getClientOriginalExtension();
        $about_photo = $request->file('about_photo_new');
        Image::make($about_photo)->resize(800, 530)->save(base_path('public/uplods/about_photo/').$random_photo_name);
        //Upload New Photo End-------------------------------------->
        About::where('id',$request->id)->update([
            'about_title' =>$request->about_title,
            'about_description' =>$request->about_description,
            'about_photo' =>$random_photo_name,
            'about_title_two' =>$request->about_title_two,
            'about_description_two' =>$request->about_description_two,
       ]);
       }

        if ($request->hasFile('about_photo_two_new')){
            //Delete Old Photo Start
            $old_photo_path = base_path('public/uplods/about_photo/').About::find($request->id)->about_photo_two;
            unlink($old_photo_path);
            
            //Upload New Photo Start-------------------------------------->
            $random_photo_name = Str::random(10).time().".".$request->about_photo_two_new->getClientOriginalExtension();
            $about_photo_two = $request->file('about_photo_two_new');
            Image::make($about_photo_two)->resize(800, 530)->save(base_path('public/uplods/about_photo/').$random_photo_name);
            //Upload New Photo End-------------------------------------->
            About::where('id',$request->id)->update([
                'about_title' =>$request->about_title,
                'about_description' =>$request->about_description,
                'about_photo_two' =>$random_photo_name,
                'about_title_two' =>$request->about_title_two,
                'about_description_two' =>$request->about_description_two,
          ]);
        }


            About::where('id',$request->id)->update([
                'about_title' =>$request->about_title,
                'about_description' =>$request->about_description,
                'about_title_two' =>$request->about_title_two,
                'about_description_two' =>$request->about_description_two,
            ]);

    return response()->json('File Update Successfull');

}
//==========================About Page Update End===================================================>

//==========================About Delete Start===================================================>
function aboutDelete(Request $request){
    if (About::where('id',$request->about_id)->exists()){
        $old_photo_path = base_path('public/uplods/about_photo/').About::find($request->about_id)->about_photo;
        unlink($old_photo_path);

        $old_photo_path_two = base_path('public/uplods/about_photo/').About::find($request->about_id)->about_photo_two;
        unlink($old_photo_path_two);

        About::find($request->about_id)->delete();
      }
      
      return response()->json([
        'status' => 'success',
     ]);
}
//==========================About Delete End===================================================>

//==========================About Page View Start===================================================>
//==========================About Page View End===================================================>

//==========================About Page View Start===================================================>
//==========================About Page View End===================================================>


}
