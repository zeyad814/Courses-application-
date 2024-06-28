<?php

namespace App\Http\Controllers\api\admin;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\majorRepoInterface;
use App\Http\Requests\api\admin\Major\createMajorRequest;
use App\Http\Requests\api\admin\Major\updateMajorRequest;

class majorController extends Controller
{
    protected $repo;
    public function __construct(majorRepoInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(request $request)
    {
      return $this->repo->index($request);
    }
    public function create(createMajorRequest $request)
    {
        try{
            return $this->repo->create($request);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }
    public function update(updateMajorRequest $request,$id)
    {
        try{
            return  $this->repo->update($request,$id);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }

    public function destroy($id)
    {
        try{
            return $this->repo->destroy($id);
        }catch(\Throwable $e){
            return response()->json(['message'=> 'Something IS WRONG',"error"=>$e->getMessage()],500);
        }
    }
}
