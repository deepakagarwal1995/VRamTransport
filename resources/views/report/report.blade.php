@extends('layouts.adminApp')

@section('content')
    <style>
        @media (min-width: 1200px) {}

        .xl\:w-1\/5 {
            width: 20%;
        }
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="w-full px-2 py-6 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">

                <div
                    class="relative shadow-soft-xl rounded-2xl flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid  bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0">{{ $title ?? '' }}</h6>
                            </div>

                        </div>
                    </div>
                    <form action="?" method="GET">
                        <div class="flex flex-wrap mx-3">

                            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/5">
                                <div class="relative flex flex-col min-w-0 break-words bg-white  bg-clip-border">
                                    <div class="flex-auto p-1">
                                        <label class="text-xs">Gr Number</label>
                                        <div
                                            class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                                            <span
                                                class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                                <i class="fas fa-search" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" id="default-search" name="gr"
                                                value="{{ $_GET['gr'] ?? '' }}"
                                                class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                placeholder="Search By Gr Number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/5">
                                <div class="relative flex flex-col min-w-0 break-words bg-white  bg-clip-border">
                                    <div class="flex-auto p-1">
                                        <label class="text-xs">Order Number</label>
                                        <div
                                            class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                                            <span
                                                class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                                <i class="fas fa-search" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" id="default-search" name="order_no"
                                                value="{{ $_GET['order_no'] ?? '' }}"
                                                class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                placeholder="Search By Order Number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/5">
                                <div class="relative flex flex-col min-w-0 break-words bg-white  bg-clip-border">
                                    <div class="flex-auto p-1">
                                        <label class="text-xs">Order date</label>
                                        <div
                                            class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                                            <span
                                                class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                                <i class="fas fa-calendar" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" id="default-search" name="dates"
                                                value="{{ $_GET['dates'] ?? '' }}"
                                                class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                placeholder="Search By date">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/5">
                                <div class="relative flex flex-col min-w-0 break-words bg-white  bg-clip-border">
                                    <div class="flex-auto p-1">
                                        <label class="text-xs">Transporter</label>
                                        <div
                                            class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                                            <span
                                                class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                                <i class="fas fa-truck" aria-hidden="true"></i>
                                            </span>
                                            <select id="default-search" name="transporter"
                                                class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                                                <option value="{{ $_GET['transporter'] ?? '' }}">
                                                    {{ $_GET['transporter'] ?? 'Select Transporter' }}</option>
                                                @foreach ($tranporters as $transporter)
                                                    <option value="{{ $transporter->name }}">{{ $transporter->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/5">
                                <div class="relative flex flex-col min-w-0 break-words bg-white  bg-clip-border">
                                    <label class="text-xs">Filter</label>
                                    <button type="submit"
                                        class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle px-2 py-3 my-0 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102 ">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="flex-auto px-0 pt-5 pb-2">
                        <div class="p-0 mt-3 overflow-x-auto">

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
                                            Transporter Details</th>
                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Driver Details</th>

                                        <th
                                            class="px-2 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-500 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $tw =$tac =$dac = 0;
                                        $currentPage = $items->currentPage() - 1;
                                        $currentPage = $currentPage * $items->perPage();
                                    @endphp

                                    @foreach ($items as $order)

                                    @php
                                        $tw += $order->orderDetails->orderWt;
                                        $tac += $order->OrderTransport->additionalCharges;
                                        $dac += $order->additionalCharges;
                                    @endphp
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
                                                    <b>Transporter Name</b> : {{ $order->name }}<br>
                                                    <b>Vehicle No</b> : {{ $order->vehicleNo }}<br>
                                                    <b>Vehicle Owner</b> : {{ $order->vehicleOwner }}
                                                </p>

                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-xs font-semibold leading-default"
                                                    style="    font-size: 12px;color: #5d6676;">

                                                    <b>Driver Name</b> : {{ $order->vehicleDriver }}<br>
                                                    <b>Driver Mob</b> : {{ $order->driverMob }}<br>
                                                    <b>Additional Charges</b> : Rs {{ $order->additionalCharges }} /-
                                                </p>

                                            </td>

                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">

                                                <a href="{{ route('delivery.view', $order->id) }}"
                                                    class="p-2 w-fit text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">View
                                                    Details</a>


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

        <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
            <div
                class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                    <div class="flex flex-wrap -mx-3">
                        <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                            <h6 class="mb-0">Report Data</h6>
                        </div>

                    </div>
                </div>
                <div class="flex-auto p-4 pt-6">

                    <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                            <div class="flex items-center">

                                <div class="flex flex-col">
                                    <h6 class="mb-1 leading-normal text-sm text-slate-700">Total Order weight</h6>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p
                                    class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-rose-400 text-sm bg-clip-text">{{$tw}}</p>
                            </div>
                        </li>
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                            <div class="flex items-center">

                                <div class="flex flex-col">
                                    <h6 class="mb-1 leading-normal text-sm text-slate-700">Total transport Additional Charges</h6>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p
                                    class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-rose-400 text-sm bg-clip-text">{{$tac}}</p>
                            </div>
                        </li>
                        <li
                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                            <div class="flex items-center">

                                <div class="flex flex-col">
                                    <h6 class="mb-1 leading-normal text-sm text-slate-700">Total Delivery Additional Charges</h6>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <p
                                    class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-rose-400 text-sm bg-clip-text">{{$dac}}</p>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

        <script>
            $(function() {

                $('input[name="dates"]').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    }
                });

                $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                        'MM/DD/YYYY'));
                });

                $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });

            });
        </script>
    @endsection
