<?php $baseUrl = base_url().'assets';?>
<div class="slim-footer">
    <div class="container" style="max-width: 100%">
        <p>Copyright <a href=""><?= date('Y')?> &copy;</a> All Rights Reserved. </p>
<!--        <p> <a href="">About Us</a> </p>
        <p> <a href="">Contact Us</a> </p>
        <p> <a href="">Pricing</a> </p>
        <p> <a href="">Privacy Policy</a> </p>
        <p> <a href="">Terms & Conditions</a> </p>
        <p> <a href="">Cancellation/Refund Policy</a> </p>-->
        <p>By: <a href="http://www.youngzen.in/" target="_blank">YoungZen Technologies</a></p>
    </div><!-- container -->
</div><!-- slim-footer -->


<script src="<?= $baseUrl ?>/lib/jquery/js/jquery.js"></script>
<script src="<?= $baseUrl ?>/lib/popper.js/js/popper.js"></script>
<script src="<?= $baseUrl ?>/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?= $baseUrl ?>/lib/jquery.cookie/js/jquery.cookie.js"></script>
<script src="<?= $baseUrl ?>/lib/jquery-toggles/js/toggles.min.js"></script>
<script src="<?= $baseUrl ?>/lib/spectrum/js/spectrum.js"></script>
<script src="<?= $baseUrl ?>/lib/jqvmap/js/jquery.vmap.min.js"></script>
<script src="<?= $baseUrl ?>/lib/jqvmap/js/jquery.vmap.world.js"></script>
<script src="<?= $baseUrl ?>/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= $baseUrl ?>/js_external/jquery-confirm.min.js"></script>

<script src="<?= $baseUrl ?>/js/slim.js"></script>
<script src="<?= $baseUrl ?>/js/ResizeSensor.js"></script>
<script src="<?= $baseUrl ?>/js/jquery.vmap.sampledata.js"></script>

<script type='text/javascript' src="<?= $baseUrl ?>/lib/toastr/toastr.init.js"></script>
<script type='text/javascript' src="<?= $baseUrl ?>/lib/toastr/toastr.min.js"></script>
<script>
    $(function () {
        'use strict'
    });

<?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php }else if($this->session->flashdata('error')){  ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php }else if($this->session->flashdata('warning')){  ?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php }else if($this->session->flashdata('info')){  ?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
    <?php } ?>
</script>
</body>
</html>
