<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use App\User;
use App\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{  
   public function postSignUp(Request $request)
   {  	
   		$this->validate($request,[
   			'email' => 'required|email|unique:users',
   			'name' => 'required|max:120',
   			'password' => 'required|min:4'
   			]);
   		$name= $request['name'];
   		$email= $request['email'];   		
   		$password= bcrypt($request['password']);

   		$user = new User();
   		$user->name=$name;
   		$user->email=$email;
   		$user->password=$password;

   		$user->save();
   		Auth::login($user);
   		return redirect()->route('dashboard');
   }

   public function postSignIn(Request $request)
   {
   			$this->validate($request,[
   			'email' => 'required',   			
   			'password' => 'required'
   			]);
   			if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
   }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
  
    public function getAccount()
    {  
        $posts = Auth::user()->post();
        return view('update',['user'=>Auth::user()],['posts'=>$posts]);
    }

    public function getCreate()
      {        
        return view('create',['user'=>Auth::user()]);
      }

    /*
      Controller for file upload method:

    */
    public function postSaveImage(Request $request){
          $this->validate($request, [
           'name' => 'required|max:120'
        ]);

        $user = Auth::user();
        $user->name = $request['name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['name'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('dashboard');
    }
    public function getUserImage($filename)
      {
          //dd();
        $file = Storage::disk('local')->get($filename);       
        return new Response($file, 200);
      }

      public function getUpload()
      {
        return view('image_upload',['user'=>Auth::user()]);
      }

      public function getImage(){
        return view('gallary_upload',['user'=>Auth::user()]);
      }
}
