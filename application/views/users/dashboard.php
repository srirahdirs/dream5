<?php
    $this->load->view('layouts/header');
    $this->load->view('layouts/menu');
?>
<?php
$this->load->view('layouts/homeSlider');
$this->load->view('layouts/homeSliderBottom');
?>
        
<div class="slim-mainpanel">
      <div class="container pd-t-50">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="tx-inverse mg-b-15">Welcome back, Katherine!</h3>
            <p class="mg-b-40">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>

            <h6 class="slim-card-title mg-b-15">Your Earning Summary</h6>
            <div class="row no-gutters">
              <div class="col-sm-6">
                <div class="card card-earning-summary">
                  <h6>Today's Earnings</h6>
                  <h1>$950</h1>
                  <span>Based on list price</span>
                </div><!-- card -->
              </div><!-- col-6 -->
              <div class="col-sm-6">
                <div class="card card-earning-summary mg-sm-l--1 bd-t-0 bd-sm-t">
                  <h6>This Week's Earnings</h6>
                  <h1>$12,420</h1>
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
                  <a href="" class="btn btn-success btn-block">Upgrade Account</a>
                </div><!-- col-6 -->
              </div><!-- row -->
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->

        <div class="card card-dash-chart-one mg-t-20 mg-sm-t-30">
          <div class="row no-gutters">
            <div class="col-lg-4">
              <div class="left-panel">
                <nav class="nav">
                  <a href="" class="nav-link active">Today</a>
                  <a href="" class="nav-link">This Week</a>
                  <a href="" class="nav-link">This Month</a>
                </nav>

                <div class="active-visitor-wrapper">
                  <h1>746</h1>
                  <p>Online Visitors on Site</p>
                </div><!-- active-visitor-wrapper -->

                <hr class="mg-t-30 mg-b-40">

                <h6 class="visitor-operating-label">Visitors Operating System</h6>

                <label class="mg-b-5">macOS (30%)</label>
                <div class="progress mg-b-15">
                  <div class="progress-bar bg-warning progress-bar-xs wd-30p" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div><!-- progress -->

                <label class="mg-b-5">Windows 10 (50%)</label>
                <div class="progress mg-b-15">
                  <div class="progress-bar bg-success progress-bar-xs wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div><!-- progress -->

                <label class="mg-b-5">Linux (10%)</label>
                <div class="progress mg-b-15">
                  <div class="progress-bar bg-danger progress-bar-xs wd-10p" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div><!-- progress -->

                <label class="mg-b-5">Ubuntu (10%)</label>
                <div class="progress mg-b-15">
                  <div class="progress-bar bg-danger progress-bar-xs wd-10p" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div><!-- progress -->

              </div><!-- left-panel -->
            </div><!-- col-4 -->
            <div class="col-lg-8">
              <div class="right-panel">
                <h6 class="slim-card-title">Visitor's Locations</h6>
                <div id="vmap" class="ht-250 ht-sm-350 ht-md-450 bg-gray-300"></div>
              </div><!-- right-panel -->
            </div><!-- col-8 -->
          </div><!-- row -->
        </div><!-- card -->

        <div class="card card-table mg-t-20 mg-sm-t-30">
          <div class="card-header">
            <h6 class="slim-card-title">Product Purchases</h6>
            <nav class="nav">
              <a href="" class="nav-link active">Today</a>
              <a href="" class="nav-link">This Week</a>
              <a href="" class="nav-link">This Month</a>
            </nav>
          </div><!-- card-header -->
          <div class="table-responsive">
            <table class="table mg-b-0 tx-13">
              <thead>
                <tr class="tx-10">
                  <th class="wd-10p pd-y-5 tx-center">Item</th>
                  <th class="pd-y-5">Item Details</th>
                  <th class="pd-y-5 tx-right">Sold</th>
                  <th class="pd-y-5 tx-center">Location</th>
                  <th class="pd-y-5">Gain</th>
                  <th class="pd-y-5 tx-right">Added</th>
                  <th class="pd-y-5 tx-right">Updated</th>
                  <th class="pd-y-5 tx-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="tx-center">
                    <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                  </td>
                  <td>
                    <a href="" class="tx-inverse tx-medium d-block">The Dothraki Shoes</a>
                    <span class="tx-12 d-block"><span class="square-8 bg-danger mg-r-5 rounded-circle"></span> 20 remaining</span>
                  </td>
                  <td class="valign-middle tx-right">3,345</td>
                  <td class="valign-middle tx-center"><span class="flag-icon flag-icon-ph tx-16"></span></td>
                  <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>33.34%</span> from last week</td>
                  <td class="valign-middle tx-right">10/21/2017</td>
                  <td class="valign-middle tx-right">an hour ago</td>
                  <td class="valign-middle tx-center">
                    <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                  </td>
                </tr>
                <tr>
                  <td class="tx-center">
                    <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                  </td>
                  <td>
                    <a href="" class="tx-inverse tx-medium d-block">Westeros Sneaker</a>
                    <span class="tx-12 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
                  </td>
                  <td class="valign-middle tx-right">720</td>
                  <td class="valign-middle tx-center"><span class="flag-icon flag-icon-ca tx-16"></span></td>
                  <td class="valign-middle"><span class="tx-danger"><i class="icon ion-android-arrow-down mg-r-5"></i>21.20%</span> from last week</td>
                  <td class="valign-middle tx-right">10/20/2017</td>
                  <td class="valign-middle tx-right">3 hours ago</td>
                  <td class="valign-middle tx-center">
                    <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                  </td>
                </tr>
                <tr>
                  <td class="tx-center">
                    <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                  </td>
                  <td>
                    <a href="" class="tx-inverse tx-medium d-block">Selonian Hand Bag</a>
                    <span class="tx-12 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
                  </td>
                  <td class="valign-middle tx-right">1,445</td>
                  <td class="valign-middle tx-center"><span class="flag-icon flag-icon-us tx-16"></span></td>
                  <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>23.34%</span> from last week</td>
                  <td class="valign-middle tx-right">10/19/2017</td>
                  <td class="valign-middle tx-right">5 hours ago</td>
                  <td class="valign-middle tx-center">
                    <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                  </td>
                </tr>
                <tr>
                  <td class="tx-center">
                    <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                  </td>
                  <td>
                    <a href="" class="tx-inverse tx-medium d-block">Kel Dor Sunglass</a>
                    <span class="tx-12 d-block"><span class="square-8 bg-warning mg-r-5 rounded-circle"></span> 45 remaining</span>
                  </td>
                  <td class="valign-middle tx-right">2,500</td>
                  <td class="valign-middle tx-center"><span class="flag-icon flag-icon-dk tx-16"></span></td>
                  <td class="valign-middle"><span class="tx-success"><i class="icon ion-android-arrow-up mg-r-5"></i>28.78%</span> from last week</td>
                  <td class="valign-middle tx-right">10/17/2017</td>
                  <td class="valign-middle tx-right">1 day ago</td>
                  <td class="valign-middle tx-center">
                    <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                  </td>
                </tr>
                <tr>
                  <td class="tx-center">
                    <img src="http://via.placeholder.com/800x533" class="wd-55" alt="Image">
                  </td>
                  <td>
                    <a href="" class="tx-inverse tx-medium d-block">Kubaz Sunglass</a>
                    <span class="tx-12 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span> In stock</span>
                  </td>
                  <td class="valign-middle tx-right">223</td>
                  <td class="valign-middle tx-center"><span class="flag-icon flag-icon-au tx-16"></span></td>
                  <td class="valign-middle"><span class="tx-danger"><i class="icon ion-android-arrow-down mg-r-5"></i>18.18%</span> from last week</td>
                  <td class="valign-middle tx-right">10/16/2017</td>
                  <td class="valign-middle tx-right">a week ago</td>
                  <td class="valign-middle tx-center">
                    <a href="" class="tx-gray-600 tx-24"><i class="icon ion-android-more-horizontal"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- table-responsive -->
          <div class="card-footer tx-12 pd-y-15 bg-transparent">
            <a href=""><i class="fa fa-angle-down mg-r-5"></i>View All Products</a>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

<?php
    $this->load->view('layouts/footer');       
?>
