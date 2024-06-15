<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Carbon\Carbon;
use Image;


class TestimonialController extends Controller
{

public function __construct()
{
    $this->middleware('auth');
}
//==================================Testimonial Page View Start======================================>
function Testimonial(){
    $testimonials = Testimonial::latest()->get();
    return view('testimonial/index',compact('testimonials'));
}
//==================================Testimonial Page View End======================================>

//==================================Testimonial Post Start======================================>
function TestimonialPost(Request $request){
   $validator = Validator::make($request->all(),[
       'testimonial_name' => 'required',
       'testimonial_title'=>'required',    
       'testimonial_desc'=>'required',    
       'testimonial_photo'=>'required|image',    
   ]);

   if ($validator->passes()) {
        $random_photo_name = Str::random(10).time().".".$request->testimonial_photo->getClientOriginalExtension();
        $testimonial_photo = $request->file('testimonial_photo');
        Image::make($testimonial_photo)->resize(80, 80)->save(base_path('public/uplods/testimonial_photo/').$random_photo_name);

        Testimonial::insert($request->except('_token','testimonial_photo')+[
            'testimonial_photo' =>$random_photo_name,
            'created_at' => Carbon::now(),   
        ]);
        session()->flash('testimonial_status','Testimonial Item Add Successfull ');
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
//==================================Testimonial Post End======================================>

//==================================Testimonial Update Start======================================>
function TestimonialUpdate(Request $request){
    $validator = Validator::make($request->all(),[
        'testimonial_name' => 'required',
        'testimonial_title'=>'required',    
        'testimonial_desc'=>'required',    
        'testimonial_new_photo'=>'image',    
    ]);

    if ($validator->passes()) {
        if ($request->hasFile('testimonial_new_photo')){
            //Delete Old Photo Start
            $old_photo_path = base_path('public/uplods/testimonial_photo/').Testimonial::find($request->id)->testimonial_photo;
            unlink($old_photo_path);
            
            //Upload New Photo Start-------------------------------------->
            $random_photo_name = Str::random(10).time().".".$request->testimonial_new_photo->getClientOriginalExtension();
            $testimonial_photo = $request->file('testimonial_new_photo');
            Image::make($testimonial_photo)->resize(80, 80)->save(base_path('public/uplods/testimonial_photo/').$random_photo_name);
            //Upload New Photo End-------------------------------------->
            Testimonial::where('id',$request->id)->update($request->except('_token','testimonial_new_photo','testimonial_photo')+[
                'testimonial_photo' =>$random_photo_name,
            ]);
            session()->flash('testimonial_status',' Update Successfull ');
           }
           
           Testimonial::where('id',$request->id)->update($request->except('_token','testimonial_new_photo','testimonial_photo'));
           session()->flash('testimonial_status',' Update Successfull ');

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
//==================================Testimonial Update End======================================>

//==================================Testimonial Delete Start======================================>
function TestimonialDelete(Request $request){
      if (Testimonial::where('id',$request->testimonial_id)->exists()) {
        $old_photo_path = base_path('public/uplods/testimonial_photo/').Testimonial::find($request->testimonial_id)->testimonial_photo;
        unlink($old_photo_path);
        Testimonial::find($request->testimonial_id)->delete();
      }

      return response()->json([
        'status' => 'success',
     ]);
}
//==================================Testimonial Delete End======================================>

//==================================Testimonial Page View Start======================================>
//==================================Testimonial Page View End======================================>




}
