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
                                <th class="wd-25p">#</th>
                                <th class="wd-25p">Amount</th>
                                <th class="wd-25p">Date</th>
                                <th class="wd-20p">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($withdrawal_history as $row):
                                ?>
                                <tr>                                    
                                    <td><?= $i ?></td>
                                    <td><?= $row['withdrawal_amount'] ?></td>
                                    <td><?= date('Y-m-d', strtotime($row['created_at'])) ?></td>
                                    <td><?php if($row['status'] == 'reversed'){ echo '<strike>'. ucfirst($row['status']) .'</strike>';} else { echo ucfirst($row['status']); } ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>                        
                </div>                    
            </div>  
            <?php echo $this->pagination->create_links(); ?>
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
    $(".sidebar-nav-item .withdraw_history").addClass('active');
    $(".withdraw_main_menu").addClass('active');
</script>
<style>

</style>