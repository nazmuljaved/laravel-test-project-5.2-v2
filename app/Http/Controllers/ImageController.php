<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Guzzle\Tests\Plugin\Redirect;
use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ImageController extends Controller
{
    public function saveImage(Request $request)
	{
        $image = new Image();
        $this->validate($request, [            
              'image' => 'required'
        ]);
       
		if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }

		$message='There was an Error';
        if( $request->user()->image()->save($image)){
          $message = "Profile Created successfully";
        }
        return redirect()->route('dashboard')->with(['message' => $message]);        
	}
}
