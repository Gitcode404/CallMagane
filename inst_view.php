<?php 
require_once("config/globalAdmData.php");
 //$instListArray=$admObj->getAllInstList($data);
  //var_dump($instListArray);  exit;

// $("#comAction").val('saveCompanyData');
if(isset($_REQUEST['userAction']) &&  $_REQUEST['userAction']=='saveInstData'){
   $admObj->saveInstData();
}
//echo "<pre>"; print_r($_REQUEST); exit;
if(isset($_REQUEST['search_action']) &&  $_REQUEST['search_action']=='doSearchInst'){
  /////Data save into Session variable process///////////////////
  $data = array();
  foreach($_REQUEST as $key=>$val) {
    if(is_array($val)) {
      for($s=0; $s < count($val); $s++) {
        $data[$key][$s] = $admObj->db->real_escape_string($val[$s]);
        $_SESSION[$admObj->projectSecrectName]["admin"]['inst-search'][$key] = $data[$key][$s];
      }
    } else {
      $data[$key] = $admObj->db->real_escape_string($val);
      $_SESSION[$admObj->projectSecrectName]["admin"]['inst-search'][$key] = $data[$key];
    }
  } 
  // echo "<pre>"; print_r($_SESSION); exit; 
  header("location:".$admObj->basePath."inst");  exit;
  ///////////End of data save into session variable process //////////
  //$instListArray= $admObj->getAllInstList();
}elseif(isset($_REQUEST['search_action']) &&  $_REQUEST['search_action']=='doSearchReset'){
  unset($_SESSION[$admObj->projectSecrectName]["admin"]['inst-search']);
  header("location:".$admObj->basePath."inst");  exit;
}

else{ 
   //$instListArray=$admObj->getAllInstList($data);
  //var_dump($instListArray);  exit;

//echo [$admObj->projectSecrectName; exit;
   //echo $_SESSION[$admObj->projectSecrectName]["admin"]['inst-search']['instCode'];  exit;
  if(!empty($_SESSION[$admObj->projectSecrectName]["admin"]['inst-search']['instCode']) || !empty($_SESSION[$admObj->projectSecrectName]["admin"]['inst-search']['instName']) || !empty($_SESSION[$admObj->projectSecrectName]["admin"]['inst-search']['distName']) || !empty($_SESSION[$admObj->projectSecrectName]["admin"]['inst-search']['instHeadMob']) ){
///echo "open"; exit;
      $data = array();
      foreach($_SESSION[$admObj->projectSecrectName]["admin"]['inst-search'] as $key=>$val) {
        if(is_array($val)) {
          for($s=0; $s < count($val); $s++) {
            $data[$key][$s] = $admObj->db->real_escape_string($val[$s]);
          }
        } else {
          $data[$key] = $admObj->db->real_escape_string($val);
        }
      }
     //echo "open"; exit;

      $instListArray=$admObj->getAllInstList($data);
  }else{  //echo "open";  exit;
    $data=$admObj->prvValidFormData($_REQUEST);
    $instListArray=$admObj->getAllInstList($data);
  }

  
}



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

//echo "<pre>"; print_r($data);  exit;


$distArray=$admObj->getDistDetails();
//echo "<pre>"; print_r($distArray);  exit;
//$deptList=$admObj->getdeptList();
$prvList=$admObj->getPreviledgeList();
require_once('includes/header.php'); 
?>
<style type="text/css">
  
