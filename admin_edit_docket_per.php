<?php 
/**
* Project Name : Citizen Help Desk ::
* Page Name : Modify Docket Details
* Purpose of the Page : This page used for Active / Inactive edit button for users.
* Created By : Gobinda Prasad Bhunia & Santanu Sarkar
* Created on : 28 Sep, 2022
*/
require_once("config/globalAdmData.php");
$adminFullMenu=$admObj->getAdmFullMenuList();
$userDashboardMenu=$admObj->getClientDashboardMenu();
$userAAdmin=$admObj->userDtForAdmin();
//$activeInactive=$admObj->active_inactive();
if(isset($_REQUEST['active_inactive']) &&  $_REQUEST['active_inactive']=='successmessage'){
   $editPermission=$admObj->adminActiveInactive();
   
    //header("Refresh:0");
   //echo "<pre>"; print_r($editPermission);  exit;
   
}
$isAdmin=0;
if($_SESSION[$admObj->projectSecrectName]['user']['log_id']==900069){
  $accessListArray['isEdit']=1;
  $accessListArray['isAdd']=1;
  $accessListArray['isView']=1;
  $accessListArray['isDel']=1;
  $isAdmin=1;
}else{
  /*$invokeUrl=end(explode('/', $_SERVER['REQUEST_URI']));
  $accessListArray=$admObj->isAuthorisedUrl($invokeUrl);*/
/*------------Page Permission and Add /Remove /Edit Permission--------------*/
  $baseUrl=explode("/",$admObj->basePath);
  $baseUrl=array_values(array_filter($baseUrl));
  $requestUrl=$_SERVER['REQUEST_URI'];
  $rootName="/".end($baseUrl)."/";
  $invokeUrl=str_replace($rootName, '', $_SERVER['REQUEST_URI']);
  $accessListArray=$admObj->isAuthorisedUrl($invokeUrl);
}
require_once('includes/header.php');
?>
  <style type="text/css">
    .inbtn{
     height: 58px;
    width: 58px;
    display: inline-block;
    border-radius: 50%;
    font-size: large;
    font-weight: 500;
    /*margin-left: 7px;*/
    vertical-align: middle;
    /*background-color:  #d8d8d8 !important;*/
    text-align: center;
    -webkit-appearance: none;
    }
    .inbtn2{
      background: #f953c6;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #b91d73, #f953c6);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #b91d73, #f953c6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
  </style>
	<div class="clearfix"></div>
	<div class="content-wrapper">
    <div class="container-fluid">
    	<!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
          <h4 class="page-title">Active/Inactive</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Modify</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Edit Docket</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Details</li>
         </ol>
        </div>
     </div>
     <div class="col-ms-8">
      <?php if($admObj::hasWithMessage('message')){ ?>
          <?= $admObj::getWithMessage('message'); ?>
      <?php } ?>
    </div>
     <div class="card">
     	<div class="card-body">
     		<form method="POST" id="active_form">
     			<input type="hidden" name="active_inactive" id="active_inactive" />
     	<!--<div class="d-flex justify-content-center">
	                <div class="col-sm-5">
					    <div class="input-group mb-3">
			                <input type="text" class="form-control" name="search_box" id="search_box" placeholder="Search....">
			                <div class="input-group-append"><button class="btn btn-primary" id="btn-search" name="btn-search" type="button"><i class="fa fa-search" aria-hidden="true"></i></button></div>
						</div>
					</div>	
				</div>-->
        <div class="row"></br>       
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" style="font-family: 'Calisto MT'">Users:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
              <div class="col-sm-9">
                <select id="user_list" name="user_list" class="form-control" required style="font-family: 'Calisto MT'">
                  <option value="">Choose Users</option>
                  <?php
                  foreach ($userAAdmin as $values) {
                    echo "<option value='" .$values['CHDUSER_Id']."' >" . $values['fullName'] ."  -  ".$values['CHDUSER_Id']."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
            <div class="col-md-6">
                <div id="ajaxData"></div>
                <!--<input type="button" name="edit_per_btn" id="edit_per_btn" class="btn btn-danger">-->
            </div>
        </div><!--row-->
     		</form>
     	</div>
     </div>
    </div><!-----Container------->
   </div><!-----Wrwper---->
<!--Start footer-->
	<?php require_once('includes/footer.php'); ?>
  <!-- jQuery library -->

  <!-----------For This Project Pourpose Use----------->
  <script type="text/javascript">
  	$(document).ready(function(){
      $("#user_list").on('click',function(){
          userId = $.trim($("#user_list").val());
        //alert(userId);
            if($.trim($("#user_list").val()).length != 0){
                $.ajax({
                  type:'POST',
                  url:'ajax/ajaxcdn.php',
                  data:{'userId' : userId, 'data':6},
                  success:function(data){
                    $("#ajaxData").html(data);
                    $(document).ready(function(){
                       //$("#ajaxData").html(data);
                       $("#edit_per_btn").on('click',submitFun);
                     });
                  }
                });
            }else{ $("#ajaxData").html(''); }
         });



           //$("#edit_per_btn").on('click',submitFun);
      		  function submitFun(){
          			$("#active_inactive").val("successmessage");
          			$("#active_form").submit();
                //location.reload();
                //alert("hh");
      		  }
  	});
  </script> 