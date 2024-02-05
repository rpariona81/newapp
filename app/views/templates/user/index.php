<?php
$this->load->view('templates/user/_parts/user_header_view');
?>
<section>
  <?php echo $content;?>
</section>
<?php
$this->load->view('templates/user/_parts/user_sidebar_view');
$this->load->view('templates/user/_parts/user_footer_view');
?>