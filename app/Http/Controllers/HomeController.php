<?php

namespace App\Http\Controllers;

use App\Models\OrderDelivery;
use App\Models\OrderDetail;
use App\Models\OrderTransport;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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
    public function report()
    {

        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = OrderDelivery::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new OrderDelivery())->getTable());

        $condition = array();
        $gr = request()->gr ?? '';
        $dates = request()->
        dates ?? '';
        $order_no = request()->
        order_no ?? '';
        $transporter = request()->
        transporter ?? '';

        if (request()->gr != '') {
            $itm = ['order_deliveries.grNo', '=', request()->gr];
            array_push($condition, $itm);
        }
        if (request()->order_no != '') {
            $itm = ['order_details.orderNo', '=', request()->order_no];
            array_push($condition, $itm);
        }
        if(request()->transporter!=''){
        $itm = ['order_transports.name', '=', request()->transporter];
        array_push($condition, $itm);
        }

        $items = OrderDelivery::with('orderDetails','OrderTransport')->where($condition)->latest()
        ->paginate($rows);



         $tranporters = OrderTransport::select('name')->groupBy('name')
            ->get();
        $title = 'Report';
        return view('report.report', compact('tranporters', 'title', 'items'));
    }
}
