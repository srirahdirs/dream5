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
<title>Tandem - Skills</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">         
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"></li>
            </ol>
            <h6 class="slim-pagetitle">Influencer Skills</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Skill</th>
                        <th class="wd-10p">Status</th>
                        <th class="wd-15p">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($listData)) :
                        foreach ($listData as $row) :
                            ?>
                            <tr>
                                
                                <td><?= $row['skill']; ?></td>
                                <td><?php
                                    if ($row['status'] == 3) {
                                        echo '<span style="color:red"><strike>Rejected</span></strike>';
                                    } elseif($row['status'] == 2) {
                                            echo '<span style="color:green">Created</span>';
                                    } else {
                                        echo 'Active';
                                    }
                                    ?>
                                </td>                  
                                <td>      
                                    <?php if($row['status'] != 3) { ?>
                                        <a class="btn btn-success btn-xs" href="javascript:void(0)" onclick="accept(<?= $row['id'] ?>)">Accept</a> 
                                        <a class="btn btn-danger btn-xs" href="javascript:void(0)" onclick="reject(<?= $row['id'] ?>)">Reject</a>                                    
                                    <?php  } ?>
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
    $('.approve_skills').addClass("active");
    $('.masters_ul').css('display','none');


    function accept(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Accept.',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/approvals/accept-skill/'); ?>' + id;
                }, //confirm btn ends
                cancel: function () {

                },
            },
        }); //confirm e
    }
    function reject(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Reject.',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/approvals/reject-skill/'); ?>' + id;
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