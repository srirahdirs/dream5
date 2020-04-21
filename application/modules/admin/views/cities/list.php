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
<title>Tandem - Cities</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'admin/home' ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/cities/add') ?>">Add City</a></li>
            </ol>
            <h6 class="slim-pagetitle">Cities LIST</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">City</th>
                        <th class="wd-15p">Country</th>
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
                                
                                <td><?= $row['city']; ?></td>
                                <td><?= $row['country']; ?></td>
                                <td><?php
                                    if ($row['status'] == 0) {
                                        echo '<strike>Inactive</strike>';
                                    } else {
                                        echo 'Active';
                                    }
                                    ?></td>                  
                                <td>                                    
                                    <a class="btn btn-info btn-xs" href="<?php echo base_url('admin/cities/edit/' . $row['id']) ?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs" href="javascript:void(0)" onclick="deleteData(<?= $row['id'] ?>)"><i class="fa fa-trash"></i></a>
                                </td>                  
                            </tr>
                            <?php
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
    $('.cities').addClass("active");


    function deleteData(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Are sure you want to Delete.',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/cities/delete/'); ?>' + id;
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