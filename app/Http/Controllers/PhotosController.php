<?php

namespace App\Http\Controllers;
use App\Models\Photos;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function getPhotos() {
        $images = Photos::all();
    
        return view("image", compact("images"));
    
    }
    
    // --------------- [ Upload Image ] -------------------
    public function uploadImage(Request $request) {

    
        $this->validate(request(),[
            'table_name' => 'required',
            'table_id' => 'required',
            'image' => 'image',
        ]);


        $image = $request->file('image');
    
        $image->move(public_path('images'), $image);

        

        $imageStatus = Photos::create([
            "table_name" => $table_name,
            "table_id" => $table_id,
            "image" => $image,
        ]);
    
        if(!is_null($imageStatus)) {
    
            return back()->with("success", "Image uploaded successfully.");
        }
    
        else {
            return back()->with("failed", "Failed to upload image.");
        }
    }
    
    
    // ---------------- [ Delete image ] ----------------
    public function deleteImage(Request $request) {
    
        $image = Photos::find($request->id);
        Photos::where("id", $image->id)->delete();
    
        return back()->with("success", "Image deleted successfully.");
    
    }
}

