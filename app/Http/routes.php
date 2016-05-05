<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('feedback');
});

Route::get('/feedback/all', function() {
    return App\User::all();
});

Route::post('/feedback/save', function(\Illuminate\Http\Request $request) {
  try {
      $user = App\User::create([
          "username" => $request->all()['username'],
          "email"=> $request->all()['email'],
          "dob" => $request->all()['dob_l'],
          "password" => bcrypt($request->all()['password']),
          "plan" => $request->all()['plan'],
          "interest" => $request->all()['interest']
      ]);
      return $user;
  }  Catch (Exception $e) {
      return Response::json(['status'=>500,'message'=>$e->getMessage()], 500);
  }
});
