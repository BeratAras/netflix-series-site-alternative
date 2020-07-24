<footer class="main-footer">
    <div class="pull-right hidden-xs">
      Help
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="http://www.scenamater.com/">Scenamater</a>.</strong> All rights
    reserved.
  </footer>

<!-- jQuery 3 -->
<script src="<?php echo base_url('public/back/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('public/back/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('public/back/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('public/back/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/back/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('public/back/dist/js/demo.js') ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('public/back/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
    $('.select2').select2();
  })
</script>
</body>
</html>
