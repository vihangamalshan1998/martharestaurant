<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    //get current date
    $date = Carbon::now()->toDateString();

    //retrive order details using current date
    $getdailyreport = DB::table('Orders')
                ->where('OrderDate', '=', $date )
                ->get();
    
    //Get daily report total sell value
    $Total = DB::table('Orders')
     ->sum('TotalPrice');

    //return to index view data stored variables
    return view('index',['mainDishes'=> $getMainDishes,'sideDishes'=>$getSideDishes,'desserts'=>$getDesserts,
    'famousMainMeal'=>$getMostFamousMainDish,'famousSideMeal'=>$getMostFamousSideDish,'dailyReport'=>$getdailyreport
    ,'total'=>$Total]);


});

//route for add new foods for system
Route::post('/saveFoods',\App\Http\Controllers\FoodController::class . '@storeData');

//route for add new foods for system
Route::post('/saveOrder',\App\Http\Controllers\OrderController::class . '@storeData');