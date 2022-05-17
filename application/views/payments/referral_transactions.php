<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
    <blink><marquee style="color: #23BF08">Note: amount will be added to your account, after user deposit and withdrew at least one time.</marquee></blink>
    <div class="manager-header">
            <div class="slim-pageheader">
                <div class="col-lg-3" style="padding: 0;">
                    <a href="<?= site_url('refer'); ?>" class="btn btn-success btn-block">REFER NOW</a>
                </div>
            </div><!-- slim-pageheader -->
    </div>
        <div class="section-wrapper">
        
        
            <div class="row">                    
                <div class="table-responsive">
                    <table class="table mg-b-0 tx-13">
                        <thead>
                            <tr>
                                <th class="wd-5p">#</th>
                                <th class="wd-10p">Referred</th>
                                <th class="wd-20p">Buddy Deposited Status</th>
                                <th class="wd-20p">Buddy Withdrew Status</th>
                                <th class="wd-5p">Amount</th>
                                <th class="wd-10p">Referred At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($transactions_history as $row):
                                ?>
                                <tr>                                    
                                    <td><?= $i ?></td>
                                    <td><?= $row['referral_username'] ?></td>
                                    <td><?php if($row['is_user_deposited'] == 0){ echo "No"; } else { echo "Yes";} ?></td>                                    
                                    <td><?php if($row['is_user_withdrew'] == 0){ echo "No"; } else { echo "Yes";} ?></td>
                                    <td><?= $row['amount'] ?></td>
                                    <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>                        
                </div>                    
            </div>  
            <?php echo $links; ?>
        </div>
    </div>
</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>

<script type="text/javascript">
    $(".sidebar-nav-item").removeClass('active');
    $(".sidebar-nav-item .referral_transactions").addClass('active');
//    $(".sidebar-nav-item .transactions").addClass('active');
    $(".home_main_menu").addClass('active');
</script>
<style>

</style>