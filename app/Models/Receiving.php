<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class Receiving extends Model
{
    protected $filliable = ['amount'];

    /**
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       **/
      public function items()
      {
          return $this->hasMany(\yapos2\Models\ReceivingItem::class);
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
          return $this->belongsTo(\yapos2\Models\Supplier::class);
      }
}
