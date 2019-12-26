<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <form id="redirectForm" method="post" action="<?= base_url() . 'user/kyc' ?>">
                <div class="row">                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-colored table-success">
                            <thead>
                                <tr>
                                    <th class="wd-30p">Information</th>
                                    <th class="wd-30p">Details</th>
                                    <th class="wd-20p">Status</th>
                                    <th class="wd-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>                                    
                                    <td>Email ID</td>
                                    <td>sri.rahdirs@gmail.com</td>
                                    <td>Verified</td>
                                    <td>Update</td>
                                </tr>
                                <tr>
                                    
                                    <td>Mobile Number</td>
                                    <td>Accountant</td>
                                    <td>$170,750</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    
                                    <td>ID PROOF</td>
                                    <td>Junior Technical Author</td>
                                    <td>$86,000</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                   
                                    <td>PAN CARD</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>$433,060</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>BANK ACCOUNT</td>
                                    <td>Accountant</td>
                                    <td>$162,700</td>
                                    <td>$162,700</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>                
            </form>
        </div>
        <div class="section-wrapper" style="margin-top:20px">
            <div class="bc_bg_main">
                <label class="section-title">What is KYC?</label>

                <div class="aboutrummy_inner_con">
                    <p>We at <b>DREAM5</b> strive to maintain the integrity and transparency of our system, which includes being able to positively identify our customers.This process is called as <a href="#" onclick="dispLightBox('know-your-customer.html')">"Know Your Customer" </a>(KYC).</p>
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
                  <p>We at <b>DREAM5</b> strive to maintain the integrity and transparency of our system, which includes being able to positively identify our customers. This process is called as<strong> Know Your Customer</strong>.
                    </p>
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

</script>
<style>
    .table.table-success{
        background-color: #282D31;
    }
    .table td{
        color: #868ba1;
    }
    .table td:first-child{
        color: #fff;
    }

</style>