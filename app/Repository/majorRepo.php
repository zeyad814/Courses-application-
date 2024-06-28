<?php
namespace App\Repository;

use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\api\admin\Major\createMajorRequest;
use App\Http\Requests\api\admin\Major\updateMajorRequest;
// use App\Repository\repoInterface;

class majorRepo implements majorRepoInterface{

        public function index(request $request){
            try{
                $major=Major::paginate();
                return response()->json(['major' => $major]);

            }catch(\Throwable $e){
                return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
            }
        }
        public function create(createMajorRequest $request){
            try{
                $data=$request->validated();
                Major::create($data);
                return response()->json(['data' => $data,"message"=>"The major has been created successfully. "]);
            }catch(\Throwable $e){
                return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
            }
        }
        public function update(updateMajorRequest $request,$id){
            try{
                $major = Major::findOrFail($id);
                    $data=$request->validated();
                    $major->update($data);
                    return response()->json(['data' => $major,"message"=>"The major has been updated successfully. "]);
            }catch(\Throwable $e){
                return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
            }
        }

        public function destroy($id){
            try{
                $major = Major::findOrFail($id);
                $major->delete();
                return response()->json(["message"=>"The major has been deleted."]);
            }catch(\Throwable $e){
                return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
            }
        }

}
