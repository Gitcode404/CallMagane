<?php
$reportArr = $funcObj->PrepareAwardList($fileId,$fileOrigin);
		if($reportArr) {
			////////////////   EXPORT TO EXCEL CODE //////////////////////
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetInde0);
			$default_border = array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('rgb'=>'FFFFFF')
			);
			$style_header = array(
				'borders' => array(
					'bottom' => $default_border,
					'left' => $default_border,
					'top' => $default_border,
					'right' => $default_border
				),
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb'=>'3A9733')
				)
			);
			
			$styleArray = array(
				'font'  => array(
					'bold'  => true,
					'color' => array('rgb' => 'FFFFFF'),
					'size'  => 11
				)
			);
			$objPHPExcel->getActiveSheet()->freezePane('A2');
			$styles = 'A1:AC1';
			for($i = 0, $num = 1; $i < count($reportArr); $i++, $num++) {
				for($j = 0,$colNum=1,$char = 'A'; $j < count($reportArr[$i]); $j++,$char++,$colNum++) {
					$columnNum = $funcObj->GetColumnNameFromNumber($colNum);
					if($i == 0) {
						$objPHPExcel->getActiveSheet()->getStyle($styles)->applyFromArray($styleArray);
					} else {
						$objPHPExcel->getActiveSheet()->getStyle($styles)->applyFromArray($style_header);
					}
					if($columnNum == 'O' || $columnNum == 'Q' || $columnNum == 'AB') {
						//echo "<br>ColumnNumber=".$columnNum.",RowNumber=".$num;
						//$objPHPExcel->getActiveSheet()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
						//$objPHPExcel->getActiveSheet()->setCellValue($columnNum.$num,$reportArr[$i][$j]);
						$objPHPExcel->getActiveSheet()->setCellValueExplicit($columnNum.$num,$reportArr[$i][$j],PHPExcel_Cell_DataType::TYPE_STRING);
					} else {
						$objPHPExcel->getActiveSheet()->setCellValue($columnNum.$num,$reportArr[$i][$j]);
					}
				}
			}
			//exit;
			$objPHPExcel->getActiveSheet()->setTitle('Award-Details');
			$objPHPExcel->setActiveSheetInde0);
			//ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Award-List.xlsx"');
			header("Pragma: no-cache");
			header("Expires: 0");
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			//ob_end_clean();
			exit;
		}


///////////////////////////////////////////////////

	function PrepareAwardList($fileId,$fileOrigin) {
		$mainArr = array();
		$appDetailsArr = array();
		$db = DB::get_instance();
		$currPage = $this->GetCurrentPage();
		$userType = $_SESSION['prematric']["admin"]['ss_user_type'];
		if($_SESSION['prematric']["admin"]["ss_priv_id"] == 0 || $_SESSION['prematric']["admin"]["ss_priv_id"] == 1) {
			$adminUserId = 0;
		} else {
			$adminUserId = $_SESSION['prematric']["admin"]['ss_user_identifier_id'];
		}
		$locYear = LAST_YEAR;
		$db->next_result();
		//echo "CALL 84_award_report_details('".$userType."',".$adminUserId.",".$fileId.",'".$fileOrigin."',".$locYear.")"; exit;
		$result = $db->query("CALL 84_award_report_details('".$userType."',".$adminUserId.",".$fileId.",'".$fileOrigin."',".$locYear.")");
		if($db->errno <> 0 ) {
			$_SESSION['prematric']["admin"]['error']['type'] = 1;
			$_SESSION['prematric']["admin"]['error']['msg'] = "Problem occured! Please try after sometime.";
			header("Location:".$currPage);
			exit;
		} else {
			$totalRows = $result->num_rows;
			if($totalRows > 0) {
				$cnt = 0;
				while($resultSet = $result->fetch_array(MYSQLI_ASSOC)) {
					array_push($appDetailsArr,$resultSet);
				}
			}
		}
//		echo "<pre>";
//		print_r($bmDetailsArr);
//		exit;
		//return $bmDetailsArr;
		/////////////////////////////////////////////////////////////////////////////////////////////////
		$row = 0; $col = 0;
		$mainArr[$row][$col] = "SERIAL NO.";
		$col++;
		$mainArr[$row][$col] = "NAME OF THE SCHOOL";
		$col++;
		$mainArr[$row][$col] = "APPLICATION ID.";
		$col++;
		$mainArr[$row][$col] = "NAME OF THE CANDIDATE";
		$col++;
		$mainArr[$row][$col] = "FATHER / GUARDIAN'S NAME";
		$col++;
		$mainArr[$row][$col] = "ADDRESS";
		$col++;
		$mainArr[$row][$col] = "DISTRICT";
		$col++;
		$mainArr[$row][$col] = "SUBDIVISION";
		$col++;
		$mainArr[$row][$col] = "BLOCK / MUNICIPALITY";
		$col++;
		$mainArr[$row][$col] = "POST OFFICE / PIN CODE";
		$col++;
		$mainArr[$row][$col] = "GENDER";
		$col++;
		$mainArr[$row][$col] = "APPLICATION FOR";
		$col++;
		$mainArr[$row][$col] = "CASTE/TRIBE CERTIFICATE DETAILS";
		$col++;
		$mainArr[$row][$col] = "ANNUAL FAMILY INCOME";
		$col++;
		$mainArr[$row][$col] = "AADHAAR NUMBER";
		$col++;
		$mainArr[$row][$col] = "AADHAAR SEEDING STATUS";
		$col++;
		$mainArr[$row][$col] = "MOBILE NO";
		$col++;
		$mainArr[$row][$col] = "LAST CLASS PASSED";
		$col++;
		$mainArr[$row][$col] = "YEAR OF PASSING";
		$col++;
		$mainArr[$row][$col] = "CLASS READING IN";
		$col++;
		$mainArr[$row][$col] = "% OF ATTENDANCE IN LAST SESSION";
		$col++;
		$mainArr[$row][$col] = "APPLICATION TYPE";
		$col++;
		$mainArr[$row][$col] = "HOSTEL TYPE";
		$col++;
		$mainArr[$row][$col] = "HOSTEL NAME";
		$col++;
		$mainArr[$row][$col] = "BANK NAME";
		$col++;
		$mainArr[$row][$col] = "BRANCH NAME";
		$col++;
		$mainArr[$row][$col] = "IFSC";
		$col++;
		$mainArr[$row][$col] = "ACCOUNT NO.";
		$col++;
		$mainArr[$row][$col] = "AMOUNT";
//		echo "<pre>";
//		print_r($mainArr);
//		exit;
		/////////////////////////////////////////////////////////////////////////////////////////////////
		if(count($appDetailsArr) > 0) {
			for($aa=0,$cnt=1;$aa<count($appDetailsArr);$aa++,$cnt++) {
				$col = 0; $row++;
				$mainArr[$row][$col] = $cnt.'.';
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_smi_inst_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_id'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_applicant_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_parent_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['appl_address'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_smd_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_smsd_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['smbm_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['post_pin'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['app_gender'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['app_for'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['cert_details'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_family_income'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_aadhaar_num'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['seeding_status'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_mob_num'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['app_last_class'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_year_of_pass'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['app_cur_class'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_attd_perc'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['app_stay_type'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['hostel_type'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['hostel_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_bank_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_branch_name'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_ifsc_dtls'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_acct_num'];
				$col++;
				$mainArr[$row][$col] = $appDetailsArr[$aa]['safd_app_scholar_amount'];
			}
		}
//		echo "<pre>";
//		print_r($mainArr);
//		exit;
		return $mainArr;
	}
?>