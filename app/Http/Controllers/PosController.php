<?php

namespace yapos2\Http\Controllers;

use Illuminate\Http\Request;
use yapos2\Models\SaleItem;
use yapos2\Models\Sale;
use yapos2\Models\Item;
use yapos2\Models\Customer;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('pos.index',compact('customers'));
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

        $sale = new Sale();
        $sale->amount = 0;
        $sale->customer_id = $items['customer'];

        $sale->save();
        $total = 0;

    		for($i=0; $i < $count=count($items['id']); $i++){
    			$saleitem = new SaleItem();
    			$saleitem->item_id = $items['id'][$i];
    			$saleitem->sale_id = $sale->id;
          $saleitem->quantity = $items['quantity'][$i];
          $saleitem->price = $items['price'][$i];
          $saleitem->subtotal = $items['price'][$i] * $items['quantity'][$i];
          $total += $saleitem->subtotal;
        	$saleitem->save();

          $item = Item::find($items['id'][$i]);
          $item->selling_price = $items['price'][$i];
          $item->quantity = $item->quantity - $items['quantity'][$i];
          $item->save();
    		}
        $sale->amount = $total;
        $sale->save();
        return redirect('pos');
    }
}
