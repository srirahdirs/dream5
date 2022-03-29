<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="manager-header">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <!--              <li class="breadcrumb-item"><a href="#">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Contact Manager</li>-->
                </ol>
                <h6 class="slim-pagetitle">WITHDRAWAL</h6>
            </div><!-- slim-pageheader -->
            <a id="contactNavicon" href="" class="contact-navicon"><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="section-wrapper">
            <label class="section-title">Your Balance: <span class="primary"><?= $user->cash ?></span> <span style="float: right">minimum withdrawal <span class="primary">200</span></span></label>
            <br>
            <?php 
            if($user->is_pan_verified != 'Yes') {
                if($user->pan_card_file != '' && $user->is_pan_verified != 'Rejected'){
                    echo '<p class="mg-b-20 mg-sm-b-40">Pancard <a href="javascript:void(0))"> uploaded</a>. Please wait our team is verifying your pancard.</p>';
                } else if($user->is_pan_verified == 'Rejected'){
                    echo '<p class="mg-b-20 mg-sm-b-40">Pancard <a style="color:red;" href="javascript:void(0))"> rejected</a>. Please wait our team will get back to you shortly.</p>';
                } else {
                    echo '<p class="mg-b-20 mg-sm-b-40">Please complete your <a href="'. base_url('user/kyc').'"> KYC</a> and withdraw your wallet amount.</p>';
                }
            } else { 
                ?>
            
            <form id="redirectForm" method="post" action="<?= base_url() . 'withdraw-cash' ?>">
                <div class="row">
                    <div class="col-lg-2"></div>
                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                    <div class="form-layout form-layout-5">
                        <div class="row">
                            <label class="col-sm-5 form-control-label"><span class="tx-danger">*</span> AMOUNT:</label>
                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                <input type="number" class="form-control" placeholder="Enter amount" name="amount" required="" autocomplete="off" step="100" value="<?= set_value('amount')?>">
                                <?php echo form_error('amount', '<div class="error">', '</div>'); ?>
                            </div>
                            
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-5 form-control-label"><span class="tx-danger">*</span> FULL NAME:</label>
                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" value="<?= $user->first_name . ' ' .$user->last_name ?>" readonly="" style="text-transform: uppercase;">
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-5 form-control-label"><span class="tx-danger">*</span> ACCOUNT NO:</label>
                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" autocomplete="off" required="" value="<?= ($user->account_number != '') ? $user->account_number : set_value('account_number') ?>" name="account_number" <?= ($user->account_number != '') ? 'readonly' : ''?> placeholder="eg:1010003520***">
                                <?php echo form_error('account_number', '<div class="error">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-5 form-control-label"><span class="tx-danger">*</span> CONFIRM A/C NO:</label>
                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control"  autocomplete="off" required="" value="<?= ($user->account_number != '') ? $user->account_number : set_value('confirm_account_number') ?>" name="confirm_account_number" <?= ($user->account_number != '') ? 'readonly' : ''?> placeholder="eg:1010003520***">
                                <?php echo form_error('confirm_account_number', '<div class="error">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-5 form-control-label"><span class="tx-danger">*</span> BANK NAME:</label>
                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" autocomplete="off" required="" value="<?= ($user->bank_name != '') ? $user->bank_name : set_value('bank_name') ?>"  name="bank_name" <?= ($user->bank_name != '') ? 'readonly' : ''?> placeholder="eg:STA*** BANK OF INDIA">
                                <?php echo form_error('bank_name', '<div class="error">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-5 form-control-label"><span class="tx-danger">*</span> IFSC CODE:</label>
                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" autocomplete="off" required="" value="<?= ($user->ifsc_code != '') ? $user->ifsc_code : set_value('ifsc_code') ?>"  name="ifsc_code" <?= ($user->ifsc_code != '') ? 'readonly' : ''?> placeholder="eg:SEDI0003309">
                                <?php echo form_error('ifsc_code', '<div class="error">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row mg-t-30">
                            <div class="col-sm-7 mg-l-auto">
                                <div class="form-layout-footer">
                                    <button class="btn btn-primary bd-0" id="withdraw">Withdraw</button>
                                    <a href="<?= base_url() . 'home' ?>" class="btn btn-secondary bd-0">Cancel</a>
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                    </div>    
                </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>

<script type="text/javascript">
    $(".sidebar-nav-item").removeClass('active');
    $(".sidebar-nav-item .withdraw_cash_side_menu").addClass('active');
    $(".sidebar-nav-item .withdraw_cash").addClass('active');
    //main menu
    $(".nav-item").removeClass('active');
    $(".withdraw_main_menu").addClass('active');
    
    $('.cursor_pointer').on("click", function () {
        $('.cursor_pointer').css('background', 'none');
        $(this).blur();
        $(this).css('background', '#FFB612');
        $('#order_amount').val($(this).val());
    });

    // $('#withdraw').click(function (e) {
    //     e.preventDefault();
    //     $.confirm({
    //         title: 'Please Confirm',
    //         content: 'Are sure you want to withdraw?',
    //         buttons: {
    //             confirm: function () {
    //                 $("#redirectForm").submit();
    //             }, //confirm btn ends
    //             cancel: function () {
    //             },
    //         },
    //     }); //confirm e
    // });
</script>
<style>
    span.primary {
        color: #FFB612;
    }
    .form-layout-5 .form-control-label {
     justify-content: flex-start; 
    }
</style>