<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  public function lines()
  {
     return $this->hasMany(\yapos2\Models\InvoiceLine::class);
  }

  public function getEmitDateAttribute()
  {
    return  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at )->format('d/m/Y');
  }
}
