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
<title>Dream5 - Games</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/home' ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Games</li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/games/add') ?>">Add Game</a></li>
            </ol>
            <h6 class="slim-pagetitle">Games</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper table-responsive">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">#</th>
                        <th class="wd-5p">Category</th>
                        <th class="wd-10p">Game Type</th>
                        <th class="wd-15p">Team A</th>
                        <th class="wd-15p">Team B</th>
                        <th class="wd-20p">Date & Time</th>
                        <th class="wd-5p">Status</th>
                        <th class="wd-10p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($listData)) :
                        $i=1;
                        foreach ($listData as $row) :
                            $trBackground = '';
                            if($row['status'] == 'Live'){
                                $trBackground = 'aquamarine';
                            }
                            ?>
                            <tr style="background: <?= $trBackground?>">
                                <td><?= $i; ?></td>
                                <td><?= $row['category']; ?></td>
                                <td><?= $row['game_type']; ?></td>
                                <td><?= $row['team_a']; ?></td>
                                <td><?= $row['team_b']; ?></td>
                                <td><?= date('d-m-y h:i',strtotime($row['match_date_time'])); ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>                                    
                                    <a class="btn btn-info btn-xs" href="<?php echo base_url('admin/games/edit/' . $row['id']) ?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs" href="javascript:void(0)" onclick="deleteData(<?= $row['id'] ?>)"><i class="fa fa-trash"></i></a>
                                </td>                  
                            </tr>
                            <?php $i++;
                        endforeach;

                    endif;
                    ?>


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
    $('.masters').addClass("active");
    $('.games').addClass("active");


    function deleteData(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Delete.',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/games/delete/'); ?>' + id;
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