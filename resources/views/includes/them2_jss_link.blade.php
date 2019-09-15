<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{url('dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{url('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{url('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{url('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{url('plugins/jquery-mapael/maps/world_countries.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{url('dist/js/pages/dashboard2.js')}}"></script>

         <!-- toastr JS -->
         <script src=" {{ asset('js/toastr.min.js')}}"></script>
           <!-- Summer note JS -->
          <script src=" {{ asset('js/summernote.js')}}"></script>
                      
  <script>
           /* @if(Session::has('success'))
                toastr.success("{{  Session::get('success') }}")
            @elseif(Session::has('error'))
                 toastr.error("{{  Session::get('error') }}")

            @endif*/

            $(document).ready(function() {
                $('#blog_content').summernote();
              });

                      
    </script>
