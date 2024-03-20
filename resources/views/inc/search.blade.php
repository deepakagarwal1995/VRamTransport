@php
    $row = $_GET['rows'] ?? '25';
@endphp
<form action="?" method="GET">
    <div class="mt-4 flex items-center justify-between w-full px-4 py-2 mx-auto flex-wrap-inherit  mb-4 bg-clip-border bg-gray-50">
         <label class="flex items-center justify-between ">
                <select class=" text-sm focus:shadow-soft-primary-outline ease-soft   relative -ml-px block min-w-0   rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" name="rows" onchange="this.form.submit()">
                    <option value="25" {{ $row == '25' ? 'selected' : false }}>25
                    </option>
                    <option value="50" {{ $row == '50' ? 'selected' : false }}>50
                    </option>
                    <option value="100" {{ $row == '100' ? 'selected' : false }}>100
                    </option>
                    <option value="250" {{ $row == '250' ? 'selected' : false }}>250
                    </option>
                    <option value="500" {{ $row == '500' ? 'selected' : false }}>500
                    </option>
                    <option value="all" {{ $row == 'all' ? 'selected' : false }}>All
                    </option>
                </select> &nbsp;entries per page
            </label>
        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
                    <span
                        class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="text" id="default-search" name="keyword" value="{{ $_GET['keyword'] ?? '' }}"
                        class="pl-8.75 text-sm focus:shadow-soft-primary-outline ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                        placeholder="Type here...">
                </div>
            </div>

        </div>
    </div>

</form>
