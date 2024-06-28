<?php

namespace App\Http\Controllers\api\admin;

use App\Models\SubMajor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\admin\Major\createMajorRequest;
use App\Http\Requests\api\admin\Major\updateMajorRequest;
use App\Http\Requests\api\admin\Major\createSubMajorRequest;
use App\Http\Requests\api\admin\Major\UpdateSubMajorRequest;

class subMajorController extends Controller
{
    public function index(request $request){
        try{
            $sub_major=SubMajor::paginate();
            return response()->json(['sub_major' => $sub_major]);

        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }
    public function create(createSubMajorRequest $request){
        try{
            $data=$request->validated();
            SubMajor::create($data);
            return response()->json(['data' => $data,"message"=>"The major has been created successfully. "]);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }
    public function update(UpdateSubMajorRequest $request,$id){
        try{
            $sub_major = SubMajor::findOrFail($id);
                $data=$request->validated();
                $sub_major->update($data);
                return response()->json(['data' => $sub_major,"message"=>"The major has been updated successfully. "]);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }

    public function destroy($id){
        try{
            $major = SubMajor::findOrFail($id);
            $major->delete();
            return response()->json(["message"=>"The sub major has been deleted."]);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }
}
