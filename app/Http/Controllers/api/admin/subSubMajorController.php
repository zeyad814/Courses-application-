<?php

namespace App\Http\Controllers\api\admin;

use App\Models\SubSubMajor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\admin\Major\createSubSubMajorRequest;
use App\Http\Requests\api\admin\Major\UpdateSubSubMajorRequest;

class subSubMajorController extends Controller
{
    public function index(request $request){
        try{
            $sub_sub_major=SubSubMajor::paginate();
            return response()->json(['sub_sub_major' => $sub_sub_major]);

        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }
    public function create(createSubSubMajorRequest $request){
        try{
            $data=$request->validated();
            SubSubMajor::create($data);
            return response()->json(['data' => $data,"message"=>"The major has been created successfully. "]);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }
    public function update(UpdateSubSubMajorRequest $request,$id){
        try{
            $sub_sub_major = SubSubMajor::findOrFail($id);
                $data=$request->validated();
                $sub_sub_major->update($data);
                return response()->json(['data' => $sub_sub_major,"message"=>"The major has been updated successfully. "]);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }

    public function destroy($id){
        try{
            $sub_sub_major = SubSubMajor::findOrFail($id);
            $sub_sub_major->delete();
            return response()->json(["message"=>"The sub major has been deleted."]);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }
}
