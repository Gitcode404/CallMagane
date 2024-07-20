<?php 
require_once("../config/globalAdmData.php");
// $("#comAction").val('saveCompanyData');
//echo "<pre>"; print_r($_REQUEST); exit;
if(isset($_REQUEST['search_action']) &&  $_REQUEST['search_action']=='doSearchTeacher'){
   $teacherList=$admObj->searchInstTeacherList();
   //echo "<pre>"; print_r($teacherList);  exit;
}elseif(isset($_REQUEST['search_action']) &&  $_REQUEST['search_action']=='doResetTeacher'){
  header("location:".$admObj->basePath."inst-teacher-list");  exit;
}

else{
  $teacherList=$admObj->getInstTeacherList();
}
if(isset($_REQUEST['editAction']) &&  $_REQUEST['editAction']=='updateTeacherForm'){
   $admObj->updateTeacherData();
}
//echo "<pre>"; print_r($teacherList);  exit;

/////////////////////Update Modification process
if(isset($_REQUEST['updateAction']) &&  $_REQUEST['updateAction']=='enableTeacherUpdate'){
   $admObj->updateTeacherSettings();
}

//echo "<pre>"; print_r($teacherList);  exit;



$isAdmin=0;
if($_SESSION[$admObj->projectSecrectName]['admin']['log_id']==900069){
  $accessListArray['isEdit']=1;
  $accessListArray['isAdd']=1;
  $accessListArray['isView']=1;
  $accessListArray['isDel']=1;
  $isAdmin=1;
}else{
  $invokeUrl=end(explode('/', $_SERVER['REQUEST_URI']));
  $accessListArray=$admObj->isAuthorisedUrl($invokeUrl);
}


