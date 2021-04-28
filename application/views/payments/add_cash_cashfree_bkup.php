<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <form id="redirectForm" method="post" action="<?= base_url().'payment-request'?>">
                <div class="row">
                    
                    <!--single row starts-->
                    <div class="col-4">
                        <div class="form-group">
                            <label>ENTER AMOUNT</label><br>
                            <input class="form-control" name="orderAmount" id="order_amount" value="5000" type="number" step="100"/>
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="hide_label">500</label><br>
                        <input class="form-control cursor_pointer" value="500" />
                    </div>
                    <div class="col-2">
                        <label class="hide_label">1000</label><br>
                        <input class="form-control cursor_pointer" value="1000"/>
                    </div>
                    <div class="col-2">
                        <label class="hide_label">2000</label><br>
                        <input class="form-control cursor_pointer" value="2000"/>
                    </div>
                    <div class="col-2">
                        <label class="hide_label">10000</label><br>
                        <input class="form-control cursor_pointer" value="10000"/>
                    </div>
                    <!--single row ends-->
                    <div class="col-12" style="margin-bottom:20px;"></div>
                    
                    <!--single row starts-->
                    <div class="col-4">
                        <div class="form-group">
                            <label>Bonus Code</label><br>
                            <input class="form-control"  id="bonus_code"  type="text" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="col-3">
                        <label class="hide_label">Apply</label><br>
                        <a href="javascript:void(0)" class="btn btn-primary btn-block">APPLY</a>
                    </div>
                    <div class="hide_form">
                        <div class="form-group">
                            <label>App ID:</label><br>
                            <input class="form-control" name="appId" placeholder="Enter App ID here (Ex. 123456a7890bc123defg4567)"  value="<?= appId ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Order ID:</label><br>
                            <input class="form-control" name="orderId" placeholder="Enter Order ID here (Ex. order00001)" value="<?= $orderId?>"/>
                        </div>

                        <div class="form-group">
                            <label>Order Currency:</label><br>
                            <input class="form-control" name="orderCurrency" value="INR" placeholder="Enter Currency here (Ex. INR)"/>
                        </div>
                        <div class="form-group">
                            <label>Order Note:</label><br>
                            <input class="form-control" name="orderNote" placeholder="Enter Order Note here (Ex. Test order)"/>
                        </div>    
                        <div class="form-group">
                            <label>Name:</label><br>
                            <input class="form-control" name="customerName" placeholder="Enter your name here (Ex. John Doe)" value="<?= $customerName ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Email:</label><br>
                            <input class="form-control" name="customerEmail" placeholder="Enter your email address here (Ex. Johndoe@test.com)" value="<?= $customerEmail ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Phone:</label><br>
                            <input class="form-control" name="customerPhone" placeholder="Enter your phone number here (Ex. 9999999999)" value="<?= $customerPhone ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Return URL:</label><br>
                            <input class="form-control" name="returnUrl" placeholder="Enter the URL to which customer will be redirected (Ex. www.example.com)" value="<?= $returnUrl?>"/>
                        </div>        
                        <div class="form-group">
                            <label>Notify URL:</label><br>
                            <input class="form-control" name="notifyUrl" placeholder="Enter the URL to get server notificaitons (Ex. www.example.com)" value="<?= $notifyUrl ?>"/>
                        </div>
                    </div>
                   
                    <div class="col-12" style="margin-bottom:50px;"></div>
                    <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block" value="Pay">ADD CASH</button>
                    </div> 
                </div>                
                <br>
                <p class="mg-b-20 mg-sm-b-40"> By clicking confirm, you agree that you are 18+, resident of India and not playing from Assam, Orissa and Telangana.</p>
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
    
    $('.cursor_pointer').on("click",function(){
        $('.cursor_pointer').css('background','none');
        $(this).blur();
        $(this).css('background', '#FFB612');
        $('#order_amount').val($(this).val());
    });
</script>