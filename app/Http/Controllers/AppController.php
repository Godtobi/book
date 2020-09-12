<?php

namespace App\Http\Controllers;

use App\Mail\Dowloader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Exception;

class AppController extends Controller
{
    public function index(){
      return view('index');
    }

    public function download(Request $request){
      $request->validate([
        'email'=>'required'
      ]);

      try{
        Mail::to('oyebamijitobi@gmail.com')->send(new Dowloader($request->email));
        return response()->download(public_path('/wheat.png'));
      }
      catch (Exception $exception){

      }


    }
}
