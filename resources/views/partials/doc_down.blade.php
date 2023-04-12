<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>


<!-- Sparkline Js-->
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Js-->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

<!-- Chart Custom Js-->
<script src="{{ asset('assets/pages/knob-chart-demo.js') }}"></script>


<!-- Morris Js-->
<script src="{{ asset('assets/plugins/morris-js/morris.min.js') }}"></script>

<!-- Raphael Js-->
<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('assets/pages/dashboard-demo.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/theme.js') }}"></script>

{{-- Ajax --}}
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
