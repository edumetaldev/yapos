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
        $itemstatus[] = (object) ['title' => __('Items') .' '. __('Without Selling Price'), 'value' => $this->GetTotalItemsWithoutSellingPrice() ];
        $itemstatus[] = (object) ['title' => __('Items') .' '. __('Without Cost Price'), 'value' => $this->GetTotalItemsWithoutCostPrice() ];
        $itemstatus[] = (object) ['title' => __('Items') .' '. __('Reorder Level Down'), 'value' => $this->GetTotalItemsReorderLevelDown() ];
        $itemstatus[] = (object) ['title' => __('Items') .' '. __('Reorder Level Up'), 'value' => $this->GetTotalItemsNotReorderLevelDown() ];
        $lastsellings = $this->GetlastItemsSelling();
        $lastreceivings = $this->GetlastItemsReceiving();
        $lastitemsupdates = $this->GetlastItemsUpdated();
        return view('home.index', compact('topcustomers','topitems','itemstatus','lastsellings','lastreceivings','lastitemsupdates'));
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

    public function GetTotalItemsWithoutSellingPrice()
    {
      return \DB::table('items')
            ->select(\DB::raw('count(*) as total'))
            ->where('selling_price','=',0)
            ->value('total');
    }

    public function GetTotalItemsWithoutCostPrice()
    {
      return \DB::table('items')
            ->select(\DB::raw('count(*) as total'))
            ->where('cost_price','=',0)
            ->value('total');
    }

    public function GetTotalItemsReorderLevelDown()
    {
      return \DB::table('items')
            ->select(\DB::raw('sum(1) as total'))
            ->whereColumn('items.reorder_level','>=','items.quantity')
            ->where('items.is_stockeable','=',1)
            ->value('total');

    }

    public function GetTotalItemsNotReorderLevelDown()
    {
      return \DB::table('items')
            ->select(\DB::raw('sum(1) as total'))
            ->whereColumn('items.reorder_level','<','items.quantity')
            ->where('items.is_stockeable','=',1)
            ->value('total');

    }

    public function GetlastItemsSelling()
    {
      return \DB::table('saleitems')
            ->join('items', 'saleitems.item_id', '=', 'items.id')
            ->select('items.name', 'saleitems.quantity','items.quantity as stock')
            ->limit(10)
            ->orderByRaw('saleitems.created_at desc')
            ->get();

    }

    public function GetlastItemsReceiving()
    {
      return \DB::table('receivingitems')
            ->join('items', 'receivingitems.item_id', '=', 'items.id')
            ->select('items.name', 'receivingitems.quantity','items.quantity as stock')
            ->limit(10)
            ->orderByRaw('receivingitems.created_at desc')
            ->get();

    }

    public function GetlastItemsUpdated()
    {
      return \DB::table('items')
            ->select('upc_ean_isbn','name', 'cost_price', 'selling_price', 'quantity', 'updated_at' )
            ->limit(10)
            ->orderByRaw('items.created_at desc')
            ->get();
    }
}
