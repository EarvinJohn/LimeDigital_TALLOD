<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoriesModel;

class categoriesController extends Controller
{
    public function viewCategoriesModule(){
		$viewCategory = \DB::table('categories')->get();
    return view('categories_module')->with('viewCategory', $viewCategory);	
	}

	 public function submitCategories(Request $request){

	 	$Categories = new categoriesModel;
	 	return $Categories->createCategories($request);
    	
    }

    public function viewCategories($id){

	 	$Categories = \DB::table('categories')->where('id', $id)->first();
	 	return view('view_category')->with('Categories', $Categories);
    	
    }

     public function updatecategories(Request $request){

	 	$Categories = new categoriesModel;
	 	return $Categories->updateCategories($request);
    	
    }

    public function deleteCategoryModule($id){
		 $Categories = new categoriesModel;
		return $Categories->deleteCategory($id);
	}
}
