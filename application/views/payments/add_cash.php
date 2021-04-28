<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <form id="redirectForm" method="post" action="">
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
                    <!-- <div class="hide_form"> -->
                    <div class="col-3">
                        <label class="hide_label">Pay</label><br>
                        <button id="rzp-button1" class="btn btn-primary btn-block">Pay</button>
                    </div>
                    <div class="col-2">
                        <label class="hide_label">UPI</label><br>
                        <button id="upi" class="btn btn-primary btn-block">UPI</button>
                    </div>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script><script>var options = {    "key": 'rzp_test_a48zLIZs22FofS',    
                                "amount": "100",   
                                "currency": "INR",    
                                "name": "Acme Corp",
                                "description": "Test Transaction", 
                                "image": "https://example.com/your_logo", 
                                "callback_url": "http://localhost/mangatha_ci/payments/response", 
                                "prefill": {       
                                    "name": "Gaurav Kumar",       
                                    "email": "gaurav.kumar@example.com",  
                                    "contact": "9999999999"  
                                },   
                               "notes": {   
                                    "address": "Razorpay Corporate Office"    
                                },    
                                "theme": { 
                                    "color": "#3399cc"  
                                }
                        };
                        var rzp1 = new Razorpay(options);document.getElementById('rzp-button1').onclick = function(e){    rzp1.open();    e.preventDefault();}
                        </script>
                    <!-- </div> -->
                   
                    <div class="col-12" style="margin-bottom:50px;"></div>
                    <div class="col-6">
                            <!-- <button type="submit" class="btn btn-primary btn-block" value="Pay">ADD CASH</button> -->
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
    $('#upi').click(function (e) {
        e.preventDefault();
        $.confirm({
            title: 'Please select payment method' ,
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Payment Method</label>' +
            '<select class="form-control" required id="payment_type">' +
            '<option value="gpay">Gpay</option>' +
            '<option value="paytm">Paytm</option>' +
            '<option value="phonepe">Phonepe</option>' +
            '<option value="bhim">BHIM</option>' +
            '</select>' +
            '<label>Enter the amount</label>' +
            '<input type="number" placeholder="Rs.100 - Rs.10000" min="1" max="10000" class="deposit_amount form-control" required id="amount" value="'+ $("#order_amount").val()+'"/>' +
            '</div>' +
            '</form><br>',
            buttons: {
                formSubmit: {
                    text: 'DEPOSIT',
                    btnClass: 'btn-success',
                    action: function () {
                        var amount = this.$content.find('.deposit_amount').val();
                        var payment_type = $("#payment_type").val();
                        if(!amount){
                            $.alert('Enter a valid amount');
                            return false;
                        }
                        window.location.href="<?php echo base_url('payments/depositAmount'); ?>?amount="+amount +"&payment_type="+payment_type;
                        
                    }
                },
                cancel: function () {
                    //close
                },
            },
        }); //confirm e
    });
</script>