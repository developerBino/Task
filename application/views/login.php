
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
    <link href="<?php echo base_url('assets/admin_assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin_assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">TASK MANAGER &trade;</h1>
                                    <h6 class="h4 text-gray-900 mb-4"><span style="font-size: 60%;">Task Management Application</span></h6>
                                </div>
                                <form class="user" action="<?php echo base_url('login/loginProcess'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="textUsername" name="textUsername" aria-describedby="emailHelp"
                                            placeholder="Enter User Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="textPassword" name="textPassword" placeholder="Password">
                                    </div>
                                    <button type="submit" name="txtsubmit" class="btn btn-primary btn-user btn-block" id="loginBtn">Login</button>
                                    <div class="text-center" style="margin-top:10px;">
                                    <?php
                                        // Check if flash data exists
                                        if ($this->session->flashdata('msg')) {
                                            // Display the flash message
                                            echo '<div class="alert alert-danger" role="alert" >';
                                            echo $this->session->flashdata('msg');
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                </form>
                                <div class="text-center" style="margin-top:20px;">
                                    <a href="<?php echo base_url('login/UserSignUp'); ?>" class="btn btn-link">
                                        Sign Up
                                    </a>
                                </div>
                                <div class="text-center" style="margin-top:30px;">
                                    <h8 class="text-gray-900 mb-4">
                                        <span style="font-size: 80%;">by,</span> Bino Johnson
                                    </h8>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
    window.addEventListener('load', function () {
        var inputElement = document.getElementById('textUsername');

        if (inputElement) {
        inputElement.focus();
        }
    });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/admin_assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/admin_assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>