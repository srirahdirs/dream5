<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
        <div class="container pd-t-50">
          <div class="section-wrapper">
            <label class="section-title">Basic Form Input</label>
            <p class="mg-b-20 mg-sm-b-40">A basic form control with disabled and readonly mode.</p>

            <div class="row">
              <div class="col-lg">
                <input class="form-control" placeholder="Input box" type="text">
              </div><!-- col -->
              <div class="col-lg mg-t-10 mg-lg-t-0">
                <input class="form-control" placeholder="Input box (readonly)" readonly="" type="text">
              </div><!-- col -->
              <div class="col-lg mg-t-10 mg-lg-t-0">
                <input class="form-control" placeholder="Input box (disabled)" disabled="" type="text">
              </div><!-- col -->
            </div><!-- row -->

            <div class="row mg-t-20">
              <div class="col-lg">
                <textarea rows="3" class="form-control" placeholder="Textarea"></textarea>
              </div><!-- col -->
              <div class="col-lg mg-t-10 mg-lg-t-0">
                <textarea rows="3" class="form-control" placeholder="Textarea (readonly)" readonly=""></textarea>
              </div><!-- col -->
              <div class="col-lg mg-t-10 mg-lg-t-0">
                <textarea rows="3" class="form-control" placeholder="Texarea (disabled)" disabled=""></textarea>
              </div><!-- col -->
            </div><!-- row -->
          </div>
        </div><!-- container -->

        
      </div>
      </div>

<?php
$this->load->view('layouts/footer');
?>
