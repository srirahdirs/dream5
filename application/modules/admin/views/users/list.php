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
<title>Tandem - Users</title>
<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'home' ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
            <h6 class="slim-pagetitle">Users LIST</h6>
        </div><!-- slim-pageheader -->

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-10p">Email</th>
                        <th class="wd-10p">Mobile Number</th>             
                        <th class="wd-10p">Name</th>             
                        <th class="wd-10p">Pan Verified</th>             
                        <th class="wd-10p">Address Proof</th>             
                        <th class="wd-10p">Bank Proof</th>             
                        <th class="wd-5p">Status</th>
                        <th class="wd-5p">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($listData)) :
                        foreach ($listData as $row) :
                            ?>
                            <tr>
                                
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['mobile_number'] ?></td>                                
                                <td><?= $row['first_name'] . " ".$row['last_name'] ?></td>                                
                                <td><?= $row['is_pan_verified'] ?></td>                                
                                <td><?= $row['is_address_proof_verified'] ?></td>                                
                                <td><?= $row['is_bank_account_verified'] ?></td>                                
                                <td><?php
                                    if ($row['status'] == 0) {
                                        echo '<strike>Inactive</strike>';
                                    } else {
                                        echo 'Active';
                                    }
                                    ?></td>                  
                                <td>
                                    <a class="btn btn-success btn-xs" href="<?= base_url().'admin/users/view/'.$row['id']?>"><i class="fa fa-eye"></i></a>
                                </td>                  
                            </tr>
                            <?php
                        endforeach;

                    endif;
                    ?>


                </tbody>
            </table>
            <p class="pagination_list"><?php echo $links; ?></p>
        </div><!-- table-wrapper -->
    </div>
</div>
<?php
$this->load->view('layouts/footer');
?>

<script>
    $('.sidebar-nav-link').removeClass("active");
    $('.users').addClass("active");


    function deleteData(id) {
        $.confirm({
            title: 'Please Confirm',
            content: 'Do you want to continue?',
            buttons: {
                confirm: function () {
                    window.location = '<?php echo base_url('admin/users/delete/'); ?>' + id;
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