<?php 
require_once("config/globalAdmData.php");
//$localMenuArray=$admObj->getDashboardLocalMenu();
//$userDashboardMenu=$admObj->getClientDashboardMenu();
  $adminFullMenu=$admObj->getAdmFullMenuList();
  $userDashboardMenu=$admObj->getClientDashboardMenu();
  $profile=$admObj->ajaxActive($_SESSION[$admObj->projectSecrectName]['user']['log_id']); if(isset($_REQUEST['hidden-update']) &&  $_REQUEST['hidden-update']=='success-edit'){
    // echo "<pre>"; print_r($_REQUEST);  exit;
    $update_pro=$admObj->updateUserProfile();
  }
//echo $userDashboardMenu;  exit;
//echo "<pre>"; print_r($localMenuArray);  exit;
require_once('includes/header.php'); 
?>
<div class="clearfix"></div>
    <div class="clearfix"></div>
  <style type="text/css">
    img {
  border-radius: 50%;
  width:200px
}
    /* Style all input fields */
    /* The message box is shown when the user clicks on the password field */
    #message {
      display:none;
      background: #f1f1f1;
      color: #000;
      position: relative;
      padding: 20px;
      margin-top: 10px;
    }
    #message p {
      padding: 10px 35px;
      font-size: 15px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
      color: green;
    }

    .valid:before {
      position: relative;
      left: -35px;
      content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
      color: red;
    }

    .invalid:before {
      position: relative;
      left: -35px;
      content: "✖";
    }
  </style>
  <div class="content-wrapper">
    <div class="col-ms-12">
      <?php if($admObj::hasWithMessage('message')){ ?>
          <?= $admObj::getWithMessage('message'); ?>
      <?php } ?>
    </div>
     <div class="container-fluid">
          <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
        <h4 class="page-title">Profile</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modify Profile</li>
         </ol>
     </div>
     </div>
     <div class="col-ms-8">
      <?php if($admObj::hasWithMessage('message')){ ?>
          <?= $admObj::getWithMessage('message'); ?>
      <?php } ?>
    </div>
     <div class="row">
              <div class="col-12 grid-margin stretch-card">
                 <div class="card">
                            <div class="card-header"  style="background-color:deeppink">
                                   <label><strong style="color:white;font-size: 30px"><b>Profile</b></strong></label> 
                             </div>
                             <div class="card-body">
                   <div class="account2" style="padding-top: 1px" align="center">
                  
                   
                    <div class="image img-cir img-120">
                       <a href="<?=$admObj->cssPath?><?php echo 'proImg/'.$profile['CHDUSER_Image']; ?>" target="_blank">
                         <img src="<?=$admObj->cssPath?><?php echo 'proImg/'.$profile['CHDUSER_Image']; ?>" alt="Profile Image"/>
                      </a>
                        <!--<img src="../../assets/images/icon2.png" alt="Profile Image" />-->
                    </div> 
                </div><p></p>
                <form action="" id="edit-user-profiles" enctype="multipart/form-data" method="post">
                  <input type="hidden" name="hidden-update" id="hidden-update">
                  <input type="hidden" name="hidden_userId" id="" value="<?= $profile['CHDUSER_Id']; ?>">
                 <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="hidden" name="hidden_fname" id="hidden_fname" value="<?= $profile['CHDUSER_FName']; ?>">
                  <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Enter Your Name" value="<?= $profile['fullName']; ?>" readonly />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" class="form-control" id="txtPassword" name="txtPassword" placeholder="Enter Your Name" value="<?= $profile['CHDUSER_Password']; ?>" readonly />
                </div>
                <span id="err_pass"></span>
                  <div id="message">
                      <h5>Password must contain the following:</h5>
                      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                      <p id="number" class="invalid">A <b>number</b></p>
                      <p id="special" class="invalid">A <b>special characters</b></p>
                      <p id="length" class="invalid">Minimum <b>8 characters and  </b><b> maximum</b>16 characters</p>
                  </div> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="text" class="form-control" id="txtEmail" placeholder="Enter email" value="<?php echo $profile['CHDUSER_Email']; ?>" name="txtEmail"/>
                  <span id="Error_email" style="font-family: 'Calisto MT'"></span>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control" id="txtAdd" placeholder="Enter email" value="<?php echo $profile['CHDUSER_Address']; ?>" name="txtAdd"/>
                  <span id="Error_add" style="font-family: 'Calisto MT'"></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ph Number</label>
                  <input type="text" class="form-control" id="txtPhNo" placeholder="Enter email" value="<?php echo $profile['CHDUSER_PhNo']; ?>" name="txtPhNo" onkeypress="return /[0-9]/i.test(event.key)"/>
                  <span id="Error_ph" style="font-family: 'Calisto MT'"></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NGS</label>
                  <input type="text" class="form-control" id="txtNGS" placeholder="Enter email" value="<?php echo $profile['CHDUSER_NGS']; ?>" name="txtNGS">
                  <span id="Error_NGS" style="font-family: 'Calisto MT'"></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputContactNo">Change Profile Image</label>
                  <input type="hidden" name="hidden_img_path" id="hidden_img_path" value="<?php echo $profile['CHDUSER_Image']; ?>"> 
                 <input type="file" name="proImg" id="proImg" class="form-control"  style="font-family: 'Calisto MT'" />
                <span id="Error_Print" style="font-family: 'Calisto MT'"></span>
                </div>     
              <div class="box-footer">
               <!-- <button type="submit" class="btn btn-danger">Update</button>-->
               <div align="center">
              <button type="button" class="center-block btn btn-primary" name="save-update" id="save-update">Update</button></div>       
                </div>
            </form>
           </div> 
         </div> 
              </div>
            </div>
   </div>
    <!-- End container-fluid-->
    <!--Start Dashboard Content-->
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <?php require_once('includes/footer.php'); ?>
  <script src="<?=$admObj->cssPath?>assets/js/userJS/updateUserPro.js?ver=<?=rand();?>"></script>