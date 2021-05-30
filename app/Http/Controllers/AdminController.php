<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Validator;

class AdminController extends Controller
{
   public function dashboard(Request $request){

    return response()->json(['status'=>200, 'message'=>'Detail get successfully'], 200);
   }

   public function all_sellers(Request $request){
      $seller = User::where('user_type','Seller')->where('deleted_at',null)->get();
      if($seller->isEmpty()){
         return response()->json(['status'=>404, 'message'=>'Sellers not found.'], 404);
      }else{
         return response()->json(['status'=>200, 'data'=>$seller, 'message'=>'Sellers get successfully'], 200);
      }
   }

   public function all_buyers(Request $request){
      $buyer = User::where('user_type','Buyer')->where('deleted_at',null)->get();
      if($buyer->isEmpty()){
         return response()->json(['status'=>404, 'message'=>'Buyers not found.'], 404);
      }else{
         return response()->json(['status'=>200, 'data'=>$buyer, 'message'=>'Buyers get successfully'], 200);
      }   
   }

   public function add_category(Request $request){
      $cat_name = $request->name;
   
      $category = new Category;
      $category->name = $cat_name;
      $category->save();
      if($category){
         return response()->json(['status'=>200, 'message'=>'Category saved successfully'], 200);
      }else{
         return response()->json(['status'=>500, 'message'=>'Something went wrong'], 500);
      }
      
   }

   public function show_categories(Request $request){
      $categories = Category::where('deleted_at',null)->get();
      if($categories->isEmpty()){
         return response()->json(['status'=>404, 'message'=>'Categories not found.'], 404);
      }else{
         return response()->json(['status'=>200, 'data'=>$categories, 'message'=>'Categories get successfully'], 200);
      }
   }


   public function update_category(Request $request){

      return response()->json(['status'=>200, 'message'=>'Detail get successfully'], 200);
   }


   public function delete_category(Request $request){

      return response()->json(['status'=>200, 'message'=>'Detail get successfully'], 200);
   }
}
