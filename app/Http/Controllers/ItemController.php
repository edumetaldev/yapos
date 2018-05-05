<?php

namespace yapos2\Http\Controllers;

use Illuminate\Http\Request;
use yapos2\Models\Item;
use yapos2\Models\Stock;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        return view('items.index',compact('items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $item = Item::find($id);
      return view('items.show',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item();
        return view('items.create',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     * @param in $id
     * @return \Illuminate\Http\Response
     */
    public function copy($id)
    {
        $item = Item::findOrFail($id);
        return view('items.create',compact('item'));
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
           'upc_ean_isbn' => 'required|unique:items,upc_ean_isbn',
           'name' => 'required'
        ]);
        $request->name = strtoupper($request->name);
        $input = $request->all();

          \DB::beginTransaction();
          $item = Item::create($input);

          $this->saveStock($item, $request->quantity, $request->remarks,true);

          \DB::commit();

        return redirect('/items');
    }

    public function saveStock(Item $item, $quantity, $remarks,$initial = false)
    {
        if( ($quantity - $item->quantity) != 0 || $initial){
          $stock = new Stock;
          $stock->item_id = $item->id;
          $stock->user_id = \Auth::user()->id;
          $stock->quantity = $initial ? $quantity: $quantity - $item->quantity ;
          $stock->in_out = $stock->quantity > 0 ? 'in': 'out';
          $stock->remarks = $remarks ? $remarks: 'Manual Edit of Quantity';
          $stock->save();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = Item::findOrFail($id);

      if (empty($item)) {
          return redirect(route('items.index'));
      }

      return view('items.edit')->with('item', $item);
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
         'upc_ean_isbn' => 'required',
         'name' => 'required'
      ]);

      $item = Item::findOrFail($id);

      if (empty($item)) {

          return redirect(route('items.index'));
      }
      $this->saveStock($item, $request->quantity, $request->remarks);
      $item->update($request->all(), ['id' => $id]);


      return redirect(route('items.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $item = Item::findOrFail($id);

      if (empty($item)) {
        return redirect(route('items.index'));
      }

      $item->delete($id);

      return redirect(route('items.index'));
    }
}
