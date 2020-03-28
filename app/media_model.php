<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class media_model extends Model
{

	protected $table = 'add_media';


	 protected $fillable = [
        'ID',
        'title', 
        'categories',
        'description',
        'file_name'      
    ];

    public $incrementing = true;
	public $timestamps = false;


    public function addmedia($request){

      $file       = $request->file;
    	$validation = Validator::make($request->all(),[
    		'file' =>'required|max:50000|mimes:jpeg,jpg,bmp,png,mp3,mp4',
    		'description' =>'required'

    	]);

    	if ($validation->passes()) {

        if ($file->getClientOriginalExtension() == "mp3") {
          
          $filetype = "music";

        }elseif ($file->getClientOriginalExtension() == "mp4") {

          $filetype = "video";

        }elseif ($file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "bmp" || $file->getClientOriginalExtension() == "png") {
          
          $filetype = "image";

        }

    		$originalFileName         = $file->getClientOriginalName();
    		$fileExtension            = $file->getClientOriginalExtension();
    		$destinationPath          = 'E:/xampp/htdocs/limedigital_Crud2/public/uploads';
      	$upload_success           = $file->move($destinationPath,$file->getClientOriginalName());



        if ($upload_success) {

          $add_media              = new media_model;
          $add_media->title       = $request->title;
          $add_media->categories  = $request->categories;
          $add_media->description = $request->description;
          $add_media->filetype    = $filetype;
          $add_media->file_name   = $originalFileName;

          if ($add_media->save()) {
            
            return response()->json([
            'message' => 'Success',
            'uploaded_image' => '',
            'class_name' => 'alert-success' 
            ]);

          }
        }
      		
		}

    	// $file = $request->file;
    	// $originalFileName       = $file->getClientOriginalName();
    	// $fileExtension          = $file->getClientOriginalExtension();

    	// $destinationPath = 'E:/xampp/htdocs/limedigital_Crud2/uploads';
     //  	$upload_success = $file->move($destinationPath,$file->getClientOriginalName());

  //     	if ($upload_success) {

  //     		$add_media = new media_model;
  //     		$add_media->title = $request->title;
  //     		$add_media->categories = $request->categories;
  //     		$add_media->description = $request->description;
  //     		$add_media->file_name = $originalFileName; 

  //     		return response()-json([
		// 		'message' => 'Success',
		// 		'uploaded_image' => '',
		// 		'class_name' => 'alert-success' 
		// 	]);

		// }
		else{

			return response()->json([
				'message' => $validation->errors()->all(),
				'uploaded_image' => '',
				'class_name' => 'alert-danger' 
			]);
		}


	}

	public function deleteMedia($id){
		$user_data = media_model::where('id', $id)->delete();
		return response()->json([
				'message' => 'Media has been deleted',
				'uploaded_image' => '',
				'class_name' => 'alert-danger' 
			]);

	}
}
