<?php
    $this->load->view('layouts/header');
    $this->load->view('layouts/menu');
?>

<div class="slim-mainpanel">
<?php
    $this->load->view('layouts/homeSlider');
    $this->load->view('layouts/homeSliderBottom');
    $this->load->view('layouts/homePricing');
?>
</div><!-- slim-mainpanel -->
<?php
    $this->load->view('layouts/footer');       
?>
    
  