//$instListArray=$admObj->getAllInstList();
$distArray=$admObj->getDistDetails();
$teacherSub=$admObj->getTeachSubjectList();
//echo "<pre>"; print_r($teacherList);  exit;
//$deptList=$admObj->getdeptList();
$prvList=$admObj->getPreviledgeList();
$distArray=$admObj->getDistDetails();
require_once('includes/header.php'); 
?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">All Teacher's Data List</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Teacher's Module</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Teacher's Data List</li>
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
						  <h4 class="page-title">Search Criteria</h4>                        
						  <div class="row1">
                            <form method="post" id='searchForm'>
                              <input type="hidden" name="search_action" id='search_action'/>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Institute Code</label>
                                          <input value="<?=$admObj->getFormData('instCode')?>" placeholder="Institute Code" type="text" maxlength='6' name="instCode" id='instCode' class="form-control" />
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Institute Name</label>
                                          <input value="<?=$admObj->getFormData('instName')?>" placeholder="Institute Name" type="text" name="instName" id='instName' class="form-control" />
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Subject</label>
                                          <select name="subName" id='subName' class="form-control">
                                            <option value="">Choose Subject</option>
                                            <?php foreach ($teacherSub as $subKey => $subVal) {?>
                                              <option <?php if($admObj->getFormData('subName')==$subVal['wbchse_id']){echo "selected";} ?> value="<?= $subVal['wbchse_id'] ?>">
                                                <?= $subVal['wbchse_subject_name'] ?>
                                              </option>
                                            <?php } ?>
                                          </select>
                                      </div>
                                  </div>

                              </div>

                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                          <label>Application Id</label>
                                          <input value="<?=$admObj->getFormData('appId')?>" placeholder="Application Id" type="text" name="appId" id='appId' class="form-control" />
                                      </div>
                                 </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Min Experience</label>
                                          <select name="minExp" class="form-control" id='minExp'>
                                            <option value="">Min</option>
                                            <?php for($i=0;$i<=20;$i++){ ?>
                                               <option <?php if($admObj->getFormData('minExp')==$i && $admObj->getFormData('minExp')!='' ){echo "selected";} ?> value="<?=$i?>"><?= $i?> Years</option>
                                            <?php } ?>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Max Experience</label>
                                          <select name="maxExp" class="form-control" id='maxExp'>
                                            <option  value="">Max</option>
                                            <?php for($i=0;$i<=20;$i++){ ?>
                                               <option <?php if($admObj->getFormData('maxExp')==$i && $admObj->getFormData('maxExp')!=''){echo "selected";} ?> value="<?=$i?>"><?= $i?> Years</option>
                                            <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-4">
                                     <label>District</label>
                                      <select name="distName" id='distName' class="form-control">
                                        <option value="">Choose District</option>
                                          <?php foreach ($distArray as $key => $value) {?>
                                              <option <?php if($admObj->getFormData('distName')==$value['wbchsedm_name']){echo 'selected';} ?> value="<?= $value['wbchsedm_name']?>"> <?= $value['wbchsedm_name']?> </option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                              
                            </form>
                        </div>
                        <div class="row1">
                            <div class="form-group1" style="margin-top: 10px;">
                                <a href="javaScript:void(0);" identifier='do_search' id='search_data'  class="btn btn-primary">SEARCH</a>

                                 <a href="javaScript:void(0);" identifier='do_reset' id='search_data'  class="btn btn-danger">RESET</a>
                            </div>
                        </div>
                          
                      </div>
                  </div>
                   
                <?php } ?>
                <?php if($admObj::hasWithMessage('message')){ ?>
                    <?= $admObj::getWithMessage('message'); ?>
                <?php } ?>
              </div>
              <div class="card">
                <div class="card-body">
					<h4 class="page-title">Teacher's Data Listing</h4>
					<hr>
                  <div class="table-responsive">
                    <!--<div class="pull-right" style="padding:10px;">
                          <input  data-table-id="deptTable" placeholder="SEARCH" type="search" class="form-control" name="speed_search" id='speed_search'>
                      </div>-->
                      <?php  if($teacherList && $accessListArray['isView']){ ?>
                          <table id='deptTable' class="table table-sm table-bordered" style="width: 500px;">
                            <tr style="background-color:#3c8dbc;color:white;">
                              <th>Sr</th>
                              <th>Application Id</th>
                              <th>Name</th>
                              <th>Qualification</th>
                              <th>Subject</th>
                              <th>Action</th>
                            </tr>
                             <tbody id='teacher_data'>
                                <?php foreach ($teacherList as $key => $value) { ?>
                                    <tr>
                                      <td><?=$key+1?></td>
                                      <td id='appNo<?=$value['wbchsetd_id']?>'><?=$value['wbchsetd_application_no']?></td>
                                      <td id='appName<?=$value['wbchsetd_id']?>'><?=$value['fullName']?></td>
                                      
                                      <td id='appQualification<?=$value['wbchsetd_id']?>'><?=$value['wbchsetd_qualification']?></td>
                                      <td id='appSubNmae<?=$value['wbchsetd_id']?>'><?=$value['wbchse_subject_name']?></td>
                                      <td>
                                        
                                        <input type="hidden" id="fName<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_fname']?>">

                                        <input type="hidden" id="subId<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_subject_id']?>">

                                        <input type="hidden" id="mName<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_mname']?>">

                                        <input type="hidden" id="lName<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_lname']?>">


                                        <input type="hidden" id="addressOne<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_address1']?>">

                                        <input type="hidden" id="expRetirmentProcess<?=$value['wbchsetd_id']?>" value="<?=$value['retirnmentDate']?>">

                                        <input type="hidden" id="addressTwo<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_address2']?>">

                                        <input type="hidden" id="postOffice<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_po']?>">

                                        <input type="hidden" id="pincode<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_pincode']?>">

                                        <input type="hidden" id="email<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_email']?>">

                                        <input type="hidden" id="contact<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_contact_no']?>">

                                        <input type="hidden" id="retirDate<?=$value['wbchsetd_id']?>" value="<?=$value['retirnmentDate']?>">

                                        <input type="hidden" id="expYear<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_exp_year']?>">

                                        <input type="hidden" id="expMon<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_exp_month']?>">

                                        <input type="hidden" id="appNature<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_appNature']?>">

                                        <input type="hidden" id="assignmanrDish<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_assignemntDish']?>">

                                        <input type="hidden" id="studentNum<?=$value['wbchsetd_id']?>" value="<?=$value['wbchsetd_numStudent']?>">


                                        <a data-placement-id="<?=$value['wbchsetd_id']?>" identifier='view_teacher_info' href="javascript:void(0);">
                                          <i class="fa fa-eye" aria-hidden="true"></i>

                                        </a>
                                         <?php if($accessListArray['isEdit']==1){ ?>
                                          <a style="margin-left: 9px;" data-placement-id="<?=$value['wbchsetd_id']?>" identifier='edit_teacher_info' href="javascript:void(0);">
                                          <i class="fa fa-pencil" aria-hidden="true"></i></a>

                                          <!--Allow to modified -->

                                          <?php if($value['wbchsetd_is_inst_modified']==0){ ?>
                                            <a  data-placement-id="<?=$value['wbchsetd_id']?>" identifier='enable_teacher_update'  href="javascript:void(0);">
                                              <i style="color: red; margin-left: 5px;" class="fa fa-wrench" aria-hidden="true"></i>

                                            </a>
                                          <?php } ?>

                                        
                                         <?php } ?>


                                      </td>

                                    </tr>
                                 <?php  } ?>
                            </tbody>
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
 
    

    <!--Edit User Modal -->
    <div class="modal fade" id="viewTeacherInfo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content animated slideInUp">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-star"></i> <span id='actionType'>View  teacher's</span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" id='teacherForm'>
                
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                         <label>First Name</label>
                         <input type="text" name="edit_fName" id='edit_fName' class="form-control" />
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                         <label>Middle Name</label>
                         <input type="text" name="edit_mName" id='edit_mName' class="form-control" />
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                         <label>Last Name</label>
                         <input type="text" name="edit_lName" id='edit_lName' class="form-control" />
                      </div>
                  </div>

              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Address Line 1</label>
                          <input   type="text" name='editaddressLine1'  id='editaddressLine1' value="" class="form-control" >
                          
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group"> 
                        <label>Address Line 2</label>
                        <input  type="text" value=""  class="form-control" name='editaddressLine2' id='editaddressLine2' >
                        
                    </div>
                  </div>
              </div>
              
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Po</label>
                          <input  type="text" value="" maxlength="600" class="form-control" id='editPo' name='editPo'  placeholder="PO">
                          
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Pincode</label>
                          <input  type="text" value=""  class="form-control" id='editpinCode' name='editpinCode'  placeholder="Pincode">
                          
                      </div>
                  </div>

              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Email</label>
                          <input  type="text" value=""  class="form-control" id='editemail' name='editemail'  placeholder="Email">
                          
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Contact No</label>
                          <input  type="text" value=""  maxlength="11" class="form-control" id='editcontactNo' name='editcontactNo'>
                          
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Qualification</label>
                          <input  type="text" value=""   class="form-control" name="editqualification" id='editqualification' >
                         
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Date of retirement</label>
                          <input  type="text"  value="" name='editdateOfRetir'  class="form-control" id='editdateOfRetir' >
                          
                      </div>
                  </div>

              </div>
              <div class="row"> 
                  <label>Experience of teacher in H.S. (Completed Years)</label>
                   
                      <div class="col-md-6">
                          
                          <div class="form-group">
                             
                              <label style="float: left;">Year</label>
                              <select class="form-control" id='editYear' name='editYear'>
                                <option value="">Choose Year</option>
                                <?php for($i=0;$i<=20;$i++){ ?>
                                    <option value="<?= $i?>"><?= $i?></option>
                                 <?php } ?>
                              </select>
                                
                             
                          </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label style="float: left;">Month</label>
                            

                              <select class="form-control" id='editexpMon' name='editexpMon'>
                                <option value="">Choose Year</option>
                                <?php for($i=0;$i<=20;$i++){ ?>
                                    <option value="<?= $i?>"><?= $i?></option>
                                 <?php } ?>
                              </select>
                              
                          </div>
                      </div>

                   
              </div>

              <div class="row">  
                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Examiner Code (If any) </label>
                          <input  type="text" maxlength="5" value=""  class="form-control" name="editassignemntDish" id='editassignemntDish'>
                          
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group"> 
                          <label>Nature Of Appointment</label>
                          

                          <select class="form-control" name='editappNature' id="editappNature" >
                              <option value="1">Full Time</option>
                              <option value="2">Contractual</option>
                              <option value="3">Part Time</option>
                              <option value="4">Voluntary</option>
                              <option value="5">Others</option>

                          </select>
                          
                      </div>
                  </div>

              </div>

              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group"> 
                        <label>Subject</label>
                        

                        <select name="editSubject" id='editSubject' class="form-control">
                            <option value="">Choose Subject</option>
                            <?php foreach ($teacherSub as $subKey => $subVal) {?>
                              <option <?php if($admObj->getFormData('subName')==$subVal['wbchse_id']){echo "selected";} ?> value="<?= $subVal['wbchse_id'] ?>">
                                <?= $subVal['wbchse_subject_name'] ?>
                              </option>
                            <?php } ?>
                        </select>
                         
                        
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group"> 
                        <label>Number of student</label>

                         <input  type="text"  name="editnumStudent" value=""  class="form-control" id='editnumStudent'>

                        
                    </div>
                 </div>

              </div>

              <div class="row" id='editProcess' style="text-align: center;">
                  <input type="hidden" name="editAction" id='editAction'>
                  <input type="hidden" name="teacherId" id='teacherId'>

                  <div class="form-group">
                      <div class="col-md-12" style="text-align: center;">
                          <a id='saveInstDetails' href="javascript:void(0);" class="btn btn-primary">UPDATE</a>
                          <a data-dismiss="modal" href="javascript:void(0);" class="btn btn-danger">CLOSE</a>
                      </div>
                  </div>
              </div>


              
              

              

              
             


          </form>
            </div>
            <div class="modal-footer">
             
             
            </div>
          </div>
        </div>
    </div>
    <!--End Of edit user Modal -->
    <!-- Update Teacher data process-->
    <form method="post" id='enableUpdateForm'>
        <input type="hidden" name="updateAction" id='updateAction'>
        <input type="hidden" name="teachId" id='teachId'>
    </form>

   
  
  <!--Start footer-->

  <?php require_once('includes/footer.php'); ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=$admObj->cssPath?>assets/js/inst_teacher_view.js?<?=time()?>"></script>