<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $table = "saleitems";

    protected $fillable = ['sale_id','item_id','quantity','cost_price','price','subtotal'];

    /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   **/
    public function item()
    {
        return $this->belongsTo(\App\Models\Item::class);
    }

    public function getSubTotalCostAttribute()
    {
      return  $this->cost_price * $this->quantity;
    }

}
