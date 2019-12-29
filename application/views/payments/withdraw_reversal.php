<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <div class="row">                    
                <div class="table-responsive">
                    <table class="table table-bordered table-colored table-success1">
                        <thead>
                            <tr>
                                <th class="wd-25p">Amount</th>
                                <th class="wd-25p">Date</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-30p" style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($withdrawals as $row):
                            ?>
                            <tr>                                    
                                <td><?= $row['withdrawal_amount']?></td>
                                <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>
                                <td><?= ucfirst($row['status']); ?></td>
                                <td style="text-align:center;"><a class="btn btn-primary" href="javascript:void(0)" onclick="reverse(<?= $row['id']?>)">REVERSE</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                        
                </div>                    
            </div>                 
        </div>
    </div>
</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>

<script type="text/javascript">
    $(".sidebar-nav-item").removeClass('active');
    $(".sidebar-nav-item .withdraw_cash_side_menu").addClass('active');
    $(".sidebar-nav-item .withdraw_reversal").addClass('active');
    $(".withdraw_main_menu").addClass('active');
    
    function reverse(id){
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to reverse?.',
            buttons: {
                confirm: function () {
                    // AJAX request
                    $.ajax({
                        url: '<?= base_url() ?>withdraw-reversal',
                        method: 'post',
                        data: {id: id},                        
                        success: function () {
                            toastr.success('Withdrawal revised successfully.');  
                            setTimeout(function(){ location.reload(); }, 1000);
                        }
                    });
                }, //confirm btn ends
                cancel: function () {

                },
            },
        }); //confirm e
    }
</script>
<style>
   
</style>