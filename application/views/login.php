<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="<?php bs() ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php bs() ?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      .error-noty
      {
        background-color: #a94442;
        border:0px;
        color: white;
      }
    </style>

  </head>
  <body class="bg-img">
    <div class="container">
      

          <div class="login-box">
            <div class="login-header">
                <h3 class="text-center"><font color="white">Login</font></h3>
            </div>
            <div class="row">
              <div class="col-sm-11">
                
                <form action="<?php bs() ?>Login" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">
                      Username
                    </label>
                    <div class="col-sm-9">
                      <input type="username" name="usename" class="form-control" placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                      <button type="submit" class="btn btn-xs btn-login"><i class="fa fa-sign-in"></i> Login</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bs() ?>assets/js/bootstrap.min.js"></script>
    
    <script src="<?= base_url('assets/js/bootstrap-notify.js') ?>"></script>

</body>
</html>

<script>
<?php

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
