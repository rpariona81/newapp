<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/uplon/layouts/vertical/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Dec 2023 05:39:44 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Datatables | Uplon - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

    <title>
        <?php
        if (isset($titulo)) {
            echo $titulo;
        } else {
            echo "JM-Systems";
        }
        ?>
    </title>
    <!--<title><? //$titulo; 
                ?></title>-->
    <!-- App css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/apphorizontal.min.css') ?>" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/simplex/bootstrap.min.css"
        integrity="sha384-FYrl2Nk72fpV6+l3Bymt1zZhnQFK75ipDqPXK0sOR0f/zeOSZ45/tKlsKucQyjSp" crossorigin="anonymous">-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css" integrity="sha384-5QFXyVb+lrCzdN228VS3HmzpiE7ZVwLQtkt+0d9W43LQMzz4HBnnqvVxKg6O+04d" crossorigin="anonymous">-->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .main-head {
            height: 150px;
            background: #FFF;

        }

        .sidenav {
            height: 100%;
            background-color: #000; /** #1199EF */
            overflow-x: hidden;
            padding-top: 20px;
        }


        .main {
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }
        }

        @media screen and (max-width: 450px) {
            .login-form {
                margin-top: 10%;
            }

            .register-form {
                margin-top: 10%;
            }
        }

        @media screen and (min-width: 768px) {
            .main {
                margin-left: 40%;
            }

            .sidenav {
                width: 40%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
            }

            .login-form {
                margin-top: 40%;
            }

            .register-form {
                margin-top: 20%;
            }
        }

        .login-main-text {
            margin-top: 15%;
            padding: 60px;
            color: #fff;
        }

        .login-main-text h2 {
            font-weight: bolder;
            color: #fff;
        }

        .btn-black {
            background-color: #000 !important;
            color: #fff;
            font-weight: bolder;
        }
    </style>

    <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <!------ Include the above in your HEAD tag ---------->

</head>

<body>
    <div class="sidenav mb-3">
        <div class="login-main-text">
            <h1 class="text-white">Application<br> Login Page</h1>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main mt-3">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-black">Login</button>
                    <button type="submit" class="btn btn-secondary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JQuery Validate js -->
    <script src="<?= base_url('assets/libs/jquery-validation/jquery.validate.min.js') ?>"></script>

    <!-- Vendor js -->
    <script src="<?= base_url('assets/js/vendor.min.js') ?>"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/js/app.min.js') ?>"></script>

</body>

</html>