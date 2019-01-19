<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $filliable = ['amount'];


/**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   **/
  public function items()
  {
      return $this->hasMany(\yapos2\Models\SaleItem::class);
  }

  /**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 **/
  public function customer()
  {
      return $this->belongsTo(\yapos2\Models\Customer::class);
  }

  public function getEmitDateAttribute()
  {
    return  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at )->format('d/m/Y');
  }

  public function invoices()
  {
     return $this->morphMany(\yapos2\Models\Invoice::class, 'ordertable');
  }
}
