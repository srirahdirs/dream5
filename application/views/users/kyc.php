<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <form id="redirectForm" method="post" action="<?= base_url() . 'user/kyc' ?>" enctype="multipart/form-data">
                <div class="row">                    
                    <div class="table-responsive">
                        <table class="table mg-b-0 tx-13">
                            <thead>
                                <tr>
                                    <th class="wd-25p">Information</th>
                                    <th class="wd-25p">Details</th>
                                    <th class="wd-20p">Status</th>
                                    <th class="wd-30p" style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                    
                                    <td>EMAIL ID</td>
                                    <td><?= $user->email ?></td>
                                    <td><?= ($user->email_verified == 1 ) ? '<span class="success">Verified</span>' : '<span class="error">Not verified</span>' ?></td>
                                    <td style="text-align:center;"><a class="small_btn btn btn-primary" href="<?= base_url() . 'my-profile/' . $encrypted_user_id ?>">UPDATE</a></td>
                                </tr>
                                <tr>

                                    <td>MOBILE NUMBER</td>
                                    <td><?= $user->mobile_number ?></td>
                                    <td><?= '-';// ($user->otp_verified == 1 ) ? '<span class="success">Verified</span>' : '<span class="error">Not verified</span>' ?></td>
                                    <td  style="text-align:center;"><a class="small_btn btn btn-primary" href="<?= base_url() . 'my-profile/' . $encrypted_user_id ?>">UPDATE</a></td>
                                </tr>
                                <tr>                                   
                                    <td>PAN CARD</td>
                                    <td>
                                        <?=
                                        ($user->pan_card != '' ) ? '<input type="text" name="pan_card" value="' . $user->pan_card . '" class="form-control" disabled>' :
                                                '<span class="error"><input type="text" name="pan_card" placeholder="PANCARD NUMBER" class="form-control" required onkeyup="this.value = this.value.toUpperCase();" autocomplete="off"></span>'
                                        ?>
                                        <?php echo form_error('pan_card', '<div class="error">', '</div>'); ?>
                                    </td>
                                    <td><?= ($user->is_pan_verified != '' ) ? '<span class="success">Verified</span>' : '<span class="error">Not verified</span>' ?></td>
                                    <td>
                                        <?php
                                        if ($user->pan_card_file != '') {
                                            echo '<p class="uploaded">uploaded</p>';
                                        } else {
                                            ?>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="pan_card_file" required="">
                                                <label class="custom-file-label custom-file-label-primary pan_card_file" for="customFile">Upload</label>
                                            </div><!-- custom-file -->
                                        <?php } ?>
                                    </td>
                                </tr>
                                <!-- <tr>                                    
                                    <td>ADDRESS PROOF</td>
                                    <td>
                                        <select class="form-control select2 select2-hidden-accessible" name="address_proof" <?php if($user->address_proof != '') { echo 'disabled'; } ?>> 
                                            <option value="aadhar_card" <?php if($user->address_proof == 'aadhar_card'){ echo 'selected';} ?>>Aadhar Card</option>
                                            <option value="passport" <?php if($user->address_proof == 'passport'){ echo 'selected';} ?>>Passport</option>
                                            <option value="driving_license" <?php if($user->address_proof == 'driving_license'){ echo 'selected';} ?>>Driving License</option>
                                            <option value="voter_id" <?php if($user->address_proof == 'voter_id'){ echo 'selected';} ?>>Voter ID</option>
                                        </select>
                                    </td>
                                    <td><?= ($user->is_address_proof_verified != '' ) ? '<span class="success">Verified</span>' : '<span class="error">Not verified</span>' ?></td>
                                    <td>
                                        <?php
                                        if ($user->address_proof_file_1 != '') {
                                            echo '<p class="uploaded">uploaded</p>';
                                        } else {
                                            ?>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="address_proof_file[]" multiple="">
                                                <label class="custom-file-label custom-file-label-primary address_proof_file" for="customFile">Front & Back</label>
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td>BANK ACCOUNT</td>
                                    <td><select class="form-control select2 select2-hidden-accessible" name="bank_proof" <?php if($user->bank_proof != '') { echo 'disabled'; } ?>> 
                                            <option value="passbook" <?php if($user->bank_proof == 'passbook'){ echo 'selected';} ?>>Passbook</option>
                                            <option value="cheque" <?php if($user->bank_proof == 'cheque'){ echo 'selected';} ?>>Cheque</option>
                                            <option value="account_statement" <?php if($user->bank_proof == 'account_statement'){ echo 'selected';} ?>>Account Statement</option>
                                        </select>
                                    </td>
                                    <td><?= ($user->is_bank_account_verified != '' ) ? '<span class="success">Verified</span>' : '<span class="error">Not verified</span>' ?></td>
                                    <td>
                                        <?php
                                        if ($user->bank_proof_file != '') {
                                            echo '<p class="uploaded">uploaded</p>';
                                        } else {
                                            ?>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="bank_proof_file">
                                                <label class="custom-file-label custom-file-label-primary bank_proof_file" for="customFile">Upload</label>
                                            </div>
                                        <?php } ?>
                                    </td>
                                </tr> -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <?php if(($user->pan_card_file == '') || ($user->address_proof_file_1 == '') || ($user->bank_proof_file == '')) {?>
                                        <td colspan="3"></td><td style="text-align:center"><button class="btn btn-success bd-0">SAVE</button></td>
                                    <?php } ?>
                                </tr>
                            </tfoot>
                        </table>                        
                    </div>                    
                </div>                 
            </form> 
            <label class="section-title" style="font-size: 12px;text-align: center">Note: Once the documents are uploaded, KYC verification will be completed within 24 hours.</label>
        </div>
        <div class="section-wrapper" style="margin-top:20px">
            <div class="bc_bg_main">
                <label class="section-title">What is KYC?</label>

                <div class="aboutrummy_inner_con">
                    <p>We at <span style="color:#FFDD00;">DREAM5</span> strive to maintain the integrity and transparency of our system, which includes being able to positively identify our customers.This process is called as <a href="#" onclick="dispLightBox('know-your-customer.html')">"Know Your Customer" </a>(KYC).</p>
                </div>
                <div class="aboutrummy_inner_con">
                    <p>This is not only important for legal compliance, but also helps to ensure full security of accounts as well as better service to our players.</p>
                </div>
                <div class="aboutrummy_inner_con">
                    <p>We have made the KYC process very easy and convenient for you, and assure you that the documents/information you provide are completely confidential and secure with us.</p>
                </div>
            </div>
            <div class="">
                <label class="section-title">Know Your Customer</label>
                <div class="pri_pol_content" id="ContentId">
                    <!-- <p>We at <b>DREAM5</b> strive to maintain the integrity and transparency of our system, which includes being able to positively identify our customers. This process is called as<strong> Know Your Customer</strong>.
                    </p> -->
                    <div class="promo_inner_con" style="padding-top:10px;">
                        <ul class="mid_sub_text" style="padding-left: 30px;">
                            <li>We are very vigilant about our customer base, right from the ‘Sign up’ stage. Only the players who meet our age criteria (18+) and agree to our terms and conditions get access to our website.</li>
                            <li>Any cash added beyond a certain limit are processed only after an enhanced KYC process is executed and verified from our end.</li>
                            <li>Keeping our ‘Responsible Gaming’ policy in mind, no player can increase his add cash limits without validating certain KYC criteria</li>
                            <li> For ID proofing we accept Ration card, Aadhaar Card, Driver’s License , Passport and Voter’s ID as they suffice as address proof as well</li>
                            <li>In order to ensure statutory compliance under Income Tax Act, players need to submit a scanned copy of their PAN card in high entry games , where a chance of TDS deductions on winnings is possible</li>
                            <li>Submission of bank statements can be requested in case of suspicious transactions.  </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>
<script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url(); ?>";
    $(".sidebar-nav-link").removeClass('active');
    $(".nav-sub-item").removeClass('active');
    $(".my_profile").addClass('active');
    $(".kyc").addClass('active');
    $(".home_main_menu").addClass('active');

    $('input[name="pan_card_file"]').change(function (e) {
        $('.pan_card_file').html('pancard attached');
    });
    $('input[name="address_proof_file[]"]').change(function (e) {

        if (parseInt($('input[name="address_proof_file[]"]').get(0).files.length) > 2) {
            toastr.error("You can upload maximum 2 files");
            $('input[name="address_proof_file[]"]').val('');
            $(this).val('');
        } else {
            $('.address_proof_file').html('address proofs attached');
        }
    });
    $('input[name="bank_proof_file"]').change(function (e) {
        $('.bank_proof_file').html('bank proof attached');
    });
</script>
