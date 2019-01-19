<?php

namespace yapos2\Http\Controllers;

use yapos2\Models\Receiving;
use Illuminate\Http\Request;
use yapos2\Repositories\Invoice;

class ReceivingController extends Controller
{
    protected $model;

    public function __construct(Receiving $receiving, Invoice $invoice)
    {
      $this->model = $receiving;
      $this->invoice = $invoice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = $this->model::with('supplier')->orderByRaw('id desc')->paginate(25);
        return view('receivings.index')->with('receivings',$rows);
    }

    /**
     * Display the specified resource.
     *
     * @param  \yapos2\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $receiving = $this->model::find($id);
      return view('receivings.show',compact('receiving'));
    }

    public function makeInvoice($order_id)
    {
      $this->invoice->setInvoiceData("eduardo","texto libre",1,1);
      $this->invoice->setOrder( $order_id ,'R' );
      $this->invoice->make();
    }
}
