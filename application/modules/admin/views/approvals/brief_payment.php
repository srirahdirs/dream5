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
<title>Tandem - Brief Payment</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
            </ol>
            <h6 class="slim-pagetitle">Brief Payment</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper table-responsive">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Business</th>
                        <th class="wd-10p">Brief Title</th>
                        <th class="wd-10p">User</th>
                        <th class="wd-10p">Transaction Id</th>
                        <th class="wd-10p">Payment Method</th>
                        <th class="wd-10p">Payment Status</th>
                        <th class="wd-15p">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($listData)) :
                        foreach ($listData as $row) :
                            ?>
                            <tr>
                                
                                <td><?= $row['business']; ?></td>                                
                                <td><?= $row['brief_title']; ?></td>
                                <td><?= $row['user']; ?></td>
                                <td><?= $row['transaction_id']; ?></td>
                                <td><?= $row['payment_method']; ?></td>
                                <td><?= $row['payment_status']; ?></td>
                                <td>  
                                    <?php if($row['payment_status'] != 'approved') :?>
                                        <a class="btn btn-success btn-xs" href="javascript:void(0)" onclick="approveData(<?= $row['id'] ?>)">Approve</a>
                                    <?php endif; ?>
                                </td>                  
                            </tr>
                            <?php
                        endforeach;

                    endif;
                    ?>


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
    $('.brief_payment').addClass("active");
    $('.masters_ul').css('display','none');


    function approveData(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Approve.',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/approvals/approve-brief-payment/'); ?>' + id;
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