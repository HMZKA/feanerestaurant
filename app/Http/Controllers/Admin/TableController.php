<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables=Table::all();
        return view('admin.tables.index',['tables'=>$tables]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'count'=>'required|numeric'
        ]);
        $table =new Table();
        $table->title=$request->input('title');
        $table->count=$request->input('count');
        $table->user_id= auth()->user()->id;
        $table->save();
        return redirect('/admin/tables')->with('success','Table created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table=Table::find($id);
        return view('admin.tables.show',['table'=>$table]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table=Table::find($id);
        return view('admin.tables.edit',['table'=>$table]);
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
        $this->validate($request,[
            'title'=>'required',
            'count'=>'required|numeric',
        ]);
        $table=Table::find($id);
        $table->title=$request->input('title');
        $table->count=$request->input('count');
        $table->user_id=auth()->user()->id;
        $table->save();
        return redirect('/admin/tables')->with('success','Table edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table=Table::find($id);
        $table->delete();
        return redirect('/admin/tables')->with('success','Table deleted successfully');
    }
}
