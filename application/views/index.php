<?php
    $this->load->view('layouts/header');
    $this->load->view('layouts/menu');
?>

<div class="slim-mainpanel">
<?php
    $this->load->view('layouts/home_slider');
    $this->load->view('layouts/home_slider_bottom');
    $this->load->view('layouts/home_pricing');
?>
</div><!-- slim-mainpanel -->
<?php
    $this->load->view('layouts/footer');       
?>
    
  