<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="manager-header">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <!--              <li class="breadcrumb-item"><a href="#">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Contact Manager</li>-->
                </ol>
                <h6 class="slim-pagetitle">YOUR GAMES</h6>
            </div><!-- slim-pageheader -->
            <a id="contactNavicon" href="" class="contact-navicon"><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="section-wrapper">
            <div class="row">                    
                <div class="table-responsive">
                    <table class="table mg-b-0 tx-13">
                        <thead>
                            <tr>
                                <th class="wd-5p">#</th>
                                <th class="wd-15p">GAME</th>
                                <th class="wd-15p">BET Team</th>
                                <th class="wd-10p">Amount</th>
                                <th class="wd-15p">Winning Amount</th>
                                <th class="wd-10p">Status</th>
                                <th class="wd-20p">Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($games_history as $row):
                                ?>
                                <tr>                                    
                                    <td><?= $i ?></td>
                                    <td><?= $row['team_a'] . ' vs ' . $row['team_b'] ?></td>
                                    <td><?= $row['betting_team']  ?></td>
                                    <td><?= $row['betting_amount']  ?></td>                            
                                    <td><?= $row['final_amount']  ?></td>
                                    <td><?= $row['status']  ?></td>
                                    <td><?= $row['match_result']  ?></td>
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
    $(".sidebar-nav-item .games").addClass('active');
    $(".games_main_menu").addClass('active');
</script>
<style>

</style>