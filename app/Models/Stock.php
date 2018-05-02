<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   **/
    public function item()
    {
        return $this->belongsTo(\yapos2\Models\Item::class);
    }
    
    public function getEmitDateAttribute()
    {
      return  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at )->format('d/m/Y');
    }
}
