<?php
$this->load->view('layouts/header');
$this->load->view('layouts/menu');
?>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            
            <ol class="breadcrumb slim-breadcrumb">
                <?php if($user->admin_verified == 0) { ?>
                <li class="breadcrumb-item"><a href="javascript:void(0)" class="btn btn-primary btn-block" onclick="Approve(<?= $user_id ?>)">APPROVE</a></li>
                <?php } else { ?>
                    <li class="breadcrumb-item"><span style="font-weight:bold;padding:10px;color:#23BF08"><i class="fa fa-check"></i> Verified</span></li>
                    
                <?php }?>
            </ol>
            <h6 class="slim-pagetitle">USER DETAILS - <span class="slim-card-title tx-success" style="font-size:20px;"><?= $user->first_name ?></span></h6>
        </div><!-- slim-pageheader -->
        <?php if($user->admin_verified == 1) { ?>
            <marquee direction = "right"><span style="font-weight:bold;padding:10px;color:#23BF08"><i class="fa fa-check"></i> Verified</span></marquee>
        <?php } else { ?>
            <marquee direction = "right"><span style="font-weight:bold;padding:10px;color:red"><i class="fa fa-check"></i> Not Verified</span></marquee>
        <?php }  ?>
        <div class="row row-sm">
            <div class="col-lg-4">
                <div class="card card-sales">
                    <h6 class="slim-card-title tx-primary">PURCHASE Report</h6>
                    <div class="row">
                        <div class="col">
                            <label class="tx-12">Today</label>
                            <p>1,898</p>
                        </div><!-- col -->
                        <div class="col">
                            <label class="tx-12">This Week</label>
                            <p>32,112</p>
                        </div><!-- col -->
                        <div class="col">
                            <label class="tx-12">This Month</label>
                            <p>72,067</p>
                        </div><!-- col -->
                    </div><!-- row -->

                    <div class="progress mg-b-5">
                        <div class="progress-bar bg-primary wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                    <p class="tx-12 mg-b-0">Maecenas tempus, tellus eget conditum rhon.</p>
                </div><!-- card -->
            </div><!-- col-4 -->
            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                <div class="card card-sales">
                    <h6 class="slim-card-title tx-success">WITHDRAW Report</h6>
                    <div class="row">
                        <div class="col">
                            <label class="tx-12">Today</label>
                            <p>1,263</p>
                        </div><!-- col -->
                        <div class="col">
                            <label class="tx-12">This Week</label>
                            <p>28,767</p>
                        </div><!-- col -->
                        <div class="col">
                            <label class="tx-12">This Month</label>
                            <p>68,324</p>
                        </div><!-- col -->
                    </div><!-- row -->

                    <div class="progress mg-b-5">
                        <div class="progress-bar bg-success wd-75p" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                    <p class="tx-12 mg-b-0">Maecenas tempus, tellus eget conditum rhon.</p>
                </div><!-- card -->
            </div><!-- col-4 -->
            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                <div class="card card-sales">
                    <h6 class="slim-card-title tx-danger">GAME Report</h6>
                    <div class="row">
                        <div class="col">
                            <label class="tx-12">Today</label>
                            <p>1,263</p>
                        </div><!-- col -->
                        <div class="col">
                            <label class="tx-12">This Week</label>
                            <p>28,767</p>
                        </div><!-- col -->
                        <div class="col">
                            <label class="tx-12">This Month</label>
                            <p>68,324</p>
                        </div><!-- col -->
                    </div><!-- row -->

                    <div class="progress mg-b-5">
                        <div class="progress-bar bg-danger wd-35p" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                    </div>
                    <p class="tx-12 mg-b-0">Maecenas tempus, tellus eget conditum rhon.</p>
                </div><!-- card -->
            </div><!-- col-4 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pd-b-0">
                        <h6 class="slim-card-title tx-purple">Page Impressions</h6>
                        <h2 class="tx-lato tx-inverse">323,360</h2>
                        <p class="tx-12"><span class="tx-purple">2.5%</span> change from yesterday</p>
                    </div><!-- card-body -->
                    <div id="rs1" class="ht-50 ht-sm-70 mg-r--1 rickshaw_graph"><svg width="375" height="70"><g><path d="M0,9.933993399339938Q25,13.630363036303637,28.846153846153847,14.55445544554456C34.61538461538461,15.940594059405946,51.92307692307693,23.333333333333336,57.69230769230769,23.795379537953796S80.76923076923077,20.099009900990097,86.53846153846155,19.174917491749174S109.61538461538461,14.092409240924098,115.38461538461539,14.55445544554456S138.46153846153845,23.795379537953796,144.23076923076923,23.795379537953796S167.30769230769232,14.55445544554456,173.0769230769231,14.55445544554456S196.15384615384613,23.795379537953796,201.9230769230769,23.795379537953796S225,16.40264026402641,230.76923076923077,14.55445544554456S253.8461538461538,3.465346534653469,259.6153846153846,5.313531353135316S282.6923076923077,33.4983498349835,288.46153846153845,33.03630363036304S311.53846153846155,0.23102310231023226,317.3076923076923,0.6930693069306937S340.3846153846154,35.34653465346534,346.1538461538462,37.65676567656765Q350.00000000000006,39.19691969196919,375,23.795379537953796L375,70Q350.00000000000006,70,346.1538461538462,70C340.3846153846154,70,323.0769230769231,70,317.3076923076923,70S294.2307692307692,70,288.46153846153845,70S265.38461538461536,70,259.6153846153846,70S236.53846153846155,70,230.76923076923077,70S207.69230769230768,70,201.9230769230769,70S178.84615384615387,70,173.0769230769231,70S150,70,144.23076923076923,70S121.15384615384616,70,115.38461538461539,70S92.30769230769232,70,86.53846153846155,70S63.46153846153846,70,57.69230769230769,70S34.61538461538461,70,28.846153846153847,70Q25,70,0,70Z" class="area" fill="#6F42C5"></path></g></svg></div>
                </div><!-- card -->
            </div><!-- col-4 -->
            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                <div class="card">
                    <div class="card-body pd-b-0">
                        <h6 class="slim-card-title tx-info">Page Impressions</h6>
                        <h2 class="tx-lato tx-inverse">598,486</h2>
                        <p class="tx-12"><span class="tx-info">2.5%</span> change from yesterday</p>
                    </div><!-- card-body -->
                    <div id="rs2" class="ht-50 ht-sm-70 mg-r--1 rickshaw_graph"><svg width="375" height="70"><rect x="0" y="41.12211221122112" width="25.44642857142857" height="28.87788778877888" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="26.785714285714285" y="29.57095709570957" width="25.44642857142857" height="40.42904290429043" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="53.57142857142857" y="12.244224422442237" width="25.44642857142857" height="57.75577557755776" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="80.35714285714285" y="6.468646864686462" width="25.44642857142857" height="63.53135313531354" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="107.14285714285714" y="0.6930693069306859" width="25.44642857142857" height="69.30693069306932" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="133.92857142857144" y="12.244224422442237" width="25.44642857142857" height="57.75577557755776" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="160.7142857142857" y="18.01980198019802" width="25.44642857142857" height="51.98019801980198" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="187.5" y="29.57095709570957" width="25.44642857142857" height="40.42904290429043" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="214.28571428571428" y="35.34653465346535" width="25.44642857142857" height="34.65346534653466" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="241.07142857142858" y="23.795379537953796" width="25.44642857142857" height="46.20462046204621" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="267.8571428571429" y="18.01980198019802" width="25.44642857142857" height="51.98019801980198" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="294.6428571428571" y="12.244224422442237" width="25.44642857142857" height="57.75577557755776" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="321.4285714285714" y="29.57095709570957" width="25.44642857142857" height="40.42904290429043" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect><rect x="348.2142857142857" y="12.244224422442237" width="25.44642857142857" height="57.75577557755776" transform="matrix(1,0,0,1,0,0)" fill="#5B93DB"></rect></svg></div>
                </div><!-- card -->
            </div><!-- col-4 -->
            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                <div class="card">
                    <div class="card-body pd-b-0">
                        <h6 class="slim-card-title tx-primary">Page Impressions</h6>
                        <h2 class="tx-lato tx-inverse">323,360</h2>
                        <p class="tx-12"><span class="tx-primary">2.5%</span> change from yesterday</p>
                    </div><!-- card-body -->
                    <div id="rs3" class="ht-50 ht-sm-70 mg-r--1 rickshaw_graph">
                        <svg width="375" height="70">
                        <!--<path class="path" d="M0,41.12211221122112Q25,31.496149614961496,28.846153846153847,29.57095709570957C34.61538461538461,26.683168316831683,51.92307692307693,14.554455445544548,57.69230769230769,12.244224422442237S80.76923076923077,7.623762376237616,86.53846153846155,6.468646864686462S109.61538461538461,0.11551155115510858,115.38461538461539,0.6930693069306859S138.46153846153845,10.511551155115503,144.23076923076923,12.244224422442237S167.30769230769232,16.28712871287129,173.0769230769231,18.01980198019802S196.15384615384613,27.83828382838284,201.9230769230769,29.57095709570957S225,35.92409240924093,230.76923076923077,35.34653465346535S253.8461538461538,25.528052805280527,259.6153846153846,23.795379537953796S282.6923076923077,19.174917491749177,288.46153846153845,18.01980198019802S311.53846153846155,11.089108910891081,317.3076923076923,12.244224422442237S340.3846153846154,29.57095709570957,346.1538461538462,29.57095709570957Q350.00000000000006,29.57095709570957,375,12.244224422442237" fill="none" stroke="#1B84E7" stroke-width="2" opacity="1"></path>-->
                        <path class="stroke"></path>
                        </svg>
                    </div>
                </div><!-- card -->
            </div><!-- col-4 -->
        </div><!-- row -->

       

        <div class="card-columns mg-t-20" style="orphans:initial !important">
            <div class="card card-map-widget">

                <div class="card-body">

                    ADDRESS<h6><?= $user->address ?>.</h6>
                    CITY<h6> <?= $user->city_name ?>.</h6>
                    STATE<h6><?= $user->state_name ?>.</h6>
                </div><!-- card-body -->
            </div><!-- card -->

            <div class="card card-body pd-25">
                <h6 class="slim-card-title">Get Connected</h6>
                <p>Just select any of your available social account to get started.</p>
                <div class="tx-20">
                    <a href="" class="tx-primary mg-r-5"><i class="fa fa-facebook"></i></a>
                    <a href="" class="tx-info mg-r-5"><i class="fa fa-twitter"></i></a>
                    <a href="" class="tx-danger mg-r-5"><i class="fa fa-google-plus"></i></a>
                    <a href="" class="tx-danger mg-r-5"><i class="fa fa-pinterest"></i></a>
                    <a href="" class="tx-inverse mg-r-5"><i class="fa fa-github"></i></a>
                    <a href="" class="tx-pink mg-r-5"><i class="fa fa-instagram"></i></a>
                </div>
            </div><!-- card -->

            <div class="card card-body pd-25">
                <h6 class="slim-card-title mg-b-20">Quick Contact Form</h6>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div><!-- form-group -->
                <div class="form-group">
                    <textarea name="name" class="form-control" rows="2" placeholder="Enter your message"></textarea>
                </div><!-- form-group -->
                <button class="btn btn-primary btn-block">Send Message</button>
            </div><!-- card -->

            <div class="card card-people-list">
                <div class="slim-card-title">PROFILE DETAILS</div>
                
                <div class="media-list">
                    <div class="media">
                        <a href="#pancardfile" class="btn btn-success mg-l-auto modal-effect"  data-toggle="modal" data-effect="effect-scale"><i class="fa fa-star"></i>View FILE</a>
                        <div class="media-body">
                            <a href="">PANCARD 
                                <?php 
                                if($user->is_pan_verified == 'Yes') { ?>
                                    <span class="right" style="color:#23BF08"> 
                                        <i class="fa fa-check"></i>
                                    </span>
                                <?php } elseif($user->is_pan_verified == 'Rejected') { ?>
                                    <span class="right" style="color:red"> 
                                        
                                        
                                        <i class="icon ion-close"></i>
                                    </span>
                                <?php } else { ?>
                                    <span class="right" style="color:#1B84E7"> 
                                        
                                        <i class="icon ion-help-circled"></i>
                                    </span>
                                <?php }  ?>
                            </a>
                            <p><?= $user->pan_card ?></p>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <a href="#addressprooffile" class="btn btn-success mg-l-auto modal-effect"  data-toggle="modal" data-effect="effect-scale"><i class="fa fa-star"></i>View FILE</a>
                        <div class="media-body">
                            <a href="">ADDRESS PROOF
                                <?php 
                                if($user->is_address_proof_verified == 'Yes') { ?>
                                    <span class="right" style="color:#23BF08"> 
                                        
                                        
                                        <i class="fa fa-check"></i>
                                    </span>
                                <?php } elseif($user->is_address_proof_verified == 'Rejected') { ?>
                                    <span class="right" style="color:red"> 
                                        
                                        
                                        <i class="icon ion-close"></i>
                                    </span>
                                <?php } else { ?>
                                    <span class="right" style="color:#1B84E7"> 
                                        
                                        <i class="icon ion-help-circled"></i>
                                    </span>
                                <?php }  ?>
                            </a>
                            <p><?= $user->address_proof ?></p>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <a href="#bankaccountfile" class="btn btn-success mg-l-auto modal-effect"  data-toggle="modal" data-effect="effect-scale"><i class="fa fa-star"></i>View FILE</a>
                        <div class="media-body">
                            <a href="">BANK PROOF 
                                <?php 
                                if($user->is_bank_account_verified == 'Yes') { ?>
                                    <span class="right" style="color:#23BF08"> 
                                        
                                        
                                        <i class="fa fa-check"></i>
                                    </span>
                                <?php } elseif($user->is_bank_account_verified == 'Rejected') { ?>
                                    <span class="right" style="color:red"> 
                                        
                                        
                                        <i class="icon ion-close"></i>
                                    </span>
                                <?php } else { ?>
                                    <span class="right" style="color:#1B84E7;"> 
                                        
                                        <i class="icon ion-help-circled"></i>
                                    </span>
                                <?php }  ?>
                            </a>
                            <p><?= $user->bank_proof ?></p>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-body">
                            <a href="">ACCOUNT NUMBER</a>
                            <p><?= $user->account_number ?></p>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-body">
                            <a href="">IFSC CODE</a>
                            <p><?= $user->ifsc_code ?></p>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-body">
                            <a href="">BANK NAME</a>
                            <p><?= $user->bank_name ?></p>
                        </div><!-- media-body -->
                    </div><!-- media -->
                </div><!-- media-list -->
                <hr>
                <i class="fa fa-check" style="color:#23BF08"></i> - Verified   <i class="icon ion-close" style="color:red"></i> - Rejected  <i class="icon ion-help-circled" style="color:#1B84E7;"></i> - Not Uploaded
            </div><!-- card -->












            <div class="card-contact mg-b-20">
                <div class="tx-center">
                    <a href=""><img src="../img/img12.jpg" class="card-img" alt=""></a>
                    <h5 class="mg-t-10 mg-b-5"><a href="" class="contact-name"><?= $user->first_name . " " . $user->last_name ?></a></h5>
                    <p><?= $user->gender ?></p>
    <!--                <p class="contact-social">
                      <a href=""><i class="fa fa-facebook"></i></a>
                      <a href=""><i class="fa fa-twitter"></i></a>
                      <a href=""><i class="fa fa-google"></i></a>
                    </p>-->
                </div><!-- tx-center -->

                <p class="contact-item">
                    <span>Phone:</span>
                    <span><?= $user->mobile_number ?></span>
                </p><!-- contact-item -->
                <p class="contact-item">
                    <span>Email:</span>
                    <a href=""><?= $user->email ?></a>
                </p><!-- contact-item -->
                <p class="contact-item">
                    <span>OTP Verified:</span>
                    <a href=""><?= ($user->otp_verified == 1) ? 'Yes' : 'No' ?></a>
                </p><!-- contact-item -->
                <p class="contact-item">
                    <span>Email Verified:</span>
                    <a href=""><?= ($user->email_verified == 1) ? 'Yes' : 'No' ?></a>
                </p><!-- contact-item -->
                <p class="contact-item">
                    <span>Admin Verified:</span>
                    <a href=""><?= ($user->admin_verified == 1) ? 'Yes' : 'No' ?></a>
                </p><!-- contact-item -->
            </div><!-- card -->

            <div class="card card-activities">
                <h6 class="slim-card-title">Recent Activities</h6>
                <p>Last activity was 1 hour ago</p>

                <div class="media-list">
                    <div class="media">
                        <div class="activity-icon bg-primary">
                            <i class="icon ion-stats-bars"></i>
                        </div><!-- activity-icon -->
                        <div class="media-body">
                            <h6>Report has been updated</h6>
                            <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor.</p>
                            <span>2 hours ago</span>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="activity-icon bg-success">
                            <i class="icon ion-trophy"></i>
                        </div><!-- activity-icon -->
                        <div class="media-body">
                            <h6>Achievement Unlocked</h6>
                            <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor.</p>
                            <span>2 hours ago</span>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="activity-icon bg-purple">
                            <i class="icon ion-image"></i>
                        </div><!-- activity-icon -->
                        <div class="media-body">
                            <h6>Added new images</h6>
                            <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor.</p>
                            <span>2 hours ago</span>
                        </div><!-- media-body -->
                    </div><!-- media -->
                </div><!-- media-list -->
            </div><!-- card -->

            <div class="card card-todo">
                <h6 class="slim-card-title">Todo Item List</h6>
                <div class="todo-list">
                    <div class="todo-item">
                        <label class="ckbox">
                            <input type="checkbox" checked=""><span>Do something</span>
                        </label>
                    </div><!-- todo-item -->
                    <div class="todo-item">
                        <label class="ckbox">
                            <input type="checkbox" checked=""><span>Do more stuff</span>
                        </label>
                    </div><!-- todo-item -->
                    <div class="todo-item">
                        <label class="ckbox">
                            <input type="checkbox"><span>Do something else</span>
                        </label>
                    </div><!-- todo-item -->
                    <div class="todo-item">
                        <label class="ckbox">
                            <input type="checkbox"><span>Do something again</span>
                        </label>
                    </div><!-- todo-item -->
                    <div class="todo-item">
                        <label class="ckbox">
                            <input type="checkbox"><span>Do something more</span>
                        </label>
                    </div><!-- todo-item -->
                </div><!-- todo-list -->
            </div><!-- card -->
        </div><!-- card-columns -->

        <div class="mg-t-20">
            <div class="card card-table">
                <div class="card-header">
                    <h6 class="slim-card-title">Purchases</h6>
                </div><!-- card-header -->
                <div class="table-responsive">
                    <table class="table mg-b-0 tx-13">
                        <thead>
                            <tr>
                                <th class="wd-5p">#</th>
                                <th class="wd-25p">Order Id</th>
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
                                    <td><?= $row['order_id'] ?></td>
                                    <td><?= $row['amount'] ?></td>
                                    <td><?= $row['payment_mode'] ?></td>
                                    <td><?= date('Y-m-d', strtotime($row['txn_time'])) ?></td>
                                    <td><?php
                                        if ($row['txn_status'] != 'SUCCESS') {
                                            echo '<strike>' . ucfirst($row['txn_status']) . '</strike>';
                                        } else {
                                            echo '<span style="color:#23BF08">' . ucfirst($row['txn_status']) . '</span>';
                                        }
                                        ?></td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>                        
                </div>                  

            </div><!-- card -->
            <br>
            <div class="card card-table">
                <div class="card-header">
                    <h6 class="slim-card-title">Withdrawals</h6>
                </div><!-- card-header -->
                <div class="table-responsive">
                    <table class="table mg-b-0 tx-13">
                        <thead>
                            <tr>
                                <th class="wd-5p">#</th>
                                <th class="wd-15p">Amount</th>
                                <th class="wd-15p">Date</th>
                                <th class="wd-20p">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($withdrawal_history as $row):
                                ?>
                                <tr>                                    
                                    <td><?= $i ?></td>
                                    <td><?= $row['withdrawal_amount'] ?></td>
                                    <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>
                                    <td><?php
                                        if ($row['status'] == 'reversed') {
                                            echo '<strike>' . ucfirst($row['status']) . '</strike>';
                                        } else {
                                            echo ucfirst($row['status']);
                                        }
                                        ?></td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>                        
                </div>     

            </div><!-- card -->







        </div><!-- card-columns -->

    </div><!-- container -->
