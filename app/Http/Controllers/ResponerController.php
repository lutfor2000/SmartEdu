<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Responser;
use Carbon\Carbon;
use Image;
class ResponerController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
    $this->middleware('checkadmin');
    
}
//======================Responser Page View Start===============================>
function Responser(){
    $responsers = Responser::latest()->paginate(5);
    return view('responser.index',compact('responsers'));
}
//======================Responser Page View End===============================>

//======================Responser Post Start===============================>
function ResponserPost(Request $request){
    $validator = Validator::make($request->all(),[
       'responser_photo' => 'required|image'
    ]);

    if ($validator->passes()){
        $random_photo_name = Str::random(10).time().".".$request->responser_photo->getClientOriginalExtension();
        $responser_photo = $request->file('responser_photo');
        Image::make($responser_photo)->resize(180, 80)->save(base_path('public/uplods/response_photo/').$random_photo_name);

        Responser::insert($request->except('_token','responser_photo')+[
         'responser_photo' =>  $random_photo_name,
         'created_at' => Carbon::now(),   
        ]);

        session()->flash('responser_status','Responser Item Add Successfull ');
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
//======================Responser Post End===============================>

//======================Responser Update Start===============================>
function ResponserUpdate(Request $request){
   $validator = Validator::make($request->all(),[
      'responser_new_photo' => 'required|image',
   ]);

   if ($validator->passes()){
        if ($request->hasFile('responser_new_photo')){
            //Delete Old Photo Start
            $old_photo_path = base_path('public/uplods/response_photo/').Responser::find($request->id)->responser_photo;
            unlink($old_photo_path);
            
            //Upload New Photo Start-------------------------------------->
            $random_photo_name = Str::random(10).time().".".$request->responser_new_photo->getClientOriginalExtension();
            $responser_new_photo = $request->file('responser_new_photo');
            Image::make($responser_new_photo)->resize(180, 80)->save(base_path('public/uplods/response_photo/').$random_photo_name);
            //Upload New Photo End-------------------------------------->
            Responser::where('id',$request->id)->update($request->except('_token','responser_new_photo','responser_photo')+[
               'responser_photo' => $random_photo_name,
            ]);
        }
        
            session()->flash('responser_status','Responser Item Update Successfull ');
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
//======================Responser Update End===============================>

//======================Responser Item Delete Start===============================>
function ResponserDelete(Request $request){
    if ( Responser::where('id',$request->responder_id)->exists()){
        $old_photo_path = base_path('public/uplods/response_photo/').Responser::find($request->responder_id)->responser_photo;
        unlink($old_photo_path);
        Responser::find($request->responder_id)->delete();
    }

    return response()->json([
        'status' => 'success',
    ]);
}
//======================Responser Item Delete End===============================>

//======================Responser Page Pagination Start===============================>
function ResponserPagination(Request $request){
    $responsers = Responser::latest()->paginate(5);
    return view('pagination/responser',compact('responsers'))->render();
  
}
//======================Responser Page Pagination End===============================>

//======================Responser Page View Start===============================>
//======================Responser Page View End===============================>

//======================Responser Page View Start===============================>
//======================Responser Page View End===============================>


}
