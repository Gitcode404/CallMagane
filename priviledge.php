<?php 
require_once("config/globalAdmData.php");
// $("#comAction").val('saveCompanyData');
if(isset($_REQUEST['comAction']) &&  $_REQUEST['comAction']=='savePreviledgeData'){
   $admObj->savePreviledge();
}
if(isset($_REQUEST['prvListAction']) &&  $_REQUEST['prvListAction']=='savePrvList'){
   $admObj->savePreviledgeList();
}
if(isset($_REQUEST['action']) &&  $_REQUEST['action']=='delete' &&  $_REQUEST['delId']!=''){
   $admObj->delCompany();
}
//$locArray=$admObj->getLocation();

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
$prvList=$admObj->getPreviledgeList();



//echo "<pre>"; print_r($prvList); exit;
require_once('includes/header.php'); 
?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">
          <div class="row pt-2 pb-2">
            <div class="col-sm-7">
            <h4 class="page-title">Privilege</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Privilege</li>
             </ol>
            </div>
         </div>
      <div class="row">
        <div class="col-lg-12">
          <div > <!--Please remove the height before using this page-->
              <div>
                
                <?php if($admObj::hasWithMessage('message')){ ?>
                    <?= $admObj::getWithMessage('message'); ?>
                <?php } ?>
              </div>

              <div class="card">
                  <div class="card-body">
                      <?php if($accessListArray['isAdd']==1){ ?>
                        <a href="javaScript:void(0);" data-toggle="modal" data-target="#newDeptModal" class="btn btn-primary">Add New</a>
                      <?php } ?>
                  </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <div class="pull-right" style="padding:10px;">
                          <input  data-table-id="deptTable" placeholder="SEARCH" type="search" class="form-control" name="speed_search" id='speed_search'>
                      </div>
                      <?php  if($prvList && $accessListArray['isView']==1){ ?>
                          <table id="deptTable" class="table">
                            <tr style="background-color:#3c8dbc;color:white;">
                              <td>Serial No</td>
                              <td>Name</td>
                              <td>Status</td>
                              <td>Action</td>
                            </tr>
                            <?php foreach ($prvList as $key => $value) {?>
                              <tr>
                                <td><?=$key+1?></td>
                                <td id='prv_name<?=$value['dirpp_id']?>'><?= $value['dirpp_name']?></td>
                                <input type="hidden" value="<?= $value['dirpp_status']?>" name="priv_status<?=$value['dirpp_id']?>" id='comp_status<?=$value['dirpc_id']?>'>
                                <td><?= $value['pro_status']?></td>
                                <td>
                                  <?php if($accessListArray['isEdit']==1){ ?>
                                  <i identifier='edit'  data-placement-id="<?=$value['dirpp_id']?>" class="fa fa-pencil green" aria-hidden="true"></i>
                                <?php } ?>
                                <?php if($accessListArray['isDel']==1){ ?>
                                  <i identifier='delete'  data-placement-id="<?=$value['dirpp_id']?>" class="fa fa-trash red" aria-hidden="true"></i>
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

    <div class="modal fade" id="newDeptModal">
      <div class="modal-dialog">
        <div class="modal-content animated zoomInUp">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-star"></i> New Priviledge</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form method="post" id='prvForm'>
                <input type="hidden" name="comAction" id='comAction'>
                <div class="form-group">
                  <label> Name</label>
                  <input type="text" name="prvName" id='prvName' placeholder="Priviledge Name" class="form-control">
                  <div class="err" id='prvNameErr'></div>
                </div>
               
                <div class="form-group">
                  <div class="text-center">
                     <button type="button" identifier='saveNewPrv' class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    
                  </div>
                </div>
             </form>
          </div>
          
        </div>
      </div>
    </div>

    <!---Edit Department -->

     <div class="modal fade" id="edit_CompModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content animated zoomInUp">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-star"></i> Update Priviledge</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form method="post" id='updatePrvForm'>
                
                <div class="form-group" id='prvList'>
                  <b>Please Wait..</b>
                </div>
                
                
                
             </form>
          </div>
          
        </div>
      </div>
    </div>
  
  <!--Start footer-->
  <?php require_once('includes/footer.php'); ?>
    <script src="<?=$admObj->cssPath?>assets/js/previledge.js?dfd"></script>