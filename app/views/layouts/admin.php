<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Heroic Features - Start Bootstrap Template</title>
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png') ?>">

	<!-- Notification css (Toastr) -->
	<link href="<?= base_url('assets/libs/toastr/toastr.min.css') ?>" rel="stylesheet" type="text/css" />

	<!-- App css -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
	<link href="<?= base_url('assets/css/bootstrap-united.min.css') ?>" rel="stylesheet" type="text/css" id="bootstrap-united-stylesheet" />

	<link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/apphorizontal.min.css') ?>" rel="stylesheet" type="text/css" id="app-stylesheet" />

	<!-- Table datatable css -->
	
	<link href="<?= base_url('assets/libs/datatables/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/libs/datatables/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/libs/datatables/select.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

	<link href="<?= base_url('assets/libs/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />


	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
</head>

<body>

	<!-- Topbar Start -->
	<!-- Navigation Bar-->
	<header id="topnav">
		<div class="navbar-custom">
			<div class="container-fluid">
				<ul class="list-unstyled topnav-menu float-right mb-0">
					<li class="dropdown notification-list">
						<!-- Mobile menu toggle-->
						<a class="navbar-toggle nav-link">
							<div class="lines">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</a>
						<!-- End mobile menu toggle-->
					</li>

					<li class="dropdown notification-list">
						<a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="<?= base_url('assets/images/users/avatar-1.jpg') ?>" alt="user-image" class="rounded-circle">
							<span class="d-none d-sm-inline-block ml-1 font-weight-medium"><?= $this->session->userdata('user_nickname') . ' (' . $this->session->userdata('user_role') . ')'  ?></span>
							<!--<i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>--><!--<i class="fa fa-user fa-fw"></i>-->
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<i class="mdi mdi-account-outline"></i>
								<span>Profile</span>
							</a>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<i class="mdi mdi-settings-outline"></i>
								<span>Cambiar clave</span>
							</a>
							<div class="dropdown-divider"></div>

							<!-- item-->
							<a href="<?= base_url('/logout') ?>" class="dropdown-item notify-item">
								<i class="mdi mdi-logout-variant"></i>
								<span>Cerrar sesión</span>
							</a>
						</div>
					</li>
				</ul>

				<!-- LOGO -->
				<div class="logo-box">
					<a href="index.html" class="logo text-center logo-dark">
						<span class="logo-lg">
							<img src="<?= base_url('assets/images/logo.png') ?>" alt="" height="22">
							<!-- <span class="logo-lg-text-dark">Uplon</span> -->
						</span>
						<span class="logo-sm">
							<!-- <span class="logo-lg-text-dark">U</span> -->
							<img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="24">
						</span>
					</a>

					<a href="index.html" class="logo text-center logo-light">
						<span class="logo-lg">
							<img src="<?= base_url('assets/images/logo-light.png') ?>" alt="" height="22">
							<!-- <span class="logo-lg-text-dark">Uplon</span> -->
						</span>
						<span class="logo-sm">
							<!-- <span class="logo-lg-text-dark">U</span> -->
							<img src="<?= base_url('assets/images/logo-sm-light.png') ?>" alt="" height="24">
						</span>
					</a>
				</div>


			</div>
		</div>
		<div class="topbar-menu">
			<div class="container-fluid">
				<div id="navigation">
					<!-- Navigation Menu-->
					<ul class="navigation-menu">

						<li class="menu">
							<a href="index.html">
								<i class="mdi mdi-view-dashboard"></i>Dashboard
							</a>
						</li>

						<li class="menu">
							<a href="<?= site_url('admin/users') ?>">
								<i class="mdi mdi-format-underline"></i>Usuarios
							</a>
						</li>

						<li class="menu">
							<a href="<?= site_url('admin/institutos') ?>">
								<i class="mdi mdi-black-mesa"></i>Institutos
							</a>
						</li>

						<li class="menu">
							<a href="#">
								<i class="mdi mdi-package-variant-closed"></i>Components
							</a>
						</li>

						<li class="menu">
							<a href="#">
								<i class="mdi mdi-flip-horizontal"></i>Layouts
							</a>
						</li>

						<li class="menu">
							<a href="#"> <i class="mdi mdi-google-pages"></i>Pages
							</a>
						</li>

						<li class="menu">
							<a href="#">
								<i class="mdi mdi-content-copy"></i>Extra Pages
							</a>
						</li>

					</ul>
					<!-- End navigation menu -->

					<div class="clearfix"></div>
				</div>
				<!-- end #navigation -->
			</div>
			<!-- end container -->
		</div>
	</header>

	<!-- Page Content-->
	<div class="wrapper">
		<!-- Start Content-->
		<div class="container-fluid">

			<?php $this->load->view($content); ?>


		</div> <!-- end container-fluid -->

	</div>

	<!-- Footer-->
	<footer class="footer">
		<div class="container">
			<p class="m-0 text-center">Copyright &copy; - Ronald Pariona -&nbsp;<?= date('Y') ?></p>
		</div>
	</footer>


	<!-- Vendor js -->
	<script src="<?= base_url('assets/js/vendor.min.js') ?>"></script>

	<!--Morris Chart-->
	<script src="<?= base_url('assets/libs/morris-js/morris.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/raphael/raphael.min.js') ?>"></script>

	<!-- Dashboard init js-->
	<script src="<?= base_url('assets/js/pages/dashboard.init.js') ?>"></script>

	<!-- Toastr js -->
	<script src="<?= base_url('assets/libs/toastr/toastr.min.js') ?>"></script>

	<!-- <script src="< ?= base_url('assets/js/pages/toastr.init.js') ?>"></script> -->

	<!-- Datatable plugin js -->
	<script src="<?= base_url('assets/libs/datatables/jquery.dataTables.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/datatables/dataTables.bootstrap4.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/datatables/dataTables.buttons.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/buttons.bootstrap4.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/datatables/dataTables.responsive.min.js') ?>"></script>
	
	<script src="<?= base_url('assets/libs/jszip/jszip.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/pdfmake/pdfmake.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/pdfmake/vfs_fonts.js') ?>"></script>

	<script src="<?= base_url('assets/libs/datatables/buttons.html5.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/buttons.print.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/datatables/buttons.colVis.min.js') ?>"></script>
	
	<script src="<?= base_url('assets/libs/datatables/dataTables.keyTable.min.js') ?>"></script>
	<script src="<?= base_url('assets/libs/datatables/dataTables.select.min.js') ?>"></script>

	<script src="<?= base_url('assets/libs/datatables/responsive.bootstrap4.min.js') ?>"></script>

	
	<!-- Datatables init -->
	<!-- <script src="< ?= base_url('assets/js/pages/datatables.init.js') ?>"></script> -->

	<!-- App js -->
	<script src="<?= base_url('assets/js/app.min.js') ?>"></script>

</body>

<!-- Mirrored from coderthemes.com/uplon/layouts/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Dec 2023 03:26:55 GMT -->

</html>