</style>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">All Institute List</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Institute Module</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Institute List</li>
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
					<div class="card-header"><a href="javaScript:void(0);" data-toggle="modal" data-target="#newUserModal" class="btn btn-primary">Add New</a></div>                      
                  </div>
                <?php } ?>
                <?php if($accessListArray['isAdd']==1){ ?>
                  <div class="card">
                      <div class="card-body"> 
						<h4 class="page-title">Search Criteria</h4>  
                        <div class="row1">
                            <form method="post" id='searchForm'>
                              <input type="hidden" name="search_action" id='search_action'/>
                              <div class="row">
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Institute Code</label>
                                          <input value="<?php if(isset($data['instCode'])){echo $data['instCode'];} ?>"  placeholder="Institute Code" type="text" maxlength='6' name="instCode" id='instCode' class="form-control" />
                                      </div>
                                  </div>

                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Institute Name</label>
                                          <input value="<?php if(isset($data['instName'])){echo $data['instName'];} ?>" placeholder="Institute Name" type="text" name="instName" id='instName' class="form-control" />
                                      </div>
                                  </div>

                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>District</label>
                                          <select name="distName" id='distName' class="form-control">
                                            <option value="">Choose District</option>
                                              <?php foreach ($distArray as $key => $value) {?>
                                                  <option <?php if(isset($data['distName'])){ if($data['distName']==$value['wbchsedm_name']){echo "selected";} } ?>  value="<?= $value['wbchsedm_name']?>"> <?= $value['wbchsedm_name']?> </option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Institute Head Mobile</label>
                                          <input value="<?php if(isset($data['instHeadMob'])){echo $data['instHeadMob'];} ?>" placeholder="Institute Head Mobile" type="text" name="instHeadMob" id='instHeadMob' class="form-control" />
                                      </div>
                                  </div>

                              </div>

                              
                              
                            </form>
                        </div>
                          <a href="javaScript:void(0);" identifier='do_search' id='search_data'  class="btn btn-primary">SEARCH</a>
                          <button type="reset" identifier='reset_search'  class="btn btn-danger">Reset</button>
                      </div>
                  </div>
                   
                <?php } ?>
                <?php if($admObj::hasWithMessage('message')){ ?>
                    <?= $admObj::getWithMessage('message'); ?>
                <?php } ?>
              </div>
              <div class="card">
                <div class="card-body">
				<h4 class="page-title">Institute's Data Listing</h4>
				<hr>
                  <div class="table-responsive1">
                    <div class="pull-right" style="padding:10px;">
                         <!-- <input  data-table-id="deptTable" placeholder="SEARCH" type="search" class="form-control" name="speed_search" id='speed_search'>-->
                      </div>
                      <?php  if($instListArray && $accessListArray['isView']){ ?>
                          <table id='deptTable' class="table1 table-sm table-bordered">
                            <tr  style="background-color:#3c8dbc;color:white;">
                              <td class="col-1" width="" style="text-align: center;">Sr No</td>
                              <td class="col-sm-3">Name</td>
                              <td class="col-2">Code</td>
                              <td class="col-2">District</td>
                             
                              
                              <td class="col-2">Head Mobile</td>
                              <td align="center" class="col-2">Action</td>
                            </tr>
                            <?php foreach ($instListArray as $instKey => $instVal) {?>
                              <tr >
                                <td  class="col-1" style="text-align: center;"><?=$instKey+1?></td>
                                <td class="col-sm-3"   id=''><?= $instVal['wbchse_inst_name']?></td>
                               <td class="col-2" id=''><?= $instVal['wbchse_inst_code']?></td>
                                <td class="col-2" id=''><?= $instVal['wbchse_district_office_name']?></td>
                                

                                <td  class="col-2" id=''><?= $instVal['wbchse_inst_head_mobile']?></td>
                               
                                

                                <td class="col-2" align="center">
                                  <a  href="view-inst/<?= $instVal['wbchse_inst_code']?>/0">
                                          <i class="fa fa-eye" aria-hidden="true"></i>

                                        </a>
                                         <?php if($accessListArray['isEdit']==1){ ?>
                                              <a  href="view-inst/<?= $instVal['wbchse_inst_code']?>/1">
                                              <i class="fa fa-pencil" aria-hidden="true"></i>

                                            </a>
                                         <?php } ?>
                                  
                                </td>
                            </tr>
                           <?php  } ?>
                          </table>

                        <?php  }else{ ?>
                          <div style="margin-top:10px;padding: 10px;" class="alert alert-danger">
                            Sorry no result found
                          </div>
                        <?php } ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12" style="text-align: center;">
                                    <div class="pagination"><?=$_SESSION[$admObj->projectStaticSecrectName]["admin"]['page']['app-list']?></div>
                                </div>
                            </div>
                        </div>
                        

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
            <h5 class="modal-title"><i class="fa fa-star"></i> New Institute</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form method="post" id='userForm'>
                <input type="hidden" name="userAction" id='userAction' />
                <div class="row">
                   <div class="col-md-12">
                      <div class="form-group">
                        <label>Institute Name</label>
                        <input type="text" name="instName" id='instName' class="form-control" value="<?=$admObj->getFormData('instName')?>" placeholder="Institute Name" />
                        <div class="err" id='instNameErr'></div>
                     </div>
                   </div>
                   
                   

                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>District</label>
                          
                          <select name="instDistrict" id='instDistrict' class="form-control">
                              <option value="">Choose District</option>
                              <?php foreach ($distArray as $key => $value) {?>
                                  <option <?php if($admObj->getFormData('instDistrict')==$value['wbchsedm_name']){echo 'selected';} ?> value="<?= $value['wbchsedm_name']?>"> <?= $value['wbchsedm_name']?> </option>
                              <?php } ?>
                          </select>
                          <div class="err" id='instDistrictErr'></div>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Institute Code</label>
                            <input maxlength="11" type="text" name="instCode" id='instCode' value="<?=$admObj->getFormData('instCode')?>" class="form-control" placeholder="Institute Code" />
                            <div class="err" id='instCodeErr'></div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="instEmail" value="<?=$admObj->getFormData('instEmail')?>" placeholder="Email" id='instEmail'/>
                            <div class="err" id='instEmailErr'></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Head Phone</label>
                            <input maxlength="11" type="text" class="form-control" name="instHeadPhone" value="<?=$admObj->getFormData('instHeadPhone')?>" placeholder="Head Phone" id='instHeadPhone'/>
                            <div class="err" id='instHeadPhoneErr'></div>
                        </div>
                    </div>
                </div>
               
               
               
               
               <div class="form-group">
                  <label>Head Mobile (All Login Notiication send this number)</label>
                    <input maxlength="11" type="text" class="form-control" name="headMobile" value="<?=$admObj->getFormData('headMobile')?>" placeholder="Head Phone" id='headMobile'/>
                    <div class="err" id='headMobileErr'></div>
               </div>
               
                
               
                <div class="form-group">
                  <div class="text-center">
                     <button type="button" identifier='saveNewInst' class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    
                  </div>
                </div>
             </form>
          </div>
          
        </div>
      </div>
    </div>

    <!--Edit User Modal -->
    
    <!--End Of edit user Modal -->

   
  
  <!--Start footer-->
  <?php require_once('includes/footer.php'); ?>
    <script src="<?=$admObj->cssPath?>assets/js/inst_view.js?<?=time()?>"></script>