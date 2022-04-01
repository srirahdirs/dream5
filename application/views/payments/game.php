<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <blink><marquee style="color: #23BF08">Click the team name from the below list that you want to place your BET</marquee></blink>
        <div class="section-wrapper">
            <div class="row">                    
                <div class="table-responsive">
                    <table class="table mg-b-0 tx-13" id="games_tbl">
                        <thead>
                            <tr>
                                <!-- <th class="wd-5p bg_clr_yel">Category</th> -->
                                <!-- <th class="wd-5p bg_clr_yel">Type</th> -->
                                <th class="wd-10p bg_clr_yel">Team A</th>
                                <th class="wd-10p bg_clr_yel">Team B</th>
                                <th class="wd-20p bg_clr_yel">Date & Time</th>
                                <th class="wd-5p bg_clr_yel">Status</th>
                                <th class="wd-15p bg_clr_yel">Bet</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            foreach ($games as $row):
                                ?>
                                <tr>                                    
                                    <!-- <td><?= $row['category']; ?></td> -->
                                    <!-- <td><?= $row['game_type']; ?></td> -->
                                    <td>
                                        <?php if($row['status'] == 'Upcoming') { ?>
                                            <a href="javascript:void(0)" class="team_name" data-id="<?= $row['id']?>" data-team="<?= $row['team_a']?>"><span data-toggle="tooltip" title="Click to bet on - <?= $row['team_a']; ?>"<span class="badge badge-success"><?= $row['team_a']; ?></span></span></a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0)" class="disabled_bet" data-id="<?= $row['id']?>" data-team="<?= $row['team_a']?>"><span data-toggle="tooltip" title="Bets currently disabled"<span class="badge badge-success"><?= $row['team_a']; ?></span></span></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 'Upcoming') { ?>
                                            <a href="javascript:void(0)" class="team_name" data-id="<?= $row['id']?>" data-team="<?= $row['team_b']?>"><span data-toggle="tooltip" title="Click to bet on - <?= $row['team_b']; ?>"<span class="badge badge-warning"><?= $row['team_b']; ?></span></span></a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0)" class="disabled_bet" data-id="<?= $row['id']?>" data-team="<?= $row['team_b']?>"><span data-toggle="tooltip" title="Bets currently disabled"<span class="badge badge-warning"><?= $row['team_b']; ?></span></span></a>
                                        <?php } ?>
                                    </td>
                                    <td><p style="margin-bottom: 0;margin-top: 24px !important;"><?= date('d-M h:i A',strtotime($row['match_date_time'])); ?></p>
                                    <b style="visibility:hidden">Thecontentstest</b>
                                    </td>
                                    <td><?= $row['status']; ?></td>
                                    <td>
                                        <?php if($row['bet_placed'] == 'Yes') { ?>
                                            <a href="javascript:void(0)" class="view_bet"><span class="badge badge-primary">View</span></a>
                                        <?php } else { ?>
                                            <?php if($row['status'] == 'Upcoming') {?>
                                            <a href="javascript:void(0)" class="team_name" data-id="<?= $row['id']?>" data-team="<?= $row['team_a']?>"><span data-toggle="tooltip" title="Click to bet on - <?= $row['team_a']; ?>"<span class="badge badge-success"><?= $row['team_a']; ?></span></span></a> - 
                                            <a href="javascript:void(0)" class="team_name" data-id="<?= $row['id']?>" data-team="<?= $row['team_b']?>"><span data-toggle="tooltip" title="Click to bet on - <?= $row['team_b']; ?>"<span class="badge badge-warning"><?= $row['team_b']; ?></span></span></a>
                                            <?php } else { echo 'Bets disabled';} ?>
                                        <?php } ?>
                                    </td>
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
<div id="view_bets">
    <!-- Modal -->
     <div class="modal fade" id="view_bets_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
          <div class="modal-content">
           <div class="modal-header">
            <h5 style="margin-bottom: 0;">MY BETS</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <div class="modal-body" id="bet-details" style="overflow-x: scroll;">
              
           </div>
        </div>
       </div>
     </div>
</div>

<script type="text/javascript">
    $(".sidebar-nav-item").removeClass('active');
    $(".sidebar-nav-item .play_game").addClass('active');
    $(".play_game_main_menu").addClass('active');
    $('.team_name').click(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var team = $(this).data('team');
        
        $.confirm({
            title: 'Betting SLIP for '+ team ,
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Enter the amount</label>' +
            '<input type="number" placeholder="Rs.25 - Rs.10000" min="1" max="10000" class="name form-control" required id="amount"/>' +
            '</div>' +
            '</form><br><br><div class="bet_result" style="display:none"><div class="p_label">Total Cost</div><div class="p_value"></div><div class="p_label_1">Total cost you will get</div><div class="p_value_1 final_amount_user"></div></div>',
            buttons: {
                formSubmit: {
                    text: 'PLACE BET',
                    btnClass: 'btn-success check_balance_btn',
                    action: function () {
                        var amount = this.$content.find('.name').val();
                        if(!amount){
                            $.alert('Enter a valid amount');
                            return false;
                        }
                        if(amount < 25){
                            $.alert('Enter minimum 25 ');
                            return false;
                        }
                        if(amount > 10000){
                            $.alert('Enter maximum 10000');
                            return false;
                        }
                        $.ajax({
                            url: '<?= base_url() ?>saveBet',
                            method: 'post',
                            data: {"game_id": id,"betting_team":team,"amount":amount},
                            success: function (response) {
                                if(response != 'low_balance'){
                                    $.alert('<span style="color:#2AA714">' + amount + '</span> Placed successfully for '+team +'');
                                    setTimeout(function () {  location.reload(true); }, 3000);
                                } else {
                                    toastr.warning("Balance Low!");
                                    $('.check_balance_btn').css({
                                        "cursor": "not-allowed !important",
                                        "pointer-events":"none",
                                        "opacity": 0.5,
                                    });
                                }
                            }
                        });
                        
                    }
                },
                cancel: function () {
                    //close
                },
            },
            onContentReady: function () {
                var jc = this;
                this.$content.find('#amount').on('keyup', function (e) {
                    $(".bet_result").css("display","block");
                    $(".p_value").html($(this).val());

                    $.ajax({
                            url: '<?= base_url() ?>checkUserBalance/'+$(this).val(),
                            method: 'GET',
                            timeout: 3000,
                            success: function (response) {
                                toastr.clear();
                                if(response=='can_bet'){
                                    $('.check_balance_btn').css({
                                        "cursor":"pointer",
                                        "pointer-events":"visible",
                                        "opacity": 1
                                    });
                                } else {
                                    toastr.warning("Balance Low!");
                                    $('.check_balance_btn').css({
                                        "cursor": "not-allowed !important",
                                        "pointer-events":"none",
                                        "opacity": 0.5,
                                    });
                                }
                            }
                    });

                    var dbleval = $(this).val() * 2;
                    var percent = (10 / 100) * dbleval;
                    if($(this).val() < 1001){
                        percent = 0;
                    }
                    var final_amount = parseInt(dbleval - percent);
                    $(".p_value_1").html(final_amount);
                    return false; // reference the button and click it
                });
            }
        }); //confirm e
    });
    $('.view_bet').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url() ?>viewUserBets',
            method: 'post',
            success: function (response) {
                console.log(response);
                $("#bet-details").html(response);
                $("#view_bets_modal").modal('show');
            }
        });     
    });
    
</script>
<style>
</style>