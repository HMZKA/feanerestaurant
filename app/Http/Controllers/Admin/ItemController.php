<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Models\Category;
class ItemController extends Controller
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
        $items=Item::all();
        return view('admin.items.index',['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.items.create',['categories'=>$categories]);
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
            'description'=>'required',
            'image'=>'required|image',
            'category_id'=>'required',
            'price'=>'required|numeric'
        ]);
        $myfile = time() . '-' .uniqid() .'.'. $request->image->extension();
        $request->image->storeAs('public/category/'. $request->input('category_id'),$myfile);
        $item =new Item();
        $item->title=$request->input('title');
        $item->description=$request->input('description');
        $item->image=$myfile;
        $item->category_id=$request->input('category_id');
        $item->price=$request->input('price');
        $item->save();
        return redirect('/admin/items')->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $item=Item::find($id);
        return view('admin.items.show',['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Item::find($id);
        $categories=Category::all();
        $cate=Item::with('category');
        return view('admin.items.edit',[
            'item'=>$item,
            'categories'=>$categories,
            'cate'=>$cate
        ]);
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
        $item=Item::find($id);
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
           
            'category_id'=>'required',
            'price'=>'required|numeric'
        ]);
       
        $item->title=$request->input('title');
        $item->description=$request->input('description');
        $item->image=$item->image;
        $item->category_id=$request->input('category_id');
        $item->price=$request->input('price');
        $item->save();
        return redirect('admin/items')->with('success','Item edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        $item->delete();
        return redirect('admin/items')->with('success','Item deleted successfully');
    }
}
