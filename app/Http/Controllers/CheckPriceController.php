<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckPriceController extends Controller
{
    public function index()
    {
      return view('checkprice.index');
    }
}
