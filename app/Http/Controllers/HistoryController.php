<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\History;
use Carbon\Carbon;
use Image;

class HistoryController extends Controller
{

public function __construct()
{
    $this->middleware('auth');
}
//======================History Page View Start=========================================>
function History(){
    $histories = History::latest()->get();
    return view('history.history',compact('histories'));
}
//======================History Page View End=========================================>

//======================History Post Start=========================================>
function historyPost(Request $request){
    
    $validator = Validator::make($request->all(),[
        'history_year'=>'required',     
        'history_description'=>'required',     
        'history_photo' =>'required|image',
    ]);

    if ($validator->passes()) {
         
        $random_photo_name = Str::random(10).time().".".$request->history_photo->getClientOriginalExtension();
        $history_photo = $request->file('history_photo');
        Image::make($history_photo)->resize(600, 600)->save(base_path('public/uplods/history_photo/').$random_photo_name);

        History::insert($request->except('_token','history_photo')+[
            'history_photo' =>$random_photo_name,
            'created_at' => Carbon::now(),   
        ]);
     
        session()->flash('history_status','History Item Add Successfull ');
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
//======================History Post End=========================================>

//======================History Update Start=========================================>
function historyUpdate(Request $request){
    $validator = Validator::make($request->all(),[
        'history_year'=>'required',     
        'history_description'=>'required',     
        'new_history_photo' =>'image',
    ]);

    if ($validator->passes()) {
        if ($request->hasFile('new_history_photo')){
            //Delete Old Photo Start
            $old_photo_path = base_path('public/uplods/history_photo/').History::find($request->id)->history_photo;
            unlink($old_photo_path);
            
            //Upload New Photo Start-------------------------------------->
            $random_photo_name = Str::random(10).time().".".$request->new_history_photo->getClientOriginalExtension();
            $history_photo = $request->file('new_history_photo');
            Image::make($history_photo)->resize(600, 600)->save(base_path('public/uplods/history_photo/').$random_photo_name);
            //Upload New Photo End-------------------------------------->
            History::where('id',$request->id)->update([
                'history_year' =>$request->history_year,
                'history_description' =>$request->history_description,
                'history_photo' =>$random_photo_name,
            ]);
            session()->flash('history_status','History Update Successfull ');
           }

           History::where('id',$request->id)->update($request->except('_token','history_photo','new_history_photo'));
           session()->flash('history_status','History Update Successfull ');

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
//======================History Update End=========================================>

//======================History Delete Item Start=========================================>
function historyDelete(Request $request){
    if (History::where('id',$request->history_id)->exists()){
        
        $old_photo_path = base_path('public/uplods/history_photo/').History::find($request->history_id)->history_photo;
        unlink($old_photo_path);
        History::find($request->history_id)->delete();

      }
  
      return response()->json([
          'status' => 'success',
      ]);
}
//======================History Delete Item End=========================================>

//======================History Page View Start=========================================>
//======================History Page View End=========================================>



}
