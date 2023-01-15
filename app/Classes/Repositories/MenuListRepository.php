<?php

namespace App\Classes\Repositories;

use App\Interfaces\MenuListRepositoryInterface;
use App\Models\Menu;

class MenuListRepository implements MenuListRepositoryInterface
{
       
	/**
	 * @return mixed
	 */
	public function list(array $filters) {
            $query=Menu::join("menu_types","menus.menu_type_id","menu_types.id")->join("meat_type","menus.meat_type_id","meat_type.id")->join("menu_categories","menu_categories.id","menus.menu_category_id")
			->select([
				"menus.menu_name",
				"menus.id",
				"menus.price",
				"menus.menu_id",
				"menu_types.name as menu_type_name",
				"meat_type.name as meat_type_name",
				"menu_categories.name as menu_category_name"
			]);
			if(isset($filters["shop_code"])){
				if($filters["shop_code"]!=null){
					$query->where("menus.shop_code",$filters['shop_code']);
				}
			}
			if(isset($filters["menu_name"])){
				if($filters["menu_name"]!=null){
					$query->where("menus.menu_name",$filters['menu_name']);
				}
			}
			if(isset($filters["menu_category"])){
				if($filters["menu_category"]!=null){
					$query->where("menus.menu_category_id",$filters['menu_category']);
				}
			}
			if(isset($filters["menu_type"])){
				if($filters["menu_type"]!=null){
					$query->where("menus.menu_type_id",$filters['menu_type']);
				}
			}
			return $query->orderBy("menus.created_at")
			->paginate(20);
	}
}