<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable= ['name','email','company_name','phone_number','avatar','address','city','state','zip','comments','account'];

}
