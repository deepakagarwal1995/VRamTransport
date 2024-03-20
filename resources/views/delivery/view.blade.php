@extends('layouts.adminApp')

@section('content')
    <div class="w-full px-2 py-6 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0">{{ $title ?? '' }}</h6>
                            </div>

                        </div>
                    </div>
                    @include('inc.search')
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">

                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Sr No.</th>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Order No.</th>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Order Details</th>
                                            <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Vehicle Weight</th>

                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Delivered Weight</th>
                                            <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Other Details</th>

                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $currentPage = $items->currentPage() - 1;
                                        $currentPage = $currentPage * $items->perPage();
                                    @endphp

                                    @foreach ($items as $order)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-tight">
                                                    {{ $loop->index + $currentPage + 1 }}</p>
                                            </td>
                                            <td
                                                class="p-2 text-sm leading-normal   align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs   leading-tight">{{ $order->orderNo }}
                                                </p>

                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs   leading-default"
                                                    style="    font-size: 12px;color: #5d6676;">
                                                    <b>Date</b> :
                                                    {{ date('d/m/Y', strtotime($order->orderDetails->orderDate)) }}<br>
                                                    <b>Party</b> : {{ $order->orderDetails->deliveryparty }}<br>
                                                    <b>Destination</b> :
                                                    {{ $order->orderDetails->deliveryDest1 }},{{ $order->orderDetails->deliveryDest2 }}<br>
                                                    <b>Order Weight</b> : {{ $order->orderDetails->orderWt }}
                                                </p>

                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs  leading-default"
                                                    style="    font-size: 12px;color: #5d6676;">
                                                    <b>Empty Vehicle Weight</b> : {{ $order->emptyVehicleWt }}<br>
                                                    <b>Gross Loaded Weight</b> : {{ $order->grossLoadedVehicleWt }}<br>
                                                    <b>Net Vehicle Weight</b> : {{ $order->netVehicleWt }}
                                                </p>

                                            </td>
                                             <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs  leading-default"
                                                    style="    font-size: 12px;color: #5d6676;">
                                                    <b>Destination1 loaded Wt</b> : {{ $order->destination1loadedWt }}<br>
                                                    <b>Destination1 empty Wt</b> : {{ $order->destination1emptyWt }}<br>
                                                    <b>Destination2 loaded Wt</b> : {{ $order->destination2loadedWt }}<br>
                                                    <b>Destination2 empty Wt</b> : {{ $order->destination2emptyWt }}
                                                </p>

                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-default"
                                                    style="    font-size: 12px;color: #5d6676;">

                                                    <b>GR No</b> : {{ $order->grNo }}<br>
                                                    <b>eway Bill</b> : {{ $order->ewayBill }}<br>
                                                   <b>Invoice No</b> : {{ $order->InvoiceNo }}<br>
                                                   <b>GR Date</b> :
                                                  @if(!empty($order->grDate))
                                                  {{ date('d/m/Y', strtotime($order->grDate)) }}
                                                  @endif
                                                </p>

                                            </td>

                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <a href="{{ route('delivery.edit', $order->id) }}"
                                                    class="btn btn-edit  uppercase">Edit</a>
                                                <form action="{{ route('delivery.destroy', $order->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are You Sure You Want to Delete !!')"
                                                        class="btn btn-delete my-2 uppercase">
                                                        Delete
                                                    </button><br>
                                                    <a href="{{ route('delivery.view', $order->id) }}"
                                                        class="p-2 w-fit text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">View Full   Details</a>
                                                </form>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    @include('inc.pagination')
                </div>
            </div>
        </div>
    @endsection
