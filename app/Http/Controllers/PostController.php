<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Post;
use App\User;
use App\Image;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

  public function getDashboard()
   {   
      //   $posts = DB::table('posts')->where('id', Auth::user()->id);     
    //  return view('dashboard',['posts'=>$posts]); 
     $images = Image::all()->where('user_id', Auth::user()->id);
        //$images =  \DB::table('images')->where('user_id', Auth::user()->id)->first();
         $posts = \DB::table('posts')->where('user_id', Auth::user()->id)->first(); 
         //dd($images);    
        return view('dashboard', compact('posts','images'));
	}

    /*
          creating the profile
    */


  public function postCreate(Request $request){
    $this->validate($request,[
      'first_name'=> 'required|max:120',
      'middle_name'=> 'required|max:120',
      'last_name' => 'required|max:120',
      'gender'=> 'required',
      'dob'=>'required',
      'nationality'=>'required',
      'nid'=>'required',
      'email' => 'required|email|unique:users',
      'phone_no'=>'required',
      'about_me'=>'required',
        ]);
      
    $post = new Post();
        $post->first_name = $request['first_name'];
        $post->middle_name = $request['middle_name'];
        $post->last_name = $request['last_name'];
        $post->gender = $request['gender'];
        $post->dob = $request['dob'];
        $post->nationality = $request['nationality'];
        $post->nid = $request['nid'];
        $post->email = $request['email'];
        $post->phone_no = $request['phone_no'];
        $post->about_me = $request['about_me'];        
        $message='There was an Error';
        if( $request->user()->post()->save($post)){
          $message = "Profile Created successfully";
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
        
  }
  /*
        Updating the user profile
  */

	public function postUpdate(Request $request)
	{
		 $ok= $this->validate($request,[
			'first_name'=> 'required|max:120',
			'middle_name'=> 'required|max:120',
			'last_name' => 'required|max:120',
			'gender'=> 'required',
			'dob'=>'required',
			'nationality'=>'required',
			'nid'=>'required',
			'email' => 'required|email|unique:users',
			'phone_no'=>'required',
			'about_me'=>'required',
   			]);
     //   $data =fill($request->all());
     //  $posts = DB::table('posts')->where('id', Auth::user()->id)->first();     
      //  return view('dashboard.update',['posts'=>$posts]);

      $data = $request->only('first_name', 'middle_name', 'last_name',
       'gender', 'dob', 'nationality', 'nid', 'email', 'phone_no', 'about_me');
       $request->user()->post()->updateOrCreate($data) ;  
      // dd($request->user()->post);
        return redirect()->route('dashboard');
       }
        
	

}
