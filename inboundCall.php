<?php
/**
 * Project Name : Citizen Help Desk :: Inbound Call
 * Page Name : data Page
 * Purpose of the Page : This is the Login page of the portal.
 * Created By : Santanu Sarkar
 * Created on : 12 Aug, 2022
 */

require_once "config/db.class.php";
require_once "config/globalAdmData.php";
$adminFullMenu     = $admObj->getAdmFullMenuList();
$userDashboardMenu = $admObj->getClientDashboardMenu();
$callerType        = $admObj->fetchTable('chdct_id', 'chdct_type', 'chd_caller_type');
$education         = $admObj->fetchTable('chde_id', 'chde_type_name', 'chd_education');
$queryTypes        = $admObj->fetchTable('chdqt_id', 'chdqt_name', 'chd_query_type');
$directorate       = $admObj->fetchTable('chdd_id', 'chdd_name', 'chd_directorate');
$lastExamQualified = $admObj->fetchTable('chdleq_id', 'chdleq_name', 'chd_last_exam_q');
$StdCradit_Card    = $admObj->fetchTable('csi_id', 'csi_inst_name', 'chd_scc_institutes');
$state             = $admObj->fetchTable('SL', 'State_Name', 'chd_state');
$district          = $admObj->fetchTable('Sl_No', 'District', 'chd_district');
$directorateName   = $admObj->fetchTable('chdsccdn_id', 'chdsccdn_name', 'chd_scc_directorate_name');
$SCCAssigDept      = $admObj->fetchTable('CHDSCC_AD_Sl', 'CHDSCC_AD_Name', 'chd_scc_assignrd_dept');
$dire_res          = $admObj->Directorate();
$jobissue          = $admObj->JobIssueFun();
$scheme            = $admObj->SchemeFun();
$country           = $admObj->CountryFun();
$state             = $admObj->StateFun();
$district          = $admObj->DistrictFun();
$area              = $admObj->AreaFun();
$gender            = $admObj->GenderFun();
$add_type          = $admObj->AddmisfunFun();
$nature_call       = $admObj->NatureCAllFun();
$ssc_catagory_call = $admObj->ScsCaltagoryCallFun();
$ugpg_course = $admObj->UGPGCourseName();
$ugpg_course_type = $admObj->UGPGCourseType();
$deatilsQuery_type = $admObj->DeatilsQueryType();
// echo "<pre>";print_r($deatilsQuery_type);exit;

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'saveData') {
    $data = array();
    foreach ($_REQUEST as $key => $val) {
        if (is_array($val)) {
            for ($s = 0; $s < count($val); $s++) {
                $data[$key][$s] = $admObj->db->real_escape_string(trim($val[$s]));
            }
        } else {
            $data[$key] = $admObj->db->real_escape_string(trim($val));
        }
    }
    foreach ($_FILES as $key => $val) {
        $data[$key] = $val;
    }
    if($_SERVER['REMOTE_ADDR'] == '10.10.14.145' || $_SERVER['REMOTE_ADDR'] == '10.10.11.172') {
      // echo "<pre>"; print_r($data); //exit;
    } else {
      $admObj->storeInboundCall($data);
    }
}
//if($_SERVER['REMOTE_ADDR'] == '10.10.11.172') {
//	$referenceNumber = $smsObj->SendSMStoApplicant('FRGHJKL',NULL,'9007705018');
//	echo "<br>".$referenceNumber; exit;
//}

$callTypeArr = [];
if (isset($_REQUEST['educationGroup'])) {
	$educationGroup = $_REQUEST['educationGroup'];
	$callTypeArr            = $admObj->ajaxfetch('chdc_type_id', 'chdct_name', 'chd_call_type', 'chdct_reff_id_edu', $educationGroup, 'chdct_name');
	if($_SERVER['REMOTE_ADDR'] == '10.10.14.145' || $_SERVER['REMOTE_ADDR'] == '10.10.11.172') {
		// echo "<pre>"; print_r($queryTypes); //exit;
	}
}


$quaryTypeArr=[];
if (isset($_REQUEST['educationGroup'])) {
	$educationGroup = $_REQUEST['educationGroup'];
  $quaryTypeArr = $admObj->ajaxfetch('chdqt_id', 'chdqt_name', 'chd_query_type', 'chdqt_reff_id', $educationGroup, 'chdqt_name');
	if($_SERVER['REMOTE_ADDR'] == '10.10.14.145' || $_SERVER['REMOTE_ADDR'] == '10.10.11.172') {
//		echo "<pre>"; print_r($quaryTypeArr); //exit;
	}
}

$dtComplianArr=[];
if (isset($_REQUEST['educationGroup'])) {
	$educationGroup = $_REQUEST['educationGroup'];
  $callType = $_REQUEST['callType'];
  $queryType = $_REQUEST['queryType'];
  $dtComplianArr = $admObj->ajaxftComDt($educationGroup, $callType,$queryType);
	if($_SERVER['REMOTE_ADDR'] == '10.10.14.145' || $_SERVER['REMOTE_ADDR'] == '10.10.11.172') {
		// echo "<pre>"; print_r($dtComplianArr); //exit;
	}
}


require_once 'includes/header.php';
?>
<link rel="stylesheet" type="text/css" href="<?=$admObj->cssPath?>assets/css/inboundcall.css?ff=<?=time()?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css?<?=time()?>">
<style type="text/css">
  .Helth_Scheme{display: none;}
  
