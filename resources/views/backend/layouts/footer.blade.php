</div> <!-- content-->
</div> <!-- Container-fluid -->
</div> <!-- content-wrapper -->
<!-- Comes from sidebar.blade.php -->


<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>


</div> <!-- end wrapper -->
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->

<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap4-tagsinput@4.1.3/tagsinput.js"></script>

<script src="{{ asset('admin/plugins/sweetalert/sweet-alert.js') }}"></script>

<script src="{{ asset('admin/plugins/animate/wow.js') }}"></script>
<script src="{{ asset('admin/plugins/notify/notify.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simplesnackbarjs@1.0.0/dist/simpleSnackbar.min.js"></script>

<script src="{{ asset('admin/plugins/nice-select/jquery.nice-select.js') }}"></script>





<div id="toasts"></div>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>

<script src="{{ asset('admin/admin.js') }}"></script>

@if (session()->has('successMsg'))
   <script>
    tata.success('Success!', `{{ Session::get('successMsg') }}`, {
      position: 'tr',
      duration: 5000,
      holding: false,
      closeBtn: true,
      progress: true,
      animate: 'slide'
      
    })
   </script>
@endif

@if (session()->has('errorMsg'))
   <script>
    tata.error('Sorry!', `{{ Session::get('errorMsg') }}`, {
      position: 'tr',
      duration: 5000,
      holding: false,
      closeBtn: true,
      progress: true,
      animate: 'slide'
      
    })
   </script>
@endif
<script>

</script>
</body>

</html>
