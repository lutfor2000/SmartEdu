<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Package;
use Carbon\Carbon;

class PackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
//==============================Package Page View Start==========================================>
function Package(){
    $packages = Package::latest()->paginate(5);
    return view('package.index',compact('packages'));
}
//==============================Package Page View End==========================================>

//==============================Package Post Start==========================================>
function packagePost(Request $request){
    $validator = Validator::make($request->all(),[
       'package_price' => 'required',
       'package_date'=>'required',   
       'package_email'=>'required',   
       'package_storage'=>'required',   
       'package_database'=>'required',   
       'package_domain'=>'required',   
       'package_support'=>'required',   
        
    ]);

    if ($validator->passes()){

        Package::insert($request->except('_token')+[
            'created_at' => Carbon::now(),
        ]);

        session()->flash('package_status','Package Item Add Successfull ');
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
//==============================Package Post End==========================================>

//==============================Package Update Start==========================================>
function packageUpdate(Request $request){
    $validator = Validator::make($request->all(),[
        'package_price' => 'required',
        'package_date'=>'required',   
        'package_email'=>'required',   
        'package_storage'=>'required',   
        'package_database'=>'required',   
        'package_domain'=>'required',   
        'package_support'=>'required',   
     ]);

      if ($validator->passes()) {
        Package::where('id',$request->id)->update($request->except('_token'));
       
        session()->flash('package_status','Package Update Successfull ');
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
//==============================Package Update End==========================================>

//==============================Package Delete Start==========================================>
function packageDelete(Request $request){
      if (Package::where('id',$request->package_id)->exists()){
         Package::find($request->package_id)->delete();
      }
      return response()->json([
        'status' => 'success',
    ]);
}
//==============================Package Delete End==========================================>

//==============================Package Search Start==========================================>
function packageSearch(Request $request){
    $packages = Package::where('package_date','like','%'.$request->search_string.'%')
    ->orWhere('package_price','like','%'.$request->search_string.'%')
     ->orderBy('id','desc')
     ->paginate(5);
     if($packages->count() >= 1){
         return view('pagination/package',compact('packages'))->render();
     }else{
        return response()->json([
            'status' => 'nothing_found'
       ]);
     }
}
//==============================Package Search End==========================================>

//==============================Package Pagination Start==========================================>
function packagePagination(Request $request){
    $packages = Package::latest()->paginate(5);
    return view('pagination/package',compact('packages'))->render();
}
//==============================Package Pagination End==========================================>

//==============================Package Page View Start==========================================>
//==============================Package Page View End==========================================>



}
