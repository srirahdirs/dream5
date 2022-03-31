<?php
    $this->load->view('layouts/header');
    $this->load->view('layouts/menu');
?>
<?php

$data['total_user'] = $total_user;
$this->load->view('layouts/home_slider');
$this->load->view('layouts/home_slider_bottom',$data);
?>

<?php
    $this->load->view('layouts/footer');       
?>
<script type='text/javascript'>
    $(".nav-item").removeClass('active');
    $(".home_main_menu").addClass('active');
</script>