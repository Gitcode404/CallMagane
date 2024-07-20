<?php 
//ini_set("display_errors",0);
require_once("config/globalAdmData.php");
//require_once("config/globalLocalData.php");
$adminFullMenu=$admObj->getAdmFullMenuList();
$userDashboardMenu=$admObj->getClientDashboardMenu();
$education=$admObj->fetchTable('chde_id','chde_type_name','chd_education');
if(isset($_REQUEST['searchAction']) &&  $_REQUEST['searchAction']=='searchDocketData'){
   $searchVal=$admObj->searchData();
}else{
  $searchVal=$admObj->searchData();
}
$isAdmin=0;
if($_SESSION[$admObj->projectSecrectName]['admin']['log_id']==900069){
  $accessListArray['isEdit']=1;
  $accessListArray['isAdd']=1;
  $accessListArray['isView']=1;
  $accessListArray['isDel']=1;
  $isAdmin=1;
}else{
  $baseUrl=explode("/",$admObj->basePath);
  $baseUrl=array_values(array_filter($baseUrl));
  $requestUrl=$_SERVER['REQUEST_URI'];
  $rootName="/".end($baseUrl)."/";
  $invokeUrl=str_replace($rootName, '', $_SERVER['REQUEST_URI']);
  $accessListArray=$admObj->isAuthorisedUrl($invokeUrl);
}
//echo "<pre>"; print_r($accessListArray);  exit;
require_once('includes/header.php'); 
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css?<?=time()?>">
<style>
.btn_css {
  /*background-color: #ddd;*/
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 16px;
}

/*.btn_css:hover {
  background-color: #f1f1f1;
}*/
</style>
<style type="text/css">
  .table_class
  {
    width: 100%;
    /*table-layout: fixed;
    height: 60px;*/
     border-collapse: separate;
    border-spacing: 0 15px;
  }
  .table_class td.first { border-bottom: solid red 1px; }
  .table_class td.second { border-top: solid gold 1px; }
  .table_class td.third { border-bottom: solid yellow 1px; }
  .table_class td
  {
    min-width: 250px;
    max-width: 250px;"
    vertical-align: inherit;
    word-wrap: break-word;
    min-height: 160px;
    max-height: 160px;
    padding: 12px;
  }
  #example3 {
  /*border: 10px dotted black;
  padding: 5px;*/
   border-radius: 25px;
   display: inline-flex;
    padding: 3px;
    font-size: 24px;
    background-color: #43d9cf;
    color: #000000;
}
</style>
<div class="clearfix"></div>
    <div class="clearfix"></div>
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
        <h4 class="page-title">Docket  List</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">User Module</a></li>
            <li class="breadcrumb-item active" aria-current="page">Docket List</li>
         </ol>
     </div>
     </div>
      <?php if($accessListArray['isAdd']==1){ ?>
        <div class="card">
            <div class="card-body"> 
              <a href="incoming-call" class="btn btn-primary">Add New</a>
            </div>
        </div>
                   
      <?php } ?>
     </div>
     <div class="card">
        <div class="card-body">
          <form method="POST" id="searchForm">
            <input type="hidden" name="searchAction" id='searchAction' />
            <input type="hidden" name="log_id" id="log_id" value="<?php echo $_SESSION[$admObj->projectSecrectName]['admin']['log_id'];?>">
            <div class="row"></br>      
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-family: 'Calisto MT'"> Select Group:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-9">
                              <select id="educationGroup" name="educationGroup" class="form-control" required style="font-family: 'Calisto MT'">
                                <option value="">Select Group</option>
                                <?php
                                foreach ($education as $value) {
                                  echo "<option value='" .$value['chde_id']."' >" . $value['chde_type_name'] ."</option>";
                                }
                                ?>
                              </select>
                              <span id="err_educationGroup"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-family: 'Calisto MT'"> Call Type:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-9">
                              <select id="search_callType" name="search_callType" class="form-control" required style="font-family: 'Calisto MT'">
                                <option value="">Select Call Type</option>
                              </select>
                              <span id="err_searchcallType"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                     <div class="row">       
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-family: 'Calisto MT'">From Date:&nbsp;&nbsp;<span style="font-size: 18px;color: red">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="fromDate" name="fromDate" placeholder="" autocomplete="off" onkeypress="return /[]/i.test(event.key)"/>
                              <span id="err_fromDate"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" style="font-family: 'Calisto MT'">To Date:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="toDate" name="toDate" placeholder="" autocomplete="off" onkeypress="return /[]/i.test(event.key)"/>
                              <span id="err_toDate"></span>
                            </div>
                          </div>
                        </div>
                    </div><!--row--><hr> 
                    <div align="left">
                      <input type="button" name="btnSearch" id="btnSearch" class="btn-info btn_css m-2" value="Search">

                      <input type="button" name="btn_cancel" class="btn-danger btn_css m-2" value="Reset" id="btn_cancel">

                      <input type="button" name="btnExcel" class="btn-success btn_css m-2" value="Export Excel" id="btnExcel">
                    </div> 
                 </form>
        </div>
     </div>
    
       <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
  </div>
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  <!--<div class="modal fade" id="modal_Doc">
      <div class="modal-dialog modal-lg">
        <div class="modal-content animated zoomInUp">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-star"></i>User Deatils</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form method="post" id='userForm' enctype="multipart/form-data">
                <input type="hidden" name="userAction" id='userAction' />
                <input type="hidden" name="idvalue" id="idvalue">
             </form>
             <div id="data_val"></div>
          </div>
        </div>
      </div>
    </div>-->
    <!-- The Modal -->
<div class="modal" id="modal_Doc">
  <div class="modal-dialog  modal-lg animated zoomInUp">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-star"></i>Docket Deatils</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form method="post" id='userForm' enctype="multipart/form-data">
                <input type="hidden" name="userAction" id='userAction' />
                <input type="hidden" name="idvalue" id="idvalue">
             </form>
             <div id="data_val"></div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
  <!--Start footer-->
  <?php require_once('includes/footer.php'); ?>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js?verr=<?=time()?>"></script>
  <script src="<?=$admObj->cssPath?>assets/js/userJS/sear3ch.js?ver=<?=rand();?>"></script>
  <script type="text/javascript">
  </script>