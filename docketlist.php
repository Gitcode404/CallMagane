<?php
// echo "<pre>";print_r($_REQUEST);exit;   

ob_start();
require_once "config/globalAdmData.php";
require_once 'config/PHPExcel-1.8/Classes/PHPExcel.php';
$adminFullMenu     = $admObj->getAdmFullMenuList();
$userDashboardMenu = $admObj->getClientDashboardMenu();
$userAAdmin = $admObj->userDtForAdmin();

$education   = $admObj->fetchTable('chde_id', 'chde_type_name', 'chd_education');
$district    = $admObj->DistrictFun();
$nature_call = $admObj->NatureCAllFun();
$queryTypes = $admObj->fetchTable('chdqt_id', 'chdqt_name', 'chd_query_type');

/**Edit docket count */



if (isset($_REQUEST['searchAction']) && $_REQUEST['searchAction'] == "edit_count") {
    $edit_doc = $admObj->EditCountFun();
    if ($edit_doc) {
        $objPHPExcel = new PHPExcel();
        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
        $objPHPExcel->setActiveSheetIndex();
        $default_border = array(  
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => 'FFFFFF'),
        );
        $style_header = array(
            'borders' => array(
                'bottom' => $default_border,
                'left'   => $default_border,
                'top'    => $default_border,
                'right'  => $default_border,
            ),
            'fill'    => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '3A9733'),
            ),
        );

        $styleArray = array(
            'font' => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 11,
            ),
        );
        $objPHPExcel->getActiveSheet()->freezePane('A2');
        $styles = 'A1:H1';
        for ($i = 0, $num = 1; $i < count($edit_doc); $i++, $num++) {
            for ($j = 0, $colNum = 1, $char = 'A'; $j < count($edit_doc[$i]); $j++, $char++, $colNum++) {
                if ($i == 0) {
                    $objPHPExcel->getActiveSheet()->getStyle($styles)->applyFromArray($styleArray);
                } else {
                    $objPHPExcel->getActiveSheet()->getStyle($styles)->applyFromArray($style_header);
                }
                    $objPHPExcel->getActiveSheet()->setCellValue($char . $num, strtoupper($edit_doc[$i][$j]));
            }
        }
        $objPHPExcel->getActiveSheet()->setTitle('Edit-Docket');
        $objPHPExcel->setActiveSheetIndex();
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Edit-Docket.xlsx"');
        header("Pragma: no-cache");
        header("Expires: 0");
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        //ob_end_clean();
        exit;
    }
}
 
