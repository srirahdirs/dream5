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
<title>Dream5 - Upi</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/home' ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upi</li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/upi/add') ?>">Add Upi</a></li>
            </ol>
            <h6 class="slim-pagetitle">Upi</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper table-responsive">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">#</th>
                        <th class="wd-5p">Upi Id</th>
                        <th class="wd-5p">Upi Method</th>
                        <th class="wd-5p">Status</th>
                        <th class="wd-10p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($listData)) :
                        $i=1;
                        foreach ($listData as $row) :
                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['upi_id']; ?></td>
                                <td><?= $row['upi_method']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>                                    
                                    <a class="btn btn-info btn-xs" href="<?php echo base_url('admin/upi/edit/' . $row['id']) ?>"><i class="fa fa-pencil"></i></a>
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
    $('.upi_master').addClass("active");


    function deleteData(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Delete.',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/upi/delete/'); ?>' + id;
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