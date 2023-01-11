<?php

namespace App\Http\Controllers\ApiControllers;

use App\Classes\Repositories\PurchaseTypeRepository;
use App\Http\Controllers\Controller;
use App\Interfaces\PurchaseTypeRepositoryInterface;
use App\Http\Requests\PurchaseTypeRequests\{PurchaseTypeCreateRequest,PurchaseTypeDeleteRequest};
use Illuminate\Support\Facades\Log;

class PurchaseTypeController extends Controller
{
    private PurchaseTypeRepository $repository;
    public function __construct(PurchaseTypeRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function create(PurchaseTypeCreateRequest $request){
        $bool=$this->repository->register([
            "name"=>$request->name,
            "created_emp"=>10001,
            "updated_emp"=>10001
        ]);
        if($bool){
            return response()->json(["status" => "OK", "message" => "Create Successfully"], 200);
        }
        return response()->json(["status" => "NG", "message" => "Create fail"], 200);
    }

    public function delete(PurchaseTypeDeleteRequest $request){
        $bool = $this->repository->delete($request->id);
        if($bool){
            return response()->json(["status" => "OK", "message" => "Delete Successfully"], 200);
        }
        return response()->json(["status" => "NG", "message" => "Delete failed"], 200);
    }

    public function index(){
        $data = $this->repository->getAll();
        return response()->json(['status' => "OK", "data" => $data],200);
    }
    public function getLatestMenu(int $id){
        try {
            $menucount = $this->repository->getLatestMaterial($id);
            if (is_numeric(trim($menucount))) {
                $menucount++;
                return response()->json(["status" => "OK", "data" => $menucount], 200);
            }
            return response()->json(['status' => "NG", "message" => "Count Failed"], 200);
        }catch(\Exception $e){
            Log::info($e->getMessage() . "\n" . $e->getTraceAsString());
            return response()->json(['status' => "NG", "message" => "Count Failed"], 200);
        }
    }
}
?>
