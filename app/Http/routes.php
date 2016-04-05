<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
    return view('welcome');
	})->name('home');

	Route::post('/signup',[
   	'uses' =>'UserController@postSignUp',
   	'as' => 'signup'
   	]);

   	Route::post('/signin',[
   	'uses' =>'UserController@postSignIn',
   	'as' => 'signin'
   	]);
   
   	Route::get('/logout', [
       'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

 	Route::get('/dashboard', [
   	'uses' =>'PostController@getDashboard',
   	'as' => 'dashboard',
   	'middleware' => 'auth'
   	]);

	Route::post('/update',[
	'uses'=>'PostController@postUpdate',
	'as' => 'update',
	'middleware' =>'auth'
	]);

	Route::get('/account',[
	'uses' => 'UserController@getAccount',
	'as' =>'account',
	 'middleware' =>'auth'
	]); 
  
  Route::get('/create',[
    'uses' => 'UserController@getCreate',
    'as' =>'create',
    'middleware' =>'auth'
    ]);

  Route::post('/save',[
    'uses'=>'PostController@postCreate',
    'as' =>'save'
   // 'middleware' =>'auth'
    ]);

    Route::get('test', function()
        {
          Mail::send('mail', [], function ($message)
              {
                         $message->to('freesoftpdf@gmail.com', 'Rasel')->subject('Welcome!');
              });
  // dd(Config::get('mail'));
        });

      Route::get('/userimage/{filename}',[
      'uses' =>'UserController@getUserImage',
      'as' => 'image.upload'
     
    ]);

      Route::get('/upload',[
        'uses' =>'UserController@getUpload',
        'as' => 'upload',
        'middleware' =>'auth'
        ]);

      Route::post('/uploadPhoto',[
       'uses' =>'UserController@postSaveImage',
        'as' =>'image.save'
    ]);

      Route::get('/imageUploadForm',[
        'uses'=>'UserController@getImage',
        'as' => 'gallary'
        ]);

      Route::post('/saveImage',[
        'uses' => 'ImageController@saveImage',
        'as' =>'saveImage'

       ]);
});
