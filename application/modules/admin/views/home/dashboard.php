<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php
$this->load->view('layouts/header');
$this->load->view('layouts/menu');
?>
<div class="slim-mainpanel">
        <div class="container">
          <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="slim-pagetitle">Dashboard</h6>
          </div><!-- slim-pageheader -->

          <div class="row row-xs">
            <div class="col-md-6 col-lg-3 order-lg-1">
              <div class="card">
                <div class="card-body pd-b-0">
                  <h6 class="slim-card-title">Page Impressions</h6>
                  <h1 class="tx-lato tx-primary">323,360</h1>
                  <p class="tx-12"><span class="tx-primary">2.5%</span> change from yesterday</p>
                </div><!-- card-body -->
                <div id="rs3" class="ht-50 ht-sm-70 mg-r--1 rickshaw_graph"><svg width="281" height="70"><path class="path" d="M0,41.12211221122112Q18.733333333333334,31.496149614961496,21.615384615384617,29.57095709570957C25.93846153846154,26.683168316831683,38.90769230769231,14.554455445544548,43.23076923076923,12.244224422442237S60.52307692307693,7.623762376237616,64.84615384615385,6.468646864686462S82.13846153846154,0.11551155115510858,86.46153846153847,0.6930693069306859S103.75384615384615,10.511551155115503,108.07692307692308,12.244224422442237S125.36923076923078,16.28712871287129,129.6923076923077,18.01980198019802S146.98461538461538,27.83828382838284,151.3076923076923,29.57095709570957S168.60000000000002,35.92409240924093,172.92307692307693,35.34653465346535S190.21538461538464,25.528052805280527,194.53846153846155,23.795379537953796S211.83076923076925,19.174917491749177,216.15384615384616,18.01980198019802S233.44615384615386,11.089108910891081,237.76923076923077,12.244224422442237S255.0615384615385,29.57095709570957,259.3846153846154,29.57095709570957Q262.2666666666667,29.57095709570957,281,12.244224422442237" fill="none" stroke="#1B84E7" stroke-width="2" opacity="1"></path><path class="stroke"></path></svg></div>
              </div><!-- card -->

              <div class="card card-activities pd-20 mg-t-10">
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

              <div class="card card-todo mg-t-10">
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
                  <div class="todo-item">
                    <label class="ckbox">
                      <input type="checkbox"><span>Do even more</span>
                    </label>
                  </div><!-- todo-item -->
                  <div class="todo-item">
                    <label class="ckbox">
                      <input type="checkbox"><span>Do something more</span>
                    </label>
                  </div><!-- todo-item -->
                  <div class="todo-item">
                    <label class="ckbox">
                      <input type="checkbox"><span>Finish something</span>
                    </label>
                  </div><!-- todo-item -->
                  <div class="todo-item">
                    <label class="ckbox">
                      <input type="checkbox"><span>Finish something more</span>
                    </label>
                  </div><!-- todo-item -->
                </div><!-- todo-list -->
              </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-md-6 col-lg-3 mg-t-10 mg-md-t-0 order-lg-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="slim-card-title mg-b-20">Sale Progress</h6>

                  <label class="mg-b-5">24,224 sales</label>
                  <div class="progress mg-b-15">
                    <div class="progress-bar bg-warning progress-bar-xs wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->

                  <label class="mg-b-5">43,765 sales</label>
                  <div class="progress mg-b-15">
                    <div class="progress-bar bg-primary progress-bar-xs wd-70p" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->

                  <label class="mg-b-5">14,220 sales</label>
                  <div class="progress mg-b-15">
                    <div class="progress-bar bg-danger progress-bar-xs wd-30p" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->

                  <label class="mg-b-5">20,220 sales</label>
                  <div class="progress mg-b-15">
                    <div class="progress-bar bg-success progress-bar-xs wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="card card-body pd-20 mg-t-10">
                <h6 class="slim-card-title mg-b-20">Most Visited</h6>
                <div class="mg-b-25">
                  <span class="peity-donut" data-peity="{ 'fill': ['#663090','#EC1778','#5B93D3'], 'height': 200, 'width': '100%' }" style="display: none;">10,5,4</span><svg class="peity" height="200" width="100%"><path d="M 120.35 0 A 100 100 0 1 1 103.89054097192661 198.63613034027225 L 112.1202704859633 149.31806517013612 A 50 50 0 1 0 120.35 50" data-value="10" fill="#663090"></path><path d="M 103.89054097192661 198.63613034027225 A 100 100 0 0 1 23.40997340606694 75.45145128592011 L 71.87998670303347 87.72572564296006 A 50 50 0 0 0 112.1202704859633 149.31806517013612" data-value="5" fill="#EC1778"></path><path d="M 23.40997340606694 75.45145128592011 A 100 100 0 0 1 120.34999999999998 0 L 120.34999999999998 50 A 50 50 0 0 0 71.87998670303347 87.72572564296006" data-value="4" fill="#5B93D3"></path></svg>
                </div>
                <div class="d-flex align-items-center">
                  <span class="square-10 bg-purple rounded-circle"></span>
                  <span class="mg-l-10">San Francisco</span>
                  <span class="mg-l-auto tx-lato tx-right">9,212</span>
                </div>
                <div class="d-flex align-items-center mg-t-5">
                  <span class="square-10 bg-pink rounded-circle"></span>
                  <span class="mg-l-10">Los Angeles</span>
                  <span class="mg-l-auto tx-lato tx-right">8,768</span>
                </div>
                <div class="d-flex align-items-center mg-t-5">
                  <span class="square-10 bg-info rounded-circle"></span>
                  <span class="mg-l-10">San Diego</span>
                  <span class="mg-l-auto tx-lato tx-right">8,355</span>
                </div>
              </div><!-- card -->

              <div class="card card-body pd-20 mg-t-10">
                <h6 class="slim-card-title mg-b-20">Quick Contact Form</h6>
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Enter your name">
                </div><!-- form-group -->
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div><!-- form-group -->
                <div class="form-group">
                  <textarea name="name" class="form-control" rows="3" placeholder="Enter your message"></textarea>
                </div><!-- form-group -->
                <button class="btn btn-primary btn-block">Send Message</button>
              </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-lg-6 mg-t-10 mg-lg-t-0 order-lg-2">
              <div class="card card-customer-overview">
                <div class="card-header">
                  <h6 class="slim-card-title">Customer Overview</h6>
                  <nav class="nav">
                    <a href="" class="nav-link active">Day</a>
                    <a href="" class="nav-link">Week</a>
                    <a href="" class="nav-link">Month</a>
                  </nav>
                </div><!-- card-header -->
                <div class="card-body">
                  <div id="flotArea1" class="ht-200 ht-sm-300" style="padding: 0px; position: relative;"><canvas class="flot-base" width="667" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 534px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 76px; top: 288px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 17px; text-align: center;">0.0</div><div style="position: absolute; max-width: 76px; top: 288px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 101px; text-align: center;">1.0</div><div style="position: absolute; max-width: 76px; top: 288px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 184px; text-align: center;">2.0</div><div style="position: absolute; max-width: 76px; top: 288px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 268px; text-align: center;">3.0</div><div style="position: absolute; max-width: 76px; top: 288px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 352px; text-align: center;">4.0</div><div style="position: absolute; max-width: 76px; top: 288px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 435px; text-align: center;">5.0</div><div style="position: absolute; max-width: 76px; top: 288px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 519px; text-align: center;">6.0</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 277px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 5px; text-align: right;">0.0</div><div style="position: absolute; top: 231px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 5px; text-align: right;">2.5</div><div style="position: absolute; top: 185px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 5px; text-align: right;">5.0</div><div style="position: absolute; top: 140px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 5px; text-align: right;">7.5</div><div style="position: absolute; top: 94px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 0px; text-align: right;">10.0</div><div style="position: absolute; top: 48px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 0px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(153, 153, 153); left: 0px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="667" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 534px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 116px; height: 35px; top: 13px; left: 29px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;left:29px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #1B84E7;overflow:hidden"></div></div></td><td class="legendLabel">New Customer</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #4E6577;overflow:hidden"></div></div></td><td class="legendLabel">Returning Customer</td></tr></tbody></table></div></div>
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="card card-customer-overview mg-t-10">
                <div class="card-header">
                  <h6 class="slim-card-title">Sales Overview</h6>
                  <nav class="nav">
                    <a href="" class="nav-link active">Day</a>
                    <a href="" class="nav-link">Week</a>
                    <a href="" class="nav-link">Month</a>
                  </nav>
                </div><!-- card-header -->
                <div class="card-body">
                  <div id="flotBar1" class="ht-200 ht-sm-300" style="padding: 0px; position: relative;"><canvas class="flot-base" width="667" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 534px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 59px; top: 287px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 22px; text-align: center;">0</div><div style="position: absolute; max-width: 59px; top: 287px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 89px; text-align: center;">2</div><div style="position: absolute; max-width: 59px; top: 287px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 156px; text-align: center;">4</div><div style="position: absolute; max-width: 59px; top: 287px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 222px; text-align: center;">6</div><div style="position: absolute; max-width: 59px; top: 287px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 289px; text-align: center;">8</div><div style="position: absolute; max-width: 59px; top: 287px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 354px; text-align: center;">10</div><div style="position: absolute; max-width: 59px; top: 287px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 420px; text-align: center;">12</div><div style="position: absolute; max-width: 59px; top: 287px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 487px; text-align: center;">14</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 276px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 6px; text-align: right;">0.0</div><div style="position: absolute; top: 230px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 6px; text-align: right;">2.5</div><div style="position: absolute; top: 185px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 6px; text-align: right;">5.0</div><div style="position: absolute; top: 139px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 6px; text-align: right;">7.5</div><div style="position: absolute; top: 93px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 1px; text-align: right;">10.0</div><div style="position: absolute; top: 48px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 1px; text-align: right;">12.5</div><div style="position: absolute; top: 2px; font: 400 10px/12px Roboto, 'Helvetica Neue', Arial, sans-serif; color: rgb(102, 102, 102); left: 1px; text-align: right;">15.0</div></div></div><canvas class="flot-overlay" width="667" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 534px; height: 300px;"></canvas></div>
                </div><!-- card-body -->
              </div><!-- card -->

              <div class="card card-quick-post mg-t-10">
                <h6 class="slim-card-title">Share Your Thoughts</h6>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="What's on your mind?"></textarea>
                </div><!-- form-group -->
                <div class="card-footer">
                  <button class="btn btn-purple">Share Post</button>
                  <nav>
                    <a href=""><i class="icon ion-images"></i></a>
                    <a href=""><i class="icon ion-aperture"></i></a>
                    <a href=""><i class="icon ion-calendar"></i></a>
                  </nav>
                </div><!-- card-footer -->
              </div><!-- card -->
            </div><!-- col-6 -->
          </div><!-- row -->
        </div><!-- container -->
