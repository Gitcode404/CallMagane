<?php

/**
 * Project Name : Citizen Help Desk ::
 * Page Name : Modify Docket Details
 * Purpose of the Page : This page used for edit purpore only admin & super admin can access this page.
 * Created By : Gobinda Prasad Bhunia & Santanu Sarkar
 * Created on : 23 Sep, 2022
 */
//echo $_REQUEST['docID'];exit();

require_once "config/globalAdmData.php";
$adminFullMenu     = $admObj->getAdmFullMenuList();
$userDashboardMenu = $admObj->getClientDashboardMenu();
if ($_SESSION[$admObj->projectSecrectName]['user']['log_id'] != 900069) {
    $docketPermission = $admObj->docPermissionFun(trim($_REQUEST['docID']), trim($_SESSION[$admObj->projectSecrectName]['user']['log_id']));
    if ($docketPermission <= 0) {
        $admObj->redirect('docket-list');
    }
}
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'editData') {
    $saveEdit = $admObj->editDocketSave(trim($_REQUEST['docID']), trim($_SESSION[$admObj->projectSecrectName]['user']['log_id']));
}
$editDocket = $admObj->editDocketFun(trim($_REQUEST['docID']), trim($_SESSION[$admObj->projectSecrectName]['user']['log_id']));

