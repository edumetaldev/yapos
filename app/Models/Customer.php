<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
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
}
