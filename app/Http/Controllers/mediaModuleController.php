<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\media_model;

class mediaModuleController extends Controller
{
	public function viewMediaModule(){
		$viewMedia = \DB::table('add_media')->get();
		$category = \DB::table('categories')->get(); 
    return view('media')->with('viewMedia', $viewMedia)->with('category', $category);	
	}

	public function deleteMediaModule($id){
		 $delete_media = new media_model;
		return $delete_media->deleteMedia($id);
	}
	
}
