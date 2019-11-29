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
     * Get and return all the items in order 
     *
     * @return Array
     */
    public function index()
    {

        //Return all the items in order
        $items = Item::orderBy('order', 'asc')->get();

        return view('item', ['items' => $items]);
    }

    /**
     * Update order from item 
     * 
     *@param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function update(Request $request)
    {

        $data['order'] = (float) $request->order;
        $id = $request->id;
        $items = Item::where('_id', $id)->update($data);

        return $id;
    }

    /**
     * Create new item 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return Array
     */
    public function create(Request $request)
    {

        //check mimes and max weigth
        $this->validate(
                $request, 
                [   
                    'text'      => 'required',
                    'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ],
                [   
                    'text.required'     => 'The image text is required.',
                    'image.required'    => 'The image is required.',
                    'image.mimes'       => 'Valid type of files : jpeg,png,jpg,gif,svg',
                    'image.max'         => 'Max weight 2mb',
                ]
            );

        //generate name and move to public folder
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        
        //set order last to the new item
        $itemAux = Item::orderBy('order', 'desc')->take(1)->get();
        if (isset($itemAux[0])){
            $order = ((float)$itemAux[0]->order) + 1;
        } else {
            $order = 1;
        }

        $item = new Item;
        $item->image = $imageName;
        $item->text = $request->text;
        $item->order = $order;
        $item->save();

        return back()->with('success','Item added');

    }

     /**
     * delete order from item 
     * 
     *@param  \Illuminate\Http\Request  $request
     * @return String
     */
    public function delete(Request $request)
    {
        Item::destroy($request->id);

        return $request->id;
    }
}