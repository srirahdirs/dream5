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
<title>DREAM5 - User Documents</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">User Kyc</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">#</th>
                        <th class="wd-10p">Email Id</th>
                        <th class="wd-10p">Pan Card No.</th>
                        <th class="wd-10p">PanCard</th>
                        <th class="wd-10p">Approved</th>
                        <th class="wd-10p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    foreach ($listData as $row):
                        ?>
                        <tr>                                    
                            <td><?= $i ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['pan_card'] ?></td>
                            <td><?php if($row['pan_card_file'] != ''){ echo '<img height="70px" src="'. $baseUrl = base_url() . 'assets/user_documents/'.$row['user_id'].'/'.$row['pan_card_file'].'" alt="pan_card">'; } else { echo "-";   } ?></td>
                            <td><?= isset($row['is_pan_verified']) ? $row['is_pan_verified'] : 'No'  ?></td>
                            <td>  
                                <?php if($row['is_pan_verified'] != 'Yes' && $row['pan_card_file'] != ''){ ?>
                                    <a class="btn btn-success" href="javascript:void(0)" onclick="approveKyc(<?= $row['user_id'] ?>)"><i class="fa fa-check-circle-o"></i></a>
                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="rejectKyc(<?= $row['user_id'] ?>)"><i class="fa fa-check-wrong>"</i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
    </div>
</div>
</div>
<?php
$this->load->view('layouts/footer');
?>

<script>
    $('.sidebar-nav-link').removeClass("active");
    $('.approvals').addClass("active");
    $('.manage_admin').addClass("active");
    $('.upi_payment').css('display','none');


    function approveKyc(user_id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Approve?',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/approve-kyc/'); ?>' + user_id;
                }, //confirm btn ends
                cancel: function () {

                },
            },
        }); //confirm e
    }
    function rejectKyc(user_id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Reject?',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/reject-kyc/'); ?>' + user_id;
                }, //confirm btn ends
                cancel: function () {

                },
            },
        }); //confirm e
    }
</script>
<style>
    .table td{
        vertical-align: middle;
    }
</style>