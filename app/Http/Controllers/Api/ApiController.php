<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Table;
use App\Models\Reservation;
use Carbon\Carbon;
class ApiController extends Controller
{
    
    public function categories(){
        $categories=Category::all();
        return response([
            'categories'=>$categories
        ],200);
    }
    public function items(){
        $items=Item::all();
        return response([
            'items'=>$items
        ],200);
    }
    public function category($id){
        $category=Category::with('items')->find($id);
        return response([
            'category'=>$category
        ],200);
    }
    public function item($id){
        $item=Item::find($id);
        return response([
            'item'=>$item
        ],200);
    }
    public function home(){
        $categories=Category::with('items')->get();
        return response(
            ['categories'=>$categories]
        ,200);
    }
    public function book(Request $request){
       
        $reservations=  Reservation::where(function ($query) {
            $rty=Carbon::now()->subDays(1);
            $query->where('updated_at', '>',  $rty);
        })->get();
        $tables=Table::all();
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required',
            'person_count'=>'required|numeric',
            'date'=>'required',
            'first_hour'=>'required',
            'last_hour'=>'required'
        ]);
       
        $reserves=array();
        foreach($tables as $table){
            if($table->count==$request->person_count){
                $reserves[]=$table;
                
            }
        }
        $today=Carbon::today()->format('Y-m-d');
        $tomorrow=Carbon::tomorrow()->format('Y-m-d');
        if($today>$request->date||$request->date >$tomorrow){
            return response(['msg'=>'Sorry, you can book a table for today or tomorrow']);
        }
        $status=true;
        foreach($reserves as $reserve){
          if($status) 
          { 
            foreach($reservations as $reservation){
                if($reserve->id==$reservation->table_id){
                    if($reservation->date==$request->date){
                       if($reservation->last_hour > $request->first_hour){
                        if($request->first_hour>$reservation->first_hour || $request->last_hour>$reservation->first_hour){
                            $status=false;
                            
                           }
                       }
                    }
                    }
                
         }}
        }
       
       if($status){
        Reservation::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'date'=>$request->date,
            'person_count'=>$request->person_count,
            'table_id'=>$reserve->id,
            'first_hour'=>Carbon::parse($request->first_hour),
            'last_hour'=>Carbon::parse($request->last_hour),
        ]);
        return response([
            "msg"=>'Your table will be ready for you',
            
        ],200);
       }else{
        return response([
            "msg"=>'Sorry, we can\'t find table for you, retry with different hours or date',
        ],200);
       }
       
    }
   
    public function reserve(){
       
        
      $today=Carbon::tomorrow()->format('Y-m-d');
     
      return response([
          'today'=>$today
      ]);
        
   
    }
}
