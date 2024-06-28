<?php

namespace App\Http\Controllers\api\auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\api\auth\admin\createAdminRequest;
use App\Http\Requests\api\auth\admin\updateAdminRequest;

class adminController extends Controller
{
    public function index(){
        try{
            $data = Admin::paginate();
            return response()->json($data);
        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function create(createAdminRequest $request){
        try{
            $data = $request->validated();
            $data['password']= bcrypt($data['password']);
            Admin::create($data);
            return response()->json(['data'=>$data , 'message'=>'admin created successfully']);
        }catch(\throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
    public function update(updateAdminRequest $request,$id){
        try{
            $admin=Admin::findOrFail($id);
            $data = $request->validated();
            $admin->update($data);
            return response()->json(["data"=>$admin,"message"=>'admin updated successfully']);
        }catch(\Throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }

    }
    public function destroy($id){
        try {
            $admin=Admin::findOrFail($id);
            $admin->delete();
            return response()->json("this admin deleted successfully");
        }catch(\Throwable $e){
            return response()->json(['error' =>$e->getMessage(),'message' =>"there was an error in the server"],500);
        }
    }
}
