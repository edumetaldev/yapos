<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivingItem extends Model
{
    protected $table = 'receivingitems';

    /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   **/
    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class);
    }

}
