<div class="footer">
                
  <div>
      <strong>Copyright</strong> POS &copy; <?php echo date('Y') ?>
  </div>
            </div>
        </div>
    </div>

  </div>
</div>

    <!-- Mainly scripts -->
    <script src="<?php bs() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php bs() ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php bs() ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php bs() ?>assets/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php bs() ?>assets/js/inspinia.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php bs() ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php bs() ?>assets/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php bs() ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php bs() ?>assets/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php bs() ?>assets/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php bs() ?>assets/js/plugins/toastr/toastr.min.js"></script>

    <script src="<?= base_url('assets/js/bootstrap-notify.js') ?>"></script>


    <!-- Data Tables -->
    <script src="<?php bs() ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php bs() ?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>


</body>
</html>

<script>
<?php

  if (!empty($this->session->flashdata('success')))
   {
?>
 $.notify({
      
      icon: '',
      title: '<b><i class="fa fa-exclamation-circle"></i> Notification</b><br>',
      message: '<?php echo $this->session->flashdata('success') ?>',
  },
  {
      
      
      type: "success success-noty col-md-3",
      allow_dismiss: true,
      placement: {
          from: "top",
          align: "right"
      },
      offset: 20,
      spacing: 10,
      z_index: 1431,
      delay: 5000,
      timer: 1000,
      animate: {
          enter: 'animated bounceInDown',
          exit: 'animated bounceOutUp'
      }
  });
<?php

  } 
  if (!empty($this->session->flashdata('error')))
   {
?>
 $.notify({
          
          icon: '',
          title: '<b><i class="fa fa-info-circle"></i> Notification</b><br>',
          message: "<?php echo $this->session->flashdata('error') ?>",
      },{
          
          
          type: "danger error-noty col-md-3",
          allow_dismiss: true,
          placement: {
              from: "top",
              align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 1431,
          delay: 5000,
          timer: 1000,
          animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutUp'
          }
      });
 <?php            
   }
  ?>

</script>