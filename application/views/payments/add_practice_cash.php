<?php $baseUrl = base_url() . 'assets'; ?>
<?php
$this->load->view('layouts/header_session');
$this->load->view('layouts/menu');
$this->load->view('layouts/menu_session');
?>
<div class="slim-mainpanel myprofile">
    <div class="container pd-t-50">
        <div class="section-wrapper">
            <form id="redirectForm" method="post" action="<?= base_url().'payment-request'?>">
                <div class="row">
                    
                    <!--single row starts-->
                    <div class="col-4">
                        <div class="form-group">
                            <label>Your practice chips</label><br>
                            <input class="form-control" id="practice_chips"  value="<?= $practice_chips ?>" disabled=""/>
                        </div>
                    </div>
                    <div class="col-2">
                        <label class="hide_label">Apply</label><br>
                        <a href="javascript:void(0)" class="btn btn-primary btn-block" id="reload_practice_chips">RELOAD</a>
                    </div>
                    
                    <div class="col-12 display_err_msg" style="display: none;color: red"> Please reload if below 1000 chips</div>
                    <!--single row ends-->
                    <div class="col-12" style="margin-bottom:20px;"></div>
                   
                </div>                
            </form>
        </div>
    </div>
</div> <!-- slim panel -->
</div> <!-- extra -->

<?php
$this->load->view('layouts/footer');
?>

<script type="text/javascript">
    $(".sidebar-nav-item").removeClass('active');
    $(".sidebar-nav-item .add_cash").addClass('active');
    
    $('#reload_practice_chips').on("click",function(){
        if($('#practice_chips').val() > 1000) {
            $('.display_err_msg').css("display","block");
            return false;
        }
        $.ajax({
            url: "<?php echo base_url("add-practice-cash"); ?>",
            method: "POST",  
            data: {reload_chips:'Yes'},
            success: function (response) {
               location.reload();
            }
        }); //ajax ends
    });
</script>