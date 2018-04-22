<?php

namespace yapos2\Http\Controllers;

use Illuminate\Http\Request;
use yapos2\Models\Supplier;
use yapos2\Models\Receiving;
use yapos2\Models\ReceivingItem;
use yapos2\Models\Item;

class PorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('por.index')->with('suppliers',$suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = $request->input();

        $receiving = new Receiving();
        $receiving->amount = 0;
        $receiving->supplier_id = $items['supplier'];
        $receiving->user_id = \Auth::id();
        $receiving->save();
        $total = 0;

        for($i=0; $i < $count=count($items['id']); $i++){
          $receivingitem = new ReceivingItem();
          $receivingitem->item_id = $items['id'][$i];
          $receivingitem->receiving_id = $receiving->id;
          $receivingitem->quantity = $items['quantity'][$i];
          $receivingitem->price = $items['price'][$i];
          $receivingitem->subtotal = $items['price'][$i] * $items['quantity'][$i];
          $total += $receivingitem->subtotal;
          $receivingitem->save();

          $item = Item::find($items['id'][$i]);
          $item->cost_price = $items['price'][$i];
          $item->quantity = $item->quantity + $items['quantity'][$i];
          $item->save();
        }
        $receiving->amount = $total;
        $receiving->save();
        return redirect('por');
    }

}
