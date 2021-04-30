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
<title>DREAM5 - Upi Payments</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">UPI Payments</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">#</th>
                        <th class="wd-10p">User Id</th>
                        <th class="wd-10p">Email Id</th>
                        <th class="wd-10p">Reference Id</th>
                        <th class="wd-10p">Amount</th>
                        <th class="wd-10p">Mode</th>
                        <th class="wd-10p">UPI ID</th>
                        <th class="wd-10p">Date</th>
                        <th class="wd-10p">Status</th>
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
                            <td><?= $row['user_id'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['reference_id'] ?></td>
                            <td><?= $row['amount'] ?></td>
                            <td><?= $row['payment_mode'] ?></td>
                            <td><?= $row['upi_id'] ?></td>
                            <td><?= date('Y-m-d', strtotime($row['ordered_at'])) ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>  
                                <?php if($row['status'] == 'deposited'){ ?>
                                    <a class="btn btn-success" href="javascript:void(0)" onclick="confirmUpi(<?= $row['id'] ?>)"><i class="fa fa-check-circle-o"></i></a>
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


    function confirmUpi(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to approve?',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/confirm-upi-payment/'); ?>' + id;
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