<?php

namespace yapos2\Http\Controllers\Api;

use Illuminate\Http\Request;
use yapos2\Http\Controllers\Controller;
use yapos2\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        return Customer::ofSearch($query)->select(['id','name','email','account'])->get();
    }

}