/**Docket Call Excel report */
if (isset($_REQUEST['searchAction']) && $_REQUEST['searchAction'] == "success-Excle") {
    // echo "hello1";exit;
    list($ExportExcle, $abbr) = $admObj->exportExcle();
    if ($ExportExcle) {
  /** Error reporting */
  // error_reporting(E_ALL);
  //ini_set('display_errors', TRUE);
  //ini_set('display_startup_errors', TRUE);
  //date_default_timezone_set('Europe/London');
  //define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
  /** Include PHPExcel */
  //require_once ('config/PHPExcel-1.8/Classes/PHPExcel.php');

  // Create new PHPExcel object
  //echo date('H:i:s') , " Create new PHPExcel object" , EOL;
  //  echo "<pre>"; print_r($ExportExcle); exit;
  //  echo $abbr; exit;
        $objPHPExcel = new PHPExcel();
        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
////////////////   EXPORT TO EXCEL CODE //////////////////////
        $objPHPExcel->setActiveSheetIndex();
        $default_border = array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => 'FFFFFF'),
        );
        $style_header = array(
            'borders' => array(
                'bottom' => $default_border,
                'left'   => $default_border,
                'top'    => $default_border,
                'right'  => $default_border,
            ),
            'fill'    => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '3A9733'),
            ),
        );

        $styleArray = array(
            'font' => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 11,
            ),
        );
        $objPHPExcel->getActiveSheet()->freezePane('A2');
        if ($abbr == 'EPN' || $abbr == 'WBH') {
            $styles = 'A1:Q1';
        } else if ($abbr == 'SVM') {
            $styles = 'A1:X1';
        } else if ($abbr == 'SNT') {
            $styles = 'A1:Y1';
        } else if ($abbr == 'ADM') {
            $styles = 'A1:Z1';
        } else if ($abbr == 'SIS') {
            $styles = 'A1:AH1';
        } else if ($abbr == 'BNS') {
            $styles = 'A1:O1';
        } else if ($abbr == 'UTS') {
            $styles = 'A1:Z1';
        } else if ($abbr == 'SCC') {
            $styles = 'A1:AA1';
        } else if ($abbr == 'MST') {
            $styles = 'A1:Y1';
        }

        for ($i = 0, $num = 1; $i < count($ExportExcle); $i++, $num++) {
            for ($j = 0, $colNum = 1, $char = 'A'; $j < count($ExportExcle[$i]); $j++, $char++, $colNum++) {
                //$columnNum = $admObj->GetColumnNameFromNumber($colNum);
                if ($i == 0) {
                    $objPHPExcel->getActiveSheet()->getStyle($styles)->applyFromArray($styleArray);
                    //$objPHPExcel->getActiveSheet()->setCellValue($char.$num,$ExportExcle[$i][$j]);
                    //$objPHPExcel->getActiveSheet()->setCellValueExplicit($char.$num,$ExportExcle[$i][$j],PHPExcel_Cell_DataType::TYPE_STRING);
                } else {
                    $objPHPExcel->getActiveSheet()->getStyle($styles)->applyFromArray($style_header);
                    //$objPHPExcel->getActiveSheet()->setCellValue($char.$num,$ExportExcle[$i][$j]);
                }

                if ($char == 'C' || $char == 'D') {
                    //echo "<br>ColumnNumber=".$columnNum.",RowNumber=".$num;
                    //$objPHPExcel->getActiveSheet()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    //$objPHPExcel->getActiveSheet()->setCellValue($columnNum.$num,$ExportExcle[$i][$j]);
                    // $valuee=strtoupper($ExportExcle[$i][$j]);
                    $objPHPExcel->getActiveSheet()->setCellValueExplicit($char . $num, strtoupper($ExportExcle[$i][$j]), PHPExcel_Cell_DataType::TYPE_STRING);
                } else if ($char == 'G') {
                    $objPHPExcel->getActiveSheet()->setCellValue($char . $num, $ExportExcle[$i][$j]);
                } else {
                    // $valuee=strtoupper($ExportExcle[$i][$j]);
                    $objPHPExcel->getActiveSheet()->setCellValue($char . $num, strtoupper($ExportExcle[$i][$j]));
                }
            }
        }
        $objPHPExcel->getActiveSheet()->setTitle('Docket-Details');
        $objPHPExcel->setActiveSheetIndex();
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Docket-Details.xlsx"');
        header("Pragma: no-cache");
        header("Expires: 0");

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        //ob_end_clean();
        exit;

    }
}

/////////////////////Search and Reset Part////////////////////////

if (isset($_REQUEST['searchAction']) && $_REQUEST['searchAction'] == 'searchDocketData') {
     //echo "hi";exit;
    $data = array();
    foreach ($_REQUEST as $key => $val) {
        if (is_array($val)) {
            for ($s = 0; $s < count($val); $s++) {
                $data[$key][$s]= $admObj->db->real_escape_string($val[$s]);
                $_SESSION[$admObj->projectSecrectName]["user"]['search-export'][$key] = $data[$key][$s];
            }
        } else {
            $data[$key]= $admObj->db->real_escape_string($val);
            $_SESSION[$admObj->projectSecrectName]["user"]['search-export'][$key] = $data[$key];
        }
    }
    header("Location:" . $admObj->cssPath . "docket-list");
    exit;
} else {
    if (isset($_REQUEST['searchAction']) && $_REQUEST['searchAction'] == 3) {
        unset($_SESSION[$admObj->projectSecrectName]["user"]['search-export']);
        header("Location:" . $admObj->cssPath . "docket-list");
        exit;
    } else {
        if (isset($_SESSION[$admObj->projectSecrectName]["user"]['search-export']['educationGroup']) || isset($_SESSION[$admObj->projectSecrectName]["user"]['search-export']['search_callType']) || isset($_SESSION[$admObj->projectSecrectName]["user"]['search-export']['user_list']) || isset($_SESSION[$admObj->projectSecrectName]["user"]['search-export']['fromDate']) || isset($_SESSION[$admObj->projectSecrectName]["user"]['search-export']['toDate'])) {
            $data = array();
            foreach ($_SESSION[$admObj->projectSecrectName]["user"]['search-export'] as $key => $val) {
                if (is_array($val)) {
                    for ($s = 0; $s < count($val); $s++) {
                        $data[$key][$s] = $admObj->db->real_escape_string($val[$s]);
                    }
                } else {
                    $data[$key] = $admObj->db->real_escape_string($val);
                }
            }
            $searchVal = $admObj->searchData($data);
            $searchDataArray = $data;
        } else {
            unset($_SESSION[$admObj->projectSecrectName]["user"]['search-export']);
            $searchVal = $admObj->loadsearchData();
        }
    }
}

