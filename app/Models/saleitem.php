<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class saleitem extends Model
{
    protected $filliable = ['sale_id','item_id','quantity','price','subtotal'];
}
