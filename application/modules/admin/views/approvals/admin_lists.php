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
<title>Tandem - Admin Users</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/approvals/add-admin') ?>" class="btn btn-info">Add Admin</a></li>
            </ol>
            <h6 class="slim-pagetitle">Admin Users</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper table-responsive">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Email</th>
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
                                
                                <td><?= $row['email']; ?></td>
                                <td><?php
                                    if ($row['status'] == 0) {
                                        echo '<strike>Inactive</strike>';
                                    } else {
                                        echo 'Active';
                                    }
                                    ?></td>                  
                                <td>       
                                    <?php if($this->session->userdata('admin_id') !== $row['id']) { ?>
                                        <a class="btn btn-danger btn-xs" href="javascript:void(0)" onclick="deleteData(<?= $row['id'] ?>)"><i class="fa fa-trash"></i></a>
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
    $('.manage_admin').addClass("active");
    $('.masters_ul').css('display','none');


    function deleteData(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Delete.',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/approvals/delete-admin/'); ?>' + id;
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