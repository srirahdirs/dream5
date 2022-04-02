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
<title>DREAM5 - User Games</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <h6 class="slim-pagetitle">User Game Results</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper table-responsive">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">#</th>
                        <th class="wd-5p">Game Id</th>
                        <th class="wd-10p">Email Id</th>
                        <!-- <th class="wd-10p">Game Type</th> -->
                        <th class="wd-10p">Match</th>
                        <th class="wd-10p">Betting Team</th>
                        <!-- <th class="wd-10p">Opponent Team</th> -->
                        <th class="wd-10p">Betting Amount</th>
                        <th class="wd-10p">User Winning Amount</th>
                        <!-- <th class="wd-10p">Status</th> -->
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
                            <td><?= $row['game_id_ug'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <!-- <td><?= $row['game_type'] ?></td> -->
                            <td><?= $row['team_a'] . ' vs ' . $row['team_b'] ?></td>
                            <td><?= $row['betting_team']  ?></td>
                            <!-- <td><?= $row['team_b']  ?></td> -->
                            <td><?= $row['betting_amount']  ?></td>                            
                            <td><?= $row['final_amount']  ?></td>
                            <!-- <td><?= $row['status']  ?></td> -->
                            <td>  
                                <?php if($row['status'] != 'won' && $row['status'] != 'loss'){ ?>
                                    <a class="btn btn-success" href="javascript:void(0)" onclick="teamA('<?= $row['game_id'] ?>','<?= $row['team_a'] ?>')"><?= $row['team_a']?></a>
                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="teamA('<?= $row['game_id'] ?>','<?= $row['team_b'] ?>')"><?= $row['team_b']?></a>
                                <?php } else { echo "done";} ?>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
            
    </div>
</div>
<?php // $links; ?>
</div>
<?php
$this->load->view('layouts/footer');
?>

<script>
    $('.sidebar-nav-link').removeClass("active");
    $('.approvals').addClass("active");
    $('.manage_admin').addClass("active");
    $('.upi_payment').css('display','none');


    function teamA(game_id,team_a) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure! ' + team_a + ' won the match?',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/set-match-result/'); ?>' + game_id + '?winning_team='+ team_a;
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