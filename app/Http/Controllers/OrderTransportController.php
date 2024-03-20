<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderTransport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class OrderTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = OrderTransport::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new OrderTransport())->getTable());
        $allOrdersColumns = Schema::getColumnListing((new OrderDetail())->getTable());


        $items = OrderTransport::select('order_transports.*', 'order_deliveries.orderNo as tno')->leftJoin('order_deliveries', 'order_deliveries.orderNo', '=', 'order_transports.orderNo')->with('orderDetails')
        ->when(isset($keyword), function ($query) use ($keyword, $allColumns, $allOrdersColumns) {
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

            // searching from orderDetails
            $query->orWhereHas('orderDetails', function ($query) use ($keyword, $allOrdersColumns) {
                $query->where(function ($query) use ($keyword, $allOrdersColumns) {
                    foreach ($allOrdersColumns as $column) {
                        $query->orWhere($column, 'LIKE', "%$keyword%");
                    }
                });
            });
        })
            ->latest()
            ->paginate($rows);

        // $payments = PartyPayment::all();
        $title = 'View Order Transport';
        return view('transport.view', compact('items', 'title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {

        $orderDetail = OrderDetail::findOrFail($id);
        $title = 'Add Transporter Details';

        return view('transport.create', compact('orderDetail', 'title'));
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
            'orderNo' => 'required',
            'name' => 'required',
            'vehicleNo' => 'required',
            'vehicleDriver' => 'required',
            'driverMob' => 'required|numeric|digits:10'
        ]);

        OrderTransport::create($request->post());
        return redirect()->route('transport.index')->with('success', 'Transport Details has been successfully created.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderTransport  $orderTransport
     * @return \Illuminate\Http\Response
     */
    public function show(OrderTransport $orderTransport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderTransport  $orderTransport
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $orderTransport = OrderTransport::find($id);
        $title = 'Edit Transporter Details';

        return view('transport.edit', compact('orderTransport', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderTransport  $orderTransport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderTransport = OrderTransport::find($id);

        $request->validate([
            'orderNo' => 'required',
            'name' => 'required',
            'vehicleNo' => 'required',
            'vehicleDriver' => 'required',
            'driverMob' => 'required|numeric|digits:10'
        ]);
        $orderTransport->update($request->post());

        return redirect()->route('transport.index')->with('success', 'Transport Details has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderTransport  $orderTransport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $orderDetail = OrderTransport::find($id);
        $orderDetail->delete();
        return redirect()->route('transport.index')->with('success', 'transport details has been successfully deleted.');
    }
}
