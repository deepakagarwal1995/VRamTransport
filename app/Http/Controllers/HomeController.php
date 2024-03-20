<?php

namespace App\Http\Controllers;

use App\Models\OrderDelivery;
use App\Models\OrderDetail;
use App\Models\OrderTransport;
use DB;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $OrderDelivery = OrderDelivery::count();
        $OrderDetail = OrderDetail::count();
        $OrderTransport = OrderTransport::count();
        $orderWt = OrderDetail::select(DB::raw('SUM(orderWt) As wt'))->first();
        $sale = OrderDetail::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(orderWt) As sale'))
        ->where('created_at', '>', now()->subDays(30)->endOfDay())
            ->groupBy('date')
            ->get();
        $title = 'Dashboard';
        return view('home', compact('OrderDelivery', 'OrderDetail', 'OrderTransport', 'orderWt', 'sale', 'title'));

    }
}
