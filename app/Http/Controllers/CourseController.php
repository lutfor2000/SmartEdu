<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Course;
use Carbon\Carbon;
use Image;

class CourseController extends Controller
{

public function __construct()
{
    $this->middleware('auth');
    $this->middleware('checkadmin');
    
}
//==========================Course Page View Start====================================>
function Course(){
    $courses = Course::latest()->paginate(5);
    return view('course.index',compact('courses'));
}
//==========================Course Page View End====================================>

//==========================Course Post Start====================================>
function CoursePost(Request $request){
        $validator = Validator::make($request->all(),[
            'course_name' => 'required',
            'course_short_desc' => 'required',
            'course_long_desc' => 'required',
            'course_photo' => 'required|image',
        ]);

        if ( $validator->passes()) {
            $random_photo_name = Str::random(10).time().".".$request->course_photo->getClientOriginalExtension();
            $course_photo = $request->file('course_photo');
            Image::make($course_photo)->resize(530, 420)->save(base_path('public/uplods/course_photo/').$random_photo_name);

            Course::insert($request->except('_token','course_photo')+[
                'course_photo' =>  $random_photo_name,
                'created_at' => Carbon::now(),   
            ]);
            
            session()->flash('course_status','Course Item Add Successfull ');
            return response()->json([
                'status' => true,
                'errors' => []
             ]);


        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
             ]); 
        }

}
//==========================Course Post End====================================>

//==========================Course Update Start====================================>
function CourseUpdate(Request $request){
    $validator = Validator::make($request->all(),[
        'course_name' => 'required',
        'course_short_desc' => 'required',
        'course_long_desc' => 'required',
        'course_new_photo' => 'image',
    ]);

    if ($validator->passes()) {
         
        if ($request->hasFile('course_new_photo')){
            //Delete Old Photo Start
            $old_photo_path = base_path('public/uplods/course_photo/').Course::find($request->id)->course_photo;
            unlink($old_photo_path);
            
            //Upload New Photo Start-------------------------------------->
            $random_photo_name = Str::random(10).time().".".$request->course_new_photo->getClientOriginalExtension();
            $course_new_photo = $request->file('course_new_photo');
            Image::make($course_new_photo)->resize(530, 420)->save(base_path('public/uplods/course_photo/').$random_photo_name);
            //Upload New Photo End-------------------------------------->
            Course::where('id',$request->id)->update($request->except('_token','course_photo','course_new_photo')+[
               'course_photo' => $random_photo_name,
            ]);
        }
            
           Course::where('id',$request->id)->update($request->except('_token','course_photo','course_new_photo'));
           session()->flash('course_status','Course Item Update Successfull ');
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
//==========================Course Update End====================================>

//==========================Course Delete Start====================================>
function CourseDelete(Request $request){
    if ( Course::where('id',$request->course_id)->exists()){
        $old_photo_path = base_path('public/uplods/course_photo/').Course::find($request->course_id)->course_photo;
        unlink($old_photo_path);
        Course::find($request->course_id)->delete();
    }

    return response()->json([
        'status' => 'success',
    ]);
}
//==========================Course Delete End====================================>

//==========================Course Page View Start====================================>
//==========================Course Page View End====================================>


}
