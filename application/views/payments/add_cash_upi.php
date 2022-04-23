<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
    <blink><marquee style="color: #23BF08">Note: amount will be added to the account within 15 minutes.</marquee></blink>
        <div class="section-wrapper">
            <form id="depositForm" method="post" action="<?= base_url().'/payments/saveReferenceNumber'?>">
                <div class="row">
                   
                    <!--single row starts-->
                    <div class="col-lg-12" style="text-align: center;">
                        <img src="<?= base_url().'assets/img/payment_icons_new.png'?>" width="50%">
                    </div>
                    <div class="col-lg-8" style="margin-top:35px;">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">STEP 1 (UPI ID)</span>
                            </div>
                            <input type="text" class="form-control" id="upi_id" value="youngzentechnologies@okhdfcbank">
                            <div class="input-group-append">
                                <span class="input-group-text"><a onclick="myFunction()"><i class="fa fa-copy" style="font-size:24px"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <span class="m-al" style="color: #fff;">OR</span> 
                    </div>

                    <div class="col-lg-8" style="margin-top:10px;">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">STEP 1 (QR CODE)</span>
                            </div>
                            <input type="text" class="form-control" value="TRANSFER USING THE QR CODE ">
                            <div class="input-group-append">
                                <span class="input-group-text"><a href="<?= base_url().'assets/img/qr_code_full.jfif' ?>" target="_blank">View QR Code
                            </a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">                        
                        <div class="form-group">
                            <span>Amount:-</span><input  style="padding-left:0" class="form-control" name="deposit_amount" id="order_amount" value="<?= $amount ?>" type="text" />
                        </div>
                    </div>
                    <input type="hidden" name="upi_id" value="<?= $upi_id?>">
                    <div class="col-lg-12" style="margin-bottom:20px;"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>STEP 2 : After completing the FUNDS TRANSFER,<br>
                            Fill out the <b style="color: #fff;">REFERENCE NUMBER</b> / 
                            <b style="color: #fff;">UPI TRANSACTION ID</b>  below</label><br>
                            <input class="form-control" name="reference_number" required placeholder="12 DIGIT REFERENCE NUMBER" type="number" maxlength="22"/>
                            <input name="payment_type" type="hidden" value="<?= $payment_type ?>"/>
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
    function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("upi_id");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    toastr.success("UPI ID Copied.");
    }
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
<style>
    .input-group-append .input-group-text {
        background-color: #FFB612;
        border: 1px solid #FFB612;
        color:#fff !important;
    }    
    .input-group-prepend .input-group-text {
        color:#fff !important;
    }    
    .input-group-append .input-group-text a { color:#000;}
</style>