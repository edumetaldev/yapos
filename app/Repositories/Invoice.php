<?php
namespace yapos2\Repositories;

use yapos2\Models\Invoice as InvoiceModel;
use yapos2\Models\InvoiceLine;
use yapos2\Models\Sale;
use yapos2\Models\Receiving;

Class Invoice
{
  public $invoice;
  public $lines;

  function __construct()
  {
    $this->invoice = new InvoiceModel();
  }

  function setInvoiceData($to_name,$free_text,$taxes_1,$taxes_2)
  {
    $this->invoice->to_name = $to_name;
    $this->invoice->free_text = $free_text;
    $this->invoice->taxes_1 = $taxes_1;
    $this->invoice->taxes_2 = $taxes_2;
  }

  function setOrder($id,$order_type)
  {
     // TODO: cargar lineas y cabecera con datos de sales o receivings
     if ($order_type == "S")
     {
        $this->invoice->type_id = 1;
        $this->invoice->number = $this->getNextNumber(1);
        $sale = Sale::find($id);
        $this->invoice->ordertable_id = $sale->id;
        $this->invoice->ordertable_type = \yapos2\Models\Invoice::class;
        foreach ($sale->items->all() as $line) {
          $this->addLine( $line->quantity, $line->price, $line->item->name, $line->item_id);
        }
        $this->invoice->total =  $this->invoice->amount + $this->invoice->taxes_1 + $this->invoice->taxes_2;
     }

     if ($order_type == "R")
     {
        $this->invoice->type_id = 2;
        $this->invoice->number = $this->getNextNumber(2);
        $sale = Receiving::find($id);
        $this->invoice->ordertable_id = $sale->id;
        $this->invoice->ordertable_type = $order_type;
        foreach ($sale->items->all() as $line) {
          $this->addLine( $line->quantity, $line->price, $line->item->name, $line->item_id);
        }
        $this->invoice->total =  $this->invoice->amount + $this->invoice->taxes_1 + $this->invoice->taxes_2;
     }

  }

  function addLine($quantity,$price,$line_text,$item_id)
  {
    $subtotal_line= $quantity * $price;
    $this->lines[] = new InvoiceLine(
                [ 'quantity' => $quantity,
                  'price' => $price ? $price:0,
                  'line_text' => $line_text,
                  'item_id' => $item_id,
                  'subtotal' => $subtotal_line
                ]);
    $this->invoice->amount += $subtotal_line;
  }

  function make()
  {
    if(!empty($this->lines))
    {
        $this->invoice->save();
        $this->invoice->lines()->saveMany($this->lines);
    }
  }

  function getNextNumber($type_id)
  {
    $number = \DB::table('invoices')->where('type_id',$type_id)->max('number');
    $number++;
    return $number;
  }
}
