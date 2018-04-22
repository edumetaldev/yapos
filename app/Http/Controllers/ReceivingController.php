<?php

namespace yapos2\Http\Controllers;

use yapos2\Models\Receiving;
use Illuminate\Http\Request;

class ReceivingController extends Controller
{
    protected $model;

    public function __construct(Receiving $receiving)
    {
      $this->model = $receiving;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = $this->model::all();
        return view('receivings.index')->with('receivings',$rows);
    }

    /**
     * Display the specified resource.
     *
     * @param  \yapos2\Receiving  $receiving
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $receiving = $this->model::find($id);
      return view('receivings.show',compact('receiving'));
    }

}
