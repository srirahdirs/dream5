<?php $baseUrl = base_url().'assets/admin';?>
</div>  
<!--extra div--> 
<div class="slim-footer">
    <div class="container">
        <p>Copyright 2019 &copy; All Rights Reserved. </p>
        <p class="by">By: <a href="https://www.youngzen.in/" target="_blank">YoungZen Technologies</a></p>
    </div><!-- container -->
</div><!-- slim-footer -->


<script src="<?= $baseUrl ?>/lib/jquery/js/jquery.js"></script>
<script src="<?= $baseUrl ?>/lib/popper.js/js/popper.js"></script>
<script src="<?= $baseUrl ?>/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?= $baseUrl ?>/lib/jquery.cookie/js/jquery.cookie.js"></script>
<script src="<?= $baseUrl ?>/lib/jqvmap/js/jquery.vmap.min.js"></script>
<script src="<?= $baseUrl ?>/lib/jqvmap/js/jquery.vmap.world.js"></script>
<script src="<?= $baseUrl ?>/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= $baseUrl ?>/lib/toastr/toastr.init.js"></script>
<script src="<?= $baseUrl ?>/lib/toastr/toastr.min.js"></script>
<script src="<?= $baseUrl ?>/js/slim.js"></script>
<script src="<?= $baseUrl ?>/lib/d3/js/d3.js"></script>
<script src="<?= $baseUrl ?>/lib/rickshaw/js/rickshaw.min.js"></script>
<script src="<?= $baseUrl ?>/lib/Flot/js/jquery.flot.js"></script>
<script src="<?= $baseUrl ?>/lib/Flot/js/jquery.flot.resize.js"></script>
<script src="<?= $baseUrl ?>/lib/peity/js/jquery.peity.js"></script>
<script src="<?= $baseUrl ?>/js/ResizeSensor.js"></script>
<script src="<?= $baseUrl ?>/js/jquery.vmap.sampledata.js"></script>
<script src="<?= $baseUrl ?>/js_external/jquery-confirm.min.js"></script>
<script type="text/javascript">
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
<script>
    $(function () {
        'use strict'

        

    });
</script>
</body>
</html>