</style>
    <div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="row pt-2 pb-2">
        <div class="col-sm-7">
        <h4 class="page-title">Inbound call</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">User Module</a></li>
            <li class="breadcrumb-item active" aria-current="page">Take Call</li>
         </ol>
     </div>
     </div>
     <div class="col-sm-12 messege-display">
     <?php if ($admObj::hasWithMessage('message')) {?>
              <?=$admObj::getWithMessage('message');?>
     <?php }?>
     </div>
    <div class="container-fluid">
     <div class="card">
        <div class="card-body">
        <div class="container-fluid">
          <form class="form-sample" id="inboundCall_form" method="post" enctype="multipart/form-data" action="">
              <input type="hidden" name="action" id="action">
              <input type="hidden" name="log_id" id="log_id" value="<?php echo $_SESSION[$admObj->projectSecrectName]['user']['log_id']; ?>">
              <input type="hidden" name="ipAddr" id="ipAddr" value="<?=$_SERVER['REMOTE_ADDR']?>">
              <div class="col p-4">
                  <section>
                      <div class="form-groupp row" >
                          <label class="col-sm-2 col-form-label">Caller Phone No<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                              <input type="text" class="form-control" id="caller_Ph_No" name="caller_Ph_No" placeholder="Enter Phone No  Ex: 80XX41XXX0" required maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" value="<?=$admObj->getFormData('caller_Ph_No');?>"/>
                              <span class="text-danger font-italic" id="err_caller_Ph_No"></span>
                          </div>
                          <label class="col-sm-2 col-form-label">Caller Name<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                          <input type="text" class="form-control allow_name" id="caller_Name" name="caller_Name" placeholder="Enter name" onkeypress="return /[A-Z\. ]/i.test(event.key)" value="<?=$admObj->getFormData('caller_Name');?>" />
                              <span class="text-danger font-italic" id="err_caller_Name"></span>
                          </div>
                      </div>
                      <div class="form-groupp row" >
                        <label class="col-sm-2 col-form-label">Select Gender<span
                                class="text_highling">*</span>:</label>
                        <div class="col-sm-4">
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                              <?php
                              foreach ($gender as $item) {
                                  $selected = ($item['chd_gender_id'] == $admObj->getFormData('gender')) ? 'selected' : '';
                                  echo "<option value='" . $item['chd_gender_id'] . "' " . $selected . ">" . $item['chd_gender_name'] . "</option>";
                              }
                              ?>
                          </select>
                            <span class="text-danger font-italic" id="err_gender"></span>
                        </div>
                      </div>
                      <div class="form-groupp row" >
                          <label class="col-sm-2 col-form-label">Caller Type<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                                 <select id="callerType" name="callerType" class="form-control" required>
                                  <option value="">Select Caller Type</option>
                                  <?php
                                  foreach ($callerType as $value) {
                                      $selected = ($value['chdct_id'] == $admObj->getFormData('callerType')) ? 'selected' : '';
                                      echo "<option value='" . $value['chdct_id'] . "' " . $selected . ">" . $value['chdct_type'] . "</option>";
                                  }
                                  ?>
                              </select>
                              <span class="text-danger font-italic" id="err_callerType"></span>
                          </div>
                          <label class="col-sm-2 col-form-label">Caller Email Id<span
                                  class="text_highling"></span>:</label>
                          <div class="col-sm-4">
                               <input type="text" class="form-control" id="caller_email" name="caller_email" placeholder="Enter email Id." value="<?=$admObj->getFormData('caller_email');?>" />
                              <span class="text-danger font-italic" id="err_caller_email"></span>
                          </div>
                      </div>
                      <div class="form-groupp row" >
                        <label class="col-sm-2 col-form-label">Select Group<span
                                class="text_highling">*</span>:</label>
                        <div class="col-sm-4">
                            <select id="educationGroup" name="educationGroup" class="form-control" required>
                              <option value="">Select Group</option>
                               <!-- <?php
                                foreach ($education as $value) {
                                  $selected = ($value['chde_id'] == $admObj->getFormData('educationGroup')) ? 'selected' : '';
                                  echo "<option value='" . $value['chde_id'] . "' " . $selected . ">" . $value['chde_type_name'] . "</option>";
                                }
                               ?> -->

                                <?php
                                foreach ($education as $item) {?>
                                <option value="<?php echo $item['chde_id']; ?>"<?php if ($item['chde_id'] == $admObj->getFormData('educationGroup')) {
                                  echo 'selected="selected"';
                                        }?>><?php echo $item['chde_type_name']; ?></option>
                                <?php }?>
                          </select>
                            <span class="text-danger font-italic" id="err_educationGroup"></span>
                        </div>
                      
                          <label class="col-sm-2 col-form-label higherEdu"> Call Type<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4 higherEdu">
                              <select id="callType" name="callType" class="form-control" required value="<?=$admObj->getFormData('callType');?>">
                                <option value="">Select Call Type</option>
                                <?php if(count($callTypeArr) > 0) { 
                                  foreach ($callTypeArr as $item) { ?>
                                    <option value="<?php echo $item['chdc_type_id']; ?>" <?php if ($item['chdc_type_id'] == $admObj->getFormData('callType')) {
                                    echo 'selected="selected"';} ?>><?php echo $item['chdct_name']; ?></option>
                                <?php } }?>
                              </select>
                              <span class="text-danger font-italic" id="err_callType"></span>
                          </div>
                            <label class="col-sm-2 col-form-label shramik_saathi"> Select Directorate<span
                                    class="text_highling">*</span>:</label>
                            <div class="col-sm-4 shramik_saathi">
                                <select id="directorate" name="directorate" class="form-control">
                                  <option value="">Select Directorate</option>
                                  <?php
                                  foreach ($dire_res as $item) {
                                      $selected = ($item['chd_direc_id'] == $admObj->getFormData('directorate')) ? 'selected' : '';
                                      echo "<option value='" . $item['chd_direc_id'] . "' " . $selected . ">" . $item['chd_direc_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                                <span class="text-danger font-italic" id="err_directorate"></span>
                            </div>
                           
                    </div>
                    <section class="naturesec">
                        <div class="form-groupp row" >
                              <label class="col-sm-2 col-form-label">Nature of calls<span
                                      class="text_highling"></span>:</label>
                              <div class="col-sm-4">
                                    <select id="nature_call" name="nature_call" class="form-control">
                                      <option value="">Select Nature of calls</option>
                                      <?php
                                      foreach ($nature_call as $item) {
                                          $selected = ($item['chd_nature_call_id'] == $admObj->getFormData('nature_call')) ? 'selected' : '';
                                          echo "<option value='" . $item['chd_nature_call_id'] . "' " . $selected . ">" . $item['chd_nature_call_name'] . "</option>";
                                      }
                                      ?>
                                  </select>
                                  <span class="text-danger font-italic" id="err_nature_call"></span>
                              </div>
                              <label class="col-sm-2 col-form-label">Reg. Phone No<span
                                      class="text_highling"></span>:</label>
                              <div class="col-sm-4">
                                 <input type="text" class="form-control" id="register_phoneno" name="register_phoneno" placeholder="Enter register phone No. Ex: 80XX41XXX0" required maxlength="11" onkeypress="return /[0-9a-zA-Z]/.test(event.key)" value="<?=$admObj->getFormData('register_phoneno');?>" />
                                  <span class="text-danger font-italic" id="err_test2"></span>
                              </div>
                        </div>
                    </section>
                      <section class="shramik_saathi ">
                        <div class="row"></br>
                          <div class="col-md-6">
                            <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                              <label class="col-sm-4 col-form-label" > Select Job Issue:</label>
                              <div class="col-sm-8">
                                <select id="job_issue" name="job_issue" class="form-control">
                                    <option value="">Select Job Issue</option>
                                    <?php
                                    foreach ($jobissue as $item) {
                                        $selected = ($item['chd_job_Iss_id'] == $admObj->getFormData('job_issue')) ? 'selected' : '';
                                        echo "<option value='" . $item['chd_job_Iss_id'] . "' " . $selected . ">" . $item['chd_job_Iss_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                              </div>
                            </div>
                            <div id="err_job_issue" style="text-align: center;"></div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                              <label class="col-sm-4 col-form-label" > Select Scheme:&nbsp;&nbsp;</label>
                              <div class="col-sm-8">
                                <select id="scheme" name="scheme" class="form-control">
                                    <option value="">Select Scheme</option>
                                    <?php
                                    foreach ($scheme as $item) {
                                        $selected = ($item['chd_scheme_id'] == $admObj->getFormData('scheme')) ? 'selected' : '';
                                        echo "<option value='" . $item['chd_scheme_id'] . "' " . $selected . ">" . $item['chd_scheme_name'] . "</option>";
                                    }
                                    ?>
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
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="reg_ssin" name="reg_ssin" placeholder="Enter Reg No./ SSIN No./ MWIN" value="<?=$admObj->getFormData('reg_ssin');?>"  onkeypress="return /[0-9a-zA-Z]/.test(event.key)"  />
                            </div>
                          </div>
                          <div id="err_reg_ssin" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Beneficiary Name:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control allow_name text-capitalize" id="beneficiary_name" name="beneficiary_name" placeholder="Enter Beneficiary Name"  value="<?=$admObj->getFormData('beneficiary_name');?>" onkeypress="return /[a-zA-Z ]/.test(event.key)" />
                            </div>
                          </div>
                          <div id="err_beneficiary_name" style="text-align: center;"></div>
                        </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >SHM Gender:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-8">
                                  <select id="gender88" name="gender588" class="form-control">
                                  <option value="">Select Gender</option>
                                  <?php
                                      foreach ($gender as $item) {
                                          echo "<option value=' " . $item['chd_gender_id'] . " '>" . $item['chd_gender_name'] . "</option>"; } ?>
                                    </select>
                              </div>
                                </div>
                              <div id="err_gender" style="text-align: center;"></div>
                            </div>
                        </div> -->
                        <div class="row mt-1">
                            <div class="col-md-6 ">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <div class="col-sm-4"><label class="col-form-label mt-n1">Select Country:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label></div>
                                <div class="col-sm-8">
                                    <select id="country" name="country" class="form-control">
                                        <option value=''>Select Country</option>
                                          <?php
                                              foreach ($country as $item) {?>
                                              <option value="<?php echo $item['chd_country_id']; ?>"<?php if ($item['chd_country_name'] == 'India') {
                                                echo 'selected="selected"';
                                                      }?>><?php echo $item['chd_country_name']; ?></option>
                                            <?php }?>
                                      </select>
                                </div>
                              </div>
                              <div id="err_country" style="text-align: center;"></div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >Entery Country Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control allow_name" id="country_name" name="country_name" placeholder="Enter Other Country Name" value="<?=$admObj->getFormData('country_name');?>"  onkeypress="return /[a-zA-Z\. ]/i.test(event.key)"  readonly/>
                                </div>
                              </div>
                              <div id="err_country_name" style="text-align: center;"></div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6 ">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <div class="col-sm-4"><label class="col-form-label mt-n1">Select State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label></div>
                                <div class="col-sm-8">
                                    <select id="state" name="state" class="form-control">
                                        <option value="">Select State</option>
                                          <?php
                                            foreach ($state as $item) {?>
                                              <option value="<?php echo $item['SL']; ?>" <?php if ($item['State_Name'] == 'West Bengal') {
                                              echo 'selected="selected"';} ?>><?php echo $item['State_Name']; ?></option>
                                            <?php }?>
                                      </select>
                                </div>
                              </div>
                              <div id="err_state" style="text-align: center;"></div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >Enter State Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control allow_name" id="state_name" name="state_name" placeholder="Enter Other State Name"  value="<?=$admObj->getFormData('state_name');?>"  onkeypress="return /[a-zA-Z\. ]/i.test(event.key)"readonly/>
                                </div>
                              </div>
                              <div id="err_state_name" style="text-align: center;"></div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6 ">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <div class="col-sm-4"><label class="col-form-label mt-n1">Select District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label></div>
                                <div class="col-sm-8">
                                    <select id="district" name="district" class="form-control">
                                        <option value="">Select District</option>
                                        <?php
                                        foreach ($district as $item) {
                                            $selected = ($item['Sl_No'] == $admObj->getFormData('district')) ? 'selected' : '';
                                            echo "<option value='" . $item['Sl_No'] . "' " . $selected . ">" . $item['District'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                              </div>
                              <div id="err_district" style="text-align: center;"></div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >Enter District Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control allow_name" id="district_name" name="district_name" placeholder="Enter Other District Name"  value="<?=$admObj->getFormData('district_name');?>"  onkeypress="return /[a-zA-Z\. ]/i.test(event.key)" readonly/>
                                </div>
                              </div>
                              <div id="err_district_name" style="text-align: center;"></div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6 ">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <div class="col-sm-4"><label class="col-form-label mt-n1">Select Area:&nbsp;&nbsp;</label></div>
                                <div class="col-sm-8">
                                      <select id="area" name="area" class="form-control">
                                        <option value="">Select Area</option>
                                        <?php
                                        foreach ($area as $item) {
                                            $selected = ($item['chd_area_id'] == $admObj->getFormData('area')) ? 'selected' : '';
                                            echo "<option value='" . $item['chd_area_id'] . "' " . $selected . ">" . $item['chd_area_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                              </div>
                              <div id="err_area" style="text-align: center;"></div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >Entery Area Name:&nbsp;&nbsp;</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="area_name" name="area_name" placeholder="Enter Other Area Name"  value="<?=$admObj->getFormData('area_name');?>"  onkeypress="return /[a-zA-Z\. ]/i.test(event.key)" readonly />
                                </div>
                              </div>
                              <div id="err_area_name" style="text-align: center;"></div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >GP/ Ward No.:&nbsp;&nbsp;</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="gp_wardno" name="gp_wardno" placeholder="Enter GP/ Ward No."  value="<?=$admObj->getFormData('gp_wardno');?>"  onkeypress="return /[a-zA-Z0-9 ]/.test(event.key)"/>
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
                     <div class="higherEdu_svmcm_scholarship">
                        <div class="form-groupp row" >
                              <label class="col-sm-2 col-form-label">Last Exam Qualified:<span
                                      class="text_highling">*</span>:</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" id="svmcm_lastExam_Qua" name="svmcm_lastExam_Qua" value="<?=$admObj->getFormData('svmcm_lastExam_Qua');?>" placeholder="Enter last exam qualified" />
                                  <span class="text-danger font-italic" id="err_svmcm_lastExam_Qua"></span>
                              </div>
                              <label class="col-sm-2 col-form-label">Year Of Passing<span
                                      class="text_highling"></span>:</label>
                              <div class="col-sm-4">
                                    <input type="text" class="form-control" id="svmcm_lastExam_year" name="svmcm_lastExam_year" placeholder="Enter passing year" maxlength="4"  value="<?=$admObj->getFormData('svmcm_lastExam_year');?>" />
                                  <span class="text-danger font-italic" id="err_svmcm_lastExam_year"></span>
                              </div>
                        </div>
                        <div class="form-groupp row" >
                            <label class="col-sm-2 col-form-label">Present Course of Study<span
                                    class="text_highling">*</span>:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="svmcm_presentCou_Std" name="svmcm_presentCou_Std" placeholder="Enter present course of study" value="<?=$admObj->getFormData('svmcm_presentCou_Std');?>" />
                                <span class="text-danger font-italic" id="err_svmcm_presentCou_Std"></span>
                            </div>
                            <label class="col-sm-2 col-form-label">Institution Name<span
                                    class="text_highling">*</span>:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="svmcm_InstName" name="svmcm_InstName" placeholder="Enter Institution Name " onkeypress="return /[a-zA-Z\.,-/ ]/i.test(event.key)" value="<?=$admObj->getFormData('svmcm_InstName');?>"/>
                                <span class="text-danger font-italic" id="err_svmcm_InstName"></span>
                            </div>
                        </div>
                        <div class="form-groupp row" >
                          <label class="col-sm-2 col-form-label">Directorate<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                              <select id="svmcm_directorate" name="svmcm_directorate" class="form-control" required>
                                <option value="">Select Directorate</option>
                                <?php
                                foreach ($directorate as $value) {
                                    $selected = ($value['chdd_id'] == $admObj->getFormData('svmcm_directorate')) ? 'selected' : '';
                                    echo "<option value='" . $value['chdd_id'] . "' " . $selected . ">" . $value['chdd_name'] . "</option>";
                                }
                                ?>
                            </select>
                              <span class="text-danger font-italic" id="err_svmcm_directorate"></span>
                          </div>
                          <label class="col-sm-2 col-form-label">Application Number<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                               <input type="text" class="form-control" id="svmcm_AppNo" name="svmcm_AppNo" placeholder="" value="<?=$admObj->getFormData('svmcm_AppNo');?>"/>
                              <span class="text-danger font-italic" id="err_svmcm_AppNo"></span>
                          </div>
                       </div>
                      <!---------------------SVMCM End 3rd Row-------------->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="svmcmphd_DateReg_Admi">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >Date of Registration/Admission:&nbsp;&nbsp;</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" id="svmcm_phd_DateReg_Admi" name="svmcm_phd_DateReg_Admi" placeholder="" value="<?=$admObj->getFormData('svmcm_phd_DateReg_Admi');?>" autocomplete="off"/>
                                </div>
                              </div>
                              <div id="err_svmcm_phd_DateReg_Admi" style="text-align: center;"></div>
                           </div>
                        </div>
                     </div> <!--row-->
                      <div class="row"></br>
                          <div class="col-md-6">
                            <div class="svmcmphd_DateReg_Admi">
                                <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                  <label class="col-sm-4 col-form-label" >Claim period:&nbsp;&nbsp;</label>
                                  <div class="col-sm-7">
                                    <input type="text" class="form-control" id="svmcm_phd_claim_period" name="svmcm_phd_claim_period" placeholder="" value="<?=$admObj->getFormData('svmcm_phd_claim_period');?>" autocomplete="off"/>
                                  </div>
                                </div>
                                <div id="err_svmcm_phd_claim_period" style="text-align: center;"></div>
                            </div>
                          </div>
                      </div> 
                     </div><!---svmcm End-->
                    <div class="e_persion">
                    <div class="form-groupp row" >
                          <label class="col-sm-2 col-form-label">Institute/Dept. Name<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                              <input type="text" class="form-control" id="ePersion_Inst" name="ePersion_Inst" placeholder="Enter Institute/Dept. Name" onkeypress="return /[a-zA-Z\.,-/ ]/i.test(event.key)" value="<?=$admObj->getFormData('ePersion_Inst');?>"/>
                              <span class="text-danger font-italic" id="err_ePersion_Inst"></span>
                          </div>
                          <!-- <label class="col-sm-2 col-form-label">Test2<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                          <input type="text" class="form-control allow_name" id="Test2" name="Test2" placeholder="Enter name" onkeypress="return /[A-Z\. ]/i.test(event.key)" value="<?=$admObj->getFormData('caller_Name');?>" />
                              <span class="text-danger font-italic" id="err_Test2"></span>
                          </div> -->
                    </div>
                    </div><!----End E-Persion---->
                    <div class="Helth_Scheme">
                    <div class="form-groupp row" >
                        <label class="col-sm-2 col-form-label">Institute/Dept.Name<span
                                  class="text_highling">*</span></label>
                          <div class="col-sm-4">
                          <input type="text" class="form-control" id="helth_Inst" name="helth_Inst" placeholder="Enter Institute/Dept. Name" onkeypress="return /[a-zA-Z\, ]/i.test(event.key)" value="<?=$admObj->getFormData('helth_Inst');?>"/>
                              <span class="text-danger font-italic" id="err_helth_Inst"></span>
                          </div>
                          <!-- <label class="col-sm-2 col-form-label">Test2<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                          <input type="text" class="form-control allow_name" id="Test2" name="Test2" placeholder="Enter name" onkeypress="return /[A-Z\. ]/i.test(event.key)" value="<?=$admObj->getFormData('caller_Name');?>" />
                              <span class="text-danger font-italic" id="err_Test2"></span>
                          </div> -->
                      </div>
                    </div><!----End Helth_Scheme---->
                    <!-----------Start UG/PG Admission------------------>
                    <div class="UG_PG">
                          <div class="form-groupp row" >
                            <label class="col-sm-2 col-form-label">Last Exam Qualified<span
                                    class="text_highling">*</span>:</label>
                            <div class="col-sm-4">
                                  <select id="ugpg_LastExam_Qua" name="ugpg_LastExam_Qua" class="form-control" required>
                                  <option value="">Last Exam Qualified</option>
                                  <?php
                                  foreach ($lastExamQualified as $value) {
                                      $selected = ($value['chdleq_id'] == $admObj->getFormData('ugpg_LastExam_Qua')) ? 'selected' : '';
                                      echo "<option value='" . $value['chdleq_id'] . "' " . $selected . ">" . $value['chdleq_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                                <span class="text-danger font-italic" id="err_ugpg_LastExam_Qua"></span>
                            </div>
                            <label class="col-sm-2 col-form-label">Year of Passing<span
                                    class="text_highling">*</span>:</label>
                            <div class="col-sm-4">
                                
                                <select id="ugpg_passing_year" name="ugpg_passing_year" class="form-control">
                                    <option value="">Select Passing Year</option>
                                    <?php
                                    for ($i = 2018; $i <= 2024; $i++) {
                                        $selected = ($i == $admObj->getFormData('ugpg_passing_year')) ? 'selected' : '';
                                        echo "<option value='" . $i . "' " . $selected . ">" . $i . "</option>";
                                    }
                                    ?>
                                    <option value="Other" <?= ($admObj->getFormData('ugpg_passing_year') == 'Other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                                <span class="text-danger font-italic" id="err_ugpg_passing_year"></span>
                            </div>
                         </div>
                      <!------UG/PG End Firt Row-------->
                      <!-- <input type="hidden" id="box_count" name="box_count" value="1">
                      <input type="hidden" id="box_string" name="box_string" value="1">
                        <div id="inputFormRow1">
                          <div class="row"></br>
                            <div class="col-md-1">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <div class="col-sm-7">
                                  <div class="firstbutton"><button type="button" name="addRow" id="addRow" value="" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" > Courses Interested In:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="ugpg_course1" name="ugpg_course[]" placeholder="" iden="course" />
                                  </div>
                                </div>
                                <div id="err_ugpg_course1" style="text-align: center;"></div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                  <label class="col-sm-4 col-form-label" >Subject:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control" id="ugpg_sub1" name="ugpg_sub[]" placeholder="" iden="subject"/>
                                    </div>
                                  </div>
                                  <div id="err_ugpg_sub1" style="text-align: center;"></div>
                                </div>
                          </div>
                        </div>
                        <div id="newRow"></div>
                        <div align="center" id="err_all"></div> -->
                      <!-------End Second Row------>
                      <div class="form-groupp row" >
                      <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Admission Type:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                                <div class="ugpg_adminType_class">
                                  <select id="ugpg_admi_type" name="ugpg_admi_type" class="form-control">
                                  <option value="">Select Admission Type</option>
                                  <?php
                                  foreach ($add_type as $value) {
                                      $selected = ($value['chdat_id'] == $admObj->getFormData('ugpg_admi_type')) ? 'selected' : '';
                                      echo "<option value='" . $value['chdat_id'] . "' " . $selected . ">" . $value['chdat_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                                   <div id="err_ugpg_admi_type" style="text-align: center;"></div>
                               </div>
                                 <div class="ugpg_OtheradminType_class">
                                     <input type="text" class="form-control" id="ugpg_OtherAdmi_Type"  placeholder="Enter  type of admission"  name="ugpg_OtherAdmi_Type" value="<?=$admObj->getFormData('ugpg_OtherAdmi_Type');?>">
                                 </div>
                             </div>
                            <div id="err_ugpg_OtherAdmi_Type" style="text-align: center;"></div>
                          </div>
                        </div>
                          <label class="col-sm-2 col-form-label">Institute Name<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                               <input type="text" class="form-control" id="ugpg_inst_Name" name="ugpg_inst_Name" value="<?=$admObj->getFormData('ugpg_inst_Name');?>"  placeholder="Enter Institute name "/>
                              <span class="text-danger font-italic" id="err_ugpg_inst_Name"></span>
                          </div>
                      </div>
                      <div class="form-groupp row" >
                          <label class="col-sm-2 col-form-label">Course<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                                <select id="ugpg_course_name" name="ugpg_course_name" class="form-control">
                                <option value="">Select Course Name</option>
                                <?php
                                foreach ($ugpg_course as $value) {
                                    $selected = ($value['chdcn_id'] == $admObj->getFormData('ugpg_course_name')) ? 'selected' : '';
                                    echo "<option value='" . $value['chdcn_id'] . "' " . $selected . ">" . $value['chdcn_name'] . "</option>";
                                }
                                ?>
                            </select>
                              <span class="text-danger font-italic" id="err_ugpg_course_name"></span>
                          </div>
                          <label class="col-sm-2 col-form-label">Other Course Name<span
                                  class="text_highling">*</span>:</label> 
                          <div class="col-sm-4">
                          <input type="text" class="form-control allow_name" id="ugpg_other_cname" name="ugpg_other_cname" placeholder="Enter Other course name"  value="<?=$admObj->getFormData('ugpg_other_cname');?>" />
                              <span class="text-danger font-italic" id="err_ugpg_other_cname"></span>
                          </div>
                      </div>
                      <div class="form-groupp row" >
                          <label class="col-sm-2 col-form-label">Course type<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                                <select id="ugpg_course_type" name="ugpg_course_type" class="form-control">
                                  <option value="">Select Course type</option>
                                  <?php
                                  foreach ($ugpg_course_type as $value) {
                                      $selected = ($value['chdct_id'] == $admObj->getFormData('ugpg_course_type')) ? 'selected' : '';
                                      echo "<option value='" . $value['chdct_id'] . "' " . $selected . ">" . $value['chdct_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                              <span class="text-danger font-italic" id="err_ugpg_course_type"></span>
                          </div>
                          <label class="col-sm-2 col-form-label">Other course Type<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                          <input type="text" class="form-control allow_name" id="ugpg_other_ctype" name="ugpg_other_ctype" placeholder="Enter other course type" value="<?=$admObj->getFormData('ugpg_other_ctype');?>" />
                              <span class="text-danger font-italic" id="err_ugpg_other_ctype"></span>
                          </div>
                      </div>
                      <div class="form-groupp row" >
                            <label class="col-sm-2 col-form-label">Subject<span
                                    class="text_highling"></span>:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="ugpg_ba_subject" name="ugpg_ba_subject" value="<?=$admObj->getFormData('ugpg_ba_subject');?>" placeholder="Enter subject name" />
                                <span class="text-danger font-italic" id="err_ugpg_course_type"></span>
                            </div>
                            <label class="col-sm-2 col-form-label">Application ID<span
                                    class="text_highling"></span>:</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control allow_name" id="ugpg_app_id" name="ugpg_app_id" placeholder="Enter Application ID"  value="<?=$admObj->getFormData('ugpg_app_id');?>" />
                                <span class="text-danger font-italic" id="err_ugpg_app_id"></span>
                            </div>
                        </div>
                        <div class="form-groupp row" >
                          <label class="col-sm-2 col-form-label">State<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                              <select id="ugpg_state" name="ugpg_state" class="form-control">
                                <option value=""> State</option>
                                <?php
                                foreach ($state as $item) {
                                    $selected = ($item['SL'] == $admObj->getFormData('ugpg_state')) ? 'selected' : '';
                                    echo "<option value='" . $item['SL'] . "' " . $selected . ">" . $item['State_Name'] . "</option>";
                                }
                                ?>
                            </select>
                              <span class="text-danger font-italic" id="err_ugpg_state"></span>
                          </div>
                          <label class="col-sm-2 col-form-label">Other State Name<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                              <input type="text" class="form-control allow_name" id="ugpg_state_name" name="ugpg_state_name" placeholder="Enter Other State Name"   value="<?=$admObj->getFormData('ugpg_state_name');?>"  />
                              <span class="text-danger font-italic" id="err_ugpg_state_name"></span>
                          </div>
                      </div>
                      <div class="form-groupp row" >
                          <label class="col-sm-2 col-form-label"> District<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                              <select id="ugpg_district" name="ugpg_district" class="form-control">
                                <option value="">Select District</option>
                                <?php
                                foreach ($district as $item) {
                                    $selected = ($item['Sl_No'] == $admObj->getFormData('ugpg_district')) ? 'selected' : '';
                                    echo "<option value='" . $item['Sl_No'] . "' " . $selected . ">" . $item['District'] . "</option>";
                                }
                                ?>
                            </select>
                              <span class="text-danger font-italic" id="err_ugpg_district"></span>
                          </div>
                          <label class="col-sm-2 col-form-label">Other District Name<span
                                  class="text_highling">*</span>:</label>
                          <div class="col-sm-4">
                               <input type="text" class="form-control allow_name" id="ugpg_district_name" name="ugpg_district_name" placeholder="Enter Other District Name" value="<?=$admObj->getFormData('ugpg_district_name');?>" />
                              <span class="text-danger font-italic" id="err_ugpg_district_name"></span>
                          </div>
                      </div>        
                     </div>
                    <!-------------End UG/PG----------------------->
                   <div class="SCC">
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >Existing Complain:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <select id="SCC_complain" name="SCC_complain" class="form-control" required >
                                <option value="">Select Existing Complain</option>
                                <option value="NC" selected='selected'>New Complain</option>
                                <option value="EC">Existing Complain</option>
                              </select>
                            </div>
                          </div>
                           <div id="err_SCC_complain" style="text-align: center;"></div>
                        <div class="SCC_DocketNo_class">
                            <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                              <label class="col-sm-4 col-form-label" >Complain Docket No:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="SCC_Docket_No" name="SCC_Docket_No" placeholder="Complain Docket No" onkeypress="return /[a-zA-Z0-9\.,- ]/i.test(event.key)"  value="<?=$admObj->getFormData('SCC_Docket_No');?>"/>
                                </div>
                              </div>
                              <div id="err_SCC_Docket_No" style="text-align: center;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >SCC Institution Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="SCC_Inst_Name" name="SCC_Inst_Name" value="<?=$admObj->getFormData('SCC_Inst_Name');?>" placeholder="Enter SCC Institution Name">
                                </div>
                            </div>
                          <div id="err_SCC_Inst_Name" style="text-align: center;"></div>
                        </div>
                     </div>
                     <!-----------1st row End SCC----------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                            
                              <select id="SCC_State" name="SCC_State" class="form-control" required>
                                <option value="">Select State</option>
                                <?php
                                foreach ($state as $value) {
                                    $selected = ($value['SL'] == $admObj->getFormData('SCC_State')) ? 'selected' : '';
                                    echo "<option value='" . $value['SL'] . "' " . $selected . ">" . $value['State_Name'] . "</option>";
                                }
                                ?>
                            </select>

                            </div>
                          </div>
                            <div id="err_SCC_State" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="SCC_Other_State_class">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SCC_Other_state" name="SCC_Other_state" placeholder="" onkeypress="return /[a-zA-Z ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_Other_state');?>"/>
                            </div>
                          </div>
                          <div id="err_SCC_Other_state" style="text-align: center;"></div>
                        </div>
                          <div class="form-group row SCC_Dist_class" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              
                              <select id="SCC_Dist" name="SCC_Dist" class="form-control" required>
                                  <option value="">Select District</option>
                                  <?php
                                  foreach ($district as $value) {
                                      $selected = ($value['Sl_No'] == $admObj->getFormData('SCC_Dist')) ? 'selected' : '';
                                      echo "<option value='" . $value['Sl_No'] . "' " . $selected . ">" . $value['District'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_SCC_Dist" style="text-align: center;"></div>
                        </div>
                     </div> 
                    <!-----------2nd row End SCC------------------>
                      <div class="row"></br>
                        <div class="col-md-6 stu_cr_loan">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >SCC Course Applied:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                               <input type="text" class="form-control" id="SCC_Course_Applied" name="SCC_Course_Applied" placeholder="" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)"  value="<?=$admObj->getFormData('SCC_Course_Applied');?>"/>
                            </div>
                          </div>
                          <div id="err_SCC_Course_Applied" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" > SCC Course Category:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <select id="SCC_course_Category" name="SCC_course_Category" class="form-control">
                                  <option value="">Select SCC Course Category</option>
                                  <?php
                                  foreach ($ssc_catagory_call as $value) {
                                      $selected = ($value['chd_ssc_ctcall_id'] == $admObj->getFormData('SCC_course_Category')) ? 'selected' : '';
                                      echo "<option value='" . $value['chd_ssc_ctcall_id'] . "' " . $selected . ">" . $value['chd_ssc_ctcall_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_SCC_course_Category" style="text-align: center;"></div>
                        </div>
                     </div> 
                     <!-----------3rd row End SCC------------------>
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >SCC Directorate Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <select id="SCC_Directorate" name="SCC_Directorate" class="form-control">
                                  <option value="">Select SCC Directorate</option>
                                  <?php
                                  foreach ($directorateName as $value) {
                                      $selected = ($value['chdsccdn_id'] == $admObj->getFormData('SCC_Directorate')) ? 'selected' : '';
                                      echo "<option value='" . $value['chdsccdn_id'] . "' " . $selected . ">" . $value['chdsccdn_name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_SCC_Directorate" style="text-align: center;"></div>
                         <div class="SCC_Other_Directorate_class">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >Directorate Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SCC_Other_Directorate" name="SCC_Other_Directorate" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_Other_Directorate');?>"/>
                            </div>
                          </div>
                           <div id="err_SCC_Other_Directorate" style="text-align: center;"></div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Last Qualification:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SCC_Last_Qua" name="SCC_Last_Qua" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_Last_Qua');?>" placeholder="Enter last qualification"/>
                            </div>
                          </div>
                          <div id="err_SCC_Last_Qua" style="text-align: center;"></div>
                        </div>
                      </div> 
                   <!----------------SCC End 4th Row--------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Passing Year:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                               <input type="text" class="form-control" id="SCC_Passing_Year" name="SCC_Passing_Year"  value="<?=$admObj->getFormData('SCC_Passing_Year');?>" placeholder="Enter Passing year"/>
                            </div>
                          </div>
                          <div id="err_SCC_Passing_Year" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Present Course of Study:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SCC_Preset_Course" name="SCC_Preset_Course" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_Preset_Course');?>" placeholder="Enter present course of study"/>
                            </div>
                          </div>
                           <div id="err_SCC_Preset_Course" style="text-align: center;"></div>
                        </div>
                     </div>
                    <!------------------SCC End 5th Row------------->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label">Reg. No/Application ID:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>       
                            <div class="col-sm-8">
                               <input type="text" class="form-control" id="SCC_App_Id" name="SCC_App_Id" onkeypress="return /[a-zA-Z0-9 ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_App_Id');?>" placeholder="Enter Reg. No/Application ID"/>
                            </div>
                          </div>
                          <div id="err_SCC_App_Id" style="text-align: center;"></div>
                          <!-----------Hide Other District Name:---------->
                          <div class="SCC_Other_Call_Category_Class">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >Call Category:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SCC_Other_CallCategory" name="SCC_Other_CallCategory" placeholder="" onkeypress="return /[a-zA-Z0-9\ ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_Other_CallCategory');?>"/>
                            </div>
                          </div>
                            <div id="err_SCC_Other_CallCategory" style="text-align: center;"></div>
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Category of Calls:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <select name="SCC_Call_Category" id="SCC_Call_Category" class="form-control" >
                                <option value="">Select Call Category</option>
                                <option value="General">General</option>
                                <option value="Technical">Technical</option>
                                <option value="Bank Related">Bank Related</option>
                                <option value="Health Deptt.">Health Deptt.</option>
                                <option value="Outside State">Outside State</option>
                                <option value="Others">Others</option>
                              </select> -->
                              <select name="SCC_Call_Category" id="SCC_Call_Category" class="form-control">
                                  <option value="">Select Call Category</option>
                                  <?php
                                  $callCategories = [
                                      'General' => 'General',
                                      'Technical' => 'Technical',
                                      'Bank Related' => 'Bank Related',
                                      'Health Deptt.' => 'Health Deptt.',
                                      'Outside State' => 'Outside State',
                                      'Others' => 'Others'
                                  ];
                                  foreach ($callCategories as $value => $label) {
                                      $selected = ($value == $admObj->getFormData('SCC_Call_Category')) ? 'selected' : '';
                                      echo "<option value='" . $value . "' " . $selected . ">" . $label . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_SCC_Call_Category" style="text-align: center;"></div>
                        </div>
                     </div> 
                    <!-----------------SCC End 6th Row-------------->
                      <div class="row" ></br>
                        <div class="col-md-6 stu_cr_loan">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Line Transfer:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <!-- <select name="SCC_line_Transfer" id="SCC_line_Transfer" class="form-control" ><option value="">Select Line Transfer</option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                              </select> -->
                              <select name="SCC_line_Transfer" id="SCC_line_Transfer" class="form-control">
                                  <option value="">Select Line Transfer</option>
                                  <?php
                                  $lineTransferOptions = [
                                      'No' => 'No',
                                      'Yes' => 'Yes'
                                  ];
                                  foreach ($lineTransferOptions as $value => $label) {
                                      $selected = ($value == $admObj->getFormData('SCC_line_Transfer')) ? 'selected' : '';
                                      echo "<option value='" . $value . "' " . $selected . ">" . $label . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_SCC_line_Transfer" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6 stu_cr_loan">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                  <label class="col-sm-4 col-form-label" >Assigned Deptt:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                  <div class="col-sm-7">
                                        <select name="SCC_Assig_Dept" id="SCC_Assig_Dept" class="form-control">
                                            <option value="">Select Assigned Deptt</option>
                                            <?php
                                            foreach ($SCCAssigDept as $value) {
                                                $selected = ($value['CHDSCC_AD_Sl'] == $admObj->getFormData('SCC_Assig_Dept')) ? 'selected' : '';
                                                echo "<option value='" . $value['CHDSCC_AD_Sl'] . "' " . $selected . ">" . $value['CHDSCC_AD_Name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                             </div>
                              <div id="err_SCC_Assig_Dept" style="text-align: center;"></div>
                          <!-----------Hide Other Assigned Deptt:---------->
                          <div class="SCC_Other_Assig_Deptt_Class">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                    <label class="col-sm-4 col-form-label" >Assigned Deptt:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control" id="SCC_Other_Assid_Deptt" name="SCC_Other_Assid_Deptt" onkeypress="return /[a-zA-Z0-9\ ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_Other_Assid_Deptt');?>"/>
                                    </div>
                              </div>
                             <div id="err_SCC_Other_Assid_Deptt" style="text-align: center;"></div>
                          </div>
                        </div>
                     </div>
                      <!---------SCC End 7th Row----------------------->
                      <div class="row stu_cr_loan"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Assigned To:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Assig_To" name="SCC_Assig_To" onkeypress="return /[a-zA-Z0-9\ ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_Assig_To');?>"/>
                            </div>
                          </div>
                          <div id="err_SCC_Assig_To" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Duration Pending:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="SCC_Duration_Pending" name="SCC_Duration_Pending" onkeypress="return /[a-zA-Z0-9\ ]/i.test(event.key)" value="<?=$admObj->getFormData('SCC_Duration_Pending');?>"/>
                            </div>
                          </div>
                          <div id="err_SCC_Duration_Pending" style="text-align: center;"></div>
                        </div>
                     </div> 
                 </div><!--End SCC---->
                 <!----------------------------Start SNTCSSC-------------------->
                 <div class="SNTCSSC">
                   <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Date Of Birth:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SNTCSSC_DOB" name="SNTCSSC_DOB" value="<?=$admObj->getFormData('SNTCSSC_DOB');?>" autocomplete="off" placeholder="Select DOB" readonly/>
                            </div>
                          </div>
                          <div id="err_SNTCSSC_DOB" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Category:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <!-- <select id="SNTCSSC_Cast" name="SNTCSSC_Cast" class="form-control">
                                  <option value="" class=""> Choose Category</option>
                                  <option value="General">General</option>
                                  <option value="ST">ST</option>
                                  <option value="SC">SC</option>
                                  <option value="OBC-A">OBC-A</option>
                                  <option value="OBC-B">OBC-B</option>
                               </select> -->

                               <select id="SNTCSSC_Cast" name="SNTCSSC_Cast" class="form-control">
                                  <option value="" class=""> Choose Category</option>
                                  <?php
                                  $castOptions = [
                                      'General' => 'General',
                                      'ST' => 'ST',
                                      'SC' => 'SC',
                                      'OBC-A' => 'OBC-A',
                                      'OBC-B' => 'OBC-B'
                                  ];
                                  foreach ($castOptions as $value => $label) {
                                      $selected = ($value == $admObj->getFormData('SNTCSSC_Cast')) ? 'selected' : '';
                                      echo "<option value='" . $value . "' " . $selected . ">" . $label . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_SNTCSSC_Cast" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
            
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <!-- <select id="SNTCSSC_State" name="SNTCSSC_State" class="form-control" required >
                                <option value="">Choose State</option>
                                <?php
                                    foreach ($state as $value) {
                                        echo "<option value='" . $value['SL'] . "' >" . $value['State_Name'] . "</option>";
                                    }
                                    ?>
                              </select> -->

                              <select id="SNTCSSC_State" name="SNTCSSC_State" class="form-control" required>
                                  <option value="">Choose State</option>
                                  <?php
                                  foreach ($state as $value) {
                                      $selected = ($value['SL'] == $admObj->getFormData('SNTCSSC_State')) ? 'selected' : '';
                                      echo "<option value='" . $value['SL'] . "' " . $selected . ">" . $value['State_Name'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_SNTCSSC_State" style="text-align: center;"></div>
                        </div>
                    <!-----------Hide Other District Name:---------->
                        <div class="col-md-6">
                          <div class="SNTCSSC_Other_State_class">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SNTCSSC_Other_state" name="SNTCSSC_Other_state" onkeypress="return /[a-zA-Z ]/i.test(event.key)" value="<?=$admObj->getFormData('SNTCSSC_Other_state');?>"  placeholder=""/>
                            </div>
                          </div>
                          <div id="err_SNTCSSC_Other_state" style="text-align: center;"></div>
                          </div>
                          <div class="form-group row SNTCSSC_Dist_class" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <!-- <select id="SNTCSSC_Dist" name="SNTCSSC_Dist" class="form-control" required >
                                <option value="">Choose District</option>
                                <?php
                                    foreach ($district as $value) {
                                        echo "<option value='" . $value['Sl_No'] . "' >" . $value['District'] . "</option>";
                                    }
                                    ?>
                              </select> -->

                              <select id="SNTCSSC_Dist" name="SNTCSSC_Dist" class="form-control" required>
                                  <option value="">Choose District</option>
                                  <?php
                                  foreach ($district as $value) {
                                      $selected = ($value['Sl_No'] == $admObj->getFormData('SNTCSSC_Dist')) ? 'selected' : '';
                                      echo "<option value='" . $value['Sl_No'] . "' " . $selected . ">" . $value['District'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_SNTCSSC_Dist" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!------------------SNTCSSC 2nd Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Address:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SNTCSSC_Address" name="SNTCSSC_Address" placeholder="Enter Address" value="<?=$admObj->getFormData('SNTCSSC_Address');?>"/>
                            </div>
                          </div>
                            <div id="err_SNTCSSC_Address" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >PIN:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SNTCSSC_PIN" name="SNTCSSC_PIN" placeholder="Enter Pin NO." value="<?=$admObj->getFormData('SNTCSSC_PIN');?>" />
                            </div>
                          </div>
                          <div id="err_SNTCSSC_PIN" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!------------------SNTCSSC 3rd Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Highest Qualification:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SNTCSSC_HQ" name="SNTCSSC_HQ" onkeypress="return /[a-zA-Z0-9\- ]/i.test(event.key)" value="<?=$admObj->getFormData('SNTCSSC_HQ');?>" placeholder="Enter highest qualification"/>
                            </div>
                          </div>
                          <div id="err_SNTCSSC_HQ" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Previously Appeared in UPSCCSE:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <!-- <select id="SNTCSSC_Previously_UPSCCSE" name="SNTCSSC_Previously_UPSCCSE" class="form-control">
                                  <option value="" class="hidden"> Choose Appearence</option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                               </select> -->

                               <select id="SNTCSSC_Previously_UPSCCSE" name="SNTCSSC_Previously_UPSCCSE" class="form-control">
                                    <option value="" class="hidden"> Choose Appearence</option>
                                    <?php
                                    $appearanceOptions = [
                                        'Yes' => 'Yes',
                                        'No' => 'No'
                                    ];
                                    foreach ($appearanceOptions as $value => $label) {
                                        $selected = ($value == $admObj->getFormData('SNTCSSC_Previously_UPSCCSE')) ? 'selected' : '';
                                        echo "<option value='" . $value . "' " . $selected . ">" . $label . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                          </div>
                          <div id="err_SNTCSSC_Previously_UPSCCSE" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!------------------SNTCSSC 4th Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" > NO. of Previous Appearances:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SNTCSSC_No_PA" name="SNTCSSC_No_PA" onkeypress="return /[0-9]/i.test(event.key)" value="<?=$admObj->getFormData('SNTCSSC_No_PA');?>" placeholder="Enter NO. of Previous Appearances"/>
                            </div>
                          </div>
                           <div id="err_SNTCSSC_No_PA" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                 </div><!--End SNTCSSC-->
                 <!-------------------start WBSIS----------------------------->
                 <div class="WBSIS">
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Date Of Birth:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_DOB" name="WBSIS_DOB" value="<?=$admObj->getFormData('WBSIS_DOB');?>" placeholder="Select DOB" autocomplete="off" readonly/>
                            </div>
                          </div>
                           <div id="err_WBSIS_DOB" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >State:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                            
                              <select id="WBSIS_State" name="WBSIS_State" class="form-control" required>
                                <option value="">Select State</option>
                                <?php
                                foreach ($state as $value) {
                                    $selected = ($value['SL'] == $admObj->getFormData('WBSIS_State')) ? 'selected' : '';
                                    echo "<option value='" . $value['SL'] . "' " . $selected . ">" . $value['State_Name'] . "</option>";
                                }
                                ?>
                            </select>
                            </div>
                          </div>
                          <div id="err_WBSIS_State" style="text-align: center;"></div>
                        </div>
                     </div> 
                     <!------------------WBSIS 1st Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row WBSIS_Dist_class" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <select id="WBSIS_Dist" name="WBSIS_Dist" class="form-control" required>
                                  <option value="">Select District</option>
                                  <?php
                                  foreach ($district as $value) {
                                      $selected = ($value['Sl_No'] == $admObj->getFormData('WBSIS_Dist')) ? 'selected' : '';
                                      echo "<option value='" . $value['Sl_No'] . "' " . $selected . ">" . $value['District'] . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                          <div id="err_WBSIS_Dist" style="text-align: center;"></div>
                          <div class="WBSIS_Other_State_class">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >Other District Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_Other_state" name="WBSIS_Other_district" onkeypress="return /[a-zA-Z ]/i.test(event.key)" value="<?=$admObj->getFormData('WBSIS_Other_district');?>" placeholder="Enter Other district name"/>
                            </div>
                          </div>
                          <div id="err_WBSIS_Other_state" style="text-align: center;"></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Area Location:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <!-- <select id="WBSIS_AreaLocation" name="WBSIS_AreaLocation" class="form-control" required >
                                <option value="">Select Area Location</option>
                                <option value="Rural">Rural</option>
                                <option value="Urban">Urban</option>
                              </select> -->

                              <select id="WBSIS_AreaLocation" name="WBSIS_AreaLocation" class="form-control" required>
                                  <option value="">Select Area Location</option>
                                  <?php
                                  $areaLocationOptions = [
                                      'Rural' => 'Rural',
                                      'Urban' => 'Urban'
                                  ];
                                  foreach ($areaLocationOptions as $value => $label) {
                                      $selected = ($value == $admObj->getFormData('WBSIS_AreaLocation')) ? 'selected' : '';
                                      echo "<option value='" . $value . "' " . $selected . ">" . $label . "</option>";
                                  }
                                  ?>
                              </select>
                            </div>
                          </div>
                           <div id="err_WBSIS_AreaLocation" style="text-align: center;"></div>
                        </div>
                     </div>
                     <!------------------WBSIS 2nd Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Area:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <!-- <select id="WBSIS_Area_Type" name="WBSIS_Area_Type" class="form-control" required >
                                <option value="">Select Area</option>
                                <option value="Corporation">Corporation</option>
                                <option value="Municipality">Municipality</option>
                                <option value="Panchayat">Panchayat</option>
                              </select> -->
                              
                              <select id="WBSIS_Area_Type" name="WBSIS_Area_Type" class="form-control" required>
                                <option value="">Select Area</option>
                                <?php
                                $areaTypeOptions = [
                                    'Corporation' => 'Corporation',
                                    'Municipality' => 'Municipality',
                                    'Panchayat' => 'Panchayat'
                                ];
                                foreach ($areaTypeOptions as $value => $label) {
                                    $selected = ($value == $admObj->getFormData('WBSIS_Area_Type')) ? 'selected' : '';
                                    echo "<option value='" . $value . "' " . $selected . ">" . $label . "</option>";
                                }
                                ?>
                            </select>
                            </div>
                          </div>
                          <div id="err_WBSIS_Area_Type" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >Crpn./Mncpt./Pancht. Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_AreaName" name="WBSIS_AreaName" onkeypress="return /[a-zA-Z0-9, ]/i.test(event.key)" value="<?=$admObj->getFormData('WBSIS_AreaName');?>" placeholder="Enter Crpn./Mncpt./Pancht. Name"/>
                            </div>
                          </div>
                          <div id="err_WBSIS_AreaName" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!------------------WBSIS 3rd Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" > Ward No./Block Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_WardBlock" name="WBSIS_WardBlock" value="<?=$admObj->getFormData('WBSIS_WardBlock');?>" placeholder="Enter Ward No./Block Name "/>
                            </div>
                          </div>
                           <div id="err_WBSIS_WardBlock" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >PIN Code:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_PIN" name="WBSIS_PIN" onkeypress="return /[0-9]/i.test(event.key)" maxlength="6" value="<?=$admObj->getFormData('WBSIS_PIN');?>" placeholder="Enter PIN Code"/>
                            </div>
                          </div>
                          <div id="err_WBSIS_PIN" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!------------------WBSIS 4th Row End-------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Previous Work Exp:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <select id="WBSIS_WorkExp" name="WBSIS_WorkExp" class="form-control" required >
                                <option value="">Select Work Experience</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select>
                            </div>
                          </div>
                          <div id="err_WBSIS_WorkExp" style="text-align: center;"></div>
                        </div>
                     </div>
                     <!------------------WBSIS 5th Row End-------------------->
                     <!--------WBSIS Company Name/Duration of Exp. add row----------->
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
                                  <input type="text" class="form-control" id="WBSIS_companyName1" name="WBSIS_companyName[]" placeholder="Enter cpmpany name" iden="course" />
                                </div>
                              </div>
                              <div id="err_WBSIS_companyName1" style="text-align: center;"></div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                <label class="col-sm-4 col-form-label" >Duration of Exp:&nbsp;&nbsp;</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="WBSIS_Dua_Exp1" name="WBSIS_Dua_Exp[]" placeholder="Enter Duration of Experience " iden="subject"/>
                                  </div>
                                </div>
                                <div id="err_WBSIS_Dua_Exp1" style="text-align: center;"></div>
                              </div>
                      </div>
                       <div align="center" id="WBSIS_err_add_button"></div>
                    </div>
                    <div id="WBSIS_Company_newRow"></div>
                    <div align="center" id="WBSIS_err_all"></div>
                    </div>
            <!---------------------WBSIS 6th Row End----------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Basic  :&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_BasisQua" name="WBSIS_BasisQua" placeholder="Enter basic qualification "  onkeypress="return /[a-zA-Z, ]/i.test(event.key)" value="<?=$admObj->getFormData('WBSIS_BasisQua');?>"/>
                            </div>
                          </div>
                          <div id="err_WBSIS_BasisQua" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >Discipline of Course:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_Dis_Cou" name="WBSIS_Dis_Cou" placeholder="Enter Discipline of Course" onkeypress="return /[a-zA-Z, ]/i.test(event.key)"  value="<?=$admObj->getFormData('WBSIS_Dis_Cou');?>"/>
                            </div>
                          </div>
                          <div id="err_WBSIS_Dis_Cou" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!---------------------WBSIS 7th Row End----------------------->
                     <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Year of Passing:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_Pass_Year" name="WBSIS_Pass_Year"  value="<?=$admObj->getFormData('WBSIS_Pass_Year');?>" placeholder="Enter passing year"/>
                            </div>
                          </div>
                          <div id="err_WBSIS_Pass_Year" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >Pct.of Marks:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_Pct_Markes" name="WBSIS_Pct_Markes" onkeypress="return /[0-9.]/i.test(event.key)" value="<?=$admObj->getFormData('WBSIS_Pct_Markes');?>" placeholder="Enter Pct.of marks "/>
                            </div>
                          </div>
                          <div id="err_WBSIS_Pct_Markes" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!---------------------WBSIS 8th Row End----------------------->
                     <div class="row"></br>
                     <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" > Additional Qualification:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                            <select id="Add_Qualification" name="Add_Qualification" class="form-control" required >
                                <option value="">Select Additional Qualification</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select>
                            </div>
                          </div>
                          <div id="err_Add_Qualification" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" > Pursuing Course:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="WBSIS_Pursuing_Cou" name="WBSIS_Pursuing_Cou" onkeypress="return /[a-zA-Z0-9, ]/i.test(event.key)" value="<?=$admObj->getFormData('WBSIS_Pursuing_Cou');?>" placeholder="Enter pursuing course"/>
                            </div>
                          </div>
                          <div id="err_WBSIS_Pursuing_Cou" style="text-align: center;"></div>
                        </div>
                     </div>
                     <!------------------WBSIS 5th Row End-------------------->
                     <!--------Additional Qualification (1) . add row----------->
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
                          </div>
                        </div>
                    </div>
                    <div id="WBSIS_AddQua_newRow"></div>
                    <div align="center" id="WBSIS_AddQua_err_all"></div>
                 </div><!--End WBSIS-->
                 <!-------------------------End WBSIS------------------------>
                 <div class="BS">
                  <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Class:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <select id="BS_Class" name="BS_Class" class="form-control" required >
                                <option value="">Select Class</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                              </select>
                            </div>
                          </div>
                           <div id="err_BS_Class" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >School Name:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="BS_SchoolName" name="BS_SchoolName" placeholder="" onkeypress="return /[a-zA-Z0-9 -]/i.test(event.key)" value="<?=$admObj->getFormData('BS_SchoolName');?>" placeholder="Enter School Name"/>
                            </div>
                          </div>
                          <div id="err_BS_SchoolName" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                 </div><!--End Banglar Siksha-->
                 <div class="Utsashree">
                   <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Job Position:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <select id="UTS_JobPosition" name="UTS_JobPosition" class="form-control" required >
                                <option value="">Select Job Position</option>
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                              </select>
                            </div>
                          </div>
                          <div id="err_UTS_JobPosition" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >OSMS No:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="UTS_OSMSNo" name="UTS_OSMSNo" value="<?=$admObj->getFormData('UTS_OSMSNo');?>"  onkeypress="return /[a-zA-Z0-9 /-]/i.test(event.key)" placeholder="Enter OSMS No"/>
                            </div>
                          </div>
                          <div id="err_UTS_OSMSNo" style="text-align: center;"></div>
                        </div>
                     </div> 
                     <!------------------End UTS 1st Row-------------------------->
                     <div class="row mt-1"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Staff Category:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <select id="UTS_StaffCategory" name="UTS_StaffCategory" class="form-control" required >
                                <option value="">Select Staff Category</option>
                                <option value="Teaching">Teaching</option>
                                <option value="Non-Teaching">Non-Teaching</option>
                              </select>
                            </div>
                          </div>
                          <div id="err_UTS_StaffCategory" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label" >Transfer Menu:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <select id="UTS_Trn_Manu" name="UTS_Trn_Manu" class="form-control" required >
                                <option value="">Select Transfer Menu</option>
                                <option value="General">General</option>
                                <option value="Mutual">Mutual</option>
                              </select>
                            </div>
                          </div>
                          <div id="err_UTS_Trn_Manu" style="text-align: center;"></div>
                        </div>
                     </div>
                      <!------------------End UTS 3rd Row-------------------------->
                      <div class="row mt-1"></br>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                            <label class="col-sm-4 col-form-label" >Present District:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <select id="UTS_Dist" name="UTS_Dist" class="form-control" required >
                                <option value="">Select District</option>
                                <?php
                                      foreach ($district as $value) {
                                          echo "<option value='" . $value['Sl_No'] . "' >" . $value['District'] . "</option>";
                                      }?>
                              </select>
                            </div>
                          </div>
                          <div id="err_UTS_Dist" style="text-align: center;"></div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                           <label class="col-sm-4 col-form-label"  id="UTS_lavel">Circle/Subdivision:&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="UTS_Circle_Sub" name="UTS_Circle_Sub"      onkeypress="return /[a-zA-Z0-9 -]/i.test(event.key)" value="<?=$admObj->getFormData('UTS_Circle_Sub');?>" placeholder="Enter Circle/Subdivision"/>
                            </div>
                          </div>
                          <div id="err_UTS_Circle_Sub" style="text-align: center;"></div>
                        </div>
                     </div> <!--row-->
                     <!------------------End UTS 4th Row-------------------------->
                        <div class="row mt-1"></br>
                              <div class="col-md-6">
                                <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                                  <label class="col-sm-4 col-form-label" >Institution/School Name:&nbsp;&nbsp;</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="UTS_InstSchoolName" name="UTS_InstSchoolName" onkeypress="return /[a-zA-Z0-9 -]/i.test(event.key)" value="<?=$admObj->getFormData('UTS_InstSchoolName');?>" placeholder="Enetr Institution/School Name"/>
                                  </div>
                                </div>
                                <div id="err_UTS_InstSchoolName" style="text-align: center;"></div>
                              </div>
                            <div class="col-md-6">
                              <div class="form-group row" style="padding-bottom: 0px; margin-bottom: 0px;">
                              <label class="col-sm-4 col-form-label"  id="UTS_lavel">Type of Transfer:&nbsp;&nbsp;</label>
                                <div class="col-sm-8">
                                  <select id="UTS_Typ_Transfer" name="UTS_Typ_Transfer" class="form-control" required >
                                    <option value="">Select Type of Transfer</option>
                                    <option value="Inter District">Inter District</option>
                                    <option value="Intra District">Intra District</option>
                                  </select>
                                </div>
                              </div>
                              <div id="err_UTS_Typ_Transfer" style="text-align: center;"></div>
                            </div>
                     </div> <!--row-->
                     <div class="row "></br>
                              <div class="col-md-6 mt-1">
                                <div class="form-group row">
                                   <label class="col-sm-4 col-form-label" >Preference District:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                                  <div class="col-sm-8">
                                    <select id="UTS_predist" name="UTS_predist" class="form-control" required >
                                      <option value="">Select Preference District</option>
                                      <option value="Yes" >Yes</option>
                                      <option value="No">No</option>
                                    </select>
                                    <span id="err_UTS_predist"></span>
                                  </div>
                                </div>
                            </div>
                     </div>
                      <!--row-->
                     <!------------------End UTS 4th Row-------------------------->
                     <div id="UTS_AddNewRow">
                        <input type="hidden" id="UTS_box_count" name="UTS_box_count" value="1">
                        <input type="hidden" id="UTS_box_string" name="UTS_box_string" value="1">
                        <div id="UTS_AddRow1" >
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
                          <div id="UTS_errAll" align="center"></div>
                      </div>
                 </div>
                 <!--End Utsashree-->
                 <div class="form-groupp row">
                      <label class="col-sm-2 col-form-label">Query Type<span
                              class="text_highling">*</span>:</label>
                      <div class="col-sm-4">
                          <select id="queryType" name="queryType" class="form-control" required>
                              <option value=" ">Select Query Type</option>
                                <?php if(count($quaryTypeArr) > 0) { 
                                  foreach ($quaryTypeArr as $item) { ?>
                                    <option value="<?php echo $item['chdqt_id']; ?>" <?php if ($item['chdqt_id'] == $admObj->getFormData('queryType')) {
                                    echo 'selected="selected"';} ?>><?php echo $item['chdqt_name']; ?></option>
                                <?php } }?>
                              </select>

                          <span class="text-danger font-italic" id="err_queryType"></span>
                      </div>
                      
                  </div>
                  <div class="form-groupp row">
                      <label class="col-sm-2 col-form-label">Details Complain<span
                              class="text_highling">*</span></label>
                      <div class="col-sm-4">
                          <!-- <select id="details_complain_type" name="details_complain_type" class="form-control" required  value="<?=$admObj->getFormData('details_complain_type');?>">
                            <option value="">Select Complain Type</option>
                           </select> -->

                           <select id="details_complain_type" name="details_complain_type" class="form-control" required>
                           <option value="">Select Complain Type</option>
                                <?php if(count($dtComplianArr) > 0) { 
                                  foreach ($dtComplianArr as $item) { ?>
                                    <option value="<?php echo $item['chd_cd_id']; ?>" <?php if ($item['chd_cd_id'] == $admObj->getFormData('details_complain_type')) {
                                    echo 'selected="selected"';} ?>><?php echo $item['chd_cd_name']; ?></option>
                                <?php } }?>
                            </select>


                          <span class="text-danger font-italic" id="err_details_complain_type"></span>
                      </div>
                      <label class="col-sm-2 col-form-label">Other Details Complain<span
                              class="text_highling">*</span>:</label>
                      <div class="col-sm-4">
                           <textarea type="text" class="form-control" id="dtOf_Query" name="dtOf_Query" placeholder="Enter answer of caller" autocomplete="off"><?=$admObj->getFormData('other_dtOf_Query');?></textarea>
                          <span class="text-danger font-italic" id="err_dtOf_Query"></span>
                      </div>
                  </div>
                  <div class="form-groupp row" >
                        <label class="col-sm-2 col-form-label">Answer to caller<span
                                class="text_highling">*</span>:</label>
                        <div class="col-sm-4">
                            <textarea type="text" class="form-control" id="ans_to_caller" name="ans_to_caller" placeholder="Enter answer of caller" autocomplete="off">INFORMED<?=$admObj->getFormData('ans_to_caller');?></textarea>
                            <span class="text-danger font-italic" id="err_ans_to_caller"></span>
                        </div>
                        <label class="col-sm-2 col-form-label">Call Status<span
                                class="text_highling">*</span>:</label>
                        <div class="col-sm-4">
                           <select id="callstatus" name="callstatus" class="form-control" required >
                            <option value="">Select Call Status</option>
                            <option value="c" selected>Closed</option>
                            <option value="o">Open</option>
                           </select>
                            <span class="text-danger font-italic" id="err_callstatus"></span>
                        </div>
                  </div>
               </div>
             </section>
              <div align="center" style="padding-top: 10px;">
                    <input type="button" name="inbound_call_save" id="inbound_call_save" class="btn btn-success rounded-pill m-2" value="Save">
                    <input type="button" name="btn_cancel" class="btn btn-danger rounded-pill m-2" value="Cancel" id="btn_cancel">
                  </a>
             </div>
         </div>
      </form>
        </div>
     </div>
       <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    <?php require_once 'includes/footer.php';?>
    </div><!--End content-wrapper-->
  </div>
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    <!--Start footer-->
    <!-----------For This Project Pourpose Use----------->
    <script src="assets/js/userJS/inboundcall.js?ver=<?=rand();?>"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js?verr=<?=time()?>"></script>>>>>>><script>
  document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('dropdown');
    const options = selectElement.options;

    for (let i = 0; i < options.length; i++) {
      const option = options[i];
      const fullText = option.getAttribute('data-full-text');
      
      if (fullText.length > 50) {
        const truncatedText = fullText.substring(0, 50) + '...';
        option.text = truncatedText;
      }
    }
  });
</script>