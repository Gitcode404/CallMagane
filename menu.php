<?php 
require_once("config/globalAdmData.php");
// $("#comAction").val('saveCompanyData');
if(isset($_REQUEST['action']) &&  $_REQUEST['action']=='saveMenuForm'){
   $admObj->saveNewMenu();
}
if(isset($_REQUEST['companyAction']) &&  $_REQUEST['companyAction']=='saveCompanyData'){
   $admObj->updateCompany();
}
if(isset($_REQUEST['action']) &&  $_REQUEST['action']=='delete' &&  $_REQUEST['delId']!=''){
   $admObj->delCompany();
}
$isAdmin=0;
//echo $_SESSION[$admObj->projectSecrectName]['admin']['log_id'];exit;
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
$menuList=$admObj->getAllAdminParentMenu();
$adminParentList=$menuList;
require_once('includes/header.php'); 
?>

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="row pt-2 pb-2">
        <div class="col-sm-7">
        <h4 class="page-title">Menu List</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Menu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menu List</li>
         </ol>
        </div>
     </div>
    <div class="col-ms-12">
      <?php if($admObj::hasWithMessage('message')){ ?>
          <?= $admObj::getWithMessage('message'); ?>
      <?php } ?>
    </div>
    <div class="container-fluid">
      <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="panel-default">
                    <div class="panel-body">
                      <?php if($accessListArray['isAdd']==1){ ?>
                       <a href="javascript:void(0);" data-toggle="modal" data-target="#newMenu" class="btn btn-primary">ADD NEW</a>
                    <?php } ?>
                    </div>
                  </div>
                </div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div >
            <?php if($adminParentList && $accessListArray['isView']==1){ ?>

              <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">
                    
                  </div> 
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="pull-right" style="padding:10px;">
                          <input  data-table-id="deptTable" placeholder="SEARCH" type="search" class="form-control" name="speed_search" id='speed_search'>
                      </div>
                    <div class="table-responsive">
                        <table id='deptTable' class="table table-bordered">

                      <tr style="background-color:#3c8dbc;color:white;">
                        <th width="15%" style="text-align: left">Sr No</th>
                        <th  width="15%" >Name</th>
                        <th  width="15%">Title</th>
                        <th>Menu Type</th>
                        <th  width="15%">Url</th>
                        <th  width="10%" align="center">Display Position</th>
                        <th  width="5%">Icon</th>
                        <th colspan="2"  width="5%">Status</th>
                        <!--<th width="15%">Action</th>-->
                        
                      </tr>
                      <?php foreach ($adminParentList as $menuKey => $menuVal) { 
                        $subMenuArray=$admObj->getProcedureResullt('08_get_chield_menu("'.$menuVal['dirpm_id'].'")');
                        ?>
                        <tr id="removePanel<?= $menuVal['dirpm_id']?>"<?= $menuVal['dirpm_id']?>>
                          <td width="15%" style="text-align: left;" ><b><?= $menuKey+1?>.</b></td>
                          <td id="menuName<?= $menuVal['dirpm_id']?>" width="15%"><?= $menuVal['dirpm_name']?></td>
                          <td id="menuTitle<?= $menuVal['dirpm_id']?>" width="15%"><?= $menuVal['dirpm_title']?></td>
                          <th id="appMenuType"><?= $menuVal['menuType']?></th>
                          <td id="menuUrl<?= $menuVal['dirpm_id']?>" width="10%"><?= $menuVal['dirpm_url']?></td>
                          <td id="menuDisOrder<?= $menuVal['dirpm_id']?>"  width="15%"><?= $menuVal['dirpm_display_order']?></td>
                           <td width="5%">
                            <input type="hidden" value="<?= $menuVal['dirpm_icon']?>" name="menuIcon<?= $menuVal['dirpm_id']?>" id='menuIcon<?= $menuVal['dirpm_id']?>'>
                            <i id="menuIconClass<?= $menuVal['dirpm_id']?>" class="<?= $menuVal['dirpm_icon']?>" aria-hidden="true"></i></td>
                           <td width="5%">
                            <input type="hidden" value="<?= $menuVal['active_status']?>" name="menu_active_status<?= $menuVal['dirpm_id']?>"  id="menu_active_status<?= $menuVal['dirpm_id']?>">
                            <span id='menuActiveStatus<?= $menuVal['dirpm_id']?>' <?php if($menuVal['dirpm_is_active']==1){ echo "class='badge bg-green'";}else{ echo "class='badge bg-red'";} ?> ><?= $menuVal['active_status']?></span>
                            <?= $menuVal['activeStatus']?>
                          </td>
                          <!--<td width="15%" > 
                          <?php if($accessListArray['isEdit']==1){ ?>
                            <span identifier='edit_menu' data-placement-id="<?= $menuVal['dirpm_id']?>" style='font-size: 17px;cursor: pointer;display: none;' class="fa fa-pencil"></span>
                          <?php } ?>  

                           <?php if($accessListArray['isDel']==1){ ?>
                             <span data-placement-id="<?= $menuVal['dirpm_id']?>" identifier='del-menu' style='font-size: 19px;color:#cf4747;cursor: pointer;display: none;' class="fa fa-remove"></span>
                            <?php } ?> 
                          </td>-->
                      </tr>
                      <?php if($subMenuArray){  ?>
                        <?php foreach($subMenuArray as $subKey=>$subVal){
                          $subMenuArray=$admObj->getProcedureResullt('32_get_chield_menu("'.$subVal['dirpm_id'].'")');
                         ?>
                            <tr id="removePanel<?= $subVal['dirpm_id']?>" style="background-color: #ffa50030">
                              <td width="15%" style="text-align: left;padding-left: 28px;" ><b><?= $subKey+1?>.</b></td>
                              <td  id="menuName<?= $subVal['dirpm_id']?>" width="15%"><?= $subVal['dirpm_name']?></td>
                              <td  id="menuTitle<?= $subVal['dirpm_id']?>"  width="15%"><?= $subVal['dirpm_title']?></td>
                              <th id="appMenuType"><?= $subVal['menuType']?></th>
                              <td  id="menuUrl<?= $subVal['dirpm_id']?>"  width="10%"><?= $subVal['dirpm_url']?></td>
                              <td   id="menuDisOrder<?= $subVal['dirpm_id']?>" width="15%"><?= $subVal['dirpm_display_order']?>
                                <input type="hidden" value="<?= $subVal['dirpm_icon']?>" name="menuIcon<?= $subVal['dirpm_id']?>" id='menuIcon<?= $subVal['dirpm_id']?>'>
                              </td>
                               <td width="5%"><i id="menuIconClass<?= $subVal['dirpm_id']?>" class="<?= $subVal['dirpm_icon']?>" aria-hidden="true"></i></td>
                               <td width="5%">
                                <input type="hidden" value="<?= $subVal['active_status']?>" name="menu_active_status<?= $subVal['dirpm_id']?>"  id="menu_active_status<?= $subVal['dirpm_id']?>">
                                <span id='menuActiveStatus<?= $subVal['dirpm_id']?>' <?php if($subVal['dirpm_is_active']==1){ echo "class='badge bg-green'";}else{ echo "class='badge bg-red'";} ?> ><?= $subVal['active_status']?></span></td>
                              <!--<td width="15%" > 
                                <?php if($accessListArray['isEdit']==1){ ?>
                                <span identifier='edit_menu' data-placement-id="<?= $subVal['dirpm_id']?>" style='font-size: 17px;cursor: pointer;display: none;' class="fa fa-pencil"></span>
                               <?php } ?>

                                <?php if($accessListArray['isDel']==1){ ?>
                                 <span data-placement-id="<?= $subVal['dirpm_id']?>" identifier='del-menu' style='font-size: 19px;color:#cf4747;cursor: pointer;display: none;' class="fa fa-remove"></span>
                                 <?php } ?>
                              </td>-->
                          </tr>
                          <?php if($subMenuArray){  ?>
                            <?php foreach($subMenuArray as $subKey=>$subVal){?>
                              <tr id="removePanel<?= $subVal['dirpm_id']?>" style="background-color: #ffa5000f;">
                              <td width="15%" style="text-align: left;padding-left: 42px;" ><b><?= $subKey+1?>.</b></td>
                              <td  id="menuName<?= $subVal['dirpm_id']?>" width="15%"><?= $subVal['dirpm_name']?></td>
                              <td  id="menuTitle<?= $subVal['dirpm_id']?>"  width="15%"><?= $subVal['dirpm_title']?></td>
                              <td  id="menuUrl<?= $subVal['dirpm_id']?>" width="10%"><?= $subVal['dirpm_url']?>
                                <input type="hidden" value="<?= $subVal['dirpm_icon']?>" name="menuIcon<?= $subVal['dirpm_id']?>" id='menuIcon<?= $subVal['dirpm_id']?>'>
                              </td>
                              <td  id="menuDisOrder<?= $subVal['dirpm_id']?>" width="15%"><?= $subVal['dirpm_display_order']?></td>
                               <td width="5%"><i  id="menuIconClass<?= $subVal['dirpm_id']?>" class="<?= $subVal['dirpm_icon']?>" aria-hidden="true"></i>
                                <input type="hidden" value="<?= $subVal['active_status']?>" name="menu_active_status<?= $subVal['dirpm_id']?>"  id="menu_active_status<?= $subVal['dirpm_id']?>">
                               </td>
                               <td width="5%"><span id='menuActiveStatus<?= $subVal['dirpm_id']?>' <?php if($subVal['dirpm_is_active']==1){ echo "class='badge bg-green'";}else{ echo "class='badge bg-red'";} ?> ><?= $subVal['active_status']?></span></td>
                              <!--<td width="15%" > 
                                <?php if($accessListArray['isEdit']==1){ ?>
                                  <span identifier='edit_menu' data-placement-id="<?= $subVal['dirpm_id']?>"  style='font-size: 17px;cursor: pointer;display: none;' class="fa fa-pencil"></span>
                                  <?php } ?>

                                  <?php if($accessListArray['isDel']==1){ ?>
                                   <span data-placement-id="<?= $subVal['dirpm_id']?>" identifier='del-menu' style='font-size: 19px;color:#cf4747;cursor: pointer;display: none;' class="fa fa-remove"></span>
                                   <?php } ?>
                              </td>-->
                          </tr>
                            <?php } ?>

                          <?php } ?>
                        <?php } ?>

                      
                      <?php } ?>
                      <?php } ?>
                      
                    </table>
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
                  
                </div>
                
              </div>

            <?php }else{ ?>

            <?php } ?>

          </div>
        </div>
      </div>

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!-- Mew menu create Modal-->
      <div class="modal fade" id="newMenu">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                
                  
                <h4 class="modal-title">New Menu</h4>
              </div>
              <div class="modal-body">
                <form role="form" id="admMenuForm" method="post">
                  <input type="hidden" name='action' id='action'>
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="menu_name" id='menu_name' class="form-control" placeholder="MENU NAME" />
                      <div class='err' id="menu_name_err"></div>
                    </div>
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="menu_title" id='menu_title' class="form-control" placeholder="MENU TITLE" />
                      <div class='err' id="menu_title_err"></div>
                    </div>
                    <div class="form-group">
                        <label>Menu Type</label>
                        <select name="menuDisplayType" id='menuDisplayType' class="form-control">
                          <option value="0">Admin Menu</option>
                          <option value="1">User Menu</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="">URL</label>
                      <input type="url" name="menu_url" id='menu_url' class="form-control" placeholder="MENU URL" />
                      <div class='err' id="menu_url_err"></div>
                    </div>
                    <div class="form-group">
                      <label for="">TYPE</label>
                      <select class="form-control" name='menu_type' id='menu_type'>
                          <option value="0">Master Menu</option>
                          <?php if($menuList){ ?>
                            <?php foreach ($menuList as $menuKey => $menuVal) {?>
                              <option value="<?= $menuVal['dirpm_id']?>"><?= $menuVal['dirpm_name']?></option>
                            <?php } ?>
                          <?php } ?>
                          
                      </select>
                    </div> 
                    <div class="form-group">
                      <label for="">Display Order</label>
                      <select class="form-control" name='menu_dis_order' id='menu_dis_order'>
                         <?php for($i=0;$i<=20;$i++){ ?>
                            <option value="<?= $i?>"><?= $i?></option>
                         <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">ICON</label>
                      <span class="pull-right">
                         <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Icon Reference</a>
                      </span>
                      <input type="url" name="menu_icon" id='menu_icon' class="form-control" placeholder="MENU ICON" />
                      
                      <div class='err' id="menu_icon_err"></div>
                      
                  </div>

                  <div class="form-group">
                      <label></label>
                      <div class="text-center">
                          <button type="button" identifier='saveMenu'  class="btn btn-primary">SAVE</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      
                  </div>
               
                </form> 
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
    <div>
 <!--Start footer-->
  <?php require_once('includes/footer.php'); ?>
    <script src="<?=$admObj->cssPath?>assets/js/menu.js?sd"></script>