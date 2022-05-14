
<?php $baseUrlFrAssets = base_url() .'assets'; ?>
<div class="slider hm-slider">

    <div id="carousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?= $baseUrlFrAssets ?>/img/slider/slider1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="<?= $baseUrlFrAssets ?>/img/slider/slider2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="<?= $baseUrlFrAssets ?>/img/slider/slider3.jpg" alt="Third slide">
            </div>
        </div><!-- carousel-inner -->
        <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- carousel -->
	
	<?php
        $data = '';
		$this->load->view('users/register',$data);
	?>

</div>
