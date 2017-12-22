    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; SI-2013 <a href="#">VINNA ALVIONITA</a>.(09031281320018)</strong> 
  </footer>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>asset/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>asset/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>



    <!-- CKEditor -->
    <script src="<?php echo base_url();?>asset/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.add
        CKEDITOR.replace( 'editor2' );
        CKEDITOR.add
        CKEDITOR.replace( 'editor3' );
        CKEDITOR.add
    </script>    
    <!-- /CKEditor -->
</body>
</html>
