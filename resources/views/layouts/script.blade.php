<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
{{-- <script src="{{asset('https://cdn.jsdelivr.net/npm/chart.js')}}"></script> --}}
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
{{-- <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js')}}"></script> --}}
<!-- ChartJS -->
{{-- <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('dist/js/pages/dashboard2.js')}}"></script> --}}
<script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js')}}"></script>

<script>
    toastr.options = {
"closeButton": true,
"debug": false,
"newestOnTop": true,
"progressBar": true,
"positionClass": "toast-top-center",
"preventDuplicates": true,
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "5000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
}
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif
    @if (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif
    @if (Session::has('error'))
        @if ($errors)
            var str = ``;
            @foreach ($errors->all() as $error)
                str +=  `<p>{{ $error }}</p>`; @endforeach
            toastr.error(str);
@else
toastr.error("{{ Session::get('error') }}");
    @endif
@endif
</script>