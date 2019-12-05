<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <label class="section-title">Profile UPDATE</label>
            <p class="mg-b-20 mg-sm-b-40">update your personal details</p>
            <form action="<?= base_url().'profile-update'?>" method="POST">
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="firstname"  placeholder="Enter firstname">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Last Name: </label>
                            <input class="form-control" type="text" name="lastname" placeholder="Enter lastname">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="email" placeholder="Enter email address">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" type="text" name="address" ></textarea>
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 select2-hidden-accessible" data-placeholder="Select state" name="state" id="state">
                                <option value="">Select State</option>
                                <?php foreach ($state_list as $state): ?>
                                    <option value="<?= $state['state_code'] ?>"><?= $state['state_name'] ?></option>
                                <?php endforeach; ?>                               
                            </select>                            
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                            <select class="form-control select2 select2-hidden-accessible" name="city" id="city">
                                <option value="">Select City</option>                                                            
                            </select>                            
                        </div>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="form-layout-footer">
                    <button class="btn btn-primary bd-0">Submit</button>
                    <button class="btn btn-secondary bd-0">Cancel</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
            </form><!-- form-layout -->
        </div>
    </div><!-- container -->

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
    $(".edit_profile").addClass('active');
    $(document).ready(function () {

        // City change
        $('#state').change(function () {
            var state = $(this).val();

            // AJAX request
            $.ajax({
                url: '<?= base_url() ?>getCityList',
                method: 'post',
                data: {state_code: state},
                dataType: 'json',
                success: function (response) {
                    // Add options
                    $('#city').find('option').not(':first').remove();
                    $.each(response, function (index, data) {
                        $('#city').append('<option value="' + data['city_code'] + '">' + data['city_name'] + '</option>');
                    });
                }
            });
        });


    });
</script>
