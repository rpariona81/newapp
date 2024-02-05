<?php
$this->load->view('templates/admin/_parts/admin_header_view');
?>
<section>
  <?php echo $content;?>
</section>
<?php
$this->load->view('templates/admin/_parts/admin_sidebar_view');
$this->load->view('templates/admin/_parts/admin_footer_view');
?>