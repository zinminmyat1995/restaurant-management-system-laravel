<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseTypeRequests\MaterialCreateRequest;
use App\Interfaces\MaterialRepositoryInterface;
use App\Classes\Repositories\MaterialRepository;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    private MaterialRepository $repository;
    public function __construct(MaterialRepositoryInterface $repository){
        $this->repository = $repository;
    }
    public function create()
    {
        if (Auth::check()) {
            return response()->json(["status" => "OK", "data" => ["shop_code" => auth()->user()->shop_code, "shop_name" => auth()->user()->shop_name]],200);
        }
        return response()->json(["status" => "OK", "data" => ["shop_code" => "SK00001", "shop_name" => "Shwe Kant Kaw"]],200);
    }
    public function store(MaterialCreateRequest $request)
    {
        $bool=$this->repository->store(
            [
                "shop_code" => $request->shop_code,
                "name" => $request->material_name,
                "purchase_type_id" => $request->purchase_type_id
            ]
        );
        if($bool){
            return response()->json(['status' => 'OK', 'message' => "Materail Inserted Successfully!"], 200);
        }
        return response()->json(['status' => 'OK', 'message' => "Insert Fail"], 200);
    }
}