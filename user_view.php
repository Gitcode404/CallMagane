<?php 
require_once("config/globalAdmData.php");
// $("#comAction").val('saveCompanyData');
if(isset($_REQUEST['userAction']) &&  $_REQUEST['userAction']=='saveUserData'){
   $admObj->saveUSerData();
}
if(isset($_REQUEST['edituserAction']) &&  $_REQUEST['edituserAction']=='editUserData'){
   $admObj->updateUserData();
}
$isAdmin=0;
if($_SESSION[$admObj->projectSecrectName]['user']['log_id']==900069){
  $accessListArray['isEdit']=1;
  $accessListArray['isAdd']=1;
  $accessListArray['isView']=1;
  $accessListArray['isDel']=1;
  $isAdmin=1;
}else{
  $invokeUrl=end(explode('/', $_SERVER['REQUEST_URI']));
  $accessListArray=$admObj->isAuthorisedUrl($invokeUrl);
}


$userList=$admObj->getAllActiveUser();
//echo "<pre>"; print_r($userList);  exit;
//$deptList=$admObj->getdeptList();
$prvList=$admObj->getPreviledgeList();
require_once('includes/header.php'); 
?>

<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">User List</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">User Module</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Listing</li>
         </ol>
	   </div>
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div > <!--Please remove the height before using this page-->
              <div>
                <?php if($accessListArray['isAdd']==1){ ?>
                  <div class="card">
                      <div class="card-body"> 
                          <a href="javaScript:void(0);" data-toggle="modal" data-target="#newUserModal" class="btn btn-primary">Add New</a>
                      </div>
                  </div>
                   
                <?php } ?>
                <?php if($admObj::hasWithMessage('message')){ ?>
                    <?= $admObj::getWithMessage('message'); ?>
                <?php } ?>
              </div>
              <div class="card">
                <div class="card-body">
					<h4 class="page-title">All User's List</h4>
					<hr>
                  <div class="">
                    <!--<div class="pull-right" style="padding:10px;">
                          <input  data-table-id="deptTable" placeholder="SEARCH" type="search" class="form-control" name="speed_search" id='speed_search'>
                      </div>-->
                      <?php  if($userList && $accessListArray['isView']){ ?>
                          <table id='deptTable' class=" table-bordered" style="table-layout: fixed; width: 100%">
                            <tr style="background-color:#3c8dbc;color:white;">
                              <td width="5%" align="center">Sr No</td>
                              <td align="center" width="27%">Full Name</td>
                              <td align="center">User Id</td>
                              <td align="center">Password</td>
                              <td align="center">NGS</td>
                              <th align="center">Status</th>
                              <td align="center">Role</td>
                              <td align="center">Action</td>
                            </tr>
                            <?php foreach ($userList as $userKey => $userVal) {?>
                              <tr>
                                <td align="center"><?=$userKey+1?></td>
                                <td align="center"><?= $userVal['fullName']?></td>
                                <!--<td id=''><?= $userVal['wbchses_email']?></td>-->
                               <!-- <td id=''><?= $userVal['wbchses_phone']?></td>-->
                               <!-- <td id="">
                                    <?php $ImgP=$userVal['CHDUSER_Image'];if($ImgP=='NA'){ echo "No file attached."; } else {?> <a href="<?php echo "proImg/". $userVal['CHDUSER_Image']; ?>" target="_blank"><div class="zoom"><img src="<?php echo "proImg/". $userVal['CHDUSER_Image']; ?>" style="width: 60px;height: 60px;border-radius: 50%;"/></div></a> <?php }?>
                               </td>-->
                                <td align="center"><?= $userVal['CHDUSER_UserName']?></td>
                                <td align="center"><?= $userVal['CHDUSER_Password']?></td>
                                <td align="center"><?= $userVal['CHDUSER_NGS']?></td>
                                <td align="center"><?= $userVal['acc_status']?>
                                <div style="display: none;" id="jsonData<?=$userKey?>">
                                  <?php //echo $userKey; ?>
                                        <?= json_encode($userVal); ?>
                                </div>
                                </td>
                                <td align="center"><?= $userVal['dirpp_name']?>
                                </td>
                                <!--<td><?= $userVal['user_status']?>
                                  
                                    
                                </td>-->

                                <td align="center">
                                  <?php if($accessListArray['isEdit']==1){ ?>
                                     <i identifier='edit'  data-placement-id="<?=$userKey?>" class="fa fa-pencil green" aria-hidden="true"></i>
                                  <?php } ?>
                                  <!--<i identifier='delete'  data-placement-id="<?=$userVal['dirpc_id']?>" class="fa fa-trash red" aria-hidden="true"></i>-->
                                </td>
                            </tr>
                           <?php  } ?>
                          </table>
                        <?php  }else{ ?>
                          <div style="margin-top:10px;padding: 10px;" class="alert alert-danger">
                            Sorry no result found
                          </div>
                        <?php } ?>
                  </div>
                  
                </div>
              </div>
              
          </div>
        </div>
      </div>

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <div class="modal fade" id="newUserModal">
      <div class="modal-dialog">
        <div class="modal-content animated zoomInUp">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-star"></i> New User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form method="post" id='userForm' enctype="multipart/form-data">
                <input type="hidden" name="userAction" id='userAction' />
                <div class="row">
                   <div class="col-md-4">
                      <div class="form-group">
                        <label>First Name</label>
                        <input value="<?=$admObj->getFormData('fName')?>" type="text" name="fName" id='fName' class="form-control" placeholder="First Name" />
                        <div class="err" id='fNameErr'></div>
                     </div>
                   </div>
                   <div class="col-md-4">
                      <div class="form-group">
                          <label>Middle Name</label>
                          <input value="<?=$admObj->getFormData('mName')?>" type="text" name="mName" id='mName' class="form-control" placeholder="Middle Name" />
                          
                      </div>
                   </div>
                   <div class="col-md-4">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input value="<?=$admObj->getFormData('lName')?>" type="text" name="lName" id='lName' class="form-control" placeholder="Last Name" />
                        <div class="err" id='lNameErr'></div>
                     </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                        <label>NGS</label>
                        <input value="<?=$admObj->getFormData('ngs')?>" type="text" name="ngs" id='ngs' class="form-control" placeholder="Company NGS" />
                        <div class="err" id='NGSErr'></div>
                     </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                        <label>User Type</label>
                        <select id="userType" name="userType" class="form-control">
                          <option value="">Select User Type</option>
                          <option value="1">Application User</option>
                          <option value="2">Admin User</option>
                        </select>
                        <!--<input type="text" name="userType1" id="userType1" value="User" readonly class="form-control">
                        <input type="hidden" name="userType" id="userType" value="User"class="form-control">-->
                        <div class="err" id='ErrUserType'></div>
                     </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                        <label>Address</label>
                        <input value="<?=$admObj->getFormData('address')?>" type="text" name="address" id='address' class="form-control" placeholder="Address" />
                        <div class="err" id='addressErr'></div>
                     </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                        <label>Profile Image</label>
                        <input  type="file" name="proImg" id='proImg' class="form-control" placeholder="Image" />
                        <div class="err" id='ErrProImg'></div>
                     </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input value="<?=$admObj->getFormData('email')?>" type="text" name="email" id='email' class="form-control" placeholder="Email" />
                          <div class="err" id='emailErr'></div>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input value="<?=$admObj->getFormData('userPhone')?>" maxlength="11" type="text" name="userPhone" id='userPhone' class="form-control" placeholder="Phone Number" />
                            <div class="err" id='userPhoneErr'></div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>User Name</label>
                            <input value="<?=$admObj->getFormData('userLogName')?>" type="text" class="form-control" name="userLogName" placeholder="User Name" id='userLogName'/>
                            <div class="err" id='userLogNameErr'></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="userPass" placeholder="Password" id='userPass'/>
                            <div class="err" id='userPassErr'></div>
                        </div>
                    </div>
                </div>
               
               
               
               
               <div class="form-group">
                  <label>Roles</label>
                    <select name="userRole" id='userRole' class="form-control">
                        <option value="">Choose Roels</option>
                        <?php foreach ($prvList as $prvKey => $prvVal) {?>
                          <option value='<?= $prvVal['dirpp_id']?>'><?= $prvVal['dirpp_name']?></option>
                        <?php } ?>
                    </select>
                    <div class="err" id='userRoleErr'></div>
               </div>
               
                
               
                <div class="form-group">
                  <div class="text-center">
                     <button type="button" identifier='saveNewUser' class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    
                  </div>
                </div>
             </form>
          </div>
          
        </div>
      </div>
    </div>

    <!--Edit User Modal -->
     <div class="modal fade" id="editUserModal">
      <div class="modal-dialog">
        <div class="modal-content animated zoomInUp">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-star"></i> Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form method="post" id='edituserForm'>
                <input type="hidden" name="editId" id='editId'>
                <input type="hidden" name="edituserAction" id='edituserAction' />
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="edit_fName" id='edit_fName' class="form-control" placeholder="First Name" />
                  <div class="err" id='edit_fNameErr'></div>
               </div>
               <div class="form-group">
                  <label>Middle Name</label>
                  <input type="text" name="edit_mName" id='edit_mName' class="form-control" placeholder="Middle Name" />
                  
               </div>
               <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="edit_lName" id='edit_lName' class="form-control" placeholder="Last Name" />
                  <div class="err" id='edit_lNameErr'></div>
               </div>
               <div class="form-group">
                  <label>Email</label>
                  <input  type="text" name="edit_email" id='edit_email' class="form-control" placeholder="Email" />
                  <div class="err" id='edit_emailErr'></div>
               </div>
               <div class="form-group">
                  <label>NGS</label>
                  <input  type="text" name="edit_ngs" id='edit_ngs' class="form-control" placeholder="Company NGS" />
                  <div class="err" id='edit_ngsErr'></div>
               </div>
               <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" name="edit_userPhone" id='edit_userPhone' class="form-control" placeholder="Phone Number" />
                  <div class="err" id='edit_userPhoneErr'></div>
               </div>
               <div class="form-group">
                  <label>Roles</label>
                    <select name="edit_userRole" id='edit_userRole' class="form-control">
                        <option value="">Choose Roels</option>
                        <?php foreach ($prvList as $prvKey => $prvVal) {?>
                          <option value='<?= $prvVal['dirpp_id']?>'><?= $prvVal['dirpp_name']?></option>
                        <?php } ?>
                    </select>
                    <div class="err" id='edit_userRoleErr'></div>
               </div>
               <div class="form-group">
                  <label>User Type</label>
                  <select id='edit_userType' name="edit_userType" class="form-control">
                    <option value="">Choose user type</option>
                    <option value="1">Application User</option>
                    <option value="2">Uploaders</option>
                    <option value="3">Admin User</option>
                  </select>
                  <!--<input type="text" name="edit_userType" id="edit_userType" class="form-control" readonly>-->
                  <div class="err" id='userTypeErr'></div>
               </div>    
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="edit_address" id='edit_address' class="form-control" placeholder="Address" />
                  <div class="err" id='edit_addressErr'></div>
               </div>
                <!--<div class="form-group">
                  <label>Profile Image</label>
                  <input  type="file" name="edit_proImg" id='edit_proImg' class="form-control" placeholder="Image" />
                  <div class="err" id='edit_ErrProImg'></div>
               </div>-->
               <div class="form-group">
                  <label>User Status</label>
                  <select id='edit_userStatus' name="edit_userStatus" class="form-control">
                    <option value="">Choose user Status</option>
                    <option value="1">Active</option>
                    <option value="2">In-Active</option>
                   
                  </select>
                  
               </div>
               
                <div class="form-group">
                  <div class="text-center">
                     <button type="button" identifier='editNewUser' class="btn btn-primary"><i class="fa fa-check-square-o"></i> Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    
                  </div>
                </div>
             </form>
          </div>
          
        </div>
      </div>
    </div>
    <!--End Of edit user Modal -->

   
  
  <!--Start footer-->
  <?php require_once('includes/footer.php'); ?>
    <script src="<?=$admObj->cssPath?>assets/js/users.js?<?=time()?>"></script>