<?php

namespace App\Http\Controllers;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Category;
use App\Item;

class ItemsController extends Controller
{
    public function addPage()
    {   
        $categories = Category::where('visibility', 1)->get();
		return view('admin.items.add', compact('categories'))->withTitle('Add Item');
    }

    public function index()
    {   
        $items = Item::orderBy('id','desc')->paginate(8);
        return view('admin.items.show', compact('items'))->withTitle('Items');
    }

    public function create()
    {
        //
    }

    public function store(ItemRequest $request)
    {
		$item = new Item;    
		$item->name = $request->name;
		$item->description = $request->description;
		$item->price = $request->price;
		$item->user_id = $request->user_id;
		$item->category_id = $request->categories;
		$item->save();

        \Session::flash('message', 'Item successfully added');
        return redirect('admin/items');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::where('visibility', 1)->get();
        return view('admin.items.edit', compact('item', 'categories'))->withTitle('Edit Item');
    }

    
    public function update(ItemRequest $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
		$item->description = $request->description;
		$item->price = $request->price;
		$item->category_id = $request->categories;
		$item->user_id = $request->user_id;
		$item->approve = 0;
		$item->save();

        \Session::flash('message', 'Item successfully edited');
        return redirect('admin/items');
    }

    public function destroy($id)
    {
    	$item = Item::findOrFail($id); 
        if($item->photos != ""){
            foreach (explode(' | ', $item->photos) as $photo) {
                if(file_exists('img/uploades/'.$photo)) {
                    unlink('img/uploades/'.$photo);
                } 
            }
        }
        
        $item->delete();
        \Session::flash('message', 'Item deleted added');
        return redirect('admin/items');
    }

     public function active($id)
    {
        $item = Item::findOrFail($id);
        $item->approve = 1;
        $item->save();
        return redirect('admin/items');
    }

    public function adding(ItemRequest $request)
    {
        $item = new Item;    
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->user_id = $request->user_id;
        $item->category_id = $request->categories;
        $files = $request->photos;
        $images = '';
       foreach ($files as $file) {
            $photoName = rand(1,999999). "_". $file->getClientOriginalName();
            $path = 'img/uploades';
            $uploade = $file->move($path, $photoName);
            $images[] .= $photoName;
       }

        $img = implode(' | ', $images);
        $item->photos = $img;
        $item->save();
        \Session::flash('message', 'Item successfully added wait admin approve');
        return redirect('/adding');

   }

    
}

     