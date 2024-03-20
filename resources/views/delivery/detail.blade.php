@extends('layouts.adminApp')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 mt-6 md:w-12/12 md:flex-none">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                                <h6 class="mb-0">{{ $title ?? '' }}</h6>
                            </div>
                            <div class="flex-auto p-4 pt-6">
                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                    <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                                        <div class="flex flex-col">
                                            <h6 class="mb-4 leading-normal text-sm">Order Details</h6>
                                            <span class="mb-2 leading-tight text-xs">Order No.: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderDetails->orderNo}}</span></span>
                                            <span class="mb-2 leading-tight text-xs">Order Date: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{ date('d/m/Y', strtotime($orderDelivery->orderDetails->orderDate)) }}</span></span>
                                            <span class="mb-2 leading-tight text-xs">Party: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderDetails->deliveryparty}}</span></span>

                                           <span class="mb-2 leading-tight text-xs">Destinations: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderDetails->deliveryDest1}},{{$orderDelivery->orderDetails->deliveryDest2}}</span></span>
                                            <span class="mb-2 leading-tight text-xs">Weight: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderDetails->orderWt}}</span></span>

                                        </div>
                                    </li>
                                    <li class="relative flex p-6 mt-4 mb-2 border-0 rounded-xl bg-gray-50">
                                        <div class="flex flex-col">
                                            <h6 class="mb-4 leading-normal text-sm">Transport Details</h6>
                                            <span class="mb-2 leading-tight text-xs">Transporter Name: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderTransport->name}}</span></span>
                                            <span class="mb-2 leading-tight text-xs">Vehicle No: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{ date('d/m/Y', strtotime($orderDelivery->orderTransport->vehicleNo)) }}</span></span>
                                            <span class="mb-2 leading-tight text-xs">Vehicle Owner: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderTransport->vehicleOwner}}</span></span>

                                           <span class="mb-2 leading-tight text-xs">Driver Name: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderTransport->vehicleDriver}}</span></span>
                                            <span class="mb-2 leading-tight text-xs">Driver Mob: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderTransport->driverMob}}</span></span>
                                                    <span class="mb-2 leading-tight text-xs">Additional Charges: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->orderTransport->additionalCharges}}</span></span>
                                        </div>

                                    </li>
                                    <li
                                        class="relative flex p-6 mt-4 mb-2 border-0 rounded-b-inherit rounded-xl bg-gray-50">
                                        <div class="flex flex-col">
                                            <h6 class="mb-4 leading-normal text-sm">Delivery Details</h6>
                                            <span class="mb-2 leading-tight text-xs">Empty Vehicle Weight: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->emptyVehicleWt}}</span></span>
                                            <span class="mb-2 leading-tight text-xs">Gross Loaded Weight: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{ date('d/m/Y', strtotime($orderDelivery->grossLoadedVehicleWt)) }}</span></span>
                                            <span class="mb-2 leading-tight text-xs">Net Vehicle Weight: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->netVehicleWt}}</span></span>

                                           <span class="mb-2 leading-tight text-xs">loaded Wt at {{$orderDelivery->orderDetails->deliveryDest1}}: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->destination1loadedWt}}</span></span>
                                                    <span class="mb-2 leading-tight text-xs">Empty Wt at {{$orderDelivery->orderDetails->deliveryDest1}}: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->destination1emptyWt}}</span></span>
                                           @if (!empty($orderDelivery->orderDetails->deliveryDest2))


                                           <span class="mb-2 leading-tight text-xs">loaded Wt at {{$orderDelivery->orderDetails->deliveryDest2}}: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->destination2loadedWt}}</span></span>
                                                    <span class="mb-2 leading-tight text-xs">Empty Wt at {{$orderDelivery->orderDetails->deliveryDest2}}: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->destination2emptyWt}}</span></span>

                                              @endif
                                              <span class="mb-2 leading-tight text-xs">GR No: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->grNo}}</span></span>
                                                    <span class="mb-2 leading-tight text-xs">eway Bill: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->ewayBill}}</span></span>
                                                    <span class="mb-2 leading-tight text-xs">Invoice No: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">{{$orderDelivery->InvoiceNo}}</span></span>
                                                    <span class="mb-2 leading-tight text-xs">GR Date: <span
                                                    class="font-semibold text-slate-700 sm:ml-2">
                                                    @if(!empty($orderDelivery->grDate))
                                                  {{ date('d/m/Y', strtotime($orderDelivery->grDate)) }}
                                                  @endif
                                                </span></span>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


  </div> </div>
                </div>
            </div>
        @endsection
