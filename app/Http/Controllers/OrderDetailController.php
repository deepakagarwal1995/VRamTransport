<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;


class OrderDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Query Parameters */
        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = OrderDetail::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new OrderDetail())->getTable());

        $items = OrderDetail::select('order_details.*', 'order_transports.orderNo as tno')->leftJoin('order_transports', 'order_transports.orderNo', '=', 'order_details.orderNo')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        $column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
            });
        })
            ->latest()
            ->paginate($rows);
            $title = 'View Order Details';
        return view('order.view', compact('items', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Order ';
        return view('order.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'orderNo' => 'required|unique:order_details,orderNo',
            'orderDate' => 'required',
            'deliveryparty' => 'required',
            'deliveryDest1' => 'required',
            'orderWt' => 'required'
        ]);

        OrderDetail::create($request->post());

        return redirect()->route('order.index')->with('success', 'Order has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $orderDetail = OrderDetail::find($id);
        $title = 'Edit Order';

        return view('order.edit', compact('orderDetail', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderDetail = OrderDetail::find($id);

        $request->validate([
            'orderNo' =>
            'required|unique:order_details,orderNo,' .
            $orderDetail->id,
            'orderDate' => 'required',
            'deliveryparty' => 'required',
            'deliveryDest1' => 'required',
            'orderWt' => 'required'
        ]);
         $orderDetail->update($request->post());

        return redirect()->route('order.index')->with('success', 'Order has been successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $orderDetail = OrderDetail::find($id);
        $orderDetail->delete();
        return redirect()->route('order.index')->with('success', 'Order has been successfully deleted.');

    }
}
