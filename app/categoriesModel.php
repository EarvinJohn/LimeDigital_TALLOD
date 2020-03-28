<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoriesModel extends Model
{
    protected $table = 'categories';
	public $timestamps = false;

	public function createCategories($request){

		$new_category 				= new categoriesModel;
    	$new_category->category 	= $request->category_name;
    	

    	if ($new_category->save()) {
    		
    		return response()->json([
				'message' => 'Success',
				'class_name' => 'alert-success' 
				]);
    	
    	}else{

    		return response()->json([
				'message' => 'Success',
				'class_name' => 'alert-danger' 
				]);
    	}


	}

	public function updateCategories($request){

		$update_category 			= categoriesModel::findorFail($request->id);
    	$update_category->category 	= $request->category_name;
    	

    	if ($update_category->save()) {
    		
    		return response()->json([
				'message' => 'Success',
				'class_name' => 'alert-success' 
				]);
    	
    	}else{

    		return response()->json([
				'message' => 'Failed!',
				'class_name' => 'alert-danger' 
				]);
    	}


	}

	public function deleteCategory($id){
		
		$category_data = \DB::table('categories')->where('id', $id)->delete();
		return response()->json([
				'message' => 'Category has been deleted',
				'class_name' => 'alert-danger' 
			]);

	}
    	
}
