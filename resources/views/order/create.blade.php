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
                                <a href="{{ route('order.index') }}"
                                    class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102 ">View
                                    Orders</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <div class="flex-auto p-6">
                               <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                                    <div class="flex flex-wrap -mx-3">
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Order No <span class="text-rose-700">*</span></label>
                                            <input type="number" name="orderNo"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                placeholder="Order No" aria-label="Name" aria-describedby="email-addon"
                                                autocomplete="off">
                                                @error('orderNo')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Order Date <span class="text-rose-700">*</span></label>
                                            <input type="date" name="orderDate"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                 aria-label="Name" aria-describedby="email-addon"
                                                autocomplete="off">
                                                   @error('orderDate')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Delivery Party <span class="text-rose-700">*</span></label>
                                            <input type="text"  name="deliveryparty"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                 aria-label="Name" aria-describedby="email-addon"
                                                autocomplete="off">
                                                 @error('deliveryparty')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Delivery Destination 1 <span class="text-rose-700">*</span></label>
                                            <input type="text"  name="deliveryDest1"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                 aria-label="Name" aria-describedby="email-addon"
                                                autocomplete="off">
                                                  @error('deliveryDest1')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                                        </div>
                                        <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Delivery Destination 2 <span class="text-any">(If Any)</span></label>
                                            <input type="text"  name="deliveryDest2"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                 aria-label="Name" aria-describedby="email-addon"
                                                autocomplete="off">
                                                  @error('deliveryDest2')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                                        </div>
                                         <div class="w-full max-w-full px-3 mb-2 md:w-6/12 md:flex-none xl:w-6/12">
                                            <label class="mb-0 text-xs font-semibold leading-tight">Order Weight <span class="text-rose-700">*</span></label>
                                            <input type="number"  name="orderWt" min="0" value="0" step="any"
                                                class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                 aria-label="Name" aria-describedby="email-addon"
                                                autocomplete="off">
                                                  @error('orderWt')
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