if (is_array($editDocket) && count($editDocket) > 0) {
    $callerType     = $admObj->fetchTable('chdct_id', 'chdct_type', 'chd_caller_type');
    $directorate    = $admObj->fetchTable('chdd_id', 'chdd_name', 'chd_directorate');
    $education      = $admObj->fetchTable('chde_id', 'chde_type_name', 'chd_education');
    $queryTypes     = $admObj->fetchTable('chdqt_id', 'chdqt_name', 'chd_query_type');
    $StdCradit_Card = $admObj->fetchTable('csi_id', 'csi_inst_name', 'chd_scc_institutes');
    $state          = $admObj->fetchTable('SL', 'State_Name', 'chd_state');
    // $district=$admObj->fetchTable('Sl_No','District','chd_district');
    $directorateName                         = $admObj->fetchTable('chdsccdn_id', 'chdsccdn_name', 'chd_scc_directorate_name');
    $SCCAssigDept                            = $admObj->fetchTable('CHDSCC_AD_Sl', 'CHDSCC_AD_Name', 'chd_scc_assignrd_dept');
    $lastExamQualified                       = $admObj->fetchTable('chdleq_id', 'chdleq_name', 'chd_last_exam_q');
    list($noRow, $resultSet, $b)             = $addmore             = $admObj->addmoreFun(trim($_REQUEST['docID']), trim($_SESSION[$admObj->projectSecrectName]['user']['log_id']));
    list($noRows, $resultSets, $countString) = $admObj->wbsis_workExp(trim($_REQUEST['docID']), trim($_SESSION[$admObj->projectSecrectName]['user']['log_id']));

    $dire_res          = $admObj->Directorate();
    $jobissue          = $admObj->JobIssueFun();
    $scheme            = $admObj->SchemeFun();
    $country           = $admObj->CountryFun();
    $state             = $admObj->StateFun();
    $district          = $admObj->DistrictFun();
    $area              = $admObj->AreaFun();
    $query             = $admObj->QueryTypeFun();
    $gender            = $admObj->GenderFun();
    $add_type          = $admObj->AddmisfunFun();
    $nature_call       = $admObj->NatureCAllFun();
    $ssc_catagory_call = $admObj->ScsCaltagoryCallFun();
    $ugpg_course = $admObj->UGPGCourseName();
    $ugpg_course_type = $admObj->UGPGCourseType();
    $deatilsQuery_type = $admObj->DeatilsQueryType();
    //  echo "<pre>";print_r($editDocket);exit;
     $complain = array();
    $complain = $admObj->ComplainDetailsFun($editDocket['chde_id'],$editDocket['chd_cd_query_type']);
    // $complain = $admObj->ComplainDetailsFun($editDocket['chde_id'],4);
    // echo "<pre>";print_r($complain);exit;
}
// exit;
require_once 'includes/header.php';
?>
	<link rel="stylesheet" type="text/css" href="<?=$admObj->cssPath?>assets/css/editDoc.css?<?=time()?>">
	<div class="clearfix"></div>
	<div class="content-wrapper">
    <div class="container-fluid">
    	<!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-7">
          <h4 class="page-title">Edit</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Modify</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Edit Docket</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
         </ol>
        </div>
     </div>
      <div class="col-ms-8" id="error-success-msg">
      <?php if ($admObj::hasWithMessage('message')) {?>
          <?=$admObj::getWithMessage('message');?>
      <?php }?>
      </div>
    </br>
    <?php if (is_array($editDocket) && count($editDocket) > 0) {?>
    	<div class="card">
    		<div class="card-body">
          <div align="center"><p id="example3">&nbsp;&nbsp;<b>Docket No:</b></strong>&nbsp;&nbsp;&nbsp;<span><?=$editDocket['CHDIC_docket_no'];?></span>&nbsp;&nbsp;</p></div></br></br>
    			<form method="POST" id="edit_form">
    				<input type="hidden" name="action" id="action">
            <input type="hidden" id="abbriviation" name="abbriviation" value="<?=$editDocket['doc_Abbrv'];?>">
            <input type="hidden" id="edu_Abbrv" name="edu_Abbrv" value="<?=$editDocket['edu_Abbrv'];?>">
    				          <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Caller Phone No:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7" style="float: left;">
                              <input type="text" class="form-control" id="caller_Ph_No" name="caller_Ph_No" placeholder="Ex: 80XX41XXX0" required maxlength="12" onkeypress="return /[0-9]/i.test(event.key)" value="<?=$editDocket['CHDIC_caller_phNo'];?>" />
                              <span id="err_caller_Ph_No"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Caller Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control allow_name" id="caller_Name" name="caller_Name" placeholder="" onkeypress="return /[a-zA-Z\. ]/i.test(event.key)" value="<?=$editDocket['CHDIC_caller_name'];?>"/>
                              <span id="err_caller_Name"></span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Select Gender:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                                  <select id="gender" name="gender" class="form-control">
                                 <option value="">Select Gender</option>
                                     <?php foreach ($gender as $item) {?>
                                          <option value="<?php echo $item['chd_gender_id']; ?>"<?php if ($editDocket['chd_gender_name'] == $item['chd_gender_name']) {echo 'selected="selected"'; } ?>><?php echo $item['chd_gender_name']; ?></option>
                                        <?php }?>
                                </select>
                              </div>
                            </div>
                          <div id="err_gender" style="text-align: center;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Caller Type:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="callerType" name="callerType" class="form-control" required >
                                <option value="">Select Caller Type</option>
                                <?php
                                 foreach ($callerType as $value) {?>
                                  <option value="<?php echo $value['chdct_id']; ?>"<?php if ($editDocket['chdct_type'] == $value['chdct_type']) {
                                     echo 'selected="selected"';}?>><?php echo $value['chdct_type']; ?></option>
                                <?php }?>
                              </select>
                              <span id="err_callerType"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Caller Email Id:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="caller_email" name="caller_email" placeholder=""  value="<?=$editDocket['CHDIC_email'];?>"/>
                              <span id="err_caller_email"></span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" > Select Group:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" name="educationGroup" id="educationGroup" value="<?=$editDocket['chde_type_name'];?>" class="form-control" readonly />
                              <span id="err_educationGroup"></span>
                            </div>
                          </div>
                        </div>
                         <?php if ($editDocket['chde_type_name'] == 'Shramik Saathi') {?>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label" > Select Directorate:&nbsp;&nbsp;</label>
                                  <div class="col-sm-7">
                                  <select id="directorate" name="directorate" class="form-control">
                                    <option value="">Select Directorate</option>
                                     <?php foreach ($dire_res as $item) {?>
                                          <option value="<?php echo $item['chd_direc_id']; ?>"<?php if ($editDocket['chd_direc_name'] == $item['chd_direc_name']) { echo 'selected="selected"';}?>><?php echo $item['chd_direc_name']; ?></option>
                                        <?php }?>
                                </select>
                                  </div>
                              </div>
                            </div>
                          <?php } else {?>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" > Call Type:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                      <div class="col-sm-7">
                                        <input type="text" name="callType" id="callType" value="<?=$editDocket['chdct_name'];?>" class="form-control" readonly />
                                        <span id="err_callType"></span>
                                      </div>
                                 </div>
                              </div>
                        <?php }?>
                     </div> <!--row-->
                     <?php if (trim($editDocket['chde_type_name']) == 'Higher Education') {?>
                      <div class="row ">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Nature Of Calls:&nbsp;&nbsp;</label>
                              <div class="col-sm-7" style="float: left;">
                              <select id="nature_call" name="nature_call" class="form-control">
                                <option value="">Select Nature Of Calls</option>
                                  <?php
                                      foreach ($nature_call as $item) {?>
                                      <option value="<?php echo $item['chd_nature_call_id']; ?>"<?php if ($editDocket['chd_nature_call_name'] == $item['chd_nature_call_name']) {
                                     echo 'selected="selected"'; }?>><?php echo $item['chd_nature_call_name']; ?></option>
                                    <?php }?>
                              </select>
                                <span id="err_nature_call"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Reg. Phone No:</label>
                            <div class="col-sm-7" style="float: left;">
                              <input type="text" class="form-control" id="register_phoneno" name="register_phoneno" placeholder="Ex: 80XX41XXX0" required maxlength="12" onkeypress="return /[0-9a-zA-Z]/.test(event.key)" value="<?=$editDocket['chd_res_phoneNo'];?>" />
                              <span id="err_register_phoneno"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php }?>
                     <?php if (trim($editDocket['chde_type_name']) == 'Shramik Saathi') {?>
                      <section class="shramik_saathi_section">
                          <div class="row"></br>
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" > Select Job Issue:</label>
                                <div class="col-sm-7">
                                  <select id="job_issue" name="job_issue" class="form-control">
                                    <option value="">Select Job Issue</option>
                                      <?php foreach ($jobissue as $item) {?>
                                          <option value="<?php echo $item['chd_job_Iss_id']; ?>"<?php if ($editDocket['chd_job_Iss_name'] == $item['chd_job_Iss_name']) { echo 'selected="selected"';}?>><?php echo $item['chd_job_Iss_name']; ?></option>
                                        <?php }?>
                                  </select>
                                </div>
                              </div>
                              <div id="err_job_issue" style="text-align: center;"></div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" > Select Scheme:&nbsp;&nbsp;</label>
                                <div class="col-sm-7">
                                  <select id="scheme" name="scheme" class="form-control">
                                    <option value="">Select Scheme</option>
                                      <?php foreach ($scheme as $item) {?>
                                          <option value="<?php echo $item['chd_scheme_id']; ?>"<?php if ($editDocket['chd_scheme_name'] == $item['chd_scheme_name']) {echo 'selected="selected"';} ?>><?php echo $item['chd_scheme_name']; ?></option>
                                        <?php }?>
                                  </select>
                                </div>
                              </div>
                              <div id="err_scheme" style="text-align: center;"></div>
                            </div>
                        </div>
                        <div class="row mt-1">
                        <div class="col-md-6 ">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <div class="col-sm-4"><label class="col-form-label mt-n1">Enter Reg No./ SSIN No./ MWIN:&nbsp;&nbsp;</label></div>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="reg_ssin" name="reg_ssin" placeholder="Enter Reg No./ SSIN No./ MWIN" value="<?=$editDocket['chd_reg_ssin'];?>"  onkeypress="return /[0-9a-zA-Z]/.test(event.key)"/>
                            </div>
                          </div>
                           <div id="err_reg_ssin" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Beneficiary Name:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control allow_name text-capitalize" id="beneficiary_name" name="beneficiary_name" placeholder="Enter Beneficiary Name"  value="<?=$editDocket['chd_bficiary_name'];?>" onkeypress="return /[a-zA-Z ]/.test(event.key)"/>
                            </div>
                          </div>
                          <div id="err_beneficiary_name" style="text-align: center;"></div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6 ">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <div class="col-sm-4"><label class="col-form-label mt-n1">Select Country:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label></div>
                            <div class="col-sm-7">
                                 <select id="country" name="country" class="form-control">
                                    <option value=''>Select Country</option>
                                       <?php foreach ($country as $item) {?>
                                          <option value="<?php echo $item['chd_country_id']; ?>"<?php if ($editDocket['chd_country_name'] == $item['chd_country_name']) { echo 'selected="selected"';}?>><?php echo $item['chd_country_name']; ?></option>
                                        <?php }?>
                                  </select>
                            </div>
                          </div>
                           <div id="err_country" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Entery Country Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control allow_name" id="country_name" name="country_name" placeholder="Enter Other Country Name"  value="<?=$editDocket['chd_country_other_name'];?>" onkeypress="return /[a-zA-Z\. ]/i.test(event.key)" readonly/>
                            </div>
                          </div>
                          <div id="err_country_name" style="text-align: center;"></div>
                        </div>
                    </div>
                    <div class="row mt-1">
                         <div class="col-md-6 ">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <div class="col-sm-4"><label class="col-form-label mt-n1">Select State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label></div>
                            <div class="col-sm-7">
                                 <select id="state" name="state" class="form-control">
                                    <option value="">Select State</option>
                                      <?php foreach ($state as $item) {?>
                                          <option value="<?php echo $item['SL']; ?>" <?php if ($editDocket['State_Name'] == $item['State_Name']) { echo 'selected="selected"'; } ?>><?php echo $item['State_Name']; ?></option>
                                        <?php }?>
                                  </select>
                            </div>
                          </div>
                           <div id="err_state" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Enter State Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control allow_name" id="state_name" name="state_name" placeholder="Enter Other State Name"  value="<?php if (isset($data['state_name'])) {if (strlen($data['state_name']) > 0) {echo $data['state_name'];}} else {if (isset($editDocket['chd_state_other_name'])) {if (strlen($editDocket['chd_state_other_name']) > 0) {echo $editDocket['chd_state_other_name'];}}}?>"  onkeypress="return /[a-zA-Z\. ]/i.test(event.key)" readonly/>
                            </div>
                          </div>
                          <div id="err_state_name" style="text-align: center;"></div>
                        </div>
                    </div>
                    <div class="row mt-1">
                         <div class="col-md-6 ">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <div class="col-sm-4"><label class="col-form-label mt-n1">Select District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label></div>
                            <div class="col-sm-7">
                                 <select id="district" name="district" class="form-control">
                                    <option value="">Select District</option>
                                      <?php foreach ($district as $item) {?>
                                          <option value="<?php echo $item['Sl_No']; ?>" <?php if ($editDocket['District'] == $item['District']) { echo 'selected="selected"';}?>><?php echo $item['District']; ?></option>
                                        <?php }?>
                                  </select>
                            </div>
                          </div>
                           <div id="err_district" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Enter District Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control allow_name" id="district_name" name="district_name" placeholder="Enter Other District Name" value="<?=$editDocket['CHDIC_Other_District'];?>" onkeypress="return /[a-zA-Z\. ]/i.test(event.key)" />
                            </div>
                          </div>
                          <div id="err_district_name" style="text-align: center;"></div>
                        </div>
                    </div>
                    <div class="row mt-1">
                         <div class="col-md-6 ">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <div class="col-sm-4"><label class="col-form-label mt-n1">Select Area:&nbsp;&nbsp;</label></div>
                            <div class="col-sm-7">
                                 <select id="area" name="area" class="form-control">
                                    <option value="">Select Area</option>
                                      <?php foreach ($area as $item) {?>
                                          <option value="<?php echo $item['chd_area_id']; ?>"<?php if ($editDocket['chd_area_name'] == $item['chd_area_name']) {  echo 'selected="selected"'; } ?>><?php echo $item['chd_area_name']; ?></option>
                                        <?php }?>
                                  </select>
                            </div>
                          </div>
                           <div id="err_area" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Entery Area Name:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="area_name" name="area_name" placeholder="Enter Other Area Name"  value="<?=$editDocket['chd_area_other_name'];?>"  onkeypress="return /[a-zA-Z\. ]/i.test(event.key)" />
                            </div>
                          </div>
                          <div id="err_area_name" style="text-align: center;"></div>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >GP/ Ward No.:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="gp_wardno" name="gp_wardno" placeholder="Enter GP/ Ward No."  value="<?=$editDocket['chd_gp_wardno'];?>"   onkeypress="return /[a-zA-Z0-9 ]/.test(event.key)"  />
                            </div>
                          </div>
                          <div id="err_gp_wardno" style="text-align: center;"></div>
                        </div>
                        <!-- <div class="col-md-6 ">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <div class="col-sm-4"><label class="col-form-label mt-n1">Select Query Type:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label></div>
                            <div class="col-sm-7">
                                 <select id="quary_type" name="quary_type" class="form-control">
                                    <option value="">Select Query Type</option>

                                  </select>
                            </div>
                          </div>
                           <div id="err_quary_type" style="text-align: center;"></div>
                        </div>   -->
                    </div>
                    </section>
                      <?php }?>
	                  <?php if ($editDocket['doc_Abbrv'] == 'WBH') {?>

	                  	<div class="row"></br>
	                        <div class="col-md-6">
	                          <div class="form-group row">
	                            <label class="col-sm-4 col-form-label" >Institute Name/Department Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
	                            <div class="col-sm-7">
	                               <input type="text" class="form-control" id="helth_Inst" name="helth_Inst" placeholder="" onkeypress="return /[a-zA-Z\, ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Inst_Name'];?>"/>
	                              <span id="err_helth_Inst"></span>
	                            </div>
	                          </div>
	                        </div>
	                     </div> <!--row-->
                     <?php } else if ($editDocket['doc_Abbrv'] == "EPN") {?>
                      <div class="e_persion">
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Institute Name/Department Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                               <input type="text" class="form-control" id="ePersion_Inst" name="ePersion_Inst" placeholder=""  onkeypress="return /[a-zA-Z\.,-/ ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Inst_Name'];?>"/>
                              <span id="err_ePersion_Inst"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                  </div><!----End E-Persion---->
	                  <?php } else if ($editDocket['doc_Abbrv'] == 'SVM') {?>
	                  	 <div class="row"></br>
                        <!-- <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Reg. Phone No&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="svmcm_RegPh" name="svmcm_RegPh" placeholder="" maxlength="11" value="<?=$editDocket['CHDIC_Reg_PhNo'];?>"/>
                              <span id="err_svmcm_RegPh"></span>
                            </div>
                          </div>
                        </div> -->
                        <div class="col-md-6">
                          <div class="mainLastExamQ">
                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Last Exam Qualified:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="svmcm_lastExam_Qua" name="svmcm_lastExam_Qua" placeholder="" value="<?=$editDocket['CHDIC_SVMCM_Last_Exam_Qua'];?>"/>
                              <span id="err_svmcm_lastExam_Qua"></span>
                            </div>
                          </div>
                        </div>
                        </div>
                     </div> <!--row-->
          <!---------------------SVMCM End 1st Row-------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Last Exam Qualifying Year:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                               <input type="text" class="form-control" id="svmcm_lastExam_year" name="svmcm_lastExam_year" placeholder="" maxlength="4"  value="<?=$editDocket['CHDIC_SVMCM_Exam_Qua_Year'];?>"/>
                              <span id="err_svmcm_lastExam_year"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Present Course of Study:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="svmcm_presentCou_Std" name="svmcm_presentCou_Std" placeholder=""  value="<?=$editDocket['CHDIC_Preset_Course_Study'];?>"/>
                              <span id="err_svmcm_presentCou_Std"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!---------------------SVMCM End 2nd Row-------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Institution Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                               <input type="text" class="form-control" id="svmcm_InstName" name="svmcm_InstName" placeholder="" onkeypress="return /[a-zA-Z\.,-/ ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Inst_Name'];?>"/>
                              <span id="err_svmcm_InstName"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" > Directorate:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="svmcm_directorate" name="svmcm_directorate" class="form-control" required >
                                <option value="">Select Directorate</option>
                                <?php foreach ($directorate as $values) {?>
                                  <option value="<?php echo $values['chdd_id']; ?>"<?php if ($editDocket['chdd_name'] == $values['chdd_name']) {echo 'selected="selected"';}?>><?php echo $values['chdd_name']; ?></option>
                                <?php }?>
                              </select>
                              <span id="err_svmcm_directorate"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                      <!---------------------SVMCM End 3rd Row-------------->
                         <div class="row"></br>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label" >Application Number:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="svmcm_AppNo" name="svmcm_AppNo" placeholder="" value="<?=$editDocket['CHDIC_Application_Id'];?>"/>
                                  <span id="err_svmcm_AppNo"></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="svmcmphd_DateReg_Admi">
                              <div class="form-group row">
                                <label class="col-sm-5 col-form-label" >Date of Registration/Admission:&nbsp;&nbsp;</label>
                                <div class="col-sm-7">
                                  <input type="date" class="form-control" id="svmcm_phd_DateReg_Admi" name="svmcm_phd_DateReg_Admi" placeholder="" value="<?=$editDocket['CHDIC_SVMCM_Reg_Date'];?>"/>
                                  <span id="err_svmcm_phd_DateReg_Admi"></span>
                                </div>
                              </div>
                            </div>
                        </div>
                     </div> <!--row-->
                     <div class="row"></br>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label" >Claim period :&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="svmcm_phd_claim_period" name="svmcm_phd_claim_period" placeholder="" value="<?=$editDocket['CHDIC_SVMCM_claim_period'];?>"/>
                                  <span id="err_svmcm_phd_claim_period"></span>
                                </div>
                              </div>
                            </div>
                     </div> <!--row-->
	                  <?php } else if ($editDocket['doc_Abbrv'] == 'SCC') {?>
	                  	<div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Existing Complain:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SCC_complain" name="SCC_complain" class="form-control" required >
                                <option value="">Select Existing Complain</option>
                                <option value="NC" <?php if ($editDocket['COMPLAIN'] == 'New Complain') {echo 'selected';}?>>New Complain</option>
                                <option value="EC" <?php if ($editDocket['COMPLAIN'] == 'Existing Complain') {echo 'selected';}?>>Existing Complain</option>
                              </select>
                              <span id="err_SCC_complain"></span>
                            </div>
                        </div>
                           <!-----------Hide Complain Docket No:---------->
                         <div class="SCC_DocketNo_class">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Complain Docket No:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Docket_No" name="SCC_Docket_No" placeholder="Complain Docket No" onkeypress="return /[a-zA-Z0-9\.,- ]/i.test(event.key)" value="<?=$editDocket['CHDIC_SCC_Docket_No'];?>"/>
                              <span id="err_SCC_Docket_No"></span>
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >SCC Institution Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="SCC_Inst_Name" name="SCC_Inst_Name" value="<?=$editDocket['CHDIC_SCC_InstName'];?>">
                                </div>
                            </div>
                          <div id="err_SCC_Inst_Name" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!-----------1st row End SCC-------------------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SCC_State" name="SCC_State" class="form-control" required >
                                <option value="">Select State</option>
                                <?php
/*foreach ($state as $value) {
    echo "<option value='" .$value['SL']."' >" . $value['State_Name'] ."</option>";
    }*/
        ?>
                                <?php
foreach ($state as $valSTATE) {?>
                                  <option value="<?php echo $valSTATE['SL']; ?>"<?php if ($editDocket['CHDIC_State'] == $valSTATE['SL']) {
            echo 'selected="selected"';
        }
            ?>><?php echo $valSTATE['State_Name']; ?></option>
                                <?php }
        ?>
                              </select>
                              <span id="err_SCC_State"></span>
                            </div>
                          </div>
                        </div>
                    <!-----------Hide Other District Name:---------->
                        <div class="col-md-6">
                          <div class="SCC_Other_State_class">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Other_state" name="SCC_Other_state" placeholder="" onkeypress="return /[a-zA-Z ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Other_District'];?>"/>
                              <span id="err_SCC_Other_state"></span>
                            </div>
                          </div>
                        </div>
                          <div class="form-group row SCC_Dist_class">
                            <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SCC_Dist" name="SCC_Dist" class="form-control" required >
                                <option value="">Select District</option>
                                <?php
/*foreach ($district as $value) {
        echo "<option value='" .$value['Sl_No']."' >" . $value['District'] ."</option>";
        }*/
        ?>
                                <?php
foreach ($district as $valDist) {?>
                                  <option value="<?php echo $valDist['Sl_No']; ?>"<?php if ($editDocket['CHDIC_District'] == $valDist['Sl_No']) {
            echo 'selected="selected"';
        }
            ?>><?php echo $valDist['District']; ?></option>
                                <?php }
        ?>
                              </select>
                              <span id="err_SCC_Dist"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
            <!-----------2nd row End SCC-------------------------->

                      <div class="row"></br>
                      <?php if ($editDocket['chdct_name'] != 'Student Credit Card Loan') {?>
                        <div class="col-md-6 ">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >SCC Course Applied:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                               <input type="text" class="form-control" id="SCC_Course_Applied" name="SCC_Course_Applied" placeholder="" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$editDocket['chd_ssc_ctcall_name'];?>"/>
                              <span id="err_SCC_Course_Applied"></span>
                            </div>
                          </div>
                        </div>
                        <?php }?>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" > SCC Course Category:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SCC_course_Category" name="SCC_course_Category" class="form-control" >
                                <option value="">Select SCC Course Category</option>
                                <?php
foreach ($ssc_catagory_call as $valDir) {?>
                                  <option value="<?php echo $valDir['chd_ssc_ctcall_id']; ?>"<?php if ($editDocket['chd_ssc_ctcall_name'] == $valDir['chd_ssc_ctcall_name']) {
            echo 'selected="selected"';
        }
            ?>><?php echo $valDir['chd_ssc_ctcall_name']; ?></option>
                                <?php }
        ?>
                              </select>
                              <span id="err_SCC_course_Category"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!-----------3rd row End SCC-------------------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >SCC Directorate Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SCC_Directorate" name="SCC_Directorate" class="form-control" >
                                <option value="">Select SCC Directorate</option>
                                <?php
foreach ($directorateName as $valDir) {?>
                                  <option value="<?php echo $valDir['chdsccdn_id']; ?>"<?php if ($editDocket['chdsccdn_name'] == $valDir['chdsccdn_name']) {
            echo 'selected="selected"';
        }
            ?>><?php echo $valDir['chdsccdn_name']; ?></option>
                                <?php }
        ?>
                              </select>
                              <span id="err_SCC_Directorate"></span>
                            </div>
                          </div>
                      <!-----------Hide Other Directorate Name:---------->
                         <div class="SCC_Other_Directorate_class">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Directorate Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Other_Directorate" name="SCC_Other_Directorate" placeholder="" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$editDocket['CHDIC_SCC_Other_DirectorateName'];?>"/>
                              <span id="err_SCC_Other_Directorate"></span>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Last Qualification:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Last_Qua" name="SCC_Last_Qua" placeholder="" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Highest_Qua'];?>" />
                              <span id="err_SCC_Last_Qua"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
          <!-----------------------------SCC End 4th Row----------------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Passing Year:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                               <input type="text" class="form-control" id="SCC_Passing_Year" name="SCC_Passing_Year" placeholder=""  value="<?=$editDocket['CHDIC_Passing_Year'];?>"/>
                              <span id="err_SCC_Passing_Year"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Present Course of Study:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Preset_Course" name="SCC_Preset_Course" placeholder="" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Preset_Course_Study'];?>"/>
                              <span id="err_SCC_Preset_Course"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                 <!-----------------------------SCC End 5th Row----------------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Reg. No/Application ID:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                               <input type="text" class="form-control" id="SCC_App_Id" name="SCC_App_Id" placeholder="" onkeypress="return /[a-zA-Z0-9 ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Application_Id'];?>"/>
                              <span id="err_SCC_App_Id"></span>
                            </div>
                          </div>
                          <!-----------Hide Other District Name:---------->
                          <div class="SCC_Other_Call_Category_Class">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Call Category:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Other_CallCategory" name="SCC_Other_CallCategory" placeholder="" onkeypress="return /[a-zA-Z0-9\ ]/i.test(event.key)" value="<?=$editDocket['CHDIC_SCC_Other_Call_Category'];?>"/>
                              <span id="err_SCC_Other_CallCategory"></span>
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Category of Calls:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select name="SCC_Call_Category" id="SCC_Call_Category" class="form-control" >
                                <option value="">Select Call Category</option>
                                <option value="General" <?php if ($editDocket['CHDIC_SCC_Call_Category'] == 'General') {echo 'selected';}?>>General</option>

                                <option value="Technical" <?php if ($editDocket['CHDIC_SCC_Call_Category'] == 'Technical') {echo 'selected';}?>>Technical</option>

                                <option value="Bank Related" <?php if ($editDocket['CHDIC_SCC_Call_Category'] == 'Bank Related') {echo 'selected';}?>>Bank Related</option>

                                <option value="Health Deptt." <?php if ($editDocket['CHDIC_SCC_Call_Category'] == 'Health Deptt.') {echo 'selected';}?>>Health Deptt.</option>

                                <option value="Outside State" <?php if ($editDocket['CHDIC_SCC_Call_Category'] == 'Outside State') {echo 'selected';}?>>Outside State</option>

                                <option value="Others" <?php if ($editDocket['CHDIC_SCC_Call_Category'] == 'Others') {echo 'selected';}?>>Others</option>
                              </select>
                              <span id="err_SCC_Call_Category"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
              <!-----------------------------SCC End 6th Row----------------------->
                      <div class="row "></br>
                      <?php if ($editDocket['chdct_name'] != 'Student Credit Card Loan') {?>
                        <div class="col-md-6 ">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Line Transfer:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select name="SCC_line_Transfer" id="SCC_line_Transfer" class="form-control" ><option value="">Select Line Transfer</option>
                                <option value="No" <?php if ($editDocket['CHDIC_SCC_Line_Transfer'] == 'No') {echo 'selected';}?>>No</option>
                                <option value="Yes" <?php if ($editDocket['CHDIC_SCC_Line_Transfer'] == 'Yes') {echo 'selected';}?>>Yes</option></select>
                              <span id="err_SCC_line_Transfer"></span>
                            </div>
                          </div>
                        </div>
                        <?php }?>
                        <div class="col-md-6 ">
                        <?php if ($editDocket['chdct_name'] != 'Student Credit Card Loan') {?>
                          <div class="form-group row ">
                            <label class="col-sm-4 col-form-label" >Assigned Deptt:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select name="SCC_Assig_Dept" id="SCC_Assig_Dept" class="form-control" >
                                <option value="">Select Assigned Deptt</option>
                                <?php
                                      foreach ($SCCAssigDept as $valAD) {?>
                                  <option value="<?php echo $valAD['CHDSCC_AD_Sl']; ?>"<?php if ($editDocket['CHDSCC_AD_Name'] == $valAD['CHDSCC_AD_Name']) {
                                              echo 'selected="selected"';
                                          } ?>><?php echo $valAD['CHDSCC_AD_Name']; ?></option>    <?php }  ?>
                                </select>
                              <span id="err_SCC_Assig_Dept"></span>
                            </div>
                          </div>
                        <?php }?>
                          <!-----------Hide Other Assigned Deptt:---------->
                          <div class="SCC_Other_Assig_Deptt_Class">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Assigned Deptt:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Other_Assid_Deptt" name="SCC_Other_Assid_Deptt" onkeypress="return /[a-zA-Z0-9\ ]/i.test(event.key)" value="<?=$editDocket['CHDIC_SCC_Other_Assign_Dept'];?>">
                              <span id="err_SCC_Other_Assid_Deptt"></span>
                            </div>
                          </div>
                        </div>
                        </div>
                     </div> <!--row-->
                  <!-----------------------------SCC End 7th Row----------------------->
                  <?php if ($editDocket['chdct_name'] != 'Student Credit Card Loan') {?>
                      <div class="row "></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Assigned To:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Assig_To" name="SCC_Assig_To" placeholder="" onkeypress="return /[a-zA-Z0-9\ ]/i.test(event.key)" value="<?=$editDocket['CHDIC_SCC_Assigned_To'];?>"/>
                              <span id="err_SCC_Assig_To"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Duration Pending:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Duration_Pending" name="SCC_Duration_Pending" placeholder="" onkeypress="return /[a-zA-Z0-9\ ]/i.test(event.key)" value="<?=$editDocket['CHDIC_SCC_Duration_Pending'];?>"/>
                              <span id="err_SCC_Duration_Pending"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <?php }?>
	                  <?php } else if ($editDocket['doc_Abbrv'] == 'BNS') {?>
                      <!-------------------------End WBSIS------------------------>
                      <div class="BS">
                        <div class="row"></br>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" >Class:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                              <div class="col-sm-7">
                                <select id="BS_Class" name="BS_Class" class="form-control" required >
                                  <option value="">Choose Class</option>
                                  <option value="I" <?php if ($editDocket['CHDIC_BS_Class'] == 'I') {echo 'selected';}?>>I</option>
                                  <option value="II" <?php if ($editDocket['CHDIC_BS_Class'] == 'II') {echo 'selected';}?>>II</option>
                                  <option value="III" <?php if ($editDocket['CHDIC_BS_Class'] == 'III') {echo 'selected';}?>>III</option>
                                  <option value="IV" <?php if ($editDocket['CHDIC_BS_Class'] == 'IV') {echo 'selected';}?>>IV</option>
                                  <option value="V" <?php if ($editDocket['CHDIC_BS_Class'] == 'V') {echo 'selected';}?>>V</option>
                                  <option value="VI" <?php if ($editDocket['CHDIC_BS_Class'] == 'VI') {echo 'selected';}?>>VI</option>
                                  <option value="VII" <?php if ($editDocket['CHDIC_BS_Class'] == 'VII') {echo 'selected';}?>>VII</option>
                                  <option value="VIII" <?php if ($editDocket['CHDIC_BS_Class'] == 'VIII') {echo 'selected';}?>>VIII</option>
                                  <option value="IX" <?php if ($editDocket['CHDIC_BS_Class'] == 'IX') {echo 'selected';}?>>IX</option>
                                  <option value="X" <?php if ($editDocket['CHDIC_BS_Class'] == 'X') {echo 'selected';}?>>X</option>
                                  <option value="XI" <?php if ($editDocket['CHDIC_BS_Class'] == 'XI') {echo 'selected';}?>>XI</option>
                                  <option value="XII" <?php if ($editDocket['CHDIC_BS_Class'] == 'XII') {echo 'selected';}?>>XII</option>
                                </select>
                                <span id="err_BS_Class"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                             <label class="col-sm-4 col-form-label" >School Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                              <div class="col-sm-7">
                                <input type="text" class="form-control" id="BS_SchoolName" name="BS_SchoolName" placeholder="" onkeypress="return /[a-zA-Z0-9 -]/i.test(event.key)" value="<?=$editDocket['CHDIC_BS_School_Name']?>" />
                                <span id="err_BS_SchoolName"></span>
                              </div>
                            </div>
                          </div>
                        </div> <!--row-->
                      </div><!--End Banglar Siksha-->
                <?php } else if ($editDocket['doc_Abbrv'] == 'SNT') {?>
                   <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Date Of Birth:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="date" class="form-control" id="SNTCSSC_DOB" name="SNTCSSC_DOB" value="<?=$editDocket['CHDIC_DOB'];?>" />
                              <span id="err_SNTCSSC_DOB"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Category:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SNTCSSC_Cast" name="SNTCSSC_Cast" class="form-control">
                                  <option value="" class=""> Choose...</option>
                                  <option value="General" <?php if ($editDocket['CHDIC_Cast'] == 'General') {echo 'selected';}?>>General</option>
                                  <option value="ST" <?php if ($editDocket['CHDIC_Cast'] == 'ST') {echo 'selected';}?>>ST</option>
                                  <option value="SC" <?php if ($editDocket['CHDIC_Cast'] == 'SC') {echo 'selected';}?>>SC</option>
                                  <option value="OBC-A" <?php if ($editDocket['CHDIC_Cast'] == 'OBC-A') {echo 'selected';}?>>OBC-A</option>
                                  <option value="OBC-B" <?php if ($editDocket['CHDIC_Cast'] == 'OBC-B') {echo 'selected';}?>>OBC-B</option>
                               </select>
                              <span id="err_SNTCSSC_Cast"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
              <!------------------SNTCSSC 1st Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SNTCSSC_State" name="SNTCSSC_State" class="form-control" required >
                                <option value="">Select State</option>
                                  <?php foreach ($state as $valSTATE2) {?>
                                        <option value="<?php echo $valSTATE2['SL']; ?>"<?php if ($editDocket['CHDIC_State'] == $valSTATE2['SL']) { echo 'selected="selected"';      
                                          }  ?>><?php echo $valSTATE2['State_Name']; ?></option>
                                         <?php } ?>
                              </select>
                              <span id="err_SNTCSSC_State"></span>
                            </div>
                          </div>
                        </div>
                    <!-----------Hide Other District Name:---------->
                        <div class="col-md-6">
                          <div class="SNTCSSC_Other_State_class">
                          <div class="form-group row ">
                           <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SNTCSSC_Other_state" name="SNTCSSC_Other_state" placeholder="" onkeypress="return /[a-zA-Z ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Other_District']?>" />
                              <span id="err_SNTCSSC_Other_state"></span>
                            </div>
                          </div>
                          </div>
                          <div class="form-group row SNTCSSC_Dist_class">
                            <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SNTCSSC_Dist" name="SNTCSSC_Dist" class="form-control" required >
                                <option value="">Select District</option>
                                 <?php
                                      foreach ($district as $valDist) {?>
                                      <option value="<?php echo $valDist['Sl_No']; ?>"<?php if ($editDocket['CHDIC_District'] == $valDist['Sl_No']) {
                                            echo 'selected="selected"';
                                        }
                                            ?>><?php echo $valDist['District']; ?></option>
                                                                <?php }
                                        ?>
                                 </select>
                              <span id="err_SNTCSSC_Dist"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------SNTCSSC 2nd Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Address:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SNTCSSC_Address" name="SNTCSSC_Address" placeholder="Enter Address"  value="<?=$editDocket['CHDIC_SNTCSSC_Address']?>" />
                              <span id="err_SNTCSSC_Address"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >PIN:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SNTCSSC_PIN" name="SNTCSSC_PIN" placeholder="Enter Pin NO."  value="<?=$editDocket['CHDIC_SNTCSSC_PIN']?>" />
                              <span id="err_SNTCSSC_PIN"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------SNTCSSC 3rd Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Highest Qualification:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SNTCSSC_HQ" name="SNTCSSC_HQ" placeholder="" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Highest_Qua']?>" />
                              <span id="err_SNTCSSC_HQ"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Previously Appeared in UPSCCSE:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="SNTCSSC_Previously_UPSCCSE" name="SNTCSSC_Previously_UPSCCSE" class="form-control">
                                  <option value="" class="hidden"> Choose...</option>
                                  <option value="Yes" <?php if ($editDocket['CHDIC_SNTCSSC_Appear_UPSCCSE'] == 'Yes') {echo 'selected';}?>>Yes</option>
                                  <option value="No" <?php if ($editDocket['CHDIC_SNTCSSC_Appear_UPSCCSE'] == 'No') {echo 'selected';}?>>No</option>
                               </select>
                              <span id="err_SNTCSSC_Previously_UPSCCSE"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------SNTCSSC 4th Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" > NO. of Previous Appearances:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SNTCSSC_No_PA" name="SNTCSSC_No_PA" placeholder="" onkeypress="return /[0-9]/i.test(event.key)" value="<?=$editDocket['CHDIC_SNTCSSC_No_Previous_Appearance']?>" />
                              <span id="err_SNTCSSC_No_PA"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                <?php } else if ($editDocket['doc_Abbrv'] == 'ADM') {?>
                  <!-- code...-->
                  <!---------------------Start UG/PG Admission------------------>
                  <div class="UG_PG">
                    <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Last Exam Qualified:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="ugpg_LastExam_Qua" name="ugpg_LastExam_Qua" class="form-control" required >
                                <option value="">Last Exam Qualified</option>
                                <?php
                                    foreach ($lastExamQualified as $valLastExm) {?>
                                   <option value="<?php echo $valLastExm['chdleq_id']; ?>"<?php if ($editDocket['CHDIC_UGPG_Last_Exam_Qua'] == $valLastExm['chdleq_id']) {
                                      echo 'selected="selected"';}
                                             ?>><?php echo $valLastExm['chdleq_name']; ?></option>
                                 <?php } ?>
                              </select>
                              <span id="err_ugpg_LastExam_Qua"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Year of Passing:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                              <select id="ugpg_passing_year" name="ugpg_passing_year" class="form-control">
                                    <option value="">Select Passing Year</option>
                                    <?php
                                    for ($i = 2018; $i <= 2024; $i++) {
                                        $selected = '';
                                        if (isset($editDocket['CHDIC_Passing_Year']) && $editDocket['CHDIC_Passing_Year'] == $i) {
                                            $selected = 'selected="selected"';
                                        }
                                        echo "<option value='" . $i . "' " . $selected . ">" . $i . "</option>";
                                    }
                                    ?>
                                       <option value="Other" <?php if (isset($editDocket['CHDIC_Passing_Year']) && $editDocket['CHDIC_Passing_Year'] == 'Other') echo 'selected="selected"'; ?>>Other</option>
                                </select>
                              <span id="err_ugpg_admi_type"></span>
                              <!-- </div> -->
                              <!-- <div class="ugpg_OtheradminType_class">
                                 <input type="text" class="form-control" id="ugpg_OtherAdmi_Type" name="ugpg_OtherAdmi_Type" placeholder="Admission Type" value="<?=$editDocket['CHDIC_UGPG_Other_Admi_Type']?>"> 
                              <span id="err_ugpg_passing_year"></span>
                              </div> -->
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Admission Type:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <div class="ugpg_adminType_class">
                              <select id="ugpg_admi_type" name="ugpg_admi_type" class="form-control" >
                              <option value="">Select Admission Type</option>
                                <option value="<?php echo $add_type[0]['chdat_id']; ?>"
                                     <?php if ($editDoc['CHDIC_UGPG_Admission_Type'] == $add_type[0]['chdat_id']) {
                                      echo 'selected="selected"';}?>>
                                      <?php echo $add_type[0]['chdat_name']; ?>
                                  </option>
                              </select>
                              <span id="err_ugpg_admi_type"></span>
                              </div>
                              <div class="ugpg_OtheradminType_class">
                               <input type="text" class="form-control" id="ugpg_OtherAdmi_Type" name="ugpg_OtherAdmi_Type" placeholder="Admission Type" value="<?=$editDocket['CHDIC_UGPG_Other_Admi_Type']?>">
                              <span id="err_ugpg_OtherAdmi_Type"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Institute Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <div class="ugpg_adminType_class">
                              <input type="text" class="form-control" id="ugpg_inst_Name" name="ugpg_inst_Name" placeholder="" autocomplete="" value="<?=$editDocket['CHDIC_Inst_Name'];?>" />
                               <span id="err_ugpg_inst_Name"></span>
                              </div>
                              <div class="ugpg_OtheradminType_class">
                               <input type="text" class="form-control" id="ugpg_OtherAdmi_Type" name="ugpg_OtherAdmi_Type" placeholder="Admission Type" value="<?=$editDocket['CHDIC_UGPG_Other_Admi_Type']?>">
                              <span id="err_ugpg_OtherAdmi_Type"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Course:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                              <select id="ugpg_course_name" name="ugpg_course_name" class="form-control">
                                      <option value="">Select Course Name</option>
                                      <?php
                                      foreach ($ugpg_course as $key => $value) {
                                          $selected = '';
                                          if (isset($editDocket['CHDIC_UGPG_Course_Name']) && $editDocket['CHDIC_UGPG_Course_Name'] == $key+1) {
                                              $selected = 'selected="selected"';
                                          }
                                          echo "<option value='" . $value['chdcn_id'] . "' " . $selected . ">" . $value['chdcn_name'] . "</option>";
                                      } ?>
                                  </select>
                              <span id="err_ugpg_course_name"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Other Course Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                               <input type="text" class="form-control allow_name" id="ugpg_other_cname" name="ugpg_other_cname" placeholder="Enter course name" value="<?= $editDocket['CHDIC_UGPG_Other_Course'] ?>" />
                               <span id="err_ugpg_other_cname"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Course Type:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                              <select id="ugpg_course_type" name="ugpg_course_type" class="form-control">
                                   <?php
                                    foreach ($ugpg_course_type as $item) {?>
                                      <option value="<?php echo $item['chdct_id']; ?>" <?php if ($item['chdct_id'] == $editDocket['CHDIC_UGPG_Course_type']) {
                                      echo 'selected="selected"';} ?>><?php echo $item['chdct_name']; ?></option>
                                    <?php }?>
                              </select>
                              <span id="err_ugpg_course_type"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Other Course Type:&nbsp;&nbsp;<span style="font-size: 18px;     color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                              <input type="text" class="form-control allow_name" id="ugpg_other_ctype" name="ugpg_other_ctype" placeholder="Enter other course type" value="<?= $editDocket['CHDIC_UGPG_Other_Course_type']?>" />
                               <span id="err_ugpg_other_ctype"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Subject:&nbsp;&nbsp;<span style="font-size: 18px;color: red"></span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                                  <input type="text" class="form-control" id="ugpg_ba_subject" name="ugpg_ba_subject" value="<?= $editDocket['CHDIC_UGPG_BA_subject']?>" placeholder="Enter subject name" />
                              <span id="err_ugpg_subject"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Application ID:&nbsp;&nbsp;<span style="font-size: 18px;     color: red"></span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                                 <input type="text" class="form-control allow_name" id="ugpg_app_id" name="ugpg_app_id" placeholder="Enter name"  value="<?= $editDocket['CHDIC_UGPG_App_ID']?>"/> 
                               <span id="err_ugpg_app_id"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                                <select id="ugpg_state" name="ugpg_state" class="form-control">
                                  <option value="">Select State</option>
                                  <?php foreach ($state as $key=> $item) {
                                      $selected = '';
                                      if (isset($editDocket['CHDIC_State']) && $editDocket['CHDIC_State'] == $key+1) {
                                          $selected = 'selected="selected"';
                                      }

                                      echo "<option value='" . $item['SL'] . "'" . $selected . " >" . $item['State_Name'] . "</option>";
                                      
                                      }?>
                                </select>
                                <span id="err_ugpg_state"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Other State Name:&nbsp;&nbsp;<span style="font-size: 18px;     color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                              <input type="text" class="form-control allow_name" id="ugpg_state_name" name="ugpg_state_name" placeholder="Enter Other State Name"  value="<?= $editDocket['chd_state_other_name']?>" />
                               <span id="err_ugpg_state_name"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <div class="ugpg_adminType_class"> -->
                                <select id="ugpg_district" name="ugpg_district" class="form-control">
                                  <option value="">Select District</option>
                                  <?php foreach ($district as $key=> $item) {

                                     $selected = '';
                                     if (isset($editDocket['CHDIC_District']) && $editDocket['CHDIC_District'] == $key+1) {
                                         $selected = 'selected="selected"';
                                     }
                                  
                                  echo "<option value=' " . $item['Sl_No'] . "' " . $selected . " >" . $item['District'] . "</option>";}?>
                                </select>
                              <span id="err_ugpg_district"></span>
                              <!-- </div> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" >Other District Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                               <input type="text" class="form-control allow_name" id="ugpg_district_name" name="ugpg_district_name" placeholder="Enter Other District Name"  value="<?= $editDocket['chd_district_other_name']?>" />

                               <span id="err_ugpg_district_name"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                 </div><!----UG/PG End---->
               <?php } else if ($editDocket['doc_Abbrv'] == 'UTS') {?>
                <div class="Utsashree">
                   <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Job Position:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <select id="UTS_JobPosition" name="UTS_JobPosition" class="form-control" required >
                                <option value="">Choose..</option>
                                <option value="Primary" <?php if ($editDocket['CHDIC_UTS_JobPosition'] == "Primary") {echo 'selected';}?>>Primary</option>
                                <option value="Secondary" <?php if ($editDocket['CHDIC_UTS_JobPosition'] == "Secondary") {echo 'selected';}?>>Secondary</option>
                              </select>
                              <span id="err_UTS_JobPosition"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >OSMS No:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="UTS_OSMSNo" name="UTS_OSMSNo" placeholder="" onkeypress="return /[a-zA-Z0-9 /-]/i.test(event.key)" value="<?=$editDocket['CHDIC_UTS_OSMS_No'];?>"/>
                              <span id="err_UTS_OSMSNo"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------End UTS 1st Row-------------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Staff Category:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <select id="UTS_StaffCategory" name="UTS_StaffCategory" class="form-control" required >
                                <option value="">Choose..</option>
                                <option value="Teaching" <?php if ($editDocket['CHDIC_UTS_StaffCategory'] == "Teaching") {echo 'selected';}?>>Teaching</option>
                                <option value="Non-Teaching" <?php if ($editDocket['CHDIC_UTS_StaffCategory'] == "Non-Teaching") {echo 'selected';}?>>Non-Teaching</option>
                              </select>
                              <span id="err_UTS_StaffCategory"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Transfer Menu:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <select id="UTS_Trn_Manu" name="UTS_Trn_Manu" class="form-control" required >
                                <option value="">Choose..</option>
                                <option value="General" <?php if ($editDocket['CHDIC_UTS_TransManu'] == "General") {echo 'selected';}?>>General</option>
                                <option value="Mutual" <?php if ($editDocket['CHDIC_UTS_TransManu'] == "Mutual") {echo 'selected';}?>>Mutual</option>
                              </select>
                              <span id="err_UTS_Trn_Manu"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                      <!------------------End UTS 3rd Row-------------------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Present District:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <select id="UTS_Dist" name="UTS_Dist" class="form-control" required >
                                <option value="">Select District</option>
                                <?php foreach ($district as $valDist2) {?>
                                  <option value="<?php echo $valDist['Sl_No']; ?>"<?php if ($editDocket['CHDIC_UTS_Dist'] == $valDist2['Sl_No']) { echo 'selected="selected"'; }?>><?php echo $valDist2['District']; ?></option>
                                <?php }?>
                              </select>
                              <span id="err_UTS_Dist"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label"  id="UTS_lavel">Circle/Subdivision:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="UTS_Circle_Sub" name="UTS_Circle_Sub" placeholder="" onkeypress="return /[a-zA-Z0-9 -]/i.test(event.key)" value="<?=$editDocket['CHDIC_UTS_Circle'];?>"/>
                              <span id="err_UTS_Circle_Sub"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------End UTS 4th Row-------------------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Institution/School Name:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="UTS_InstSchoolName" name="UTS_InstSchoolName" placeholder="" onkeypress="return /[a-zA-Z0-9 -]/i.test(event.key)" value="<?=$editDocket['CHDIC_UTS_SchoolName']?>"/>
                              <span id="err_UTS_InstSchoolName"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label"  id="UTS_lavel">Type of Transfer:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <select id="UTS_Typ_Transfer" name="UTS_Typ_Transfer" class="form-control" required >
                                <option value="">Choose..</option>
                                <option value="Inter District" <?php if ($editDocket['CHDIC_UTS_TransferType'] == 'Inter District') {echo 'selected';}?> >Inter District</option>
                                <option value="Intra District" <?php if ($editDocket['CHDIC_UTS_TransferType'] == 'Intra District') {echo 'selected';}?> >Intra District</option>
                              </select>
                              <span id="err_UTS_Typ_Transfer"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------End UTS 4th Row-------------------------->
                     <div class="row"></br>
                              <div class="col-md-6 mt-1">
                                <div class="form-group row">
                                   <label class="col-sm-4 col-form-label" >Preference District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                  <div class="col-sm-7">
                                    <select id="UTS_predist" name="UTS_predist" class="form-control" required >
                                      <option value="">Preference District</option>
                                      <option value="Yes" <?php if ($editDocket['CHDIC_UTS_Dist_status'] == 'Yes') {echo 'selected';}?>>Yes</option>
                                      <option value="No" <?php if ($editDocket['CHDIC_UTS_Dist_status'] == 'No') {echo 'selected';}?>>No</option>
                                    </select>
                                    <span id="err_UTS_predist"></span>
                                  </div>
                                </div>
                            </div>
                     </div> <!--row-->
                 <?php if ($editDocket['CHDIC_UTS_Dist_status'] == 'Yes') {?>
                    <div id="UTS_AddNewRow1">
                        <input type="hidden" id="UTS_box_count" name="UTS_box_count" value="<?=$noRow?>">
                        <input type="hidden" id="UTS_box_string" name="UTS_box_string" value="<?=implode("/", $b)?>">
                        <?php for ($bb = 0, $cntrr = 1; $bb < count($resultSet); $bb++, $cntrr++) {?>
                        <div id="UTS_AddRow<?=$cntrr?>">
                            <div class="row"></br>
                                <div class="col-md-1">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <?php if ($cntrr > 1) {?>
                                            <div class="firstbutton"><button type="button" name="utsRemoveBTN<?=$cntrr?>" id="utsRemoveBTN<?=$cntrr?>" identifier="uts_RemoveIcon" value="" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                            <?php } else {?>
                                            <div class="firstbutton"><button type="button" name="UTS_addRowbtn" id="UTS_addRowbtn" value="" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Preference District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                        <div class="col-sm-6">
                                            <select id="UTS_Pre_Dist<?=$cntrr?>" name="UTS_Pre_Dist[]" class="form-control" required>
                                                <option value="">Select District</option>
                                                <?php foreach ($district as $valDist3) {?>
                                                <option value="<?php echo $valDist3["Sl_No"]; ?>" <?php if ($resultSet[$bb]["CHDUTS_Dist"] == $valDist3["Sl_No"]) {echo 'selected="selected"';}?>><?php echo $valDist3["District"]; ?></option>
                                                <?php }?>
                                            </select>
                                            <span id="err_UTS_Pre_Dist<?=$cntrr?>"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Preference &nbsp;<span id="" class="addBox_level">Circle/Subdivision:</span>&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="UTS_Preference<?=$cntrr?>" name="UTS_Preference[]" placeholder="" iden="subject" value="<?=$resultSet[$bb]["CHDUTS_Circle"]?>" />
                                            <span id="err_UTS_Preference<?=$cntrr?>"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Preference Institution:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="UTS_Preference_Inst<?=$cntrr?>" name="UTS_Preference_Inst[]" placeholder="" iden="subject" value="<?=$resultSet[$bb]["CHDUTS_Inst"]?>" />
                                            <span id="err_UTS_Preference_Inst<?=$cntrr?>"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div id="UTS_errAll" align="center"> </div>
                    <div id="UTS_AddNewRow"></div>
                    <!--End Utsashree-->
                 <?php } else {?>
                  <div id="UTS_AddNewRow1">
                    <input type="hidden" id="UTS_box_count" name="UTS_box_count" value="1">
                    <input type="hidden" id="UTS_box_string" name="UTS_box_string" value="1">
                    <div id="UTS_AddRow" >
                      <div class="row"></br>
                            <div class="col-md-1">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <div class="col-sm-4">
                                  <div class="firstbutton"><button type="button" id="UTS_addRowbtn" value="" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <div class="col-md-3">
                            <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                              <label class="col-sm-6 col-form-label" >Preference District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                              <div class="col-sm-6">
                                  <select id="UTS_Pre_Dist1" name="UTS_Pre_Dist[]" class="form-control" required >
                                <option value="">Select District</option>
                                <?php
                                    foreach ($district as $value) {
                                                echo "<option value='" . $value['Sl_No'] . "' >" . $value['District'] . "</option>";
                                            }
                                                ?>
                              </select>
                                </div>
                              </div>
                              <div id="err_UTS_Pre_Dist1" style="text-align: center;"></div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-6 col-form-label" >Preference &nbsp;<span id="" class="addBox_level">Circle/Subdivision:</span>&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="UTS_Preference1" name="UTS_Preference[]" placeholder="" iden="subject"/>
                                  </div>
                                </div>
                                <div id="err_UTS_Preference1" style="text-align: center;"></div>
                              </div>
                              <div class="col-md-3">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-6 col-form-label" >Preference Institution:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" id="UTS_Preference_Inst1" name="UTS_Preference_Inst[]" placeholder="" iden="subject"/>
                                  </div>
                                </div>
                                <div id="err_UTS_Preference_Inst1" style="text-align: center;"></div>
                              </div>
                      </div><!----Row End-->
                    </div>
                  </div>
                  <div id="UTS_errAll" align="center"> </div>
                    <div id="UTS_AddNewRow"></div>
                  <?php }?>
                <?php } else if ($editDocket['doc_Abbrv'] == 'SIS') {?>
                  <!-------------------start WBSIS----------------------------->
                 <div class="WBSIS">
                   <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Date Of Birth:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="date" class="form-control" id="WBSIS_DOB" name="WBSIS_DOB" value="<?=$editDocket['CHDIC_DOB'];?>" />
                              <span id="err_WBSIS_DOB"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="WBSIS_State" name="WBSIS_State" class="form-control" required >
                                <option value="">Select State</option>
                                <?php foreach ($state as $valState3) {?>
                                  <option value="<?php echo $valState3['SL']; ?>"<?php if ($editDocket['CHDIC_State'] == $valState3['SL']) { echo 'selected="selected"';} ?>><?php echo $valState3['State_Name']; ?></option>
                                <?php } ?>
                              </select>
                              <span id="err_WBSIS_State"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------WBSIS 1st Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row WBSIS_Dist_class">
                            <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="WBSIS_Dist" name="WBSIS_Dist" class="form-control" required >
                                <option value="">Select District</option>
                                 <?php foreach ($district as $valDist4) {?>
                                 <option value="<?php echo $valDist4['Sl_No']; ?>" <?php if ($editDocket['CHDIC_District'] == $valDist4['Sl_No']) { echo 'selected="selected"';} ?>><?php echo $valDist4['District']; ?></option>
                                <?php }?>
                              </select>
                              <span id="err_WBSIS_Dist"></span>
                            </div>
                          </div>
                          <div class="WBSIS_Other_State_class">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_Other_state" name="WBSIS_Other_dist" placeholder="" onkeypress="return /[a-zA-Z ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Other_District']?>"/>
                              <span id="err_WBSIS_Other_state"></span>
                            </div>
                          </div>
                          </div>
                        </div>
                    <!-----------Hide Other District Name:---------->
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Area Location:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="WBSIS_AreaLocation" name="WBSIS_AreaLocation" class="form-control" required >
                                <option value="">Select Area Location</option>
                                <option value="Rural" <?php if ($editDocket['CHDIC_WBSIS_Location'] == 'Rural') {echo 'selected';}?>>Rural</option>
                                <option value="Urban" <?php if ($editDocket['CHDIC_WBSIS_Location'] == 'Urban') {echo 'selected';}?>>Urban</option>
                              </select>
                              <span id="err_WBSIS_AreaLocation"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------WBSIS 2nd Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Area:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="WBSIS_Area_Type" name="WBSIS_Area_Type" class="form-control" required >
                                <option value="">Select Area</option>
                                <option value="Corporation" <?php if ($editDocket['CHDIC_WBSIS_Area'] == 'Corporation') {echo 'selected';}?>>Corporation</option>
                                <option value="Municipality" <?php if ($editDocket['CHDIC_WBSIS_Area'] == 'Municipality') {echo 'selected';}?>>Municipality</option>
                                <option value="Panchayat" <?php if ($editDocket['CHDIC_WBSIS_Area'] == 'Panchayat') {echo 'selected';}?>>Panchayat</option>
                              </select>
                              <span id="err_WBSIS_Area_Type"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Crpn./Mncpt./Pancht. Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_AreaName" name="WBSIS_AreaName" placeholder="" onkeypress="return /[a-zA-Z0-9, ]/i.test(event.key)"  value="<?=$editDocket['CHDIC_WBSIS_Pancht_Name']?>" />
                              <span id="err_WBSIS_AreaName"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------WBSIS 3rd Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" > Ward No./Block Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_WardBlock" name="WBSIS_WardBlock" placeholder=""  value="<?=$editDocket['CHDIC_WBSIS_Ward_Name']?>"/>
                              <span id="err_WBSIS_WardBlock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >PIN Code:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_PIN" name="WBSIS_PIN" placeholder="" onkeypress="return /[0-9]/i.test(event.key)" maxlength="6" value="<?=$editDocket['CHDIC_WBSIS_PIN']?>"/>
                              <span id="err_WBSIS_PIN"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------WBSIS 4th Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Previous Work Exp:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <select id="WBSIS_WorkExp" name="WBSIS_WorkExp" class="form-control" required >
                                <option value="">Select Work Experience</option>
                                <option value="Yes" <?php if ($editDocket['CHDIC_WBSIS_Work_Exp'] == 'Yes') {echo 'selected';}?>>Yes</option>
                                <option value="No" <?php if ($editDocket['CHDIC_WBSIS_Work_Exp'] == 'No') {echo 'selected';}?>>No</option>
                              </select>
                              <span id="err_WBSIS_WorkExp"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------WBSIS 5th Row End-------------------->
                     <!--------WBSIS Company Name/Duration of Exp. add row----------->
                     <?php if ($editDocket['CHDIC_WBSIS_Work_Exp'] == "Yes") {?>
                        <div class="WBSIS_Company_addBox">
                            <input type="hidden" id="WBSIS_box_count" name="WBSIS_box_count" value="<?=$noRows?>">
                            <input type="hidden" id="WBSIS_box_string" name="WBSIS_box_string" value="<?=implode(",", $countString)?>">
                            <?php for ($k = 0, $m = 1; $k < count($resultSets); $k++, $m++) {?>
                            <div id="WBSIS_CompanyName<?=$m?>">
                                <div class="row">
                                    </br>
                                    <div class="col-md-1">
                                        <div class="form-group row">
                                            <div class="col-sm-5">
                                                <?php if ($m > 1) {?>
                                                <div class="firstbutton"><button type="button" name="WBSIS_Company_removeRow<?=$m?>" id="WBSIS_Company_removeRow<?=$m?>" identifier="Com-RemoveIcon" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                                <?php } else {?>
                                                <div class="firstbutton"><button type="button" name="WBSIS_Company_addRow" id="WBSIS_Company_addRow" value="" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Company Name:&nbsp;&nbsp;</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="WBSIS_companyName<?=$m?>" name="WBSIS_companyNames[]" placeholder="" iden="Company-Name" value="<?=$resultSets[$k]["CHDWE_CompanyName"]?>" />
                                                <span id="err_WBSIS_companyName<?=$m?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Duration of Exp:&nbsp;&nbsp;</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="WBSIS_Dua_Exp<?=$m?>" name="WBSIS_Dua_Exp[]" placeholder="" iden="Wrk-Experience" value="<?=$resultSets[$k]["CHDWE_Dua_Exp"]?>" />
                                                <span id="err_WBSIS_Dua_Exp<?=$m?>"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!----Row End-->
                            </div>
                            <?php }?>
                        </div>
                        <div id="WBSIS_Company_newRow"></div>
                        <div align="center" id="WBSIS_err_all"></div>
                      <?php } else {?>
                        <div class="WBSIS_Company_addBox">
                          <input type="hidden" id="WBSIS_box_count" name="WBSIS_box_count" value="1">
                          <input type="hidden" id="WBSIS_box_string" name="WBSIS_box_string" value="1">
                           <div id="WBSIS_CompanyName1">
                             <div class="row"></br>
                               <div class="col-md-1">
                                 <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                   <div class="col-sm-4">
                                     <div class="firstbutton"><button type="button" name="WBSIS_Company_addRow" id="WBSIS_Company_addRow" value="" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                     </div>
                                    </div>
                                  </div>
                               </div>
                               <div class="col-md-5">
                                 <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                   <label class="col-sm-4 col-form-label" >Company Name:&nbsp;&nbsp;</label>
                                    <div class="col-sm-8">
                                       <input type="text" class="form-control" id="WBSIS_companyName1" name="WBSIS_companyName[]" placeholder="" iden="course" />
                                     </div>
                                   </div>
                                   <div id="err_WBSIS_companyName1" style="text-align: center;"></div>
                                 </div>
                                 <div class="col-md-5">
                                   <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                     <label class="col-sm-4 col-form-label" >Duration of Exp:&nbsp;&nbsp;</label>
                                       <div class="col-sm-8">
                                         <input type="text" class="form-control" id="WBSIS_Dua_Exp1" name="WBSIS_Dua_Exp[]" placeholder="" iden="subject"/>
                                       </div>
                                     </div>
                                     <div id="err_WBSIS_Dua_Exp1" style="text-align: center;"></div>
                                   </div>
                           </div><!----Row End-->
                            <div align="center" id="WBSIS_err_add_button"></div>
                         </div>
                        </div>
                         <div id="WBSIS_Company_newRow"></div>
                         <div align="center" id="WBSIS_err_all"></div>

                      <?php }?>
                    <!---------------------WBSIS 6th Row End----------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Basic Qualification:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_BasisQua" name="WBSIS_BasisQua" placeholder="" onkeypress="return /[a-zA-Z, ]/i.test(event.key)" value="<?=$editDocket['CHDIC_WBSIS_Basic_Qua']?>" />
                              <span id="err_WBSIS_BasisQua"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Discipline of Course:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_Dis_Cou" name="WBSIS_Dis_Cou" placeholder="" onkeypress="return /[a-zA-Z, ]/i.test(event.key)" value="<?=$editDocket['CHDIC_WBSIS_Discipline_Course']?>"/>
                              <span id="err_WBSIS_Dis_Cou"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!---------------------WBSIS 7th Row End----------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >Year of Passing:&nbsp;&nbsp;</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_Pass_Year" name="WBSIS_Pass_Year" placeholder="" value="<?=$editDocket['CHDIC_Passing_Year']?>"/>
                              <span id="err_WBSIS_Pass_Year"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                           <label class="col-sm-4 col-form-label" >Pct.of Marks:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_Pct_Markes" name="WBSIS_Pct_Markes" placeholder="" onkeypress="return /[0-9.]/i.test(event.key)" value="<?=$editDocket['CHDIC_WBSIS_Pct_Markes']?>"/>
                              <span id="err_WBSIS_Pct_Markes"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!---------------------WBSIS 8th Row End----------------------->
                     <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                          <label class="col-sm-4 col-form-label" > Additional Qualification:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                            <select id="Add_Qualification" name="Add_Qualification" class="form-control" required >
                                <option value="">Select Additional Qualification</option>
                                <option value="Yes" <?php if ($editDocket['CHDIC_WBSIS_Qua_status'] == 'Yes') {echo 'selected';}?>>Yes</option>
                                <option value="No" <?php if ($editDocket['CHDIC_WBSIS_Qua_status'] == 'No') {echo 'selected';}?>>No</option>
                              </select>
                            </div>
                          </div>
                          <div id="err_Add_Qualification" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label" > Pursuing Course:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="WBSIS_Pursuing_Cou" name="WBSIS_Pursuing_Cou" placeholder="" onkeypress="return /[a-zA-Z0-9, ]/i.test(event.key)" value="<?=$editDocket['CHDIC_Preset_Course_Study']?>"/>
                              <span id="err_WBSIS_Pursuing_Cou"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <!------------------WBSIS 5th Row End-------------------->
                     <!--------Additional Qualification (1) . add row----------->
                    <?php if ($editDocket['CHDIC_WBSIS_Qua_status'] == "Yes") {?>
                       <div id="WBSIS_AddQua_newRow1">
                          <input type="hidden" id="WBSIS_AddQua_box_count" name="WBSIS_AddQua_box_count" value="<?=$noRow;?>">
                          <input type="hidden" id="WBSIS_AddQua_box_string" name="WBSIS_AddQua_box_string" value="<?=implode(",", $b);?>">
							<?php for ($j = 0, $i = 1; $j < count($resultSet); $j++, $i++) {?>
								  <div id="WBSIS_AQ_Row<?=$i?>">
									  <div class="row"></br>
										<div class="col-md-1">
										  <div class="form-group row">
											<div class="col-sm-5">
											  <?php if ($i > 1) {?>
										  <div class="firstbutton"><button type="button" name="WBSIS_AQ_removeRow<?=$i?>" id="WBSIS_AQ_removeRow<?=$i?>" identifier="sis_RemoveIcon" value="" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button></div>
											  <?php } else {?>
												<div class="firstbutton"><button type="button" name="WBSIS_AddQua_addRow" id="WBSIS_AddQua_addRow" value="" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
											  </div>
										<?php }?>
											</div>
										  </div>
										</div>
										<div class="col-md-9">
										  <div class="form-group row">
											<label class="col-sm-4 col-form-label" >Additional Qualification:&nbsp;&nbsp;</label>
											  <div class="col-sm-8">
												  <input type="text" identifier="addqua" class="form-control" id="WBSIS_Add_Qua<?=$i?>" name="WBSIS_Add_Qua[]" placeholder="" iden="aq" value="<?=$resultSet[$j]['CHDAQ_AQ']?>" />
													<span id="err_WBSIS_Add_Qua<?=$i?>"></span>
												</div>
											</div>
										  </div>
									</div><!----Row End-->
								  </div>
							<?php }?>
                       </div><!--End WBSIS-->
						<div id="WBSIS_AddQua_newRow"></div>
						<div align="center" id="WBSIS_AddQua_err_all"></div>
                        <?php } else {?>
						<div id="WBSIS_AddQua_newRow1">
							<input type="hidden" id="WBSIS_AddQua_box_count" name="WBSIS_AddQua_box_count" value="1">
							<input type="hidden" id="WBSIS_AddQua_box_string" name="WBSIS_AddQua_box_string" value="1">
							  <div id="WBSIS_AQ_Row1">
								<div class="row"></br>
								  <div class="col-md-1">
									<div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
									  <div class="col-sm-4">
										<div class="firstbutton"><button type="button" name="WBSIS_AddQua_addRow" id="WBSIS_AddQua_addRow" value="" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
										</div>
									  </div>
									</div>
								  </div>
								  <div class="col-md-9">
									<div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
									  <label class="col-sm-4 col-form-label" >Additional Qualification:&nbsp;&nbsp;</label>
									  <div class="col-sm-8">
										  <input type="text" class="form-control" id="WBSIS_Add_Qua1" name="WBSIS_Add_Qua[]" placeholder="" iden="course" />
										</div>
									  </div>
									  <div id="err_WBSIS_Add_Qua1" style="text-align: center;"></div>
									</div>
							  </div><!----Row End-->
							</div>
						</div>
					 <div id="WBSIS_AddQua_newRow"></div>
					<div align="center" id="WBSIS_AddQua_err_all"></div>
				<?php }?>
      <?php }?>
	      <!----------------------------End 3rd Row------------------------------------>
        <div class="row ml-1"></br>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" >Query Type:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
              <div class="col-sm-7">
                <input type="text" name="disabled-Que" id="disabled-Que" value="<?=$editDocket['chdqt_name'];?>" class="form-control" readonly>
                <span id="err_queryType"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row ml-1"></br>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" >Details Complain:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
              <div class="col-sm-7">
                  <select id="details_complain_type" name="details_complain_type" class="form-control" required >
                    <option value="">Select Complain Type</option>
                    <?php foreach ($complain as $item) {?>
                      <option value="<?php echo $item['chd_cd_id']; ?>"<?php if ($editDocket['chd_dtl_complain_type'] == $item['chd_cd_id']) { echo 'selected="selected"';} ?>><?php echo $item['chd_cd_name']; ?>
                    </option>
                    <?php } ?>
              </select> 
                <span id="err_ddetails_complain_type"></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" >Details of Query / Complain: &nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
              <div class="col-sm-7">
                <textarea type="text" class="form-control" id="dtOf_Query"  name="dtOf_Query" placeholder="" autocomplete="off" value="" ><?=$editDocket['CHDIC_detail_query'];?></textarea>
                <span id="err_dtOf_Query"></span>
              </div>
            </div>
          </div>
        </div>
          <!-----------------------End 4th Row------------------------------>  
          <div class="row ml-1"></br>
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" >Answer to caller:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                <div class="col-sm-7">
                <textarea type="text" class="form-control" id="ans_to_caller" name="ans_to_caller" placeholder="" autocomplete="off" value=""><?=$editDocket['CHDIC_Ans_caller'];?></textarea>
                <span id="err_ans_to_caller"></span>
              </div>
            </div>
            </div>
          <div class="col-md-6">
            <div class="form-group row">
            <label class="col-sm-4 col-form-label" >Call Status: &nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
            <div class="col-sm-7">
                <select id="callstatus" name="callstatus" class="form-control" required >
                  <option value="">Select Call Status</option>
                  <option value="c" <?php if ($editDocket['CallStatus'] == 'Closed') {echo 'selected';}?> >Closed</option>
                  <option value="o" <?php if ($editDocket['CallStatus'] == 'Open') {echo 'selected';}?> >Open</option>
                </select>
                <span id="err_callstatus"></span>
            </div>
          </div>
          </div>
        </div>
        <hr>
        <div align="center">
          <?php if ($_SESSION[$admObj->projectSecrectName]['user']['log_id'] != 900069) {?>
            <input type="button" name="edit_inbound_call" id="edit_inbound_call" class="btn btn-success rounded-pill m-2" value="Save">
          <?php }?>
          <input type="button" name="btn_cancel" class="btn btn-danger rounded-pill m-2" value="Cancel" id="btn_cancel">
        </div>
    </form>
  </div>
</div>
  <?php } else {?>
    	<div class="card">
    		<div class="card-body">
    			<div style='margin-top:10px;padding:10px;' class='alert alert-danger'>No Data Found</div>
    		</div>
    	</div>
    <?php }?>
    </div><!-----Container------->
   </div><!-----Wrwper---->
<!--Start footer-->
	<?php require_once 'includes/footer.php';?>
  <!-----------For This Project Pourpose Use----------->
  <script src="<?=$admObj->cssPath?>assets/js/userJS/edit_inbound.js?verr=<?=time();?>"></script>