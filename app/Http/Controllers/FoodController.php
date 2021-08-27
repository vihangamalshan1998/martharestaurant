<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foods;

class FoodController extends Controller
{
    public function storeData(Request $request){
      
        //create object from Foods Model
        $foods =new Foods;

        //set data to the variables
        $foods->foodName=$request->FoodName;
        $foods->foodType=$request->FoodType;
        $foods->foodPrice=$request->FoodPrice;

        //save data in data table
        $foods->save();

        return redirect()->back();
    }
}
