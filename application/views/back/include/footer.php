  </div><!--/. container-fluid -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2020 <a href="<?php echo base_url();?>/assets/back/https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.1.0-rc
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url();?>/assets/back/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url();?>/assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>/assets/back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/back/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>/assets/back/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>/assets/back/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>/assets/back/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>/assets/back/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>/assets/back/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/back/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/back/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url(); ?>assets/back/build/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/build/js/sweetalert2.all.js"></script>
<script src="<?php echo base_url(); ?>assets/back/build/js/iziToast.min.js"></script>
<script src="<?php echo base_url(); ?>assets/back/build/switchery/dist/switchery.min.js"></script>
<script src="<?php echo base_url();?>assets/back/build/js/custom.js"></script>

<?php 
if (is_file(APPPATH.'views/' . 'back/include/includes/'.$this->uri->segment(2) . EXT))
{
     $this->load->view('back/include/includes/'.$this->uri->segment(2));
}


?>
</body>
</html>
