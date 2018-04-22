<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivingItem extends Model
{
    protected $table = 'receivingitems';

    /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   **/
    public function item()
    {
        return $this->belongsTo(\yapos2\Models\Item::class);
    }

}
