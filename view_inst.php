<?php //echo "open"; exit;
require_once("config/globalAdmData.php");
//////////////if already fill all related information the redirect to teacher list page ///////

$data=$admObj->prvValidFormData($_REQUEST);
//echo "<pre>"; print_r($data);  exit;
$instDetails=$admObj->getInstDetails($data['instId']);
$distDetails=$admObj->getDistDetails();  



if(isset($_REQUEST['actionType']) && $_REQUEST['actionType']=='updateForm'){
  $data=$admObj->prvValidFormData($_REQUEST);
  if($admObj->updateInformation($data)){
    header("location:".$admObj->basePath."inst"); exit;

  }
}

/////////Redirect to another page if request type not found
if($data['view_type']!=1  || $data['view_type']!=0 ){
  //$admObj->redirect('404');
}

//echo "<pre>"; print_r($instDetails); exit;
require_once('includes/header.php'); 

?>
<style type="text/css">
  .row{
    margin-top:10px;
    border:1px solid #ccc;
    padding: 5px;
  }
  .form-group label{
    color:#3c8dbc !important;
  }
  .col-md-4 label{
    color:#3c8dbc !important;
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

      <!--Start Dashboard Content-->
      <div class="card">
          <div class="card-body">
			<div style="text-align: center;">
			  <b> <?=$instDetails[0]['wbchse_inst_name'] ?> (<?=$instDetails[0]['wbchse_inst_code'] ?>)</b>
			  <input type="hidden" id="cssUrl" value="<?=$admObj->cssPath ?>">
			</div>
          </div>
      </div>
      <div class="card">
        <div class="col-md-12">
          <?php if($data['view_type']==1){ ?>
            <form method="post" id='instDataForm'>

              <input type="hidden" name="distId" id='distId' value="<?=$instDetails[0]['wbchse_dist'] ?>">

              <input type="hidden" name="blockId" id='blockId' value="<?=$instDetails[0]['wbchse_block'] ?>">

              <input type="hidden" name="subDivId" id='subDivId' value="<?=$instDetails[0]['wbchse_sub_divition'] ?>">

              <div class="card">
                  <div class="card-header">
                     <b>Provide Institution information</b>
                  </div>
                  <div class="card-body">
                     <div class="row">
                          <div class="col-md-4">
                            <div class="form-group"> 
                              <label>Name Of Institutions</label>
                              <input id='instName' name='instName' type="text"  value="<?=$instDetails[0]['wbchse_inst_name'] ?>" class="form-control" name="">
                            </div>
                          </div>

                        <div class="col-md-4">
                           <div class="form-group"> 
                              <label>Institutions Code</label>
                              <input type="text" readonly="" value="<?=$instDetails[0]['wbchse_inst_code'] ?>" class="form-control" name="">
                          </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label>Institution Email</label>
                                <input type="text" value="<?=$instDetails[0]['wbchse_inst_office_email'] ?>"   class="form-control" id='instEmail' name="instEmail">
                                <div class="err" id='instEmailErr'></div>
                            </div>
                        </div>
                     </div>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group"> 
                                  <label>Address</label>
                                  <input type="text" value="<?=$instDetails[0]['wbchse_address'] ?>"  class="form-control" id='address' name="address">
                                  <div class="err" id='addressErr'></div>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group"> 
                                  <label>Post Office</label>
                                  <input type="text" value="<?=$instDetails[0]['wbchse_po'] ?>"  class="form-control" id='po' name="po">
                                  <div class="err" id='poErr'></div>
                              </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group"> 
                                <label>PS.</label>
                                <input type="text" value="<?=$instDetails[0]['wbchse_ps'] ?>"  class="form-control" id='ps' name="ps">
                                <div class="err" id='psErr'></div>
                            </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group"> 
                                  <label>Pincode</label>
                                  <input type="text" maxlength="6" value="<?=$instDetails[0]['wbchse_pincode'] ?>"  class="form-control" id='pin' name="pin">
                                  <div class="err" id='pinErr'></div>
                              </div>
                          </div>


                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group"> 
                                <label>District</label>
                                <select class="form-control" id='dist' name="dist">
                                   <option  value="">Choose District</option>
                                   <?php if($distDetails){
                                    foreach ($distDetails as $distKey => $distVal) {?>

                                      <option value="<?= $distVal['wbchsedm_id']?>">
                                        <?= $distVal['wbchsedm_name']?>
                                      </option>
                                    <?php }
                                   } ?>
                                </select>
                                
                                <div class="err" id='distErr'></div>
                            </div>
                            
                          </div>
                          <div class="col-md-4">
                              <div class="form-group"> 
                                  <label>Sub Division</label>
                                  
                                  <select id='subDiv' name="subDiv" class="form-control">
                                     <option value="">Choose Sub Division</option>
                                  </select>
                                  <div class="err" id='subDivErr'></div>
                              </div>
                          </div>

                          <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label>Block / Municipality</label>
                                <select  class="form-control" id='block' name="block" >
                                  <option value="">Choose Block / Municipality  </option>
                                </select>
                                
                                <div class="err" id='blockErr'></div>
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-group"> 
                                  <label>Name Of Institution Head </label>
                                  <input type="text" value="<?=$instDetails[0]['wbchse_inst_tc_name'] ?>"  class="form-control" id='instHeadName' name="instHeadName">
                                  <div class="err" id='instHeadNameErr'></div>
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group"> 
                                  <label>Institution Head Phone</label>
                                  <input maxlength="11" type="text" value="<?=$instDetails[0]['wbchse_inst_head_phone'] ?>"   class="form-control" id='instHeadPhone' name="instHeadPhone">
                                  <div class="err" id='instHeadPhoneErr'></div>
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group"> 
                                  <label>Institution Head Mobile</label>
                                  <input maxlength="11" type="text" value="<?=$instDetails[0]['wbchse_inst_head_mobile'] ?>"   class="form-control" id='instHeadMobile' name="instHeadMobile">
                                  <div class="err" id='instHeadMobileErr'></div>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                         <div class="col-md-12">
                            <input type="hidden" name="actionType" id="actionType">
                            <input type="hidden" name="editId" value="<?=$instDetails[0]['wbchse_inst_code'] ?>">
                            <div class="form-group" style="text-align: center;">
                                <a href="javascript:void(0);" id='saveInstDetails' class="btn btn-primary">UPDATE</a>
                            </div>
                         </div>
                      </div>
                  </div>
              </div>
              
              


            </form>
          <?php }else if($data['view_type']==0){
            ?>
            <div class="card">
                <div class="card-header">Institution Information</div>
                <div class="card-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Name Of Institutions</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_inst_name'] ?>
                              </div>

                              <div class="col-md-4">
                                <label>Institutions Code</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_inst_code'] ?>
                              </div>

                              <div class="col-md-4">
                                <label>Institutions Email</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_inst_office_email'] ?>
                              </div>
                                
                            </div>


                            <div class="row">
                              <div class="col-md-12">
                                <label>Address</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_address'] ?>
                              </div>

                              
                                
                            </div>

                            <div class="row">

                              <div class="col-md-4">
                                <label>Pincode</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_pincode'] ?>
                              </div>
                              <div class="col-md-4">
                                <label>Post Office</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_po'] ?>
                              </div>

                              <div class="col-md-4">
                                <label>Police Station</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_po'] ?>
                              </div>
                                
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <label>District</label>
                                <br/>
                                <?=$instDetails[0]['wbchesbm_district_name'] ?>
                              </div>

                              <div class="col-md-4">
                                <label>Sub Division</label>
                                <br/>
                                <?=$instDetails[0]['wbchsesdm_subdist_name'] ?>
                              </div>

                              <div class="col-md-4">
                                <label>Block / Municipality</label>
                                <br/>
                                <?=$instDetails[0]['wbchesbm_subdivision_subname'] ?> (<?=$instDetails[0]['block_type'] ?>)
                              </div>
                                
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                <label>Name Of Institution Head</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_inst_tc_name'] ?>
                              </div>

                              <div class="col-md-4">
                                <label>Institution Head Phone</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_inst_head_phone'] ?>
                              </div>

                              <div class="col-md-4">
                                <label>Institution Head Mobile</label>
                                <br/>
                                <?=$instDetails[0]['wbchse_inst_head_mobile'] ?>
                              </div>
                                
                            </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php 
          }else{   // echo "opem";
           // $admObj->redirect('404');
          }?>


		<div style="text-align: center; margin-bottom: 20px;"><a href="<?=$admObj->url('inst')?> " class="btn btn-primary">Back</a></div>
		  </div>  
      </div>

      

     
   </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
  </div>
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->

	<?php require_once('includes/footer.php'); ?>
  <script src="<?=$admObj->cssPath?>assets/js/admin_inst_view.js?t=<?=time()?>"></script>

<script type="text/javascript">
 
</script>
