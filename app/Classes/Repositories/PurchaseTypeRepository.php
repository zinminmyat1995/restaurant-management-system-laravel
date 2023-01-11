<?php
namespace App\Classes\Repositories;

use App\Interfaces\PurchaseTypeRepositoryInterface;
use App\Models\Material;
use App\Models\Menu;
use App\Models\PurchaseType;
use Illuminate\Support\Facades\Log;
use Exception;

class PurchaseTypeRepository implements PurchaseTypeRepositoryInterface
{
    function register($storeableArray)
    {
        try{
            $count=PurchaseType::create($storeableArray);
            if($count){
                Log::info("Deleted Successfully");
                return true;
            }
            Log::info("Cannot Create Item");
            return false;
        }catch(Exception $e){
            Log::debug($e->getMessage() ."\n" . $e->getTraceAsString());
            return false;
        }

    }
    function delete(int $PurchaseTypeId)
    {
        try{
            $deleted = PurchaseType::where("id", $PurchaseTypeId)->delete();
            if ($deleted) {
                Log::info("Deleted Successfully");
                return true;
            }
            Log::info("Item Not Found");
            return false;
        }catch(Exception $e){
            Log::debug($e->getMessage() ."\n" . $e->getTraceAsString());
            return false;
        }

    }
    function getAll()
    {
        $data=PurchaseType::whereNull("deleted_at")->select([
            "name",
            "id"
        ])->get();
        return $data;
    }
	/**
	 * @return integer
	 */
	public function getLatestMaterial(int $PurchaseTypeId) {
        try{
            return Material::where("purchase_type_id",$PurchaseTypeId)->count();
        }catch(Exception $e){
            Log::debug($e->getMessage() ."\n" . $e->getTraceAsString());
            return false;
        }
	}
}
?>
