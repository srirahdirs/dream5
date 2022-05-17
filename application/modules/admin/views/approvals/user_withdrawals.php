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
<title>DREAM5 - User Withdrawals</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">User Withdrawal Results</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper table-responsive">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">#</th>
                        <th class="wd-10p">Email Id</th>
                        <th class="wd-20p">Withdrawal Amount</th>
                        <th class="wd-10p">Withdrawal Date</th>
                        <th class="wd-10p">Balance</th>
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
                            <td><?= $row['withdrawal_amount']  ?></td>
                            <td><?= $row['created_at']  ?></td>                            
                            <td><?= $row['wallet_balance']  ?></td>
                            <td>  
                                <?php if($row['status'] == 'requested'){ ?>
                                    <a class="btn btn-success" href="javascript:void(0)" onclick="Approve('<?= $row['id'] ?>','<?= $row['email'] ?>')"><?= 'Approve';?></a>
                                <?php } else { echo "successful";} ?>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
            <p class="pagination_list"><?php echo $links; ?></p>
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


    function Approve(id,email) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure approve the withdrawal?',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/approve-withdrawal/'); ?>' + id + '?email='+ email;
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