<?php

namespace App\Http\Controllers;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\media_model;
use App\Http\Requests\addmediavalidation;

class addNewPageController extends Controller
{
    public function upload()
    {
        return view ('upload');
    }

    public function submitMediaForm(Request $request)
    {

       $create_media = new media_model;
		return $create_media->addmedia($request);
    }

     public function addNewModule(Request $request)
    {
    	$categories = \DB::table('categories')->get();
    	return view('add_new_page')->with('categories', $categories);
    }
}
