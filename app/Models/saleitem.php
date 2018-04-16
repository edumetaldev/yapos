<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $table = "saleitems";

    protected $filliable = ['sale_id','item_id','quantity','price','subtotal'];

    /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   **/
    public function item()
    {
        return $this->belongsTo(\yapos2\Models\Item::class);
    }

}
