<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestRestController extends Controller
{
    function restPost(Request $req){
      $validator = Validator::make($req->all(),[
        'name'=>'required|string'
      ]);

      if ($validator->fails()) {
        return response()->json(['msg'=>'error']);
      }
      return response()->json(['msg'=>'successful']);
    }
}
