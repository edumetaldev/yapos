<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
<<<<<<< HEAD
  protected $fillable = ['name','email', 'account','comment'];

  public function scopeOfSearch($query,$string)
  {
    if (trim($string) != ''){
      $query->orWhere('name','LIKE',"%".$string."%");
      $query->orWhere('email','LIKE',"%".$string."%");
      $query->orWhere('account','LIKE',"%".$string."%");
    }
    return $query;
  }
=======
    //
>>>>>>> bcd6b436e0f2d22660df6ec4ec29ac789c85c477
}
