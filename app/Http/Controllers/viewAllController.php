<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewAllController extends Controller
{
    public function viewAllModule(Request $request)
    {
    	$mediaContent = \DB::table('add_media')->get();
    	$categories = \DB::table('categories')->get();
    	return view('viewAll_content')->with('mediaContent', $mediaContent)->with('categories', $categories);
    }

    public function viewAllcontent($id)
    {
    	
    	$categories = \DB::table('categories')->where('id', $id)->first();
    	$mediacontent = \DB::table('add_media')->where('categories', $categories->category)->get();
    	return view('view_media_content')->with('mediacontent', $mediacontent);
    }
}
