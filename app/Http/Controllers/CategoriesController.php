<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Item;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::orderBy('ordring')->paginate(10);
        return view('admin.categories.show', compact('categories'))->withTitle('Categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:10',
            'ordring' => 'integer'
        ]);
        $input = array_except($request->all(), '_token');
        category::create($input);
        \Session::flash('message', 'Category successfully added');
        return redirect('admin/categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'))->withTitle('Edit Category');
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
         $this->validate($request, [
            'name' => 'required|min:3|max:10',
            'ordring' => 'integer'
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->visibility = $request->visibility;
        $category->ordring = $request->ordring;
        $category->save();
        \Session::flash('message', 'Category edited added');
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        \Session::flash('message', 'Category deleted added');
        return redirect('admin/categories');
    }

    public function ads($id){
        $ads = Item::where('category_id', $id)->paginate(10);
        $category = Category::findOrFail($id);
        return view('admin.categories.ads', compact('ads', 'category'))->withTitle('Category Ads');
    }
}
