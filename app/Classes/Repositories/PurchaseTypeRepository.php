<?php
namespace App\Classes\Repositories;

use App\Interfaces\PurchaseTypeRepositoryInterface;
use App\Models\Menu;
use App\Models\PurchaseType;
use Illuminate\Support\Facades\Log;

class PurchaseTypeRepository implements PurchaseTypeRepositoryInterface
{
    function register($storeableArray)
    {
        $count=PurchaseType::create($storeableArray);
        if($count){
            Log::info("Deleted Successfully");
            return true;
        }
        Log::info("Cannot Create Item");
        return false;
    }
    function delete(int $PurchaseTypeId)
    {
        $deleted = PurchaseType::where("id", $PurchaseTypeId)->delete();
        if ($deleted) {
            Log::info("Deleted Successfully");
            return true;
        }
        Log::info("Item Not Found");
        return false;
    }
    function getAll()
    {
        $data=PurchaseType::whereNull("deleted_at")->select([
            "name",
            "id"
        ])->get();
        return $data;
    }
}
?>