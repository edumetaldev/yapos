<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $resource = 'customers';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customero = Customer::all();
        return view($this->resource.'.index')->with(['customers'=>$customero]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $row = new Customer();
      return view($this->resource.'.create')->with($this->resource, $row);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all();
      $item = Customer::create($input);
      return redirect(route($this->resource.'.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $row = Customer::findOrFail($id);

      if (empty($row)) {
          return redirect(route($this->resource.'.index'));
      }

      return view($this->resource.'.edit')->with('customer', $row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
      $row = Customer::findOrFail($id);

      if (empty($row)) {

          return redirect(route($this->resource.'.index'));
      }

      $row = $row->update($request->all(), ['id' => $id]);

      return redirect(route($this->resource.'.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $row = Customer::findOrFail($id);

      if (empty($row)) {
        return redirect(route($this->resource.'.index'));
      }

      $row->delete($id);

      return redirect(route($this->resource.'.index'));
    }
}
