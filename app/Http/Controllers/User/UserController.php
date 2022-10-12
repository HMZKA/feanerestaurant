<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Category;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('user.index2',[
            'categories'=>$categories
        ]);
    }
    public function showcategories()
    {
        $categories=Category::all();
        return view('user.menu',[
            'categories'=>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservations=Reservation::all();
        $tables=Table::all();
        return view('user.book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $date=0;
        if($request->date=='today'){
            $date=Carbon::today()->format('Y-m-d');
        }
        if($request->date=='tomorrow'){
            $date=Carbon::tomorrow()->format('Y-m-d');
        }
        $reserves=array();
        foreach($tables as $table){
            if($table->count==$request->person_count){
                $reserves[]=$table;
                
            }
        }
        $status=true;
        foreach($reserves as $reserve){
          if($status) 
          { 
            foreach($reservations as $reservation){
                if($reserve->id==$reservation->table_id){
                    if($reservation->date==$date){
                       
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
            'date'=>$date,
            'person_count'=>$request->person_count,
            'table_id'=>$reserve->id,
            'first_hour'=>$request->first_hour,
            'last_hour'=>$request->last_hour
        ]);
        return redirect(route('index'))->with('success','Your table will be ready for you');
       }else{
        return redirect(route('index'))->with('not','Sorry, we can\'t find table for you, retry with different hours or date');
       }
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        return view('user.show',[
            'category'=>$category
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
