<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <form id="depositForm" method="post" action="<?= base_url().'/payments/saveReferenceNumber'?>">
                <div class="row">
                   
                    <!--single row starts-->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>STEP 1 : TRANSFER TO THE UPI ID SHOWN BELOW</label><br>
                            <span>Qr Code:-</span>
                            <a href="<?= base_url().'assets/img/qr_code_full.jfif' ?>" target="_blank">View QR Code
                            </a>
                        </div>
                        <div class="form-group" style="text-align: left;">
                            <p>scan the <span style="color:#fff !important">QR code</span> below to pay</p>
                        </div>
                        <div class="form-group">
                            <img src="<?= base_url().'/assets/img/qr_code_sample.png' ?>" width="250" height="300" alt="QR CODE">
                        </div>
                        <div class="form-group">
                            <span>Amount:-</span><input class="form-control" name="deposit_amount" id="order_amount" value="<?= $amount ?>" type="text" />
                        </div>
                    </div>
                    <input type="hidden" name="upi_id" value="<?= $upi_id?>">
                    <div class="col-lg-12" style="margin-bottom:20px;"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>STEP 2 : After completing the FUNDS TRANSFER,<br>
                            Fill out the <b>REFERENCE NUMBER</b> / 
                            <b>UPI TRANSACTION ID</b>  below</label><br>
                            <input class="form-control" name="reference_number" required placeholder="12 DIGIT REFERENCE NUMBER" type="number" maxlength="22"/>
                            <input name="payment_mode" type="hidden" value="<?= $payment_type ?>"/>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-bottom:20px;"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>                
                <br>
            </form>
        </div>
    </div>
</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>

<script type="text/javascript">
    $('#order_amount').keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); //stop character from entering input
        }
    });
    $(".sidebar-nav-item").removeClass('active');
    $(".sidebar-nav-item .add_cash").addClass('active');    
    //main menu
    $(".nav-item").removeClass('active');
    $(".add_cash_main_menu").addClass('active');    
    
    
    
</script>