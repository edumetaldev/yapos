<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $filliable = ['amount'];


/**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   **/
  public function items()
  {
      return $this->hasMany(\App\Models\SaleItem::class);
  }

  /**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 **/
  public function customer()
  {
      return $this->belongsTo(\App\Models\Customer::class);
  }

  public function getEmitDateAttribute()
  {
    return  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at )->format('d/m/Y');
  }

  public function invoices()
  {
     return $this->morphMany(\App\Models\Invoice::class, 'ordertable');
  }
}
