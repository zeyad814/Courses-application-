<?php
namespace App\Repository;
use Illuminate\Http\Request;
use App\Http\Requests\api\admin\Major\createMajorRequest;
use App\Http\Requests\api\admin\Major\updateMajorRequest;


interface majorRepoInterface{
    public function index(request $request);
    public function create(createMajorRequest $request);
    public function update(updateMajorRequest $request,$id);
    public function destroy($id);
}

