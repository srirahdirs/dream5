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
                            <span>UPI ID:-</span><input class="form-control" name="upi_id" id="upi_id" value="<?= $upi_id ?>" type="text" style="color:#fff !important"/>
                        </div>
                        <div class="form-group">
                            <span>Amount:-</span><input class="form-control" name="deposit_amount" id="order_amount" value="<?= $amount ?>" type="text" />
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-bottom:20px;"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>STEP 2 : After completing the FUNDS TRANSFER,<br>
                            Fill out the <b>REFERENCE NUMBER</b> / 
                            <b>UPI TRANSACTION ID</b>  below</label><br>
                            <input class="form-control" name="reference_number" placeholder="12 DIGIT REFERENCE NUMBER" type="number" maxlength="22"/>
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
    $(".sidebar-nav-item").removeClass('active');
    $(".sidebar-nav-item .add_cash").addClass('active');    
    //main menu
    $(".nav-item").removeClass('active');
    $(".add_cash_main_menu").addClass('active');    
    
    
    
</script>