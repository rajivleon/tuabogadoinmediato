<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versión</b> 1.0
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="http://Tuabogadoinmediato.com">tuabogadoinmediato.com</a>.</strong> Todos los
    derechos reservados.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url('assets/adminlte')?>/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/adminlte')?>/bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/adminlte')?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/adminlte')?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/adminlte')?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/adminlte')?>/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

<script src="<?php echo base_url('assets/adminlte')?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/adminlte')?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/adminlte')?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/adminlte')?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/adminlte')?>/plugins/fastclick/fastclick.js"></script>

<?php if(isset($admilteJs)){
    foreach($admilteJs as $js){
        echo '<script src="'.base_url('assets/adminlte').$js.'"></script>';
    }
}
?>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte')?>/dist/js/app.min.js"></script>

 <?php
    if(isset($pagina)){
       $archivo = base_url('js/').'/'.$pagina.'.js';
        echo '<script src="'.$archivo.'"></script>';
    }?>

</body>
</html>
