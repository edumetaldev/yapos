<?php

namespace yapos2\Http\Controllers;

use Illuminate\Http\Request;
use yapos2\Models\Sale;
use yapos2\Repositories\Invoice;

class SaleController extends Controller
{

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::with('customer')->orderByRaw('id desc')->paginate(25);
        return view('sales.index',compact('sales'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $sale = Sale::with('invoices')->find($id);
      return view('sales.show',compact('sale'));
    }

    public function makeInvoice($order_id)
    {
      $this->invoice->setInvoiceData("eduardo","texto libre",1,1);
      $this->invoice->setOrder( $order_id ,'S' );
      $this->invoice->make();
    }


}