</div>

<?php
$this->load->view('layouts/footer');
?>
<script>
      $(function(){
        'use strict'

        var rs3 = new Rickshaw.Graph({
          element: document.querySelector('#rs3'),
          renderer: 'line',
          series: [{
            data: [
              { x: 0, y: 5 },
              { x: 1, y: 7 },
              { x: 2, y: 10 },
              { x: 3, y: 11 },
              { x: 4, y: 12 },
              { x: 5, y: 10 },
              { x: 6, y: 9 },
              { x: 7, y: 7 },
              { x: 8, y: 6 },
              { x: 9, y: 8 },
              { x: 10, y: 9 },
              { x: 11, y: 10 },
              { x: 12, y: 7 },
              { x: 13, y: 10 }
            ],
            color: '#1B84E7',
          }]
        });
        rs3.render();

        // Responsive Mode
        new ResizeSensor($('.slim-mainpanel'), function(){
          rs3.configure({
            width: $('#rs3').width(),
            height: $('#rs3').height()
          });
          rs3.render();
        });


        var newCust = [[0, 2], [1, 3], [2,6], [3, 5], [4, 7], [5, 8], [6, 10]];
        var retCust = [[0, 1], [1, 2], [2,5], [3, 3], [4, 5], [5, 6], [6,9]];

        var plot = $.plot($('#flotArea1'),[
          {
            data: newCust,
            label: 'New Customer',
            color: '#1B84E7'
          },
          {
            data: retCust,
            label: 'Returning Customer',
            color: '#4E6577'
          }],
          {
            series: {
              lines: {
                show: true,
                lineWidth: 0,
                fill: 0.8
              },
              shadowSize: 0
            },
            points: {
              show: false,
            },
            legend: {
              noColumns: 1,
              position: 'nw'
            },
            grid: {
              hoverable: true,
              clickable: true,
              borderColor: '#ddd',
              borderWidth: 0,
              labelMargin: 5,
              backgroundColor: '#fff'
            },
            yaxis: {
              min: 0,
              max: 15,
              color: '#eee',
              font: {
                size: 10,
                color: '#999'
              }
            },
            xaxis: {
              color: '#eee',
              font: {
                size: 10,
                color: '#999'
              }
            }
          });

          $.plot("#flotBar1", [{
            data: [[0, 3], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6]]
          }], {
            series: {
              bars: {
                show: true,
                lineWidth: 0,
                fillColor: '#4E6577'
              }
            },
            grid: {
              borderWidth: 1,
              borderColor: '#D9D9D9'
            },
            yaxis: {
              tickColor: '#d9d9d9',
              font: {
                color: '#666',
                size: 10
              }
            },
            xaxis: {
              tickColor: '#d9d9d9',
              font: {
                color: '#666',
                size: 10
              }
            }
          });

          // Donut chart
          $('.peity-donut').peity('donut');

      });
    </script>