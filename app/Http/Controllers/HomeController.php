<?php

namespace yapos2\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topcustomers = $this->GetTopCustomers();
        $topitems = $this->GetTopItemsSellers();
        return view('home.index', compact('topcustomers','topitems'));
    }

    public function GetTopCustomers()
    {
      return \DB::table('sales')
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->select(\DB::raw('customers.name as name , sum(sales.amount) as amount'))
            ->groupBy('customers.name')
            ->limit(10)
            ->orderByRaw('sum(sales.amount) desc')
            ->get();

    }

    public function GetTopItemsSellers()
    {
      return \DB::table('saleitems')
            ->join('items', 'saleitems.item_id', '=', 'items.id')
            ->select(\DB::raw('items.name as name , sum(saleitems.quantity) as quantity'))
            ->groupBy('items.name')
            ->limit(10)
            ->orderByRaw('sum(saleitems.quantity)  desc')
            ->get();
    }
}
