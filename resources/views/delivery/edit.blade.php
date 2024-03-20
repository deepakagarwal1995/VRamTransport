@extends('layouts.adminApp')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0">{{ $title ?? '' }}</h6>
                            </div>
                            <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                <a href="{{ route('delivery.index') }}"
                                    class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102 ">View
                                    Delivery Details</a>
                            </div>
                        </div>
                    </div>
         <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <div class="flex-auto p-6">
                                  <form action="{{ route('delivery.update', $orderDelivery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                                    <div class="flex flex-wrap -mx-3">
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Order No <span class="text-rose-700">*</span></label>
                                            <input type="number" name="orderNo" value="{{ $orderDelivery->orderNo }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                placeholder="Order No" aria-label="Name" aria-describedby="email-addon"
                                                autocomplete="off" readonly>
                                                @error('orderNo')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                                        </div>

                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">GR No. </label>
                                            <input type="text" name="grNo" value="{{ $orderDelivery->grNo }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('grNo')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-4/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Empty Vehicle Weight<span
                                                    class="text-rose-700">*</span></label>
                                            <input type="number" min="0"  step="any" name="emptyVehicleWt" id="emptywgt" value="{{ $orderDelivery->emptyVehicleWt }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('emptyVehicleWt')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-4/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Gross Loaded Vehicle Weight<span class="text-rose-700">*</span></label>
                                            <input type="number" min="0" step="any" name="grossLoadedVehicleWt" id="grosswgt" value="{{ $orderDelivery->grossLoadedVehicleWt }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('grossLoadedVehicleWt')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-4/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Net Vehicle Weight<span class="text-rose-700">*</span></label>
                                            <input type="number" min="0" step="any" id="netwgt"  name="netVehicleWt" value="{{ $orderDelivery->netVehicleWt }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('netVehicleWt')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Loaded weight at {{ $orderDelivery->orderDetails->deliveryDest1 }}<span
                                                    class="text-rose-700">*</span></label>
                                            <input type="number" min="0" step="any" name="destination1loadedWt" value="{{ $orderDelivery->destination1loadedWt }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('destination1loadedWt')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                         <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Empty weight at {{ $orderDelivery->orderDetails->deliveryDest1 }}<span
                                                    class="text-rose-700">*</span></label>
                                            <input type="number" min="0" value="{{ $orderDelivery->destination1emptyWt }}" step="any" name="destination1emptyWt"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('destination1emptyWt')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                         <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Loaded weight at {{ $orderDelivery->orderDetails->deliveryDest2 }} </label>
                                            <input type="number" min="0" value="{{ $orderDelivery->destination2loadedWt }}" step="any" name="destination2loadedWt"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('destination2loadedWt')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                         <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Empty weight at {{ $orderDelivery->orderDetails->deliveryDest2 }} </label>
                                            <input type="number" min="0" value="{{ $orderDelivery->destination2emptyWt }}" step="any" name="destination2emptyWt"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('destination2emptyWt')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                          <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Additional Charges. </label>
                                            <input type="number" name="additionalCharges" value="{{ $orderDelivery->additionalCharges }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('additionalCharges')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">GR Date<span
                                                    class="text-any">(If Any)</span></label>
                                            <input type="date" name="grDate" value="{{ $orderDelivery->grDate }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('grDate')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Invoice No. </label>
                                            <input type="text" name="InvoiceNo" value="{{ $orderDelivery->InvoiceNo }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('InvoiceNo')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">E-way No. </label>
                                            <input type="text" name="ewayBill" value="{{ $orderDelivery->ewayBill }}"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                aria-label="Name" aria-describedby="email-addon" autocomplete="off">
                                            @error('ewayBill')
                                                <p class="text-red-500 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <button type="submit"
                                                class="inline-block w-fit px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Submit</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
    <script>
       $('#grosswgt').on('change', function() {
  var gross = this.value;
  var empty = $('#emptywgt').val();
  $('#netwgt').val(gross-empty);

});
    </script>
    @endsection
