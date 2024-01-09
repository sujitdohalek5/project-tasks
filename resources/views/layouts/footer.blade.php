<footer class="main-footer">
  <span class="float-none float-sm-left d-block mt-1 mt-sm-0 text-center">Latest Build Timestamp :
    @if (file_exists('./../.git/FETCH_HEAD'))
    {{ date('dS F Y h:i:s A', filemtime('./../.git/FETCH_HEAD')) }}
    @else
    Time Stamp Not Found
    @endif
  </span>
  <br>
  <div class="float-right d-none d-sm-block">
    <b>Fyntune Solutions </b> 
  </div>
  <strong>Copyright &copy; 2023 CKYC Panel <a target="_blank" href="http://fyntune.com/">Fyntune Solution Pvt. Ltd. </a>|</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
</div>

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{url('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{url('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{url('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<!-- searchable select-->


<!-- searchable select-->

<script>
$(function () {
bsCustomFileInput.init();
});
</script>
