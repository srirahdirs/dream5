<?php
    $this->load->view('layouts/header');
    $this->load->view('layouts/menu');
?>
<?php
$this->load->view('layouts/homeSlider');
$this->load->view('layouts/homeSliderBottom');
?>

<?php
    $this->load->view('layouts/footer');       
?>
<script type='text/javascript'>
    $(".nav-item").removeClass('active');
    $(".home_main_menu").addClass('active');
</script>