$isAdmin = 0;
$isUser  = 0;
if ($_SESSION[$admObj->projectSecrectName]['user']['log_id'] == 900069) {
    $accessListArray['isEdit'] = 1;
    $accessListArray['isAdd']  = 1;
    $accessListArray['isView'] = 1;
    $accessListArray['isDel']  = 1;
    $isAdmin                   = 1;
    $isUser                    = 1;
} else {
    $baseUrl         = explode("/", $admObj->basePath);
    $baseUrl         = array_values(array_filter($baseUrl));
    $requestUrl      = $_SERVER['REQUEST_URI'];
    $rootName        = "/" . end($baseUrl) . "/";
    $invokeUrl       = str_replace($rootName, '', $_SERVER['REQUEST_URI']);
    $accessListArray = $admObj->isAuthorisedUrl($invokeUrl);
}

/*-----------------------For ajax------------------------------------*/
$callTypeArr = array();
if (isset($data['educationGroup'])) {
    if (strlen($data['educationGroup']) > 0) {
        $callTypeArr = $admObj->ajaxfetch('chdc_type_id', 'chdct_name', 'chd_call_type', 'chdct_reff_id_edu', $data['educationGroup'], 'chdct_name');
    }
}

require_once 'includes/header.php';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css?<?=time()?>">
<link rel="stylesheet" href="<?=$admObj->cssPath?>assets/css/docketList.css?<?=time()?>" type="text/css">
<div class="clearfix"></div>
    <div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
       <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
        <h4 class="page-title">Docket  Listing</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Docket</a></li>
            <li class="breadcrumb-item active" aria-current="page">Docket Listing</li>
         </ol>
     </div>
     </div>
     <!------------------------User Pourpose------------------------->

      <?php if ($accessListArray['isAdd'] == 1) {?>
         <div class="card">
            <div class="card-body">
              <a href="incoming-call" class="btn btn-primary">New Docket</a>
            </div>
         </div>
       <?php }?>
    </div>
      <div class="col-ms-8" id="error-success-msg">
      <?php if ($admObj::hasWithMessage('message')) {?>
          <?=$admObj::getWithMessage('message');?>
      <?php }?>
      </div>
     <div class="card">
        <div class="card-body">
        <h4 class="page-title">Search Criteria</h4>
        <hr>
          <form method="POST" id="searchForm">
                        <input type="hidden" name="searchAction" id='searchAction'/>
                        <input type="hidden" name="editCount" id='editCount'/>
                        <input type="hidden" name="log_id" id="log_id" value="<?php echo $_SESSION[$admObj->projectSecrectName]['user']['log_id']; ?>">
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Select Group:&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <select id="educationGroup" name="educationGroup" class="form-control">
                                <option value="">Select Group</option>
                                <?php foreach ($education as $value) {?>
                                  <option value="<?php echo $value['chde_id']; ?>
                                  "<?php if (isset($searchDataArray['educationGroup'])) {if ($searchDataArray['educationGroup'] != '') {if ($value['chde_id'] == trim($searchDataArray['educationGroup'])) {
                                 echo 'selected="selected"';}}}?>><?php echo $value['chde_type_name']; ?>
                                     </option>
                                     <?php }?>
                              </select>
                              <span id="err_educationGroup"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Call Type:&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <select id="search_callType" name="search_callType" class="form-control" value="">
                                <option value="">Select Call Type</option>
                                <?php foreach ($callTypeArr as $i) {?>
                                  <option value="<?=$i['chdc_type_id']?>" <?php if (isset($searchDataArray['search_callType'])) {if ($searchDataArray['search_callType'] == $i['chdc_type_id']) {echo 'selected="selected"';}}?>><?=$i['chdct_name']?></option>
                                <?php }?>
                              </select>
                              <span id="err_searchcallType"></span>
                            </div>
                          </div>
                        </div>
                     </div> <!--row-->
                      <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Users:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <select id="user_list" name="user_list" class="form-control" required>
                                <option value="">Choose Users</option>
                                <?php foreach ($userAAdmin as $values) {?>
                                <?php if ($_SESSION[$admObj->projectSecrectName]['user']['roleId'] == 1) {?>
                                    <?php if ($_SESSION[$admObj->projectSecrectName]['user']['log_id'] == $values['CHDUSER_Id']) {?>
                                  <option value="<?php echo $values['CHDUSER_Id']; ?>"<?php if (isset($data['user_list'])) {if ($data['user_list'] != '') {if ($values['CHDUSER_Id'] == $data['user_list']) {echo 'selected="selected"';}}}?>><?php echo  $values['fullName']. "  -  " . $values['CHDUSER_NGS']; ?>
                                  </option>
                                <?php }} else {?>
                                  <option value="<?php echo $values['CHDUSER_Id']; ?>"<?php if (isset($data['user_list'])) {if ($data['user_list'] != '') {if ($values['CHDUSER_Id'] == $data['user_list']) {echo 'selected="selected"';}}}?>><?php echo  $values['fullName']. "  -  " . $values['CHDUSER_NGS']; ?>
                                  </option>
                                <?php }}?>
                              </select>
                              <span id="err_user"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Query Type:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                            <select id="queryType" name="query_type" class="form-control" required>
                                <option value="">Choose Query Type</option>
                                <?php foreach ($queryTypes as $i) {?>
                                  <option value="<?=$i['chdqt_id']?>" <?php if (isset($data['query_type'])) {if ($data['query_type'] == $i['chdqt_id']) {echo 'selected="selected"';}}?>><?=$i['chdqt_name']?></option>
                                <?php }?>
                              </select>
                              <span id="err_query_type"></span>
                            </div>
                          </div>
                        </div>
                    </div><!--row-->
                    <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">District:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <select id="district" name="district" class="form-control" required>
                                <option value="">Choose District</option>
                            <?php foreach ($district as $i) {?>
                                  <option value="<?=$i['Sl_No']?>" <?php if (isset($data['district'])) {if ($data['district'] == $i['Sl_No']) {echo 'selected="selected"';}}?>><?=$i['District']?></option>
                                <?php }?>
                              </select>
                              <span id="err_district"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nature of Calls:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <select id="nature_call" name="nature_call" class="form-control" required>
                                <option value="">Choose Nature of Calls</option>
                                  <?php foreach ($nature_call as $i) {?>
                                  <option value="<?=$i['chd_nature_call_id']?>" <?php if (isset($data['nature_call'])) {if ($data['nature_call'] == $i['chd_nature_call_id'])
                                     {echo 'selected="selected"';}}?>><?=$i['chd_nature_call_name']?></option>
                                <?php }?>
                              </select>
                              <span id="err_nature"></span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row"></br>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Call Status:<span id="call_status"></span>&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <select id="call_status" name="call_status" class="form-control" required>
                                <option value="">Choose call status</option>
                                <option value="o" <?php if (isset($data['call_status'])) {if ($data['call_status'] == 'o')
                                     {echo 'selected="selected"';}}?>>Open</option>
                                <option value="c" <?php if (isset($data['call_status'])) {if ($data['call_status'] == 'c')
                                     {echo 'selected="selected"';}}?>>Closed</option>
                              </select>
                              <span id="err_call_status"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          
                        </div>
                    </div>
                    <hr>
                     <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >From Date:&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="fromDate" name="fromDate" placeholder="" autocomplete="off" value="<?php if (isset($data['fromDate'])) {if ($data['fromDate'] != '') {echo $data['fromDate'];}}?>" readonly/>
                              <span id="err_fromDate"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">To Date:<span id="callerEmail"></span>&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="toDate" name="toDate" placeholder="" autocomplete="off"  value="<?php if (isset($data['toDate'])) {if ($data['toDate'] != '') {echo $data['toDate'];}}?>" readonly/>
                              <span id="err_toDate"></span>
                            </div>
                          </div>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Docket Id:&nbsp;&nbsp;</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="search-docket-id" name="search-docket-id" value="<?php if (isset($data['search-docket-id'])) {if ($data['search-docket-id'] != '') {echo $data['search-docket-id'];}}?>"/>
                              <span id="err-search-docket-id"></span>
                            </div>
                          </div>
                        </div>
                    </div>
                      <div align="left">
                      <input type="button" name="btnSearch" id="btnSearch" class="btn btn-info btn_css" value="Search">&nbsp;&nbsp;
                      <input type="button" name="btn_cancel" class="btn btn-danger btn_css" value="Reset" id="btn_cancel">

                      <?php if ($_SESSION[$admObj->projectSecrectName]['user']['roleId'] == 2 || $_SESSION[$admObj->projectSecrectName]['user']['roleId'] == 100) {?>
                        <input type="button" name="btnExcel" class="btn btn-success m-2" value="Export Excel" id="btnExcel">
                      <?php }?>

                      <?php

                    if ($_SESSION[$admObj->projectSecrectName]['user']['roleId']==2 || $_SESSION[$admObj->projectSecrectName]['user']['roleId'] == 100) {?>
                             <input type="button" name="btnEditCount" class="btn btn-success m-2" value="Edit Docket List " id="btnEditCount">
                      <?php }?>
                    </div>
                 </form>
        </div>
     </div>
     <div class="card">
                <div class="card-body">
                  <h4 class="page-title">Docket Listing</h4>
                 
              <span id="open_call_mess" style="float:right; margin-bottom:20px;"></span> 
                  <hr>
                  <div>
                    <?php
                    if (is_array($searchVal) && count($searchVal) > 0) {?>
                          <table  style="table-layout: fixed; width: 100%" class="table-sm table-bordered">
                            <tr style="background-color:#3c8dbc;color:white;">
                              <td width="4%" align="center">#</td>
                              <td width="15%" align="center">Docket no</td>
                              <td align="center">Name</td>
                              <td width="12%" align="center">Education Group</td>
                              <td width="18%" align="center">Call Type</td>
                              <td width="10%" align="center">Ph Number</td>
                              <td width="10%" align="center">Action </td>
                            </tr>
                            <tbody id='deptTable'>
                              <?php
                            $counter = 1;
                                if (isset($_REQUEST['page'])) {
                                    $autoCounter = ($_REQUEST['page'] - 1) * 20;
                                }
                                foreach ($searchVal as $key => $value) { ?>
                                 <tr>
                                    <td align="center"><?=($autoCounter + $key + 1)?></td>
                                    <td align=" center"><?=$value['CHDIC_docket_no']?></td>
                                    <td ><?=$value['CHDIC_caller_name'];?></td>
                                    <td align="center"><?=$value['chde_type_name']?></td>
                                    <td align="center"><?=$value['chdct_name']?></td>
                                    <td align="center"><?=$value['CHDIC_caller_phNo']?>
                                    <div style="display: none;" id="jsonData<?=$key?>">
                                        <?=json_encode($value);?>
                                </div>
                                    </td>
                                    <td align="center"><a docket-action='doc_view' data-id="<?=$value['CHDIC_docket_no']?>" class="" href="javascript:void(0);" style="text-decoration:none;"><img src="assets/images/search.png" alt="" title="" border="0" /></a>
                                      <?php
                                 if ($_SESSION[$admObj->projectSecrectName]['user']['roleId'] == 1) {
                                if ($value['CHDIC_Status_DocPer'] == 0 || $_SESSION[$admObj->projectSecrectName]['user']['log_id'] == 900069) {?>
                                          <a docket-action='doc_view' data-id="<?=$value['CHDIC_docket_no']?>" class="" href="incoming-call-edit?docID=<?=$value['CHDIC_docket_no']?>" style="text-decoration:none;"><img src="assets/images/editButton2.png" alt="Edit Image" title="" border="0" /></a>
                                          <?php } else if ($value['CHDIC_Status_DocPer'] == 1 || $_SESSION[$admObj->projectSecrectName]['user']['log_id'] == 900069) {?>
                                          <?php }
                                       } else if ($_SESSION[$admObj->projectSecrectName]['user']['roleId'] == 2) {?>
                                      <input type="hidden" name="ajaxCallLock<?=$value['CHDIC_docket_no']?>" id="ajaxCallLock<?=$value['CHDIC_docket_no']?>" value="0">
                                      <span id="LockUnlockDiv<?=$value['CHDIC_docket_no']?>">
                                      <?php
                                        if ($value['CHDIC_Status_DocPer'] == 0) {?>
                                          &nbsp;&nbsp;&nbsp;<a docket-id='doc_view' data-id="<?=$value['CHDIC_docket_no']?>" statusVal="<?=$value['CHDIC_Status_DocPer']?>" class="" href="javascript:void(0);" style="text-decoration:none;"><img src="assets/images/active.jpg" alt="" title="" border="0" style="height: 21px; width:47px" /></a>
                                      <?php } else if ($value['CHDIC_Status_DocPer'] == 1) { ?>
                                            &nbsp;&nbsp;&nbsp;<a docket-id='doc_view' data-id="<?=$value['CHDIC_docket_no']?>" statusVal="<?=$value['CHDIC_Status_DocPer']?>" class="" href="javascript:void(0);" style="text-decoration:none;"><img src="assets/images/inactive.jpg" alt="" title="" border="0" style="height: 21px; width:45px" /></a>
                                      <?php }?></span>
                                       <?php } else if ($_SESSION[$admObj->projectSecrectName]['user']['roleId'] == 100) {
                                          if ($value['CHDIC_Status_DocPer'] == 0 || $_SESSION[$admObj->projectSecrectName]['user']['log_id'] == 900069) {?>
                                          <a docket-action='doc_view' data-id="<?=$value['CHDIC_docket_no']?>" class="" href="incoming-call-edit?docID=<?=$value['CHDIC_docket_no']?>" style="text-decoration:none;"><img src="assets/images/editButton2.png" alt="Edit Image" title="" border="0" /></a>
                                          <?php } else if ($value['CHDIC_Status_DocPer'] == 1 || $_SESSION[$admObj->projectSecrectName]['user']['log_id'] == 900069) {?><
                                          <?php }?>
                                          <!--/////////////Admin Part///////////-->
                                      <input type="hidden" name="ajaxCallLock<?=$value['CHDIC_docket_no']?>" id="ajaxCallLock<?=$value['CHDIC_docket_no']?>" value="0">
                                      <span id="LockUnlockDiv<?=$value['CHDIC_docket_no']?>">
                                      <?php
                                 if ($value['CHDIC_Status_DocPer'] == 0) {?>
                                          &nbsp;&nbsp;&nbsp;<a docket-id='doc_view' data-id="<?=$value['CHDIC_docket_no']?>" statusVal="<?=$value['CHDIC_Status_DocPer']?>" class="" href="javascript:void(0);" style="text-decoration:none;"><img src="assets/images/active.jpg" alt="" title="" border="0" style="height: 21px; width:47px" /></a>
                                      <?php } else if ($value['CHDIC_Status_DocPer'] == 1) {?>
                                            &nbsp;&nbsp;&nbsp;<a docket-id='doc_view' data-id="<?=$value['CHDIC_docket_no']?>" statusVal="<?=$value['CHDIC_Status_DocPer']?>" class="" href="javascript:void(0);" style="text-decoration:none;"><img src="assets/images/inactive.jpg" alt="" title="" border="0" style="height: 21px; width:45px" /></a>
                                      <?php }?></span>
                                           <?php }?>
                                    </td>
                                 </tr>
                              <?php }?>
                                <tr>
                                   <td colspan="7"><div class="pagination"><?=$_SESSION[$admObj->projectStaticSecrectName]["user"]['page']['app-list']?></div></td>
                                </tr>
                            </tbody>
                    </table>
                  <?php } else { ?><div style="padding: 10px;" class="btnb btn-warning">Sorry no data found</div><?php }?>
                </div>
              </div>
          </div>
    </div>
    </div>
  </div>
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<div class="modal" id="modal_Doc">
  <div class="modal-dialog  modal-lg animated zoomInUp">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-star"></i>Docket Details</h5>
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
      <div class="modal-footer">
         <div class="col-md-12 text-center">
            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-danger" >Save</button> -->
        </div>
      </div>
    </div>
  </div>
</div>
  <?php require_once 'includes/footer.php';?>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js?verr=<?=time()?>"></script>
  <script src="<?=$admObj->cssPath?>assets/js/userJS/search.js?<?=time()?>"></script>