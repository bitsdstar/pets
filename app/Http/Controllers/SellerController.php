<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function dashboard(Request $request){

        return response()->json(['status'=>200, 'message'=>'Detail get successfully'], 200);
    }

    public function add_post(Request $request){

        return response()->json(['status'=>200, 'message'=>'Detail get successfully'], 200);
    }

    public function show_posts(Request $request){

        return response()->json(['status'=>200, 'message'=>'Detail get successfully'], 200);
    }

    public function update_post(Request $request){

        return response()->json(['status'=>200, 'message'=>'Detail get successfully'], 200);
    }

    public function delete_post(Request $request){

        return response()->json(['status'=>200, 'message'=>'Detail get successfully'], 200);
    }
}
