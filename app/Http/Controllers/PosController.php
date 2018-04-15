<?php

namespace yapos2\Http\Controllers;

use Illuminate\Http\Request;
use yapos2\Models\saleitem;
use yapos2\Models\sale;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pos.index');
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
        $items = $request->input();

        $sale = new sale();
        $sale->amount = 0;
        $sale->save();
        $total = 0;
    		for($i=0; $i < count($items)-1; $i++){
    			$saleitem = new saleitem();
    			$saleitem->item_id = $items['id'][$i];
    			$saleitem->sale_id = $sale->id;
          $saleitem->quantity = $items['quantity'][$i];
          $saleitem->price = $items['price'][$i];
          $saleitem->subtotal = $items['price'][$i] * $items['quantity'][$i];
          $total += $saleitem->subtotal;
        	$saleitem->save();
    		}
        $sale->amount = $total;
        $sale->save();
        return redirect('pos');
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
