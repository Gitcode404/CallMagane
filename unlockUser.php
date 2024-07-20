<?php
// require_once("Controller/unlockUser.class.php");
require_once("config/globalAdmData.php");
$userLiatArray=$admObj->GetUser();
$admObj->UnlockUserFun();
//echo "<pre>";print_r($userLiatArray);exit;
require_once('includes/header.php'); 


?>
<div class="clearfix"></div>
<div class="content-wrapper">
  <div class="container-fluid"><!--Start Dashboard Content-->
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
      <div class="col-sm-9">
        <h4 class="page-title">Unlock User</h4>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
          <li class="breadcrumb-item active"><a href="javaScript:void();">User</a></li>
          <li class="breadcrumb-item active" aria-current="page">Unlock User</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card border border-dark">
          <div class="card-body">
            <h5 class="page-title"><i class="fa fa-address-book-o"></i>Lock User List</h5>
            <hr>
            <table style="table-layout: fixed; width: 100%" class="table-sm table-bordered">
            <form id="forms" method="post">
                <input type="hidden" id="action" name="action">
                <input type="hidden" id="txtUser" name="txtUser">
            </form>
              <thead>
                <tr style="background-color:#3c8dbc;color:white;">
                  <td width="4%" align="center">#</td>
                  <td width="10%" align="center">User NGS</td>
                  <td width="28%">User Name</td>
                  <td width="10%" align="center">Action</td>
                </tr>
                <?php
                if (is_array($userLiatArray) && count($userLiatArray) > 0) {
                  foreach ($userLiatArray as $key => $value) { ?>
                    <tr>
                      <td align="center"><?= ($autoCounter + $key + 1) ?></td>
                      <td align="center"><?= $value['CHDUSER_NGS'] ?></td>
                      <td><?= $value['CHDUSER_UserName'] ?></td>
                      <td align="center">
                        <i identifier='Unlock' style="cursor:pointer" class="fa fa-unlock green fa-lg" aria-hidden="true" data-toggle="tooltip" title="View" data-placement-id=<?=$value['CHDUSER_Id']?>></i>
                      </td>
                    </tr>
                  <?php } ?>
                <?php } else { ?>
                  <tr>
                    <td colspan="9" align="center" style="color: red;font-size: 22px">
                      <div class="">No Data Found</div>
                    </td>
                  </tr>
                <?php } ?>
              </thead>
            </table>
          </div><!--End Body--->
          </form>
          <?php //print_r($obj->dataArray);
          ?>
        </div><!--End Second Card-->
      </div>
    </div>
  </div><!-- End container-fluid-->
  <!--End Dashboard Content-->
</div><!--End content-wrapper-->
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a><!--End Back To Top Button-->
<!--Start footer-->
<?php require_once('includes/footer.php'); ?>
<script>
    $(document).ready(function(){
        $("[identifier='Unlock']").on('click',function(){
            $("#txtUser").val($.trim($(this).attr('data-placement-id')));
            $("#action").val('1');
            $("#forms").submit();
        });
    });
</script>