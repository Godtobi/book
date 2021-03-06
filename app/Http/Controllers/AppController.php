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
        Mail::to('pstyomiomotunde@gmail.com')->send(new Dowloader($request->email));
        return response()->download(public_path('/The Communion of the Holy Spirit by  Yomi Omotunde.pdf'));
      }
      catch (Exception $exception){
          throw $exception;
      }


    }
}