</div><!-- slim panel -->




<?php
$this->load->view('layouts/footer');
?>
<style>
    .table-responsive{
        max-height: 368px;
    }
</style>
<div id="pancardfile" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">PANCARD FILE</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-25">
                <embed src="<?= base_url() . 'assets/user_documents/' . $user_id . '/' . $user->pan_card_file ?>" frameborder="0" width="100%">
            </div>
            <div class="modal-footer">
                <?php
                if ($user->is_pan_verified == 'Yes') {
                    echo '<span style="font-weight:bold;padding10px;color:#23BF08">Verified</span>';
                    ?>
                    <?php
                } else if ($user->is_pan_verified == 'Rejected') {
                    echo '<span style="font-weight:bold;padding10px;color:#dc3545">Rejected</span>';
                } else {
                    ?>  
                    <button type="button" class="btn btn-success" onclick="acceptPAN(<?= $user_id ?>)">ACCEPT </button>
                    <button type="button" class="btn btn-warning" onclick="rejectPAN(<?= $user_id ?>)">REJECT</button>
                <?php } ?>   

                <a href="<?= base_url() . 'assets/user_documents/' . $user_id . '/' . $user->pan_card_file ?>" download class="btn btn-danger">DOWNLOAD</a>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
<div id="addressprooffile" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">ADDRESS PROOF FILES</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-25">
                <h5>FILE I</h5>
                <embed src="<?= base_url() . 'assets/user_documents/' . $user_id . '/' . $user->address_proof_file_1 ?>" frameborder="0" width="100%">
                 <h5>FILE II</h5>
                <embed src="<?= base_url() . 'assets/user_documents/' . $user_id . '/' . $user->address_proof_file_2 ?>" frameborder="0" width="100%">
            </div>
            <div class="modal-footer">
                <?php
                if ($user->is_address_proof_verified == 'Yes') {
                    echo '<span style="font-weight:bold;padding10px;color:#23BF08">Verified</span>';
                    ?>
                    <?php
                } else if ($user->is_address_proof_verified == 'Rejected') {
                    echo '<span style="font-weight:bold;padding10px;color:#dc3545">Rejected</span>';
                } else {
                    ?>  
                    <button type="button" class="btn btn-success" onclick="acceptAddressProof(<?= $user_id ?>)">ACCEPT </button>
                    <button type="button" class="btn btn-warning" onclick="rejectAddressProof(<?= $user_id ?>)">REJECT</button>
                <?php } ?>   

                <a href="<?= base_url() . 'assets/user_documents/' . $user_id . '/' . $user->address_proof_file_1 ?>" download class="btn btn-danger">DOWNLOAD</a>
                <a href="<?= base_url() . 'assets/user_documents/' . $user_id . '/' . $user->address_proof_file_2 ?>" download class="btn btn-danger">DOWNLOAD 2</a>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
