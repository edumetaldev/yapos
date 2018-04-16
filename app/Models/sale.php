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
}
