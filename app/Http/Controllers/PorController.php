<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Receiving;
use App\Models\ReceivingItem;
use App\Models\Item;
use App\Models\Stock;
use App\Models\Price;

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

          Price::create(
              [
                'price'=> $items['price'][$i],
                'sell_cost' => 'cost',
                'item_id' => $items['id'][$i],
                'user_id' => \Auth::user()->id,
                'remarks' => 'by Receiving Id:'. $receiving->id
              ]);

          $this->increaseStock($item->id,$items['quantity'][$i],'by Receiving '. $receiving->id,'in' );
        }
        $receiving->amount = $total;
        $receiving->save();
        return redirect('por');
    }

    public function increaseStock($item_id, $quantity, $remarks,$in_out)
    {
          $stock = new Stock;
          $stock->item_id = $item_id;
          $stock->user_id = \Auth::user()->id;
          $stock->quantity = $in_out == 'in' ? $quantity: $quantity * -1;
          $stock->in_out = $in_out ;
          $stock->remarks = $remarks ? $remarks: 'Manual Edit of Quantity';
          $stock->save();
    }

}
