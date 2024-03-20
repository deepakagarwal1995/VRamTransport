<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="{{ config('app.url') }}/assets/js/plugins/perfect-scrollbar.min.js" async></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="{{ config('app.url') }}/assets/js/soft-ui-dashboard-tailwind.min.js?v=1.0.5" async></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
<script>
    swal("Success", "{{ Session::get('success') }}", 'success', {
                buttons: {
                    confirm: "OK",
                },
            });
</script>
@endif
@if (Session::has('error'))
<script>
    swal("Error", "{{ Session::get('error') }}", 'error', {
                buttons: {
                    confirm: "OK",
                },
            });
</script>
@endif
