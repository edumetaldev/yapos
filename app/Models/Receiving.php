<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receiving extends Model
{
    protected $filliable = ['amount'];

    /**
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       **/
      public function items()
      {
          return $this->hasMany(\App\Models\ReceivingItem::class);
      }

      public function getEmitDateAttribute()
      {
        return  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at )->format('d/m/Y');
      }

      /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
      public function supplier()
      {
          return $this->belongsTo(\App\Models\Supplier::class);
      }

      public function invoices()
      {
         return $this->morphMany(\App\Models\Invoice::class, 'ordertable');
      }
}
