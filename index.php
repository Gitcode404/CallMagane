<?php 

require_once("config/globalAdmData.php");
//$localMenuArray=$admObj->getDashboardLocalMenu();
//$userDashboardMenu=$admObj->getClientDashboardMenu();

$adminFullMenu=$admObj->getAdmFullMenuList();
//echo "<pre>"; print_r($adminFullMenu); exit;
$userDashboardMenu=$admObj->getClientDashboardMenu();
//echo $userDashboardMenu;  exit;
//echo "<pre>"; print_r($userDashboardMenu);  exit;
require_once('includes/header.php'); 
?>
<div class="clearfix"></div>
    <div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="col-ms-12">
      <?php if($admObj::hasWithMessage('message')){ ?>
          <?= $admObj::getWithMessage('message'); ?>
      <?php } ?>
    </div>
     <div class="container-fluid">
      <!----------------------------Admin Part---------------------->
      <?php if ($_SESSION[$admObj->projectSecrectName]['user']['roleId'] == 2){ ?>
        <div class="card">
        <div class="card-body">
            <div class="row mt-3">
              <?php if($adminFullMenu && $_SESSION[$admObj->projectSecrectName]['user']['log_id']==900069){ ?>
                 <?php foreach ($adminFullMenu as $menuKey => $menuVal) {?>
                    <?php if($menuVal['dirpm_id']!=39 ){ ?>
                     <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card border-info border-left-sm">
                          <div class="card-body">
                            <div class="media">
                            <div class="media-body text-left">
                              <h4 class="text-info"></h4>
                              <span><a href="<?=$admObj->url($menuVal['dirpm_url'])?>">
                                <?=$menuVal['dirpm_name']?> <br/>(  <small><?=$menuVal['dirpm_title']?></small> ) </a>

                              </span>
                            </div>
                            <div class="align-self-center w-circle-icon rounded-circle gradient-scooter">
                              <i class="<?=$menuVal['dirpm_icon']?> text-white"></i></div>
                          </div>
                          </div>
                        </div>
                      </div>
                 <?php } } ?>

              <?php }else{?>

                <?php if($userDashboardMenu){ ?>
                       <?php foreach ($userDashboardMenu as $menuKey => $menuVal) {?>
                           <div class="col-12 col-lg-6 col-xl-3">
                              <div class="card border-info border-left-sm">
                                <div class="card-body">
                                  <div class="media">
                                  <div class="media-body text-left">
                                    <h4 class="text-info"></h4>
                                    <span><a href="<?=$admObj->url($menuVal['dirpm_url'])?>"><?=$menuVal['dirpm_name']?> (  <small><?=$menuVal['dirpm_title']?></small> ) </a>

                                    </span>
                                  </div>
                                  <div class="align-self-center w-circle-icon rounded-circle gradient-scooter">
                                    <i class="<?=$menuVal['dirpm_icon']?> text-white"></i></div>
                                </div>
                                </div>
                              </div>
                            </div>
                       <?php } ?>

                        <?php } ?>

              <?php } ?>
      </div><!--End Row-->
        </div>
     </div>


     <!-------------------------------User Part------------------------------------>
      <?php } else {?>
        <div class="card">
        <div class="card-body">
            <div class="row mt-3">
              <?php if($adminFullMenu && $_SESSION[$admObj->projectSecrectName]['user']['log_id']==900069){ ?>
                 <?php foreach ($adminFullMenu as $menuKey => $menuVal) {?>
                  <?php if($menuVal['dirpm_id']!=39 ){ ?>
                     <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card border-info border-left-sm">
                          <div class="card-body">
                            <div class="media">
                            <div class="media-body text-left">
                              <h4 class="text-info"></h4>
                              <?php //print_r($menuVal['dirpm_id']);exit();?>
                               
                              <span><a href="<?=$admObj->url($menuVal['dirpm_url'])?>"><?=$menuVal['dirpm_name']?> <br/>(  <small><?=$menuVal['dirpm_title']?></small> ) </a>

                              </span>
                            </div>
                            <div class="align-self-center w-circle-icon rounded-circle gradient-scooter">
                              <i class="<?=$menuVal['dirpm_icon']?> text-white"></i></div>
                          </div>
                          </div>
                        </div>
                      </div>
                 <?php  } } ?>

              <?php }else{?>

                <?php if($userDashboardMenu){ ?>
                       <?php foreach ($userDashboardMenu as $menuKey => $menuVal) {?>
                           <div class="col-12 col-lg-6 col-xl-3">
                              <div class="card border-info border-left-sm">
                                <div class="card-body">
                                  <div class="media">
                                  <div class="media-body text-left">
                                    <h4 class="text-info"></h4>

                                   
                                    <span><a href="<?=$admObj->url($menuVal['dirpm_url'])?>">
                                      
                                      <?=$menuVal['dirpm_name']?> (  <small><?=$menuVal['dirpm_title']?></small> ) </a>

                                    </span>
                                  </div>
                                  <div class="align-self-center w-circle-icon rounded-circle gradient-scooter">
                                    <i class="<?=$menuVal['dirpm_icon']?> text-white"></i></div>
                                </div>
                                </div>
                              </div>
                            </div>
                       <?php  } ?>

                        <?php } ?>

              <?php } ?>
      </div><!--End Row-->
        </div>
     </div>
      <?php }?>
   </div>
    <!-- End container-fluid-->
    <!--Start Dashboard Content-->
      


      
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <?php require_once('includes/footer.php'); ?>