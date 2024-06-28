<?php

namespace App\Http\Controllers\api\admin;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\admin\createRegionRequest;
use App\Http\Requests\api\admin\updateRegionRequest;

class regionController extends Controller
{
    public function index(){
        try{
            $data = Region::paginate();
            return response()->json($data);
        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function create(createRegionRequest $request){
        try{
            $data = $request->validated();
            Region::create($data);
            return response()->json(['data'=>$data , 'message'=>'Region created successfully']);
        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function update(updateRegionRequest $request,$id){
        try{
            $Region=Region::findOrFail($id);
            $data = $request->validated();
            $update = Region::where('id',$Region->id)->update($data);
            return response()->json(["data"=>$Region,"message"=>'Region updated successfully']);
        }catch(\Throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }

    }
    public function destroy($id){
        try {
            $region=Region::findOrFail($id);
            $region->delete();
            return response()->json("this Instructor deleted successfully");
        }catch(\Throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
}
