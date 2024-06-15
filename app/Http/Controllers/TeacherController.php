<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Carbon\Carbon;
use Image;

class TeacherController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
    $this->middleware('checkadmin');
    
}
//==============================Teacher Page Start===================================>
function Teacher(){
    $teachers = Teacher::latest()->paginate(5);
    return view('teacher.index',compact('teachers'));
}
//==============================Teacher Page End===================================>

//==============================Teacher Post Start===================================>
function TeacherPost(Request $request){
    $validator = Validator::make($request->all(),[
        'teacher_name' => 'required',
        'teacher_title' => 'required',
        'teacher_photo' => 'required|image',
    ]);

    if ($validator->passes()) {
        $random_photo_name = Str::random(10).time().".".$request->teacher_photo->getClientOriginalExtension();
        $teacher_photo = $request->file('teacher_photo');
        Image::make($teacher_photo)->resize(260, 330)->save(base_path('public/uplods/teacher_photo/').$random_photo_name);

        Teacher::insert($request->except('_token','teacher_photo')+[
            'teacher_photo' => $random_photo_name,
            'created_at' => Carbon::now(),
        ]);

        session()->flash('teacher_status','Teacher Item Add Successfull ');
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
//==============================Teacher Post End===================================>

//==============================Teacher Update Start===================================>
function TeacherUpdate(Request $request){
    $validator = Validator::make($request->all(),[
        'teacher_name' => 'required',
        'teacher_title' => 'required',
        'teacher_new_photo' => 'image',
    ]);

    if ($validator->passes()) {
        if ($request->hasFile('teacher_new_photo')){
            //Delete Old Photo Start
            $old_photo_path = base_path('public/uplods/teacher_photo/').Teacher::find($request->id)->teacher_photo;
            unlink($old_photo_path);
            
            //Upload New Photo Start-------------------------------------->
            $random_photo_name = Str::random(10).time().".".$request->teacher_new_photo->getClientOriginalExtension();
            $teacher_new_photo = $request->file('teacher_new_photo');
            Image::make($teacher_new_photo)->resize(260, 330)->save(base_path('public/uplods/teacher_photo/').$random_photo_name);
            //Upload New Photo End-------------------------------------->
            Teacher::where('id',$request->id)->update($request->except('_token','teacher_new_photo','teacher_photo')+[
               'teacher_photo' => $random_photo_name,
            ]);
        }

            Teacher::where('id',$request->id)->update($request->except('_token','teacher_new_photo','teacher_photo'));
            session()->flash('teacher_status','Teacher Item Update Successfull ');
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
//==============================Teacher Update End===================================>

//==============================Teacher Delete Start===================================>
function TeacherDelete(Request $request){
   if (Teacher::where('id',$request->teacher_id)->exists()){
    $old_photo_path = base_path('public/uplods/teacher_photo/').Teacher::find($request->teacher_id)->teacher_photo;
    unlink($old_photo_path);
    Teacher::find($request->teacher_id)->delete();
   }
   return response()->json([
    'status' => 'success',
   ]);
 
}
//==============================Teacher Delete End===================================>

//==============================Pagination Page Start===================================>
function TeacherPagination(Request $request){
    $teachers = Teacher::latest()->paginate(5);
    return view('pagination/teachers',compact('teachers'))->render();
}
//==============================Pagination Page End===================================>

//==============================Teacher Search Start===================================>
function TeacherSearch(Request $request){
    $teachers = Teacher::where('teacher_name','like','%'.$request->search_string.'%')
    ->orWhere('teacher_title','like','%'.$request->search_string.'%')
     ->orderBy('id','desc')
     ->paginate(5);
     if($teachers->count() >= 1){
         return view('pagination/teachers',compact('teachers'))->render();
     }else{
        return response()->json([
            'status' => 'nothing_found'
       ]);
     }
}
//==============================Teacher Search End===================================>

//==============================Teacher Page Start===================================>
//==============================Teacher Page End===================================>

//==============================Teacher Page Start===================================>
//==============================Teacher Page End===================================>

//==============================Teacher Page Start===================================>
//==============================Teacher Page End===================================>


}
