<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Foods;
use App\Models\Orders;
use Carbon\Carbon;

class OrderController extends Controller
{
   public function storeData(Request $request){

        $order =new Orders;
      
        //set retrive id to variables
        $mainDishid=$request->mainDish;
        $sideDishid=$request->sideDish;
        $dessertid=$request->dessert;  

        //get the data using perviously set variables
        $getMainDishes = DB::table('Foods') 
                ->where('id', '=', $mainDishid)
                ->get();
        //get the main dish price , salles count and update it
         $maindishPrice = $getMainDishes[0]->foodPrice;
         $maindishSoldtime = $getMainDishes[0]->SallersCount;
         $updatedMainDishSoldTime=  $maindishSoldtime + 1;

         //update main dish sales count
         DB::table('Foods')
              ->where('id', '=', $mainDishid )
              ->update(['SallersCount' => $updatedMainDishSoldTime]);

        //get the data using perviously set variables
        $getsideDishe = DB::table('Foods') 
                ->where('id', '=', $sideDishid)
                ->get();
       //get the side dish price , salles count and update it
        $sidedishPrice = $getsideDishe[0]->foodPrice;
        $sidedishSoldtime = $getsideDishe[0]->SallersCount; 
        $updatedSideDishSoldTime=  $sidedishSoldtime + 1;

        //update side dish sales count
         DB::table('Foods')
              ->where('id', '=', $sideDishid )
              ->update(['SallersCount' => $updatedSideDishSoldTime]);

        //check the order type accoring to dessert
        if($request->dessert !== 'No Dessert'){
            //get the dessert price , salles count and update it
            $getdessert= DB::table('Foods') 
                ->where('id', '=', $dessertid)
                ->get();
            //get the dessert price , salles count and update it
            $DessertPrice = $getdessert[0]->foodPrice;
            $DessertSoldtime = $getdessert[0]->SallersCount; 
            $updatedDessertSoldTime=  $DessertSoldtime + 1;
            
            //update dessert sales count
             DB::table('Foods')
              ->where('id', '=', $dessertid )
              ->update(['SallersCount' => $updatedDessertSoldTime]);

            //calculate total price
            $total = $maindishPrice+ $sidedishPrice + $DessertPrice;

            $order->OrderedDesserts=$getdessert[0]->foodName;
            
        }else{

            $order->OrderedDesserts=$request->dessert ;

            //calculate total price
            $total = $maindishPrice + $sidedishPrice ;

        } 
        
        //set data to the variables
        $order->orderedMainDishes=$getMainDishes[0]->foodName;
        $order->OrderedSideDishes=$getsideDishe[0]->foodName;
        $order->OrderDate=carbon::now();
        $order->TotalPrice=$total;
        
        //save data to database
         $order->save();

        return redirect()->back();
    }
}
