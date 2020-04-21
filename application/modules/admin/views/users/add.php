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
<title>DWF - Add User</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'home' ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('users') ?>">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
            <h6 class="slim-pagetitle">User</h6>
        </div><!-- slim-pageheader -->

        <div class="section-wrapper">
            <form method="post" action="<?php echo base_url('add-user'); ?>">
                <label class="section-title">Add User</label>
                <p class="mg-b-20 mg-sm-b-40">A form with a label on top of each form control.</p>
                <div class="parsley-errors-list">
                    <?php //echo validation_errors(); ?>
                </div>
                <?php //echo form_open('form');  ?>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'name', 'class' => 'form-control', 'placeholder' => 'User','autocomplete' => "off", 'value' => set_value('name'))); ?>
                                <?php echo form_error('name', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'email', 'class' => 'form-control', 'placeholder' => 'user@gmail.com','autocomplete' => "off", 'value' => set_value('email'))); ?>
                                <?php echo form_error('email', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Contact Number: <span class="tx-danger">*</span></label>
                                <?= form_input(array('name' => 'contact_number', 'class' => 'form-control', 'placeholder' => '9989899835','autocomplete' => "off", 'value' => set_value('contact_number'))); ?>
                                <?php echo form_error('contact_number', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <?php if(hasRole(['super-admin']) || (hasRole(['dwf-poc'])) ) {?>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                                <select class="form-control role" name="role_id"
                                    tabindex="-1" aria-hidden="true">
                                    <option value="">Select Role</option>
                                    
                                    <?php
                                    foreach($roles as $role){   
                                      
                                        if( hasRole(['super-admin']) ) {                                            
                                             echo '<option value='.$role["id"].'>'.$role["display_name"].'</option>'; 
                                        } else {
                                            if(($role["display_name"] != 'DWF Super Admin') && ($role["display_name"] != 'DWF Poc')) {
                                                echo '<option value='.$role["id"].'>'.$role["display_name"].'</option>'; 
                                            } 
                                        }
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('role_id', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 multiple_companies" style="visibility: hidden"><!-- ********** display NONE  **************-->
                            <div class="form-group">
                                <label class="form-control-label">Companies: <span class="tx-danger">*</span></label>
                                <select class="companiesSelect2 form-control mult_comp" name="companies[]" tabindex="-1" aria-hidden="true" multiple="">
                                    <option value="">Select Company</option>
                                <?php
                                                                   
                                    foreach ($all_companies as $company) {
                                        
                                            echo '<option value=' . $company["id"] . '>' . $company["company_name"] . '</option>';
                                        
                                    }
                                ?>
                                </select>
                                <?php echo form_error('companies', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 single_company" style="display: none"><!-- ********** display NONE  **************-->
                            <div class="form-group">
                                <label class="form-control-label">Company: <span class="tx-danger">*</span></label>
                                <select class="companySelect2 form-control one_comp" name="companies[]" tabindex="-1" aria-hidden="true">
                                    
                                <?php
                                    foreach ($user_company as $company) {                                       
                                        echo '<option value=' . $company["id"] . '>' . $company["company_name"] . '</option>';                                        
                                    }
                                ?>
                                </select>
                                <?php echo form_error('companies', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div><!-- col-4 -->
                        <?php } else {
                                if(isset($user_company->id)) {
                                   $user_company_id = $user_company->id;
                                   echo '<input type="hidden" name="companies[]" value="'.$user_company_id.'">';
                                }
                                foreach($roles as $role){   
                                   if($role['name'] == 'company-user'){
                                       $role_id = $role['id'];
                                   }                                 
                                   
                                }
                                echo '<input type="hidden" name="role_id" value="'.$role_id.'">';
    
                        } ?>
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status:<span
                                        class="tx-danger">*</span></label>
                                <div class=row style="margin-top:10px;">
                                    <div class="col-lg-3">
                                        <label class="rdiobox">
                                            <input name="status" type="radio" value=1 <?php echo $this->form_validation->set_radio('status', 1); ?>>
                                            <span>Active</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="rdiobox">
                                            <input name="status" type="radio" value=0 <?php echo $this->form_validation->set_radio('status', 0); ?>>
                                            <span>Inactive</span>
                                        </label>
                                    </div>
                                </div>
                                <?php echo form_error('status', '<div class="parsley-errors-list">', '</div>'); ?>
                            </div>
                        </div>




                        <!-- col-8 -->

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-primary bd-0">Submit</button>
                        <a href="<?php echo base_url('permissions'); ?>" class="btn btn-secondary bd-0">Cancel</a>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form><!-- form -->
        </div><!-- section-wrapper -->



    </div><!-- container -->
</div>
<?php
$this->load->view('layouts/footer');
?>
<script>
    $('.nav-item').removeClass("active");
    $('.users_menu').addClass("active");
    $(".companiesSelect2").select2({
        placeholder: "Select Companies" //placeholder
    });
    $('.role').on('change', function() {
        console.log("coming"); 
        $.ajax({   
            type:'POST',
            url:'<?php echo base_url("checkRoleType"); ?>',
            data:{role_id:this.value},
            success: function (result) {
                console.log("result" + result);
               
                var result = $.trim(result);
                if(result === 'one_company'){
                    $('.single_company').css("display","block");
                    $('.multiple_companies').css("display","none");
                    $('.mult_comp').val();
                } else if(result === 'multiple_companies'){
                    $('.multiple_companies').css("display","block");
                    $('.multiple_companies').css("visibility","visible");
                    $('.single_company').css("display","none");
                    $('.one_comp').val();
                } else {
                    $('.single_company').css("display","none");
                    $('.multiple_companies').css("visibility","hidden");
                }
            },
            error: function (xhr, status, error) {                
                console.log(xhr, status, error);
            }
        });
    });
</script>