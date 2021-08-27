<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
   //get and set the available main dishes
   $getMainDishes = DB::table('Foods')
                ->where('foodType', '=', 'MAIN DISHES')
                ->get();

   //get and set the available side dishes
   $getSideDishes = DB::table('Foods')
                ->where('foodType', '=', 'SIDE DISHES')
                ->get();

   //get and set the available desserts
   $getDesserts = DB::table('Foods')
                ->where('foodType', '=', 'DESSERTS')
                ->get();

   //get and set the most sold main dishes's sold time
   $getMainDishSoldTime = DB::table('Foods')
                ->where('foodType', '=', 'MAIN DISHES')
                ->max('SallersCount');

    //get and set the most sold side dishes's sold time
   $getSideDishSoldTime = DB::table('Foods')
                ->where('foodType', '=', 'SIDE DISHES')
                ->max('SallersCount');

   //get and set the most sold main dishes using previusly get sold time
   $getMostFamousMainDish = DB::table('Foods')
                ->where('foodType', '=', 'MAIN DISHES')
                ->where('SallersCount', '=', $getMainDishSoldTime)
                ->get();

   //get and set the most sold side dishes using previusly get sold time
   $getMostFamousSideDish = DB::table('Foods')
                ->where('foodType', '=', 'SIDE DISHES')
                ->where('SallersCount', '=', $getSideDishSoldTime)
                ->get();
                

    //return to index view data stored variables
    return view('index',['mainDishes'=> $getMainDishes,'sideDishes'=>$getSideDishes,'desserts'=>$getDesserts,
    'famousMainMeal'=>$getMostFamousMainDish,'famousSideMeal'=>$getMostFamousSideDish]);


});

Route::post('/saveFoods',\App\Http\Controllers\FoodController::class . '@storeData');