
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/sb_admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Perusahaan XYZ - Masuk</h5>
                        <form action="<?php echo base_url()?>auth/login" method="POST">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <input type="submit" value="Masuk" class="btn btn-primary btn-block">
                        </form>
                        <?php if($this->session->flashdata('message') != NULL){ ?>
                        <br>
                        <p class="text-center"><?php echo $this->session->flashdata('message');?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/sb_admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/sb_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/sb_admin/js/sb-admin-2.min.js"></script>

</body>
</html>
