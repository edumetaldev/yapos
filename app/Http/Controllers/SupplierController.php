<?php

namespace yapos2\Http\Controllers;

use yapos2\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    protected $model;

    public function __construct(Supplier $supplier)
    {
      $this->model = $supplier;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = $this->model::all();
        return view('suppliers.index')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $item =  $this->model::create($input);
        return redirect()->route('suppliers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \yapos2\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row =  $this->model->findOrFail($id);

        if (empty($row)) {
            return redirect(route('suppliers.index'));
        }

        return view('suppliers.edit')->with('supplier', $row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \yapos2\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = $this->model::findOrFail($id);

        if (empty($row)) {

            return redirect(route('suppliers.index'));
        }

        $row = $row->update($request->all(), ['id' => $id]);

        return redirect(route('suppliers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \yapos2\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = $this->model::findOrFail($id);

        if (empty($row)) {
          return redirect(route('suppliers.index'));
        }

        $row->delete($id);

        return redirect(route('suppliers.index'));
    }
}
