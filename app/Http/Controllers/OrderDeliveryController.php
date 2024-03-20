<?php

namespace App\Http\Controllers;

use App\Models\OrderDelivery;
use App\Models\OrderDetail;
use App\Models\OrderTransport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class OrderDeliveryController extends Controller
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
            $rows = OrderDelivery::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new OrderDelivery())->getTable());
        $allOrdersColumns = Schema::getColumnListing((new OrderDetail())->getTable());


        $items = OrderDelivery::with('orderDetails')
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
        $title = 'View Order Delivery Details';
        return view('delivery.view', compact('items', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $ordertransport = OrderTransport::findOrFail($id);
        $title = 'Add Delivery Details';

        return view('delivery.create', compact('ordertransport', 'title'));
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
            'emptyVehicleWt' => 'required',
            'grossLoadedVehicleWt' => 'required',
            'netVehicleWt' => 'required',
            'destination1loadedWt' => 'required',
            'destination1emptyWt' => 'required'
        ]);

        OrderDelivery::create($request->post());

        return redirect()->route('delivery.index')->with('success', 'delivery details has been successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDelivery  $orderDelivery
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDelivery $orderDelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDelivery  $orderDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $orderDelivery = OrderDelivery::find($id);
        $title = 'Edit Delivery Details';

        return view('delivery.edit', compact('orderDelivery', 'title'));
    }
    public function view(Request $request, $id)
    {
        $orderDelivery = OrderDelivery::find($id);
        $title = 'Full Order Details';

        return view('delivery.detail', compact('orderDelivery', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDelivery  $orderDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderTransport = OrderDelivery::find($id);

        $request->validate(['orderNo' => 'required',
            'emptyVehicleWt' => 'required',
            'grossLoadedVehicleWt' => 'required',
            'netVehicleWt' => 'required',
            'destination1loadedWt' => 'required',
            'destination1emptyWt' => 'required'
        ]);
        $orderTransport->update($request->post());

        return redirect()->route('delivery.index')->with('success', 'Delivery Details has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDelivery  $orderDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $orderDetail = OrderDelivery::find($id);
        $orderDetail->delete();
        return redirect()->route('delivery.index')->with('success', 'Delivery has been successfully deleted.');
    }
}
