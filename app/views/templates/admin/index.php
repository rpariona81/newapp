<?php
$this->load->view('templates/admin/_parts/admin_header_view');
$this->load->view('templates/admin/_parts/admin_navbar_view');

?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="wrapper">

	<!-- Start Content-->
	<div class="container-fluid">
		<?php echo $content; ?>
	</div>

</div>
<?php
$this->load->view('templates/admin/_parts/admin_footer_view');
?>
