<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

/*         $item = new Item;
        $item->image = 'url8';
        $item->text = 'tetextost8';
        $item->order = 8;
        $item->save();
exit() */;
        $items = Item::orderBy('order', 'asc')->get();

        return view('item', ['items' => $items]);
    }


    public function update(Request $request)
    {

        $data['order'] = $request->order;
        $id = $request->id;
        $items = Item::where('_id', $id)->update($data);

        return $request->id;
    }
}