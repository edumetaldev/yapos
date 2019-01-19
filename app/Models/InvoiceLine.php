<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{

  protected $fillable = ['invoice_id','item_id','quantity','line_text','price','subtotal'];

  public function invoices()
  {
     return $this->belongsTo('App\Models\Invoice');
  }
}
