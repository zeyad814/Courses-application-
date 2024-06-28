<?php

namespace App\Http\Controllers\api\auth;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\admin\instructor\createInstructorRequest;
use App\Http\Requests\api\admin\instructor\updateInstructorRequest;

class instructorController extends Controller
{
    public function index(){
        try{
            $data = Instructor::paginate();
            return response()->json($data);
        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function create(createInstructorRequest $request){
        try{
            $data = $request->validated();
            $data['password']= bcrypt($data['password']);
            Instructor::create($data);
            return response()->json(['data'=>$data , 'message'=>'Instructor created successfully']);
        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function update(updateInstructorRequest $request,$id){
        try{
            $instructor=Instructor::findOrFail($id);
            $data = $request->validated();
            $update = Instructor::where('id',$instructor->id)->update($data);
            // $instructor->update($data);
            return response()->json(["data"=>$instructor,"message"=>'Instructor updated successfully']);
        }catch(\Throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }

    }
    public function destroy($id){
        try {
            $instructor=Instructor::findOrFail($id);
            $instructor->delete();
            return response()->json(["message"=>"this region deleted successfully"]);
        }catch(\Throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
}


// insert into instructors('name', 'email') values (''); drop table instructor ; -- h');