<div id="bankaccountfile" class="modal fade">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">BANK ACCOUNT FILE</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-25">
                <embed src="<?= base_url() . 'assets/user_documents/' . $user_id . '/' . $user->bank_proof_file ?>" frameborder="0" width="100%">
            </div>
            <div class="modal-footer">
                <?php
                if ($user->is_bank_account_verified == 'Yes') {
                    echo '<span style="font-weight:bold;padding10px;color:#23BF08">Verified</span>';
                    ?>
                    <?php
                } else if ($user->is_bank_account_verified == 'Rejected') {
                    echo '<span style="font-weight:bold;padding10px;color:#dc3545">Rejected</span>';
                } else {
                    ?>  
                    <button type="button" class="btn btn-success" onclick="acceptBankAccount(<?= $user_id ?>)">ACCEPT </button>
                    <button type="button" class="btn btn-warning" onclick="rejectBankAccount(<?= $user_id ?>)">REJECT</button>
                <?php } ?>   

                <a href="<?= base_url() . 'assets/user_documents/' . $user_id . '/' . $user->bank_proof_file ?>" download class="btn btn-danger">DOWNLOAD</a>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
<script>
    function Approve(user_id) {
        $.ajax({
            url: '<?= base_url() ?>admin/users/Approve',
            method: 'post',
            data: {user_id: user_id},
            success: function () {                
                toastr.success('Approved');
                location.reload();
            }
        });
    }
    function acceptPAN(user_id) {
        $.ajax({
            url: '<?= base_url() ?>admin/users/acceptPAN',
            method: 'post',
            data: {user_id: user_id},
            success: function () {
                $("#pancardfile").modal("hide");
                toastr.success('Verified');
            }
        });
    }
    function rejectPAN(user_id) {
        $.ajax({
            url: '<?= base_url() ?>admin/users/rejectPAN',
            method: 'post',
            data: {user_id: user_id},
            success: function () {
                $("#pancardfile").modal("hide");
                toastr.success('Rejected');
            }
        });
    }
    
    
    function acceptAddressProof(user_id) {
        $.ajax({
            url: '<?= base_url() ?>admin/users/acceptAddressProof',
            method: 'post',
            data: {user_id: user_id},
            success: function () {
                $("#addressprooffile").modal("hide");
                toastr.success('Verified');
            }
        });
    }
    function rejectAddressProof(user_id) {
        $.ajax({
            url: '<?= base_url() ?>admin/users/rejectAddressProof',
            method: 'post',
            data: {user_id: user_id},
            success: function () {
                $("#addressprooffile").modal("hide");
                toastr.success('Rejected');
            }
        });
    }
    function acceptBankAccount(user_id) {
        $.ajax({
            url: '<?= base_url() ?>admin/users/acceptBankAccount',
            method: 'post',
            data: {user_id: user_id},
            success: function () {
                $("#bankaccountfile").modal("hide");
                toastr.success('Verified');
            }
        });
    }
    function rejectBankAccount(user_id) {
        $.ajax({
            url: '<?= base_url() ?>admin/users/rejectBankAccount',
            method: 'post',
            data: {user_id: user_id},
            success: function () {
                $("#bankaccountfile").modal("hide");
                toastr.success('Rejected');
            }
        });
    }
</script>