<?php

namespace App\Http\Controllers\api\admin;

use App\Models\Major;
use App\Models\Course;
use App\Models\SubMajor;
use App\Models\SubSubMajor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\api\admin\course\createCourseRequest;
use App\Http\Requests\api\admin\course\updateCourseRequest;

class courseController extends Controller
{
    public function index(){
        try{
            $data = Course::paginate();
            return response()->json([
                "data" => $data->toArray(),
                "message" => "data retrieved successfully"
        ]);
        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function create(createCourseRequest $request){
        try{
            $data = $request->validated();
            if(isset($data['sub_sub_major_id'])){
                $subSubMajorMatch = SubSubMajor::where(["submajor_id" => $data['sub_major_id'],"id" => $data['sub_sub_major_id'] ])->exists();
            }
            $subMajorMatch = SubMajor::where(["major_id" => $data['major_id'],"id" => $data['sub_major_id'] ])->exists();
            // dd($data);
        if(isset($data['sub_sub_major_id']))
        {
            if($subMajorMatch && $subSubMajorMatch)
            {
                Course::create($data);
                return response()->json(['data'=>$data , 'message'=>'Course created successfully']);
            }
        }else{
            if($subMajorMatch)
            {
                Course::create($data);
                return response()->json(['data'=>$data , 'message'=>'Course created successfully']);
            }
        }
            return response()->json(['message'=>'this major dosen\'t match with sub major']);

        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function update(updateCourseRequest $request,$id){
        try{
            $Course=Course::findOrFail($id);
            $data = $request->validated();
            // dd($data);
            if(isset($data['sub_sub_major_id'])){
                $subSubMajorMatch = SubSubMajor::where(["submajor_id" => $data['sub_major_id'],"id" => $data['sub_sub_major_id'] ])->exists();
            }
            $subMajorMatch = SubMajor::where(["major_id" => $data['major_id'],"id" => $data['sub_major_id'] ])->exists();
            // dd($data);
        if(isset($data['sub_sub_major_id']))
        {
            if($subMajorMatch && $subSubMajorMatch)
            {
                $update = Course::where('id',$Course->id)->update($data);
                return response()->json(["data"=>$Course,"message"=>'Course updated successfully']);
            }
        }else{
            if($subMajorMatch)
            {
                $update = Course::where('id',$Course->id)->update($data);
                return response()->json(["data"=>$data,"message"=>'Course updated successfully']);
            }
        }
        return response()->json(['message'=>'this major dosen\'t match with sub major']);
            // dd($data);
        }catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Course not found',
                'message' => 'The course you tried to update does not exist',
                ], 404);
        }catch(\Throwable $e){
             return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }

    }
    public function destroy($id){
        try {
            $Course=Course::findOrFail($id);
            $Course->delete();
            return response()->json("this Course deleted successfully");
        }catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Course not found',
                'message' => 'The course you tried to delete does not exist',
                ], 404);
        }catch(\Throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
}
