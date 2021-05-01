<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel">
    <div class="container pd-t-50">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="tx-white mg-b-15">Welcome, <span style="color: #23BF08"><?= $this->session->userdata('username') ?></span>!</h3>
                <p class="mg-b-40"><b>5</b> CRAZY reasons Why should you choose <b>DREAM5.</b></p>

                <h6 class="slim-card-title mg-b-15">Your Earning Summary</h6>
                <div class="row no-gutters">
                    <div class="col-sm-6">
                        <div class="card card-earning-summary">
                            <h6>Today's Earnings</h6>
                            <h1>&#8377;  950</h1>
                            <span>Based on list price</span>
                        </div><!-- card -->
                    </div><!-- col-6 -->
                    <div class="col-sm-6">
                        <div class="card card-earning-summary mg-sm-l--1 bd-t-0 bd-sm-t">
                            <h6>This Week's Earnings</h6>
                            <h1>&#8377;  12,420</h1>
                            <span>Based on list price</span>
                        </div><!-- card -->
                    </div><!-- col-6 -->
                </div><!-- row -->
            </div><!-- col-6 -->
            <div class="col-lg-6 mg-t-20 mg-sm-t-30 mg-lg-t-0">
                <div class="card card-dash-headline">
                    <h4>Introducing the responsive admin dashboard template made with Bootstrap 4</h4>
                    <p>Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus...</p>
                    <div class="row row-sm">
                        <div class="col-sm-6">
                            <a href="" class="btn btn-primary btn-block">Account Settings</a>
                        </div><!-- col-6 -->
                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                            <a href="" class="btn btn-success btn-block">REFER NOW</a>
                        </div><!-- col-6 -->
                    </div><!-- row -->
                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->

       

        <div class="card card-table mg-t-20 mg-sm-t-30">
            <div class="card-header">
                <h6 class="slim-card-title">Purchases</h6>
                <nav class="nav">
                    <!-- <a href="" class="nav-link active">OVERALL</a>   -->
                </nav>
            </div><!-- card-header -->
            <div class="table-responsive">
                <table class="table mg-b-0 tx-13">
                    <thead>
                        <tr>
                            <th class="wd-5p">#</th>
                            <th class="wd-25p">Reference Id</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-20p">Payment Mode</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-20p">Status</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        $i = 1;
                        foreach ($transactions_history as $row):
                            ?>
                            <tr>                                    
                                <td><?= $i ?></td>
                                <td><?= $row['reference_id'] ?></td>
                                <td><?= $row['amount'] ?></td>
                                <td><?= $row['payment_mode'] ?></td>
                                <td><?= date('Y-m-d', strtotime($row['ordered_at'])) ?></td>
                                <td><?= $row['status'] ?></td>
                            </tr>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </tbody>
                </table>                        
            </div>                  
            <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <a href="<?= base_url('payments/transactions')?>"><i class="fa fa-angle-down mg-r-5"></i>View All Transactions</a>
            </div><!-- card-footer -->
        </div><!-- card -->
        <div class="card card-table mg-t-20 mg-sm-t-30">
            <div class="card-header">
                <h6 class="slim-card-title">Withdrawals</h6>
                <nav class="nav">
                    <!-- <a href="" class="nav-link active">OVERALL</a>                     -->
                </nav>
            </div><!-- card-header -->
            <div class="table-responsive">
                    <table class="table mg-b-0 tx-13">
                        <thead>
                            <tr>
                                <th class="wd-15p">#</th>
                                <th class="wd-25p">Amount</th>
                                <th class="wd-25p">Date</th>
                                <th class="wd-20p">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($withdrawal_history as $row):
                                ?>
                                <tr>                                    
                                    <td><?= $i ?></td>
                                    <td><?= $row['withdrawal_amount'] ?></td>
                                    <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>
                                    <td><?php if($row['status'] == 'reversed'){ echo '<strike>'. ucfirst($row['status']) .'</strike>';} else { echo ucfirst($row['status']); } ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>                        
                </div>               
            <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <a href="<?= base_url('payments/withdrawHistory')?>"><i class="fa fa-angle-down mg-r-5"></i>View All Transactions</a>
            </div><!-- card-footer -->
        </div><!-- card -->
    </div><!-- container -->


</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>
<script type='text/javascript'>
    $(".nav-item").removeClass('active');
    $(".home_main_menu").addClass('active');
</script>