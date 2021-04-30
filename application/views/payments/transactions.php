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
                    <table class="table mg-b-0 tx-13">
                        <thead>
                            <tr>
                                <th class="wd-5p">#</th>
                                <th class="wd-25p">Reference Id</th>
                                <th class="wd-15p">Amount</th>
                                <th class="wd-20p">Payment Mode</th>
                                <th class="wd-15p">Date</th>
                                <th class="wd-20p">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($transactions_history as $row):
                                ?>
                                <tr>                                    
                                    <td><?= $i ?></td>
                                    <td><?= $row['reference_id'] ?></td>
                                    <td><?= $row['amount'] ?></td>
                                    <td><?= $row['payment_mode'] ?></td>
                                    <td><?= date('Y-m-d', strtotime($row['ordered_at'])) ?></td>
                                    <td><?= $row['status'] ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>                        
                </div>                    
            </div>  
            <?php echo $links; ?>
        </div>
    </div>
</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>

<script type="text/javascript">
    $(".sidebar-nav-item").removeClass('active');
    $(".sidebar-nav-item .transactions").addClass('active');
//    $(".sidebar-nav-item .transactions").addClass('active');
    $(".withdraw_main_menu").addClass('active');
</script>
<style>

</style>