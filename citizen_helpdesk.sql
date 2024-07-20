/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100138 (10.1.38-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : citizen_helpdesk

 Target Server Type    : MySQL
 Target Server Version : 100138 (10.1.38-MariaDB)
 File Encoding         : 65001

 Date: 17/07/2024 10:31:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for 11_gobinda
-- ----------------------------
DROP TABLE IF EXISTS `11_gobinda`;
CREATE TABLE `11_gobinda`  (
  `AQUA` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `COMPANY` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `WORKEXP` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `CHDIC_docket_no` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CHDIC_caller_phNo` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_caller_name` varchar(66) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chdct_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDIC_email` varchar(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chdqt_name` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDIC_detail_query` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Ans_caller` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CallStatus` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `chde_type_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `chdct_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDIC_Inst_Name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- e_Pension, PG/UG, SVMCM, Health Scheme Section',
  `DOB` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CHDIC_Cast` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `State_Name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `District` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDIC_Other_District` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- SNTCSS, SCC, WBSIS ',
  `CHDIC_SNTCSSC_Address` varchar(230) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SNTCSSC_PIN` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Highest_Qua` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- SCC, SNTCSC',
  `CHDIC_SNTCSSC_Appear_UPSCCSE` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SNTCSSC_No_Previous_Appearance` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Complain` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `COMPLAIN` varchar(17) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Docket_No` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `csi_inst_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Course_Applied` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Course_Category` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chdsccdn_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Other_DirectorateName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Passing_Year` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- SCC,WBSIS',
  `CHDIC_Preset_Course_Study` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Use For- svmcm, SCC, WBSIS',
  `CHDIC_Application_Id` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- SCC, SVMCM',
  `CHDIC_SCC_Call_Category` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Other_Call_Category` varchar(41) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Line_Transfer` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDSCC_AD_Name` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Assigned_To` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Duration_Pending` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Reg_PhNo` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SVMCM_Last_Exam_Qua` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SVMCM_Exam_Qua_Year` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chdd_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDIC_SVMCM_Reg_Date` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chdleq_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chdat_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDIC_UGPG_Other_Admi_Type` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Location` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Area` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Pancht_Name` varchar(42) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Ward_Name` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_PIN` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Work_Exp` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Yes/No',
  `CHDIC_WBSIS_Basic_Qua` varchar(38) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Discipline_Course` varchar(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Pct_Markes` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_BS_Class` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_BS_School_Name` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_JobPosition` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_OSMS_No` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_StaffCategory` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_TransManu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `UTSDist` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDIC_UTS_Circle` varchar(111) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_SchoolName` varchar(78) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_TransferType` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UserId` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CHDIC_IP` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Sys_DateTime` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_add_type
-- ----------------------------
DROP TABLE IF EXISTS `chd_add_type`;
CREATE TABLE `chd_add_type`  (
  `chdat_id` int NOT NULL AUTO_INCREMENT,
  `chdat_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `chdat_reff_id` int NOT NULL,
  PRIMARY KEY (`chdat_id`) USING BTREE,
  INDEX `chdat_reff_id`(`chdat_reff_id` ASC) USING BTREE,
  CONSTRAINT `chd_add_type_ibfk_1` FOREIGN KEY (`chdat_reff_id`) REFERENCES `chd_last_exam_q` (`chdleq_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_additional_qualification
-- ----------------------------
DROP TABLE IF EXISTS `chd_additional_qualification`;
CREATE TABLE `chd_additional_qualification`  (
  `CHDAQ_Sl` int NOT NULL AUTO_INCREMENT,
  `CHDAQ_DocNo` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDAQ_Edu_Id` int NOT NULL,
  `CHDAQ_Call_Id` int NOT NULL,
  `CHDAQ_AQ` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDAQ_UserId` varchar(21) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDAQ_IP` varchar(19) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDAQ_Status` int NOT NULL,
  `CHDAQ_SysDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CHDAQ_Sl`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 162 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_area
-- ----------------------------
DROP TABLE IF EXISTS `chd_area`;
CREATE TABLE `chd_area`  (
  `chd_area_id` int NOT NULL AUTO_INCREMENT,
  `chd_area_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_area_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_area_from` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chd_area_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chd_area_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_call_status
-- ----------------------------
DROP TABLE IF EXISTS `chd_call_status`;
CREATE TABLE `chd_call_status`  (
  `chd_call_sts_id` int NOT NULL AUTO_INCREMENT,
  `chd_call_sts_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_call_sts_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_call_sts_from` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chd_call_sts_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chd_call_sts_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_call_type
-- ----------------------------
DROP TABLE IF EXISTS `chd_call_type`;
CREATE TABLE `chd_call_type`  (
  `chdc_type_id` int NOT NULL AUTO_INCREMENT,
  `chdct_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `chdct_name_abbrv` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chdct_reff_id_edu` int NOT NULL,
  PRIMARY KEY (`chdc_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_caller_type
-- ----------------------------
DROP TABLE IF EXISTS `chd_caller_type`;
CREATE TABLE `chd_caller_type`  (
  `chdct_id` int NOT NULL AUTO_INCREMENT,
  `chdct_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`chdct_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_compalin_details
-- ----------------------------
DROP TABLE IF EXISTS `chd_compalin_details`;
CREATE TABLE `chd_compalin_details`  (
  `chd_cd_id` int NOT NULL AUTO_INCREMENT,
  `chd_cd_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_cd_query_type` int NULL DEFAULT NULL,
  `chd_cd_call_type` int NULL DEFAULT NULL,
  `chd_cd_edu_type` int NULL DEFAULT NULL,
  `chd_cd_is_publish` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT 'O->Inactive, 1->Active',
  `chd_cd_from_date` datetime NULL DEFAULT NULL,
  `chd_cd_to_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`chd_cd_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_country
-- ----------------------------
DROP TABLE IF EXISTS `chd_country`;
CREATE TABLE `chd_country`  (
  `chd_country_id` int NOT NULL AUTO_INCREMENT,
  `chd_country_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_country_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_country_from` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chd_country_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chd_country_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_directorate
-- ----------------------------
DROP TABLE IF EXISTS `chd_directorate`;
CREATE TABLE `chd_directorate`  (
  `chdd_id` int NOT NULL AUTO_INCREMENT,
  `chdd_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`chdd_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_district
-- ----------------------------
DROP TABLE IF EXISTS `chd_district`;
CREATE TABLE `chd_district`  (
  `Sl_No` int NOT NULL AUTO_INCREMENT,
  `District` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `chd_district_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_district_from` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chd_district_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sl_No`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_docket_edit
-- ----------------------------
DROP TABLE IF EXISTS `chd_docket_edit`;
CREATE TABLE `chd_docket_edit`  (
  `chde_id` bigint NOT NULL AUTO_INCREMENT,
  `chde_dockno` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chde_updateon` datetime NULL DEFAULT NULL,
  `chde_aduser` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`chde_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 228 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_education
-- ----------------------------
DROP TABLE IF EXISTS `chd_education`;
CREATE TABLE `chd_education`  (
  `chde_id` int NOT NULL AUTO_INCREMENT,
  `chde_type_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `chde_type_abbrv` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chde_sms_abbrv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `chde_sms_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0' COMMENT '\'0\' for Not, \'1\' for Yes',
  PRIMARY KEY (`chde_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_gender
-- ----------------------------
DROP TABLE IF EXISTS `chd_gender`;
CREATE TABLE `chd_gender`  (
  `chd_gender_id` int NOT NULL AUTO_INCREMENT,
  `chd_gender_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_gender_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_gender_from` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chd_gender_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chd_gender_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_inbound_call
-- ----------------------------
DROP TABLE IF EXISTS `chd_inbound_call`;
CREATE TABLE `chd_inbound_call`  (
  `CHDIC_Sl` int NOT NULL AUTO_INCREMENT,
  `CHDIC_docket_no` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CHDIC_caller_phNo` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_res_phoneNo` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_caller_name` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_caller_type` int NULL DEFAULT NULL,
  `CHDIC_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_query_type` int NULL DEFAULT NULL,
  `CHDIC_detail_query` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `CHDIC_Ans_caller` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CHDIC_Call_Status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Edu_Grop` int NOT NULL,
  `CHDIC_Call_Type` int NULL DEFAULT NULL,
  `CHDIC_Inst_Name` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- e_Pension, PG/UG, SVMCM, Health Scheme Section',
  `CHDIC_DOB` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For - WBSIS, SNTCIS',
  `CHDIC_Cast` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_State` int NULL DEFAULT NULL COMMENT 'This Column Used For- SNTCSS,\r\n    SCC,\r\n    WBSIS',
  `CHDIC_District` int NULL DEFAULT NULL COMMENT 'This Column Used For- SNTCSS, SCC, WBSIS ',
  `CHDIC_Other_District` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- SNTCSS, SCC, WBSIS ',
  `CHDIC_SNTCSSC_Address` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SNTCSSC_PIN` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Highest_Qua` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- SCC, SNTCSC',
  `CHDIC_SNTCSSC_Appear_UPSCCSE` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SNTCSSC_No_Previous_Appearance` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Complain` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Docket_No` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_InstName` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Course_Applied` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Course_Category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_DirectorateName` int NULL DEFAULT NULL COMMENT 'From Database Value Integer Values\r\n',
  `CHDIC_SCC_Other_DirectorateName` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Passing_Year` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- SCC,WBSIS',
  `CHDIC_Preset_Course_Study` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Use For- svmcm, SCC, WBSIS',
  `CHDIC_Application_Id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'This Column Used For- SCC, SVMCM',
  `CHDIC_SCC_Call_Category` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Other_Call_Category` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Line_Transfer` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Assign_Dept` int NULL DEFAULT NULL,
  `CHDIC_SCC_Other_Assign_Dept` varchar(58) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Assigned_To` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SCC_Duration_Pending` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Reg_PhNo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SVMCM_Last_Exam_Qua` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SVMCM_Exam_Qua_Year` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SVMCM_Directorate` int NULL DEFAULT NULL,
  `CHDIC_SVMCM_Reg_Date` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_SVMCM_claim_period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UGPG_Last_Exam_Qua` int NULL DEFAULT NULL,
  `CHDIC_UGPG_Admission_Type` int NULL DEFAULT NULL,
  `CHDIC_UGPG_Other_Admi_Type` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UGPG_Course_Name` int NULL DEFAULT NULL,
  `CHDIC_UGPG_Other_Course` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UGPG_Course_type` int NULL DEFAULT NULL,
  `CHDIC_UGPG_Other_Course_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UGPG_BA_subject` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UGPG_App_ID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Location` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Area` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Pancht_Name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Ward_Name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_PIN` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Work_Exp` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Yes/No',
  `CHDIC_WBSIS_Basic_Qua` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Discipline_Course` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_WBSIS_Pct_Markes` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_BS_Class` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_BS_School_Name` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_JobPosition` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_OSMS_No` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_StaffCategory` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_TransManu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_Dist` int NULL DEFAULT NULL,
  `CHDIC_UTS_Circle` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_SchoolName` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_TransferType` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UserId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CHDIC_Status1` int NULL DEFAULT NULL,
  `CHDIC_Status2` int NULL DEFAULT NULL,
  `CHDIC_Status_DocPer` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1' COMMENT '1->Inactive 0->Active',
  `CHDIC_IP` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_Sys_DateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CHDID_SysDate` date NOT NULL,
  `CHDIC_Sys_Time` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDI_update_dateTime` timestamp NULL DEFAULT NULL,
  `updated_IP` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_directorate` int NULL DEFAULT NULL,
  `chd_job_issue` int NULL DEFAULT NULL,
  `chd_scheme` int NULL DEFAULT NULL,
  `chd_reg_ssin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_bficiary_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_country` int NULL DEFAULT NULL,
  `chd_country_other_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_state_other_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_district_other_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_area` int NULL DEFAULT NULL,
  `chd_area_other_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_gp_wardno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_nature_call` int NULL DEFAULT NULL,
  `CHDIC_WBSIS_Qua_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CHDIC_UTS_Dist_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_sms_ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_sms_status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0' COMMENT '\'0\' for Default, \'1\' for Sent, \'2\' for Failed',
  `chd_call_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1' COMMENT '0 For call pending and  1 for call closed',
  `chd_open_call_closed_time` datetime NULL DEFAULT NULL,
  `chd_open_call_closed_prov_time` datetime NULL DEFAULT NULL,
  `chd_open_call_closed_user` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `chd_dtl_complain_type` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`CHDIC_Sl`, `CHDIC_docket_no`) USING BTREE,
  UNIQUE INDEX `CHDIC_docket_no_UNI`(`CHDIC_docket_no` ASC) USING BTREE,
  INDEX `CHDIC_Edu_Grop`(`CHDIC_Edu_Grop` ASC, `CHDIC_Call_Type` ASC) USING BTREE,
  INDEX `CHDIC_docket_no`(`CHDIC_docket_no` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 98 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_job_issue
-- ----------------------------
DROP TABLE IF EXISTS `chd_job_issue`;
CREATE TABLE `chd_job_issue`  (
  `chd_job_Iss_id` int NOT NULL AUTO_INCREMENT,
  `chd_job_Iss_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_job_Iss_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_job_Iss_from` timestamp NULL DEFAULT NULL,
  `chd_job_Iss_to` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`chd_job_Iss_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_last_exam_q
-- ----------------------------
DROP TABLE IF EXISTS `chd_last_exam_q`;
CREATE TABLE `chd_last_exam_q`  (
  `chdleq_id` int NOT NULL AUTO_INCREMENT,
  `chdleq_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`chdleq_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_nature_call
-- ----------------------------
DROP TABLE IF EXISTS `chd_nature_call`;
CREATE TABLE `chd_nature_call`  (
  `chd_nature_call_id` int NOT NULL AUTO_INCREMENT,
  `chd_nature_call_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_nature_call_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_nature_call_from` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chd_nature_call_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chd_nature_call_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_query
-- ----------------------------
DROP TABLE IF EXISTS `chd_query`;
CREATE TABLE `chd_query`  (
  `cha_query_id` int NOT NULL AUTO_INCREMENT,
  `cha_query_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cha_query_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `cha_query_from` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `cha_query_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cha_query_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_query_type
-- ----------------------------
DROP TABLE IF EXISTS `chd_query_type`;
CREATE TABLE `chd_query_type`  (
  `chdqt_id` int NOT NULL AUTO_INCREMENT,
  `chdqt_name` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `chdqt_reff_id` int NOT NULL,
  PRIMARY KEY (`chdqt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_scc_assignrd_dept
-- ----------------------------
DROP TABLE IF EXISTS `chd_scc_assignrd_dept`;
CREATE TABLE `chd_scc_assignrd_dept`  (
  `CHDSCC_AD_Sl` int NOT NULL AUTO_INCREMENT,
  `CHDSCC_AD_Name` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`CHDSCC_AD_Sl`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_scc_directorate_name
-- ----------------------------
DROP TABLE IF EXISTS `chd_scc_directorate_name`;
CREATE TABLE `chd_scc_directorate_name`  (
  `chdsccdn_id` int NOT NULL AUTO_INCREMENT,
  `chdsccdn_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`chdsccdn_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_scc_institutes
-- ----------------------------
DROP TABLE IF EXISTS `chd_scc_institutes`;
CREATE TABLE `chd_scc_institutes`  (
  `csi_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `csi_inst_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`csi_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1360 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_scheme
-- ----------------------------
DROP TABLE IF EXISTS `chd_scheme`;
CREATE TABLE `chd_scheme`  (
  `chd_scheme_id` int NOT NULL AUTO_INCREMENT,
  `chd_scheme_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_scheme_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_scheme_from` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chd_scheme_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chd_scheme_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_ss_directorate
-- ----------------------------
DROP TABLE IF EXISTS `chd_ss_directorate`;
CREATE TABLE `chd_ss_directorate`  (
  `chd_direc_id` int NOT NULL AUTO_INCREMENT,
  `chd_direc_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chd_direc_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chd_direc_from` timestamp NULL DEFAULT NULL,
  `chd_direc_to` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`chd_direc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_ssc_catagory_call
-- ----------------------------
DROP TABLE IF EXISTS `chd_ssc_catagory_call`;
CREATE TABLE `chd_ssc_catagory_call`  (
  `chd_ssc_ctcall_id` int NOT NULL AUTO_INCREMENT,
  `chd_ssc_ctcall_name` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`chd_ssc_ctcall_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_state
-- ----------------------------
DROP TABLE IF EXISTS `chd_state`;
CREATE TABLE `chd_state`  (
  `SL` int NOT NULL AUTO_INCREMENT,
  `State_Name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ID` int NOT NULL,
  `chd_state_is_publish` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1',
  `chd_state_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `chd_state_to` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SL`, `ID`) USING BTREE,
  INDEX `ID`(`ID` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_ugpg_addmore
-- ----------------------------
DROP TABLE IF EXISTS `chd_ugpg_addmore`;
CREATE TABLE `chd_ugpg_addmore`  (
  `CHDUGPG_Sl` int NOT NULL AUTO_INCREMENT,
  `CHDUGPG_DocketNo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDUGPG_CallType` int NULL DEFAULT NULL,
  `CHDUGPG_Course` varchar(58) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUGPG_Subject` varchar(89) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUGPG_UserId` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUGPG_IP` varchar(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUGPG_SysDateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CHDUGPG_Sl`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 122 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_ugpg_course
-- ----------------------------
DROP TABLE IF EXISTS `chd_ugpg_course`;
CREATE TABLE `chd_ugpg_course`  (
  `chdcn_id` int NOT NULL AUTO_INCREMENT,
  `chdcn_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chdcn_is_publish` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chdcn_from_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chdcn_to_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chdcn_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_ugpg_course_type
-- ----------------------------
DROP TABLE IF EXISTS `chd_ugpg_course_type`;
CREATE TABLE `chd_ugpg_course_type`  (
  `chdct_id` int NOT NULL AUTO_INCREMENT,
  `chdct_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `chdct_is_publish` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `chdct_from_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `chdct_to_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chdct_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_user_admin
-- ----------------------------
DROP TABLE IF EXISTS `chd_user_admin`;
CREATE TABLE `chd_user_admin`  (
  `CHDUSER_Id` int NOT NULL AUTO_INCREMENT,
  `CHDUSER_FName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDUSER_MName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUSER_LName` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDUSER_NGS` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUSER_Email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDUSER_UserName` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDUSER_Password` varchar(55) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUSER_UserType` enum('1','2','3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1' COMMENT '1-> Application USer 2-> uploaders ,3=> Admin User',
  `CHDUSER_Role` int NOT NULL,
  `CHDUSER_PhNo` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDUSER_Address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUSER_Image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUSER_Status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '1-> Active 0-> Inactive / Block',
  `CHDUSER_Is_Public` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '0-> Actiuve 1-> Delete USer',
  `CHDUSER_AddTime` datetime NULL DEFAULT NULL,
  `CHDUSER_Effect_To` datetime NULL DEFAULT NULL,
  `CHDUSER_Effect_From` datetime NULL DEFAULT NULL,
  `CHDUSER_edit_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0' COMMENT '0-> Inactive 1-> Active',
  `CHDUSER_login_dateTime` timestamp NULL DEFAULT NULL,
  `CHDUSER_login_ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`CHDUSER_Id`) USING BTREE,
  UNIQUE INDEX `CHDUSER_UserName`(`CHDUSER_UserName` ASC) USING BTREE,
  UNIQUE INDEX `CHDUSER_Password`(`CHDUSER_Password` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_utsashree_addmore
-- ----------------------------
DROP TABLE IF EXISTS `chd_utsashree_addmore`;
CREATE TABLE `chd_utsashree_addmore`  (
  `CHDUTS_Sl` int NOT NULL AUTO_INCREMENT,
  `CHDUTS_docketNo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDUTS_Education_Type` int NOT NULL,
  `CHDUTS_CallType` int NULL DEFAULT NULL,
  `CHDUTS_Dist` int NULL DEFAULT NULL,
  `CHDUTS_Circle` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUTS_Inst` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUTS_User` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUTS_IP` varchar(17) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUTS_DateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CHDUTS_Sl`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_utsashree_addmore_copy1
-- ----------------------------
DROP TABLE IF EXISTS `chd_utsashree_addmore_copy1`;
CREATE TABLE `chd_utsashree_addmore_copy1`  (
  `CHDUTS_Sl` int NOT NULL AUTO_INCREMENT,
  `CHDUTS_docketNo` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDUTS_Education_Type` int NOT NULL,
  `CHDUTS_CallType` int NULL DEFAULT NULL,
  `CHDUTS_Dist` int NULL DEFAULT NULL,
  `CHDUTS_Circle` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUTS_Inst` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUTS_User` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUTS_IP` varchar(17) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CHDUTS_DateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CHDUTS_Sl`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for chd_work_exp
-- ----------------------------
DROP TABLE IF EXISTS `chd_work_exp`;
CREATE TABLE `chd_work_exp`  (
  `CHDWE_Sl` int NOT NULL AUTO_INCREMENT,
  `CHDWE_DocNo` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDWE_EduId` int NOT NULL,
  `CHDWE_CallId` int NOT NULL,
  `CHDWE_CompanyName` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDWE_Dua_Exp` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDWE_IP` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDWE_UserId` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CHDWE_Status` int NOT NULL,
  `CHDWE_DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CHDWE_Sl`) USING BTREE,
  INDEX `CHDWE_DocNo`(`CHDWE_DocNo` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 96 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for demo
-- ----------------------------
DROP TABLE IF EXISTS `demo`;
CREATE TABLE `demo`  (
  `SL` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `roll` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dir_pro_company
-- ----------------------------
DROP TABLE IF EXISTS `dir_pro_company`;
CREATE TABLE `dir_pro_company`  (
  `dirpc_id` int NOT NULL AUTO_INCREMENT,
  `dirpc_dirpd_id` int NULL DEFAULT NULL,
  `dirpc_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpc_desc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpc_status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '1 -> Active 0-> Inactive ',
  `dirpc_addtime` datetime NULL DEFAULT NULL,
  `dirpc_effect_to` datetime NULL DEFAULT NULL,
  `dirpc_effect_from` datetime NULL DEFAULT NULL,
  `dirpc_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '0-> Delete 1-> Active ',
  PRIMARY KEY (`dirpc_id`) USING BTREE,
  UNIQUE INDEX `dept_com`(`dirpc_dirpd_id` ASC, `dirpc_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dir_pro_department
-- ----------------------------
DROP TABLE IF EXISTS `dir_pro_department`;
CREATE TABLE `dir_pro_department`  (
  `dirpd_id` int NOT NULL AUTO_INCREMENT,
  `dirpd_dirpl_id` int NULL DEFAULT NULL,
  `dirpd_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpd_desc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpd_status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '1-> Active 0-> Inactive',
  `dirpd_addtime` datetime NULL DEFAULT NULL,
  `dirpd_effect_from` date NULL DEFAULT NULL,
  `dirpd_effect_to` datetime NULL DEFAULT NULL,
  `dirpd_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '1-> Active 0-> Inactive',
  PRIMARY KEY (`dirpd_id`) USING BTREE,
  UNIQUE INDEX `dept_loc`(`dirpd_dirpl_id` ASC, `dirpd_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dir_pro_menu
-- ----------------------------
DROP TABLE IF EXISTS `dir_pro_menu`;
CREATE TABLE `dir_pro_menu`  (
  `dirpm_id` int NOT NULL AUTO_INCREMENT,
  `dirpm_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpm_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpm_display_order` int NULL DEFAULT NULL,
  `dirpm_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpm_menu_type` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0' COMMENT '0-> Admin menu 1-> User Menu',
  `dirpm_type` int NULL DEFAULT NULL COMMENT 'If Master then set 0 Otherwise take master id ',
  `dirpm_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpm_valid_from` datetime NULL DEFAULT NULL,
  `dirpm_valid_to` datetime NULL DEFAULT NULL,
  `dirpm_is_active` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '0-> Inactive 1-> Active ',
  PRIMARY KEY (`dirpm_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dir_pro_previledge_list
-- ----------------------------
DROP TABLE IF EXISTS `dir_pro_previledge_list`;
CREATE TABLE `dir_pro_previledge_list`  (
  `dirpppl_id` int NOT NULL AUTO_INCREMENT,
  `dirpppl_dirpm_id` int NULL DEFAULT NULL,
  `dirpppl_dirpup_id` int NULL DEFAULT NULL,
  `dirpppl_parent_id` int NULL DEFAULT NULL,
  `dirpppl_is_view` enum('1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpppl_is_add` enum('1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpppl_is_edit` enum('1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpppl_is_del` enum('1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dirpppl_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 116 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dir_pro_priviledge
-- ----------------------------
DROP TABLE IF EXISTS `dir_pro_priviledge`;
CREATE TABLE `dir_pro_priviledge`  (
  `dirpp_id` int NOT NULL AUTO_INCREMENT,
  `dirpp_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirpp_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1' COMMENT '0-> Delete 1-> Active',
  `dirpp_status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1' COMMENT '-> Active 0-> Inactive ',
  `dirpp_effect_from` datetime NULL DEFAULT NULL,
  `dirpp_add_time` datetime NULL DEFAULT NULL,
  `dirpp_effect_to` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`dirpp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dir_pro_user
-- ----------------------------
DROP TABLE IF EXISTS `dir_pro_user`;
CREATE TABLE `dir_pro_user`  (
  `dirpu_id` int NOT NULL AUTO_INCREMENT,
  `dirpu_fName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirpu_mName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpu_lName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirpu_ngs` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpu_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirpu_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpu_user_type` enum('2','3','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '3' COMMENT '1-> Application USer 2-> uploaders ,3=> Admin User',
  `dirpu_role` int NOT NULL,
  `dirpu_phone` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirpu_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirpu_status` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '1-> Active 0-> Inactive / Block',
  `dirpu_is_publish` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '0-> Actiuve 1-> Delete USer',
  `dirpu_addtime` datetime NULL DEFAULT NULL,
  `dirpu_effect_to` datetime NULL DEFAULT NULL,
  `dirpu_effect_from` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`dirpu_id`) USING BTREE,
  UNIQUE INDEX `email`(`dirpu_email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dir_pro_user_temp_file
-- ----------------------------
DROP TABLE IF EXISTS `dir_pro_user_temp_file`;
CREATE TABLE `dir_pro_user_temp_file`  (
  `dirputf_id` int NOT NULL AUTO_INCREMENT,
  `dirputf_dirpff_id` int NOT NULL,
  `dirputf_dirpfl_id` int NOT NULL,
  `dirputf_uploder_id` int NOT NULL,
  `dirputf_folder_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirputf_folder_dis_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirputf_file_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirputf_file_dis_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirputf_index_file_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dirputf_dept_id` int NOT NULL,
  `dirputf_comp_id` int NOT NULL,
  `dirputf_file_entry_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirputf_file_keywords` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dirputf_add_time` datetime NULL DEFAULT NULL,
  `dirputf_submit_time` datetime NULL DEFAULT NULL,
  `dirputf_verification_time` datetime NULL DEFAULT NULL,
  `dirputf_updt_cntr` int NULL DEFAULT 0,
  `dirputf_status` enum('1','2','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0' COMMENT '0-> NOt send for verification 1-> Send for verification 2->Verification Complete',
  `dirputf_verification_message` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dirputf_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for logintracking
-- ----------------------------
DROP TABLE IF EXISTS `logintracking`;
CREATE TABLE `logintracking`  (
  `sl` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `login_datetime` timestamp NULL DEFAULT NULL,
  `sessionId` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `refraceDateTime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sl`, `userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6433 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sheet1
-- ----------------------------
DROP TABLE IF EXISTS `sheet1`;
CREATE TABLE `sheet1`  (
  `Andhra Pradesh` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Procedure structure for 01_get_location_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `01_get_location_list`;
delimiter ;;
CREATE PROCEDURE `01_get_location_list`()
BEGIN
	#Routine body goes here...
	SELECT loc.dirpl_id, loc.dirpl_name FROM dir_pro_location AS loc WHERE loc.dirpl_status = '1' AND loc.dirpl_is_publish = '1' ORDER BY loc.dirpl_name ASC;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 01_sskm_search_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `01_sskm_search_list`;
delimiter ;;
CREATE PROCEDURE `01_sskm_search_list`(IN  app_year varchar(10), IN app_month  varchar(10), IN start_date varchar(50) , IN end_date varchar(50))
BEGIN
	#Routine body goes here...
	SET @app_year  =trim(app_year);
  SET @app_month  =trim(app_month);
  SET @start_date =trim(start_date);
	SET @end_date =trim(end_date);
  SET @sqlDesc="SELECT COUNT(sskml.sskmfl_id) as total_files, sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status='0'";  
  #PREPARE STMT FROM "SELECT dirputf.dirputf_id, dirputf.dirputf_dirpff_id, dirputf.dirputf_dirpfl_id,dirputf.dirputf_dept_id, dirputf.dirputf_comp_id, dirputf.dirputf_file_entry_name, dirputf.dirputf_file_keywords, dirputf.dirputf_add_time, dirputf.dirputf_updt_cntr, dirputf.dirputf_index_file_name FROM dir_pro_user_temp_file AS dirputf WHERE dirputf.dirputf_status = '0' AND dirputf.dirputf_uploder_id = ? and dirputf.dirputf_dirpfl_id=? ";
  #EXECUTE STMT USING @userId,@folderId;
  IF LENGTH(@app_year)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND sskml.sskmfl_year=',@app_year);
  END IF;

  IF LENGTH(@app_month)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_month='",@app_month,"'");
  END IF;
	
	IF LENGTH(@start_date)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_add_time>='",@start_date,"'");
  END IF;

	IF LENGTH(@end_date)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_add_time<='",@end_date,"'");
  END IF;

  SET @sqlDesc=CONCAT(@sqlDesc,' ',' GROUP BY sskml.sskmfl_year_mo_day_folder ','');
  #SELECT @sqlDesc;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 02_generate_docked_Id
-- ----------------------------
DROP PROCEDURE IF EXISTS `02_generate_docked_Id`;
delimiter ;;
CREATE PROCEDURE `02_generate_docked_Id`(IN `EDUID` INT(5), IN `CALLID` VARCHAR(10))
BEGIN
	DECLARE rowCount INT(15);
	DECLARE eduAbbrv VARCHAR(50);
	DECLARE callAbbrv VARCHAR(50);
	DECLARE docketNum VARCHAR(50);
	
 IF(EDUID=3) THEN
--     SELECT EDUID;
--     SELECT CURDATE();

  SELECT COUNT(CHDIC_Sl) INTO rowCount FROM chd_inbound_call WHERE CHDIC_Edu_Grop = TRIM(EDUID)  AND  
		CHDIC_Sys_DateTime > CURDATE();
		IF(rowCount = 0) THEN
			SELECT ce.chde_type_abbrv INTO eduAbbrv FROM chd_education AS ce WHERE ce.chde_id = TRIM(EDUID);
			SET docketNum = CONCAT(eduAbbrv,DATE_FORMAT(CURDATE(),'%d%m%y'),"0001");
		ELSE
			SELECT CONCAT(EDU.`chde_type_abbrv`,DATE_FORMAT(CURDATE(),'%d%m%y'),LPAD(max(CAST((substring(IC.
				`CHDIC_docket_no`,12,4)) AS UNSIGNED)+1),4,0)) INTO docketNum
		   FROM
		    chd_inbound_call AS IC
		   INNER JOIN chd_education AS EDU ON IC.CHDIC_Edu_Grop = EDU.chde_id
		   WHERE
		   IC.`CHDIC_Edu_Grop`=TRIM(EDUID)  AND IC.CHDIC_Sys_DateTime > CURDATE();
		END IF;
		SELECT docketNum;
-- 		Forb Edu=3		
 ELSE
		IF(TRIM(CALLID) = 'NULL') THEN
			SELECT COUNT(CHDIC_Sl) INTO rowCount FROM chd_inbound_call WHERE CHDIC_Edu_Grop = TRIM(EDUID) AND CHDIC_Call_Type = NULL AND CHDIC_Sys_DateTime > CURDATE();
		ELSE
			SELECT COUNT(CHDIC_Sl) INTO rowCount FROM chd_inbound_call WHERE CHDIC_Edu_Grop = TRIM(EDUID) AND CHDIC_Call_Type = TRIM(CALLID) AND CHDIC_Sys_DateTime > CURDATE();
		END IF;

		IF(rowCount = 0) THEN
			SELECT ce.chde_type_abbrv INTO eduAbbrv FROM chd_education AS ce WHERE ce.chde_id = TRIM(EDUID);
			SELECT ct.chdct_name_abbrv INTO callAbbrv FROM chd_call_type AS ct WHERE ct.chdc_type_id = TRIM(CALLID);

			SET docketNum = CONCAT(eduAbbrv,callAbbrv,DATE_FORMAT(CURDATE(),'%d%m%y'),"0001");
		ELSE
			SELECT CONCAT(EDU.`chde_type_abbrv`,CALLT.`chdct_name_abbrv`,DATE_FORMAT(CURDATE(),'%d%m%y'),LPAD(max(CAST((substring(IC.
				`CHDIC_docket_no`,12,4)) AS UNSIGNED)+1),4,0)) INTO docketNum
		   FROM
		    chd_inbound_call AS IC 
		   INNER JOIN chd_education AS EDU ON IC.CHDIC_Edu_Grop = EDU.chde_id
		   INNER JOIN chd_call_type AS CALLT ON CALLT.chdc_type_id = IC.CHDIC_Call_Type AND EDU.chde_id = CALLT.chdct_reff_id_edu
		   WHERE
		   IC.`CHDIC_Edu_Grop`=TRIM(EDUID) AND IC.`CHDIC_Call_Type`=TRIM(CALLID) AND IC.CHDIC_Sys_DateTime > CURDATE();
		END IF;
		SELECT docketNum;
 END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 02_get_department_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `02_get_department_list`;
delimiter ;;
CREATE PROCEDURE `02_get_department_list`()
BEGIN
	#Routine body goes here...
	SELECT dept.dirpd_id, dept.dirpd_name, dept.dirpd_dirpl_id, dept.dirpd_desc, dept.dirpd_status, if(dept.dirpd_status='1','Active','In-Active') as report_status, loc.dirpl_name FROM dir_pro_department AS dept INNER JOIN dir_pro_location AS loc ON dept.dirpd_dirpl_id = loc.dirpl_id WHERE dept.dirpd_is_publish = '1' AND dept.dirpd_effect_to IS NULL ORDER BY dept.dirpd_name ASC
;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 02_search_all_data
-- ----------------------------
DROP PROCEDURE IF EXISTS `02_search_all_data`;
delimiter ;;
CREATE PROCEDURE `02_search_all_data`(IN roilId varchar(10),IN user_Id varchar(10),IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
  DECLARE sqlDesc VARCHAR(255);
  SET @userId=trim(user_Id);
  SET @limitFrom=trim(limitFrom);
  SET @limitTo=trim(limitTo);
  SET @roleId =trim(roilId); 

IF(LENGTH(@limitFrom) <> 0)THEN
	SET @mainSQL="SELECT INCALL.`CHDIC_docket_no`,INCALL.`CHDIC_caller_phNo`,INCALL.`CHDIC_caller_name`,CALLERTYPE.chdct_type,INCALL.`CHDIC_email`,QT.chdqt_name,INCALL.`CHDIC_detail_query`,INCALL.`CHDIC_Ans_caller`,IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,EDU.chde_type_name,CT.chdct_name,INCALL.`CHDIC_Inst_Name`,DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,INCALL.`CHDIC_Cast`,STATE.State_Name,DIST.District,INCALL.`CHDIC_Other_District`,INCALL.`CHDIC_SNTCSSC_Address`,INCALL.`CHDIC_SNTCSSC_PIN`,INCALL.`CHDIC_Highest_Qua`,INCALL.`CHDIC_SNTCSSC_Appear_UPSCCSE`,INCALL.`CHDIC_SNTCSSC_No_Previous_Appearance`,INCALL.`CHDIC_SCC_Complain`,IF(INCALL.`CHDIC_SCC_Complain`='NC','New Complain',IF(INCALL.`CHDIC_SCC_Complain`='EC','Existing Complain','')) AS COMPLAIN,INCALL.`CHDIC_SCC_Docket_No`,SCCINST.csi_inst_name,INCALL.`CHDIC_SCC_Course_Applied`,INCALL.`CHDIC_SCC_Course_Category`,DIROTED.chdsccdn_name,INCALL.`CHDIC_SCC_Other_DirectorateName`,INCALL.`CHDIC_Passing_Year`,INCALL.`CHDIC_Preset_Course_Study`,INCALL.`CHDIC_Application_Id`,INCALL.`CHDIC_SCC_Call_Category`,INCALL.`CHDIC_SCC_Other_Call_Category`,INCALL.`CHDIC_SCC_Line_Transfer`,SCCDEPT.CHDSCC_AD_Name,INCALL.`CHDIC_SCC_Assigned_To`,INCALL.`CHDIC_SCC_Duration_Pending`,INCALL.`CHDIC_Reg_PhNo`,INCALL.`CHDIC_SVMCM_Last_Exam_Qua`,INCALL.`CHDIC_SVMCM_Exam_Qua_Year`,DIROC.chdd_name,INCALL.`CHDIC_SVMCM_Reg_Date`,LEXM.chdleq_name,ADDT.chdat_name,INCALL.`CHDIC_UGPG_Other_Admi_Type`,INCALL.`CHDIC_WBSIS_Location`,INCALL.`CHDIC_WBSIS_Area`,INCALL.`CHDIC_WBSIS_Pancht_Name`,INCALL.`CHDIC_WBSIS_Ward_Name`,INCALL.CHDIC_Status_DocPer,INCALL.`CHDIC_WBSIS_PIN`,INCALL.`CHDIC_WBSIS_Work_Exp`,INCALL.`CHDIC_WBSIS_Basic_Qua`,INCALL.`CHDIC_WBSIS_Discipline_Course`,INCALL.`CHDIC_WBSIS_Pct_Markes`,INCALL.`CHDIC_BS_Class`,INCALL.`CHDIC_BS_School_Name`,INCALL.`CHDIC_UTS_JobPosition`,INCALL.`CHDIC_UTS_OSMS_No`,INCALL.`CHDIC_UTS_StaffCategory`,INCALL.`CHDIC_UTS_TransManu`,UTSDIST.District AS UTSDist,INCALL.`CHDIC_UTS_Circle`,INCALL.`CHDIC_UTS_SchoolName`,INCALL.`CHDIC_UTS_TransferType`,INCALL.`CHDIC_UserId`,INCALL.`CHDIC_IP`,INCALL.`CHDIC_Sys_DateTime` FROM `chd_inbound_call` AS INCALL INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.`CHDIC_caller_type`=CALLERTYPE.chdct_id INNER JOIN chd_query_type AS QT ON INCALL.`CHDIC_query_type`=QT.chdqt_id INNER JOIN chd_education AS EDU ON INCALL.`CHDIC_Edu_Grop`=EDU.chde_id INNER JOIN chd_call_type AS CT ON INCALL.`CHDIC_Call_Type`=CT.chdc_type_id LEFT JOIN chd_state AS STATE ON INCALL.`CHDIC_State`=STATE.SL LEFT JOIN chd_district AS DIST ON INCALL.`CHDIC_District`=DIST.Sl_No  LEFT JOIN chd_scc_institutes AS SCCINST ON INCALL.`CHDIC_SCC_InstName`=SCCINST.csi_id LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.`CHDIC_SCC_DirectorateName`=DIROTED.chdsccdn_id LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.`CHDIC_SCC_Assign_Dept`=SCCDEPT.CHDSCC_AD_Sl LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.`CHDIC_UGPG_Last_Exam_Qua`= LEXM.chdleq_id LEFT JOIN chd_add_type AS ADDT ON INCALL.`CHDIC_UGPG_Admission_Type`= ADDT.chdat_id LEFT JOIN chd_district AS UTSDIST ON INCALL.`CHDIC_UTS_Dist`=UTSDIST.Sl_No";
ELSE
	SET @mainSQL="SELECT INCALL.`CHDIC_docket_no` FROM `chd_inbound_call` AS INCALL INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.`CHDIC_caller_type`=CALLERTYPE.chdct_id INNER JOIN chd_query_type AS QT ON INCALL.`CHDIC_query_type`=QT.chdqt_id INNER JOIN chd_education AS EDU ON INCALL.`CHDIC_Edu_Grop`=EDU.chde_id INNER JOIN chd_call_type AS CT ON INCALL.`CHDIC_Call_Type`=CT.chdc_type_id LEFT JOIN chd_state AS STATE ON INCALL.`CHDIC_State`=STATE.SL LEFT JOIN chd_district AS DIST ON INCALL.`CHDIC_District`=DIST.Sl_No  LEFT JOIN chd_scc_institutes AS SCCINST ON INCALL.`CHDIC_SCC_InstName`=SCCINST.csi_id LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.`CHDIC_SCC_DirectorateName`=DIROTED.chdsccdn_id LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.`CHDIC_SCC_Assign_Dept`=SCCDEPT.CHDSCC_AD_Sl LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.`CHDIC_UGPG_Last_Exam_Qua`= LEXM.chdleq_id LEFT JOIN chd_add_type AS ADDT ON INCALL.`CHDIC_UGPG_Admission_Type`= ADDT.chdat_id LEFT JOIN chd_district AS UTSDIST ON INCALL.`CHDIC_UTS_Dist`=UTSDIST.Sl_No";
END IF;

IF (LENGTH(sqlDesc) <> 0) THEN
  IF(LENGTH(@userId) <> 0)THEN
    IF(@userId <> '900069')THEN
      IF(@roleId <> '2')THEN
         SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_UserId = '",@userId,"'");
      END IF;
    END IF;
  END IF;
ELSE
    IF(LENGTH(@userId) <> 0)THEN
      IF(@userId <> '900069')THEN
         IF(@roleId <> '2')THEN
						SET sqlDesc=CONCAT("INCALL.CHDIC_UserId = '",@userId,"'");
				 END IF;
      END IF;
    END IF;
END IF;


IF (LENGTH(sqlDesc) <> 0) THEN 
   SET @mainSQL=CONCAT(@mainSQL ," WHERE ", sqlDesc , " ORDER BY INCALL.`CHDIC_Sys_DateTime` DESC");
ELSE
   SET @mainSQL=CONCAT(@mainSQL ," ORDER BY INCALL.`CHDIC_Sys_DateTime` DESC");
END IF;

IF(LENGTH(@limitFrom) <> 0)THEN
    #SET sqlDesc=CONCAT(sqlDesc," LIMIT ",@limitFrom," , ",@limitTo,"");
	SET @mainSQL=CONCAT(@mainSQL ," LIMIT ", @limitFrom , ",",@limitTo);
END IF;


#IF (LENGTH(sqlDesc) <> 0)THEN
#   IF(LENGTH(@limitFrom) <> 0)THEN
 #   #SET sqlDesc=CONCAT(sqlDesc," LIMIT ",@limitFrom," , ",@limitTo,"");
	#  SET @mainSQL=CONCAT(@mainSQL ," LIMIT ", @limitFrom , ",",@limitTo);
  # END IF;

#ELSE
 #  IF(LENGTH(@limitFrom) <> 0)THEN
  #   SET sqlDesc=CONCAT("LIMIT ",@limitFrom," , ",@limitTo,"");
		 #SET @mainSQL=CONCAT(@mainSQL ," LIMIT ", @limitFrom , ",",@limitTo);
  # END IF;
#END IF;





#SELECT @mainSQL;
PREPARE stmt1 FROM @mainSQL;
EXECUTE stmt1;
#IN from_Date varchar(20), IN to_date varchar(20),
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 02_sskm_get_curr_woring_file
-- ----------------------------
DROP PROCEDURE IF EXISTS `02_sskm_get_curr_woring_file`;
delimiter ;;
CREATE PROCEDURE `02_sskm_get_curr_woring_file`(IN  folderId  varchar(50))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  
  PREPARE STMT FROM "SELECT sskml.sskmfl_patient_name, sskml.sskmfl_reg_no,IF(LENGTH(sskml.sskmfl_admit_date)>0,DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y'),'') as admit_date,IF(LENGTH(sskml.sskmfl_discharge_date)>0,DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y'),'') as dis_date,IF(LENGTH(sskml.sskmfl_death_date)>0,DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y'),'') as death_date, sskml.sskmfl_admit_date,sskml.sskmfl_discharge_date, sskml.sskmfl_is_death,sskml.sskmfl_is_pcase,sskml.sskmfl_death_date,sskml.sskmfl_patient_age,sskml.sskmfl_patient_age_dmy,sskml.sskmfl_patient_sex,sskml.sskmfl_residence,
  sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status='0' AND sskml.sskmfl_year_mo_day_folder=? LIMIT 0,1";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 02_sskm_get_curr_woring_file_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `02_sskm_get_curr_woring_file_copy`;
delimiter ;;
CREATE PROCEDURE `02_sskm_get_curr_woring_file_copy`(IN  folderId  varchar(50))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  
  PREPARE STMT FROM "SELECT  sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status='0' AND sskml.sskmfl_year_mo_day_folder=? LIMIT 0,1";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 03_get_company_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `03_get_company_list`;
delimiter ;;
CREATE PROCEDURE `03_get_company_list`()
BEGIN
	#Routine body goes here...
	SELECT com.dirpc_id, com.dirpc_dirpd_id, com.dirpc_name, com.dirpc_desc, com.dirpc_status, if(com.dirpc_status=1,'Active','In-Active') as report_status, dept.dirpd_name FROM dir_pro_company AS com INNER JOIN dir_pro_department AS dept ON com.dirpc_dirpd_id = dept.dirpd_id WHERE com.dirpc_is_publish = '1' AND com.dirpc_effect_to IS NULL ORDER BY com.dirpc_name ASC
;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 03_search_all_data
-- ----------------------------
DROP PROCEDURE IF EXISTS `03_search_all_data`;
delimiter ;;
CREATE PROCEDURE `03_search_all_data`(IN roleid varchar(15),IN user_Id varchar(10),IN select_Group varchar(10),IN call_Type varchar(5),IN userlist varchar(20),IN from_Date varchar(20), IN to_date varchar(20),IN docketNo varchar(30), IN limitFrom int(10) , IN limitTo int(10),IN query_type VARCHAR(15),IN district VARCHAR(15),IN nature_of_call VARCHAR(15),IN call_status VARCHAR(10))
BEGIN
	#Routine body goes here...
	
  DECLARE sqlDesc VARCHAR(255);
  SET @selectGroup=trim(select_Group);
  SET @callType=trim(call_Type);
  SET @start_date=trim(from_Date);
	SET @end_date=trim(to_date);
  SET @userId=trim(user_Id);
  SET @limitFrom=trim(limitFrom);
  SET @limitTo=trim(limitTo);
  SET @docketNo=trim(docketNo);
  SET @userlist=TRIM(userlist);
  SET @roleId =TRIM(roleid); 
	SET @querytype =TRIM(query_type); 
	SET @district =TRIM(district); 
	SET @naturecall =TRIM(nature_of_call); 
	SET @call_status=Trim(call_status);
  
	IF(LENGTH(@limitFrom) <> 0)THEN
		SET @mainSQL="SELECT
		INCALL.CHDIC_docket_no,
		INCALL.CHDIC_caller_phNo,
		INCALL.CHDIC_caller_name,
		CALLERTYPE.chdct_type,
		INCALL.CHDIC_email,
		QT.chdqt_name,
		INCALL.CHDIC_detail_query,
		INCALL.CHDIC_Ans_caller,
		IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,
		EDU.chde_type_name,
		CT.chdct_name,
		INCALL.CHDIC_Inst_Name,
		DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,
		INCALL.CHDIC_Cast,
		INCALL.CHDIC_SNTCSSC_Address,
		INCALL.CHDIC_SNTCSSC_PIN,
		INCALL.CHDIC_Highest_Qua,
		INCALL.CHDIC_SNTCSSC_Appear_UPSCCSE,
		INCALL.CHDIC_SNTCSSC_No_Previous_Appearance,
		INCALL.CHDIC_SCC_Complain,
		IF(INCALL.`CHDIC_SCC_Complain`='NC','New Complain',IF(INCALL.`CHDIC_SCC_Complain`='EC','Existing Complain','')) AS COMPLAIN,
		INCALL.CHDIC_SCC_Docket_No,
		SCCINST.csi_inst_name,
		INCALL.CHDIC_SCC_Course_Applied,
		INCALL.CHDIC_SCC_Course_Category,
		DIROTED.chdsccdn_name,
		INCALL.CHDIC_SCC_Other_DirectorateName,
		INCALL.CHDIC_Passing_Year,
		INCALL.CHDIC_Preset_Course_Study,
		INCALL.CHDIC_Application_Id,
		INCALL.CHDIC_SCC_Call_Category,
		INCALL.CHDIC_SCC_Other_Call_Category,
		INCALL.CHDIC_SCC_Line_Transfer,
		SCCDEPT.CHDSCC_AD_Name,
		INCALL.CHDIC_SCC_Assigned_To,
		INCALL.CHDIC_Status_DocPer,
		INCALL.CHDIC_SCC_Duration_Pending,
		INCALL.CHDIC_Reg_PhNo,
		INCALL.CHDIC_SVMCM_Last_Exam_Qua,
		INCALL.CHDIC_SVMCM_Exam_Qua_Year,
		DIROC.chdd_name,
		INCALL.CHDIC_SVMCM_Reg_Date,
		LEXM.chdleq_name,
		ADDT.chdat_name,
		INCALL.CHDIC_UGPG_Other_Admi_Type,
		INCALL.CHDIC_WBSIS_Location,
		INCALL.CHDIC_WBSIS_Area,
		INCALL.CHDIC_WBSIS_Pancht_Name,
		INCALL.CHDIC_WBSIS_Ward_Name,
		INCALL.CHDIC_WBSIS_PIN,
		INCALL.CHDIC_WBSIS_Work_Exp,
		INCALL.CHDIC_WBSIS_Basic_Qua,
		INCALL.CHDIC_WBSIS_Discipline_Course,
		INCALL.CHDIC_WBSIS_Pct_Markes,
		INCALL.CHDIC_BS_Class,
		INCALL.CHDIC_BS_School_Name,
		INCALL.CHDIC_UTS_JobPosition,
		INCALL.CHDIC_UTS_OSMS_No,
		INCALL.CHDIC_UTS_StaffCategory,
		INCALL.CHDIC_UTS_TransManu,
		UTSDIST.District AS UTSDist,
		INCALL.CHDIC_UTS_Circle,
		INCALL.CHDIC_UTS_SchoolName,
		INCALL.CHDIC_UTS_TransferType,
		INCALL.CHDIC_UserId,
		INCALL.CHDIC_IP,
		INCALL.CHDIC_Sys_DateTime,
		csd.chd_direc_name,
		cji.chd_job_Iss_name,
		csh.chd_scheme_name,
		chg.chd_gender_name,
		cha.chd_area_name,
		chc.chd_country_name AS country,
		INCALL.chd_bficiary_name,
		INCALL.chd_reg_ssin,
		INCALL.chd_gp_wardno,
		INCALL.chd_area_other_name AS other_area,
		INCALL.chd_country_other_name AS other_Country,
		STATE.State_Name,
		INCALL.chd_state_other_name,
		DIST.District,
		INCALL.CHDIC_Other_District,
		cnc.chd_nature_call_name,
		INCALL.chd_res_phoneNo,
		INCALL.CHDIC_Call_Status
		FROM
		chd_inbound_call AS INCALL
		INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.CHDIC_caller_type = CALLERTYPE.chdct_id
		INNER JOIN chd_query_type AS QT ON INCALL.CHDIC_query_type = QT.chdqt_id
		INNER JOIN chd_education AS EDU ON INCALL.CHDIC_Edu_Grop = EDU.chde_id
		LEFT JOIN chd_call_type AS CT ON INCALL.CHDIC_Call_Type = CT.chdc_type_id
		LEFT JOIN chd_state AS STATE ON INCALL.CHDIC_State = STATE.SL
		LEFT JOIN chd_district AS DIST ON INCALL.CHDIC_District = DIST.Sl_No
		LEFT JOIN chd_scc_institutes AS SCCINST ON INCALL.CHDIC_SCC_InstName = SCCINST.csi_id
		LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.CHDIC_SCC_DirectorateName = DIROTED.chdsccdn_id
		LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id
		LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.CHDIC_SCC_Assign_Dept = SCCDEPT.CHDSCC_AD_Sl
		LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.CHDIC_UGPG_Last_Exam_Qua = LEXM.chdleq_id
		LEFT JOIN chd_add_type AS ADDT ON INCALL.CHDIC_UGPG_Admission_Type = ADDT.chdat_id
		LEFT JOIN chd_district AS UTSDIST ON INCALL.CHDIC_UTS_Dist = UTSDIST.Sl_No
		LEFT JOIN chd_ss_directorate AS csd ON INCALL.chd_directorate = csd.chd_direc_id
		LEFT JOIN chd_job_issue AS cji ON INCALL.chd_job_issue = cji.chd_job_Iss_id
		LEFT JOIN chd_scheme AS csh ON INCALL.chd_scheme = csh.chd_scheme_id
		LEFT JOIN chd_gender AS chg ON INCALL.chd_gender = chg.chd_gender_id
		LEFT JOIN chd_country AS chc ON INCALL.chd_country = chc.chd_country_id
		LEFT JOIN chd_area AS cha ON INCALL.chd_area = cha.chd_area_id
		LEFT JOIN chd_nature_call AS cnc ON INCALL.chd_nature_call = cnc.chd_nature_call_id";
	ELSE
		SET @mainSQL="SELECT
		INCALL.CHDIC_docket_no
		FROM
		chd_inbound_call AS INCALL";
	END IF;
	
		
IF (LENGTH(sqlDesc) <> 0) THEN
  IF(LENGTH(@userId) <> 0)THEN
    IF(@userId <> '900069')THEN
       IF(@roleId <> '2')THEN
          SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_UserId = '",@userId,"'");
       END IF;
    END IF;
  END IF;
ELSE
    IF(LENGTH(@userId) <> 0)THEN
      IF(@userId <> '900069')THEN
				 IF(@roleId <> '2')THEN
            SET sqlDesc=CONCAT("INCALL.CHDIC_UserId = '",@userId,"'");
         END IF;
      END IF;
    END IF;
END IF;

IF (LENGTH(sqlDesc) <> 0)THEN
   IF(LENGTH(@userlist) <> 0)THEN
       SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_UserId = '",@userlist,"'");
   END IF;
ELSE
   IF(LENGTH(@userlist) <> 0)THEN
       SET sqlDesc=CONCAT("INCALL.CHDIC_UserId = '",@userlist,"'");
   END IF;
END IF;

IF (LENGTH(sqlDesc) <> 0)THEN
   IF(LENGTH(@selectGroup) <> 0)THEN
       SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_Edu_Grop = '",@selectGroup,"'");
   END IF;
ELSE
   IF(LENGTH(@selectGroup) <> 0)THEN
       SET sqlDesc=CONCAT("INCALL.CHDIC_Edu_Grop = '",@selectGroup,"'");
   END IF;
END IF;

IF (LENGTH(sqlDesc) <> 0)THEN
   IF(LENGTH(@callType) <> 0)THEN
    SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_Call_Type = '",@callType,"'");
   END IF;
ELSE
   IF(LENGTH(@callType) <> 0)THEN
    SET sqlDesc=CONCAT("INCALL.CHDIC_Call_Type = '",@callType,"'");
   END IF;
END IF;
IF (LENGTH(sqlDesc) <> 0)THEN
   IF(LENGTH(@querytype) <> 0)THEN
    SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_query_type = '",@querytype,"'");
   END IF;
ELSE
   IF(LENGTH(@querytype) <> 0)THEN
    SET sqlDesc=CONCAT("INCALL.CHDIC_query_type = '",@querytype,"'");
   END IF;
END IF;

IF (LENGTH(sqlDesc) <> 0)THEN
   IF(LENGTH(@district) <> 0)THEN
    SET sqlDesc=CONCAT(TRIM(@district)," AND INCALL.CHDIC_District = '",@district,"'");
   END IF;
ELSE
   IF(LENGTH(@district) <> 0)THEN
    SET sqlDesc=CONCAT("INCALL.CHDIC_District = '",@district,"'");
   END IF;
END IF;

IF (LENGTH(sqlDesc) <> 0)THEN
   IF(LENGTH(@naturecall) <> 0)THEN
    SET sqlDesc=CONCAT(TRIM(@naturecall)," AND INCALL.chd_nature_call = '",@naturecall,"'");
   END IF;
ELSE
   IF(LENGTH(@naturecall) <> 0)THEN
    SET sqlDesc=CONCAT("INCALL.chd_nature_call = '",@naturecall,"'");
   END IF;
END IF;

--  Call chd_call_status   @call_status=Trim(call_status);
IF (LENGTH(sqlDesc) <> 0)THEN
   IF(LENGTH(@call_status) <> 0)THEN
    SET sqlDesc=CONCAT(TRIM(@call_status)," AND INCALL.CHDIC_Call_Status = '",@call_status,"'");
   END IF;
ELSE
   IF(LENGTH(@call_status) <> 0)THEN
    SET sqlDesc=CONCAT("INCALL.CHDIC_Call_Status = '",@call_status,"'");
   END IF;
END IF;


-- .................


IF (LENGTH(sqlDesc) <> 0)THEN
   IF(LENGTH(@end_date) <> 0)THEN
       SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND (INCALL.CHDID_SysDate >='",@start_date,"' AND INCALL.CHDID_SysDate <='",@end_date,"')");
   ELSE
    IF(LENGTH(@start_date) <> 0)THEN 
       SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDID_SysDate >='",@start_date,"'");
    END IF; 
   END IF;

ELSE
   IF(LENGTH(@end_date) <> 0)THEN
        SET sqlDesc=CONCAT("INCALL.CHDID_SysDate >='",@start_date,"' AND INCALL.CHDID_SysDate <='",@end_date,"'");
   ELSE
      IF(LENGTH(@start_date) <> 0)THEN 
        SET sqlDesc=CONCAT("INCALL.CHDID_SysDate >='",@start_date,"'");
   END IF;
  END IF;
END IF;

IF (LENGTH(sqlDesc) <> 0)THEN
	 IF(LENGTH(@docketNo) <> 0)THEN
		SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_docket_no = '",@docketNo,"'");
	 END IF;
ELSE
	 IF(LENGTH(@docketNo) <> 0)THEN
		SET sqlDesc=CONCAT("INCALL.CHDIC_docket_no = '",@docketNo,"'");
	 END IF;
END IF;

IF (LENGTH(sqlDesc) <> 0) THEN 
   SET @mainSQL=CONCAT(@mainSQL ," WHERE ", sqlDesc , " ORDER BY INCALL.`CHDIC_Sys_DateTime` DESC,substr(INCALL.CHDIC_docket_no,-4) DESC");
ELSE
   SET @mainSQL=CONCAT(@mainSQL ," ORDER BY INCALL.`CHDIC_Sys_DateTime` DESC,substr(INCALL.CHDIC_docket_no,-4) DESC");
END IF;

IF(LENGTH(@limitFrom) <> 0)THEN
    #SET sqlDesc=CONCAT(sqlDesc," LIMIT ",@limitFrom," , ",@limitTo,"");
	SET @mainSQL=CONCAT(@mainSQL ," LIMIT ", @limitFrom , ",",@limitTo);
END IF;


--  SELECT @mainSQL;

PREPARE stmt1 FROM @mainSQL;
EXECUTE stmt1;
#IN from_Date varchar(20), IN to_date varchar(20),
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 03_sskm_operator_entry
-- ----------------------------
DROP PROCEDURE IF EXISTS `03_sskm_operator_entry`;
delimiter ;;
CREATE PROCEDURE `03_sskm_operator_entry`(IN  userId varchar(50))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  
  PREPARE STMT FROM "SELECT fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'n/a') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'n/a') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status ,IF(fl.sskmfl_status='2','Complete',IF(fl.sskmfl_status='3','Hold','Re-Scan')) as app_status,fl.sskmfl_is_modification FROM sskm_folder_list AS fl WHERE fl.sskmfl_operator_id=? and fl.sskmfl_status>='2' ORDER BY fl.sskmfl_work_commit_time DESC ";
  #SELECT fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'n/a') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'n/a') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status FROM sskm_folder_list AS fl WHERE fl.sskmfl_operator_id=? and fl.sskmfl_status>='2'

  EXECUTE STMT USING @userId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 03_sskm_operator_entry_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `03_sskm_operator_entry_copy`;
delimiter ;;
CREATE PROCEDURE `03_sskm_operator_entry_copy`(IN  userId varchar(50))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  
  PREPARE STMT FROM "SELECT COUNT(fl.sskmfl_id) as total, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder FROM sskm_folder_list AS fl WHERE fl.sskmfl_operator_id = ? GROUP BY fl.sskmfl_year_mo_day_folder
";
  EXECUTE STMT USING @userId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 04_get_department_to_company
-- ----------------------------
DROP PROCEDURE IF EXISTS `04_get_department_to_company`;
delimiter ;;
CREATE PROCEDURE `04_get_department_to_company`(IN deptId int(10))
BEGIN
	#Routine body goes here...
	set @deptId=trim(deptId);
	PREPARE STMT FROM "SELECT com.dirpc_id, com.dirpc_name FROM dir_pro_company AS com WHERE com.dirpc_dirpd_id = ? AND com.dirpc_status = '1' AND com.dirpc_is_publish = '1' AND com.dirpc_effect_to IS NULL ORDER BY com.dirpc_name ASC
";
  EXECUTE STMT USING @deptId;
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 04_sskm_get_user_working_file
-- ----------------------------
DROP PROCEDURE IF EXISTS `04_sskm_get_user_working_file`;
delimiter ;;
CREATE PROCEDURE `04_sskm_get_user_working_file`(IN  folderId  varchar(50) , IN userId int(10), IN load_id int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @userId=trim(userId);
  SET @load_id =trim(load_id);
  
  PREPARE STMT FROM "SELECT sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id, sskml.sskmfl_work_start_time, DATE_FORMAT(sskml.sskmfl_work_start_time,'%d-%m-%Y %H:%i') as start_time, DATE_FORMAT(sskml.sskmfl_work_commit_time,'%d-%m-%Y %H:%i') as complete_time, sskml.sskmfl_work_commit_time, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no, DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date, sskml.sskmfl_admit_date, sskml.sskmfl_discharge_date, IF(sskml.sskmfl_is_pcase='0','No','Yes') as is_police_case, IF(sskml.sskmfl_is_death='0','No',DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y')) as is_death, IF(sskml.sskmfl_is_death='0','',DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y')) as death_date, sskml.sskmfl_is_death, sskml.sskmfl_is_pcase, sskml.sskmfl_death_date, sskml.sskmfl_patient_age_dmy, IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_sex, sskml.sskmfl_patient_age, sskml.sskmfl_residence, IF(sskml.sskmfl_status='2','Complete',IF(sskml.sskmfl_status='3','Hold','Re-Scan')) as app_status FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status>='2' AND sskml.sskmfl_id=?  AND sskml.sskmfl_operator_id=? LIMIT 0,1";
  EXECUTE STMT USING @folderId,@userId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 04_sskm_search_icd_admin_work_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `04_sskm_search_icd_admin_work_list`;
delimiter ;;
CREATE PROCEDURE `04_sskm_search_icd_admin_work_list`(IN  userId varchar(10), IN dateFrom varchar(100), IN  dateTo varchar(255), IN filterOption varchar(10) , IN regNo varchar(15), IN folder_name varchar(100), IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  SET @dateFrom=trim(dateFrom);
  SET @dateTo =trim(dateTo);
  SET @filterOption=trim(filterOption);
  SET @regNo =trim(regNo );
   SET @limitFrom  =trim(limitFrom );
  SET @limitTo  =trim(limitTo );
  SET @folder_name=trim(folder_name);
  #SET @sqlDesc=CONCAT("",@userId," ");  
  SET @sqlDesc="SELECT sskml.sskmfl_icd_status, sskml.sskmfl_icd_code ,sskml.sskmfl_icd_diseases_con, sskml.sskmfl_icd_remarks, sskml.sskmfl_id, sskml.sskmfl_reg_no, sskml.sskmfl_reg_no as r_no, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id, sskml.sskmfl_work_start_time, DATE_FORMAT(sskml.sskmfl_work_start_time,'%d-%m-%Y %H:%i') as start_time, DATE_FORMAT(sskml.sskmfl_work_commit_time,'%d-%m-%Y %H:%i') as complete_time, sskml.sskmfl_work_commit_time, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no, DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date, sskml.sskmfl_admit_date, sskml.sskmfl_discharge_date, IF(sskml.sskmfl_is_pcase='0','No','Yes') as is_police_case, IF(sskml.sskmfl_is_death='0','',DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y')) as is_death, sskml.sskmfl_is_death, sskml.sskmfl_is_pcase, sskml.sskmfl_death_date, sskml.sskmfl_patient_age_dmy, IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_sex, sskml.sskmfl_patient_age, sskml.sskmfl_residence, IF(sskml.sskmfl_status='2','Completed',IF(sskml.sskmfl_status='3','Hold','Re-Scan')) as app_status ,sskml.sskmfl_is_modification FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status='2' and sskml.sskmfl_icd_status>='2' ";
  #SET @sqlDesc=CONCAT(@sqlDesc,' AND   sskml.sskmfl_icd_operator_id=',@userId);
 #GROUP BY temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%Y-%m-%d') HAVING temp_file.dirputf_status IS NOT NULL
  
  IF LENGTH(@filterOption)>0 THEN #search My entry List
		SET @sqlDesc=CONCAT(@sqlDesc," AND sskml.sskmfl_status='",@filterOption,"'");
  END IF;
  IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_work_start_time>='",@dateFrom,"'");
	END IF;
  IF LENGTH(@dateTo)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_work_commit_time<='",@dateTo,"'");
	END IF;

  IF LENGTH(@regNo)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_patient_folder LIKE '",@regNo,"'");
	END IF;

 IF LENGTH(@folder_name)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_year_mo_day_folder = '",@folder_name,"'");
	END IF;
			SET @sqlDesc=CONCAT(@sqlDesc,' '," ORDER BY sskml.sskmfl_year_mo_day_folder ASC ");
  IF(@limitFrom<>'') THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," LIMIT ",@limitFrom," , ",@limitTo,"");
  END IF;

      


 
  
  #SET @sqlDesc=CONCAT(@sqlDesc," "," GROUP BY fl.sskmfl_year_mo_day_folder");
  #SET @sqlDesc=CONCAT(@sqlDesc,' ',' ');
 
  #SELECT @sqlDesc;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 04_sskm_search_icd_operator_work_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `04_sskm_search_icd_operator_work_list`;
delimiter ;;
CREATE PROCEDURE `04_sskm_search_icd_operator_work_list`(IN  userId int(10), IN dateFrom varchar(100), IN  dateTo varchar(255), IN filterOption varchar(10) , IN regNo varchar(15), IN folder_name varchar(100), IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  SET @dateFrom=trim(dateFrom);
  SET @dateTo =trim(dateTo);
  SET @filterOption=trim(filterOption);
  SET @regNo =trim(regNo );
   SET @limitFrom  =trim(limitFrom );
  SET @limitTo  =trim(limitTo );
  SET @folder_name=trim(folder_name);
  #SET @sqlDesc=CONCAT("",@userId," ");  
  SET @sqlDesc="SELECT sskml.sskmfl_icd_status, sskml.sskmfl_icd_code ,sskml.sskmfl_icd_diseases_con, sskml.sskmfl_icd_remarks, sskml.sskmfl_id, sskml.sskmfl_reg_no, sskml.sskmfl_reg_no as r_no, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id, sskml.sskmfl_work_start_time, DATE_FORMAT(sskml.sskmfl_work_start_time,'%d-%m-%Y %H:%i') as start_time, DATE_FORMAT(sskml.sskmfl_work_commit_time,'%d-%m-%Y %H:%i') as complete_time, sskml.sskmfl_work_commit_time, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no, DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date, sskml.sskmfl_admit_date, sskml.sskmfl_discharge_date, IF(sskml.sskmfl_is_pcase='0','No','Yes') as is_police_case, IF(sskml.sskmfl_is_death='0','',DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y')) as is_death, sskml.sskmfl_is_death, sskml.sskmfl_is_pcase, sskml.sskmfl_death_date, sskml.sskmfl_patient_age_dmy, IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_sex, sskml.sskmfl_patient_age, sskml.sskmfl_residence, IF(sskml.sskmfl_status='2','Completed',IF(sskml.sskmfl_status='3','Hold','Re-Scan')) as app_status ,sskml.sskmfl_is_modification FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status='2' and sskml.sskmfl_icd_status>='2' ";
  SET @sqlDesc=CONCAT(@sqlDesc,' AND   sskml.sskmfl_icd_operator_id=',@userId);
 #GROUP BY temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%Y-%m-%d') HAVING temp_file.dirputf_status IS NOT NULL
  
  IF LENGTH(@filterOption)>0 THEN #search My entry List
		SET @sqlDesc=CONCAT(@sqlDesc," AND sskml.sskmfl_status='",@filterOption,"'");
  END IF;
  IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_work_start_time>='",@dateFrom,"'");
	END IF;
  IF LENGTH(@dateTo)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_work_commit_time<='",@dateTo,"'");
	END IF;

  IF LENGTH(@regNo)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_patient_folder LIKE '",@regNo,"'");
	END IF;

 IF LENGTH(@folder_name)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_year_mo_day_folder = '",@folder_name,"'");
	END IF;
			SET @sqlDesc=CONCAT(@sqlDesc,' '," ORDER BY sskml.sskmfl_year_mo_day_folder ASC ");
  IF(@limitFrom<>'') THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," LIMIT ",@limitFrom," , ",@limitTo,"");
  END IF;

      


 
  
  #SET @sqlDesc=CONCAT(@sqlDesc," "," GROUP BY fl.sskmfl_year_mo_day_folder");
  #SET @sqlDesc=CONCAT(@sqlDesc,' ',' ');
 
  #SELECT @sqlDesc;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 04_sskm_search_operator_work_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `04_sskm_search_operator_work_list`;
delimiter ;;
CREATE PROCEDURE `04_sskm_search_operator_work_list`(IN  userId int(10), IN dateFrom varchar(100), IN  dateTo varchar(255), IN filterOption varchar(10) , IN regNo varchar(15), IN folder_name varchar(100), IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  SET @dateFrom=trim(dateFrom);
  SET @dateTo =trim(dateTo);
  SET @filterOption=trim(filterOption);
  SET @regNo =trim(regNo );
   SET @limitFrom  =trim(limitFrom );
  SET @limitTo  =trim(limitTo );
  SET @folder_name=trim(folder_name);
  #SET @sqlDesc=CONCAT("",@userId," ");  
  SET @sqlDesc="SELECT sskml.sskmfl_id, sskml.sskmfl_reg_no, sskml.sskmfl_reg_no as r_no, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id, sskml.sskmfl_work_start_time, DATE_FORMAT(sskml.sskmfl_work_start_time,'%d-%m-%Y %H:%i') as start_time, DATE_FORMAT(sskml.sskmfl_work_commit_time,'%d-%m-%Y %H:%i') as complete_time, sskml.sskmfl_work_commit_time, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no, DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date, sskml.sskmfl_admit_date, sskml.sskmfl_discharge_date, IF(sskml.sskmfl_is_pcase='0','No','Yes') as is_police_case, IF(sskml.sskmfl_is_death='0','No',DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y')) as is_death, sskml.sskmfl_is_death, sskml.sskmfl_is_pcase, sskml.sskmfl_death_date, sskml.sskmfl_patient_age_dmy, IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_sex, sskml.sskmfl_patient_age, sskml.sskmfl_residence, IF(sskml.sskmfl_status='2','Completed',IF(sskml.sskmfl_status='3','Hold',IF(sskml.sskmfl_status='4','Re-Scan','Request for PA number change.'))) as app_status ,sskml.sskmfl_is_modification FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status>='2' ";
  SET @sqlDesc=CONCAT(@sqlDesc,' AND   sskml.sskmfl_operator_id=',@userId);
 #GROUP BY temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%Y-%m-%d') HAVING temp_file.dirputf_status IS NOT NULL
  
  IF LENGTH(@filterOption)>0 THEN #search My entry List
		SET @sqlDesc=CONCAT(@sqlDesc," AND sskml.sskmfl_status='",@filterOption,"'");
  END IF;
  IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_work_start_time>='",@dateFrom,"'");
	END IF;
  IF LENGTH(@dateTo)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_work_commit_time<='",@dateTo,"'");
	END IF;

  IF LENGTH(@regNo)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_patient_folder LIKE '",@regNo,"%'");
	END IF;

   IF LENGTH(@folder_name)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_year_mo_day_folder = '",@folder_name,"'");
	END IF;
			SET @sqlDesc=CONCAT(@sqlDesc,' '," ORDER BY sskml.sskmfl_year_mo_day_folder ASC ");
  IF(@limitFrom<>'') THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," LIMIT ",@limitFrom," , ",@limitTo,"");
  END IF;

  


 
  
  #SET @sqlDesc=CONCAT(@sqlDesc," "," GROUP BY fl.sskmfl_year_mo_day_folder");
  #SET @sqlDesc=CONCAT(@sqlDesc,' ',' ');
 
  #SELECT @sqlDesc;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 04_sskm_search_operator_work_list_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `04_sskm_search_operator_work_list_copy`;
delimiter ;;
CREATE PROCEDURE `04_sskm_search_operator_work_list_copy`(IN  userId int(10), IN dateFrom varchar(100), IN  dateTo varchar(255), IN filterOption varchar(10) , IN regNo varchar(15), IN folder_name varchar(100), IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  SET @dateFrom=trim(dateFrom);
  SET @dateTo =trim(dateTo);
  SET @filterOption=trim(filterOption);
  SET @regNo =trim(regNo );
   SET @limitFrom  =trim(limitFrom );
  SET @limitTo  =trim(limitTo );
  SET @folder_name=trim(folder_name);
  #SET @sqlDesc=CONCAT("",@userId," ");  
  SET @sqlDesc="SELECT sskml.sskmfl_id, sskml.sskmfl_reg_no, sskml.sskmfl_reg_no as r_no, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id, sskml.sskmfl_work_start_time, DATE_FORMAT(sskml.sskmfl_work_start_time,'%d-%m-%Y %H:%i') as start_time, DATE_FORMAT(sskml.sskmfl_work_commit_time,'%d-%m-%Y %H:%i') as complete_time, sskml.sskmfl_work_commit_time, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no, DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date, sskml.sskmfl_admit_date, sskml.sskmfl_discharge_date, IF(sskml.sskmfl_is_pcase='0','No','Yes') as is_police_case, IF(sskml.sskmfl_is_death='0','No',DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y')) as is_death, sskml.sskmfl_is_death, sskml.sskmfl_is_pcase, sskml.sskmfl_death_date, sskml.sskmfl_patient_age_dmy, IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_sex, sskml.sskmfl_patient_age, sskml.sskmfl_residence, IF(sskml.sskmfl_status='2','Completed',IF(sskml.sskmfl_status='3','Hold','Re-Scan')) as app_status ,sskml.sskmfl_is_modification FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status>='2' ";
  SET @sqlDesc=CONCAT(@sqlDesc,' AND   sskml.sskmfl_operator_id=',@userId);
 #GROUP BY temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%Y-%m-%d') HAVING temp_file.dirputf_status IS NOT NULL
  
  IF LENGTH(@filterOption)>0 THEN #search My entry List
		SET @sqlDesc=CONCAT(@sqlDesc," AND sskml.sskmfl_status='",@filterOption,"'");
  END IF;
  IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_work_start_time>='",@dateFrom,"'");
	END IF;
  IF LENGTH(@dateTo)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_work_commit_time<='",@dateTo,"'");
	END IF;

  IF LENGTH(@regNo)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_patient_folder LIKE '",@regNo,"%'");
	END IF;

   IF LENGTH(@folder_name)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_year_mo_day_folder = '",@folder_name,"'");
	END IF;
			SET @sqlDesc=CONCAT(@sqlDesc,' '," ORDER BY sskml.sskmfl_year_mo_day_folder ASC ");
  IF(@limitFrom<>'') THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," LIMIT ",@limitFrom," , ",@limitTo,"");
  END IF;

  


 
  
  #SET @sqlDesc=CONCAT(@sqlDesc," "," GROUP BY fl.sskmfl_year_mo_day_folder");
  #SET @sqlDesc=CONCAT(@sqlDesc,' ',' ');
 
  #SELECT @sqlDesc;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 05_get_operator_working_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `05_get_operator_working_list`;
delimiter ;;
CREATE PROCEDURE `05_get_operator_working_list`(IN p_name varchar(100) , IN p_rg_no varchar(20), IN admt_dt varchar(15), IN dis_date varchar(15) , IN residence varchar(50), IN pc varchar(3), IN dc varchar(3) ,IN app_gender varchar(4),IN adm_no varchar(30),   In app_status varchar(3),IN p_fol_name varchar(7),  IN limitFrom int(10) , IN limitTo int(10),IN requestType varchar(10))
BEGIN
	#Routine body goes here...
	SET @p_name=trim(p_name);
  SET @p_rg_no=trim(p_rg_no);
  SET @admt_dt=trim(admt_dt);
	SET @dis_date=trim(dis_date);

  SET @residence =trim(residence );
  SET @pc =trim(pc );
  SET @dc =trim(dc );
	SET @app_status =trim(app_status );
  SET @app_gender =trim(app_gender );
  SET @adm_no =trim(adm_no );
  SET @limitFrom  =trim(limitFrom );
  SET @limitTo  =trim(limitTo );
  SET @p_fol_name  =trim(p_fol_name );
  SET @requestType=TRIM(requestType);
#p_fol_name   

  SET @sqlDesc="SELECT IF(LENGTH(ju.dirpu_mName)>0, CONCAT(ju.dirpu_fName,' ',ju.dirpu_mName,' ',ju.dirpu_lName),CONCAT(ju.dirpu_fName,' ',ju.dirpu_lName)) AS  full_name, fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'N/A') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'N/A') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status ,IF(fl.sskmfl_status='2','Complete',IF(fl.sskmfl_status='3','Hold','Re-Scan')) as app_status ,DATE_FORMAT(fl.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(fl.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date,  IF(fl.sskmfl_is_pcase='0','N','Y') as is_police_case, IF(fl.sskmfl_is_death='0','',DATE_FORMAT(fl.sskmfl_death_date,'%d-%m-%Y')) as is_death,  IF(fl.sskmfl_patient_age_dmy='Y','Year',IF(fl.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(fl.sskmfl_patient_age,' ',IF(fl.sskmfl_patient_age_dmy='Y','Year',IF(fl.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(fl.sskmfl_patient_sex='M','Male',IF(fl.sskmfl_patient_sex='F','Female','Others')) as p_gender, fl.sskmfl_patient_sex, fl.sskmfl_patient_age, fl.sskmfl_residence, IF(fl.sskmfl_status='2','Completed',IF(fl.sskmfl_status='3','Hold','Re-Scan')) as app_status ,fl.sskmfl_icd_code, fl.sskmfl_is_modification FROM sskm_folder_list AS fl INNER JOIN dir_pro_user AS ju ON  fl.sskmfl_operator_id = ju.dirpu_id WHERE  LENGTH(fl.sskmfl_status)>0";  
  IF LENGTH(@p_fol_name )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_year_mo_day_folder = '",@p_fol_name ,"'");
  END IF;
  IF LENGTH(@p_name )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_name like '",@p_name ,"%'");
  END IF;

  IF LENGTH(@p_rg_no  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_reg_no='",@p_rg_no,"'");
  END IF;

 IF LENGTH(@admt_dt  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_admit_date>='",@admt_dt,"'"  );
  END IF;

  IF LENGTH(@dis_date )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_discharge_date<='",@dis_date,"'" );
  END IF;

  IF LENGTH(@residence )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_residence='",@residence,"'" );
  END IF;

 IF LENGTH(@pc )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_is_pcase='",@pc,"'" );
  END IF;
  
  IF LENGTH(@dc )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_is_death='",@dc,"'" );
  END IF;

  IF LENGTH(@app_status  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_status='",@app_status,"'" );
  END IF;

  IF LENGTH(@app_gender  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_sex='",@app_gender ,"'" );
  END IF;
  IF LENGTH(@adm_no  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_folder='",@adm_no ,"'" );
  END IF;

  IF(@limitFrom<>'') THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," LIMIT ",@limitFrom," , ",@limitTo,"");
  END IF;

  IF(@requestType='1') THEN
   #download excel request process 
    SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_status='2'" );
  END IF;


 #SET @sqlDesc=CONCAT(@sqlDesc,' ',' ORDER BY fl.sskmfl_work_commit_time DESC' );
 #SELECT @sqlDesc;
 PREPARE STMT FROM @sqlDesc;
 EXECUTE STMT;

 
  
  #PREPARE STMT FROM " ORDER BY fl.sskmfl_work_commit_time DESC ";
  #SELECT fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'n/a') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'n/a') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status FROM sskm_folder_list AS fl WHERE fl.sskmfl_operator_id=? and fl.sskmfl_status>='2'

  #EXECUTE STMT ;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 05_get_operator_working_list_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `05_get_operator_working_list_copy`;
delimiter ;;
CREATE PROCEDURE `05_get_operator_working_list_copy`(IN p_name varchar(100) , IN p_rg_no varchar(20), IN admt_dt varchar(15), IN dis_date varchar(15) , IN residence varchar(50), IN pc varchar(3), IN dc varchar(3) ,IN app_gender varchar(4),IN adm_no varchar(30),   In app_status varchar(3),IN p_fol_name varchar(7),  IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
	SET @p_name=trim(p_name);
  SET @p_rg_no=trim(p_rg_no);
  SET @admt_dt=trim(admt_dt);
	SET @dis_date=trim(dis_date);

  SET @residence =trim(residence );
  SET @pc =trim(pc );
  SET @dc =trim(dc );
	SET @app_status =trim(app_status );
  SET @app_gender =trim(app_gender );
  SET @adm_no =trim(adm_no );
  SET @limitFrom  =trim(limitFrom );
  SET @limitTo  =trim(limitTo );
  SET @p_fol_name  =trim(p_fol_name );
#p_fol_name   

  SET @sqlDesc="SELECT IF(LENGTH(ju.dirpu_mName)>0, CONCAT(ju.dirpu_fName,' ',ju.dirpu_mName,' ',ju.dirpu_lName),CONCAT(ju.dirpu_fName,' ',ju.dirpu_lName)) AS  full_name, fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'N/A') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'N/A') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status ,IF(fl.sskmfl_status='2','Complete',IF(fl.sskmfl_status='3','Hold','Re-Scan')) as app_status ,DATE_FORMAT(fl.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(fl.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date,  IF(fl.sskmfl_is_pcase='0','No','Yes') as is_police_case, IF(fl.sskmfl_is_death='0','No',DATE_FORMAT(fl.sskmfl_death_date,'%d-%m-%Y')) as is_death,  IF(fl.sskmfl_patient_age_dmy='Y','Year',IF(fl.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(fl.sskmfl_patient_age,' ',IF(fl.sskmfl_patient_age_dmy='Y','Year',IF(fl.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(fl.sskmfl_patient_sex='M','Male',IF(fl.sskmfl_patient_sex='F','Female','Others')) as p_gender, fl.sskmfl_patient_sex, fl.sskmfl_patient_age, fl.sskmfl_residence, IF(fl.sskmfl_status='2','Completed',IF(fl.sskmfl_status='3','Hold','Re-Scan')) as app_status ,fl.sskmfl_is_modification FROM sskm_folder_list AS fl INNER JOIN dir_pro_user AS ju ON  fl.sskmfl_operator_id = ju.dirpu_id WHERE  LENGTH(fl.sskmfl_status)>0";  
  IF LENGTH(@p_fol_name )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_year_mo_day_folder = '",@p_fol_name ,"'");
  END IF;
  IF LENGTH(@p_name )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_name like '",@p_name ,"%'");
  END IF;

  IF LENGTH(@p_rg_no  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_reg_no='",@p_rg_no,"'");
  END IF;

 IF LENGTH(@admt_dt  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_admit_date>='",@admt_dt,"'"  );
  END IF;

  IF LENGTH(@dis_date )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_discharge_date<='",@dis_date,"'" );
  END IF;

  IF LENGTH(@residence )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_residence='",@residence,"'" );
  END IF;

 IF LENGTH(@pc )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_is_pcase='",@pc,"'" );
  END IF;
  
  IF LENGTH(@dc )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_is_death='",@dc,"'" );
  END IF;

  IF LENGTH(@app_status  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_status='",@app_status,"'" );
  END IF;

  IF LENGTH(@app_gender  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_sex='",@app_gender ,"'" );
  END IF;
  IF LENGTH(@adm_no  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_folder='",@adm_no ,"'" );
  END IF;

  IF(@limitFrom<>'') THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," LIMIT ",@limitFrom," , ",@limitTo,"");
  END IF;


 #SET @sqlDesc=CONCAT(@sqlDesc,' ',' ORDER BY fl.sskmfl_work_commit_time DESC' );
 #SELECT @sqlDesc;
 PREPARE STMT FROM @sqlDesc;
 EXECUTE STMT;

 
  
  #PREPARE STMT FROM " ORDER BY fl.sskmfl_work_commit_time DESC ";
  #SELECT fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'n/a') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'n/a') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status FROM sskm_folder_list AS fl WHERE fl.sskmfl_operator_id=? and fl.sskmfl_status>='2'

  #EXECUTE STMT ;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 05_get_user_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `05_get_user_list`;
delimiter ;;
CREATE PROCEDURE `05_get_user_list`()
BEGIN
	#Routine body goes here...
#SELECT users.dirpu_id,users.dirpu_role, if(users.dirpu_mName is NULL,CONCAT(users.dirpu_fName,' ',users.dirpu_lName),CONCAT(users.dirpu_fName,' ',users.dirpu_mName,' ',users.dirpu_lName)) AS fullName, users.dirpu_fName, users.dirpu_mName, users.dirpu_lName, users.dirpu_email, users.dirpu_password,if(users.dirpu_user_type='1','Application User',if(users.dirpu_user_type='2','Others User','Admin User')) AS userType, users.dirpu_user_type, users.dirpu_user_dept, users.dirpu_user_com, users.dirpu_phone, users.dirpu_address, users.dirpu_status, if(users.dirpu_status='1','Active','In-Active') AS acc_status, if(ud.dirpd_name IS NULL,"N/A",ud.dirpd_name) AS dept, ud.dirpd_name, if(com.dirpc_name IS NULL,'N/A',com.dirpc_name) AS com, com.dirpc_name, up.dirpp_name FROM dir_pro_user AS users LEFT JOIN dir_pro_department AS ud ON users.dirpu_user_dept = ud.dirpd_id LEFT JOIN dir_pro_company AS com ON users.dirpu_user_com = com.dirpc_id INNER JOIN dir_pro_priviledge AS up ON users.dirpu_role = up.dirpp_id WHERE users.dirpu_is_publish = '1' AND users.dirpu_effect_to IS NULL;
SELECT USER.`CHDUSER_Id`,USER.`CHDUSER_Role`,IF(USER.`CHDUSER_MName` is NULL,CONCAT(USER.`CHDUSER_FName`,' ',USER.`CHDUSER_LName`),CONCAT(USER.`CHDUSER_FName`,' ',USER.`CHDUSER_MName`,' ',USER.`CHDUSER_LName`)) AS fullName
,USER.`CHDUSER_FName`,USER.CHDUSER_MName,USER.CHDUSER_Address,USER.`CHDUSER_LName`,USER.`CHDUSER_NGS`,USER.`CHDUSER_Email`,USER.`CHDUSER_UserName`,USER.`CHDUSER_Password`,USER.CHDUSER_PhNo,USER.`CHDUSER_UserType`,USER.`CHDUSER_PhNo`,USER.`CHDUSER_Image`,USER.`CHDUSER_Status`, if(USER.`CHDUSER_Status`='1','Active','In-Active') AS acc_status,PRE.dirpp_name FROM `chd_user_admin` AS USER INNER JOIN dir_pro_priviledge AS PRE ON USER.`CHDUSER_Role`= PRE.dirpp_id WHERE USER.`CHDUSER_Is_Public`='1'  AND USER.`CHDUSER_Effect_To` IS  NULL;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 05_get_user_list_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `05_get_user_list_copy`;
delimiter ;;
CREATE PROCEDURE `05_get_user_list_copy`()
BEGIN
	#Routine body goes here...
SELECT users.dirpu_id, if(users.dirpu_mName is NULL,CONCAT(users.dirpu_fName,' ',users.dirpu_lName),CONCAT(users.dirpu_fName,' ',users.dirpu_mName,' ',users.dirpu_lName)) AS fullName, users.dirpu_fName, users.dirpu_mName, users.dirpu_lName, users.dirpu_email, users.dirpu_password,if(users.dirpu_user_type='1','Application User','Uploders') AS userType, users.dirpu_user_type, users.dirpu_user_dept, users.dirpu_user_com, users.dirpu_phone, users.dirpu_address, users.dirpu_status, if(users.dirpu_status='1','Active','In-Active') AS acc_status, if(ud.dirpd_name IS NULL,"N/A",ud.dirpd_name) AS dept, ud.dirpd_name, if(com.dirpc_name IS NULL,'N/A',com.dirpc_name) AS com, com.dirpc_name, up.dirpp_name FROM dir_pro_user AS users LEFT JOIN dir_pro_department AS ud ON users.dirpu_user_dept = ud.dirpd_id LEFT JOIN dir_pro_company AS com ON users.dirpu_user_com = com.dirpc_id INNER JOIN dir_pro_priviledge AS up ON users.dirpu_role = up.dirpp_id WHERE users.dirpu_is_publish = '1' AND users.dirpu_effect_to IS NULL
;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 06_get_operator_mod_working_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `06_get_operator_mod_working_list`;
delimiter ;;
CREATE PROCEDURE `06_get_operator_mod_working_list`()
BEGIN
	#Routine body goes here...

#adm_no  

  SET @sqlDesc="SELECT IF(LENGTH(ju.dirpu_mName)>0, CONCAT(ju.dirpu_fName,' ',ju.dirpu_mName,' ',ju.dirpu_lName),CONCAT(ju.dirpu_fName,' ',ju.dirpu_lName)) AS  full_name, fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'N/A') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'N/A') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status ,IF(fl.sskmfl_status='2','Complete',IF(fl.sskmfl_status='3','Hold','Re-Scan')) as app_status,fl.sskmfl_is_modification,fl.sskmfl_mod_request_reason FROM sskm_folder_list AS fl INNER JOIN dir_pro_user AS ju ON  fl.sskmfl_operator_id = ju.dirpu_id WHERE  fl.sskmfl_is_modification='1'";  

 PREPARE STMT FROM @sqlDesc;
 EXECUTE STMT;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 06_operator_working_list_counter
-- ----------------------------
DROP PROCEDURE IF EXISTS `06_operator_working_list_counter`;
delimiter ;;
CREATE PROCEDURE `06_operator_working_list_counter`(IN p_name varchar(100) , IN p_rg_no varchar(20), IN admt_dt varchar(15), IN dis_date varchar(15) , IN residence varchar(50), IN pc varchar(3), IN dc varchar(3) ,IN app_gender varchar(4),IN adm_no varchar(30),   In app_status varchar(3),IN p_fol_name varchar(7),  IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
	SET @p_name=trim(p_name);
  SET @p_rg_no=trim(p_rg_no);
  SET @admt_dt=trim(admt_dt);
	SET @dis_date=trim(dis_date);

  SET @residence =trim(residence );
  SET @pc =trim(pc );
  SET @dc =trim(dc );
	SET @app_status =trim(app_status );
  SET @app_gender =trim(app_gender );
  SET @adm_no =trim(adm_no );
  SET @limitFrom  =trim(limitFrom );
  SET @limitTo  =trim(limitTo );
  SET @p_fol_name  =trim(p_fol_name );
#adm_no  

  SET @sqlDesc="SELECT fl.sskmfl_patient_name  FROM sskm_folder_list AS fl INNER JOIN dir_pro_user AS ju ON  fl.sskmfl_operator_id = ju.dirpu_id WHERE  LENGTH(fl.sskmfl_status)>0";  
  IF LENGTH(@p_name )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_name like '",@p_name ,"%'");
  END IF;
  IF LENGTH(@p_fol_name )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_year_mo_day_folder = '",@p_fol_name ,"'");
  END IF;

  IF LENGTH(@p_rg_no  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_reg_no='",@p_rg_no,"'");
  END IF;

 IF LENGTH(@admt_dt  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_admit_date>='",@admt_dt,"'"  );
  END IF;

  IF LENGTH(@dis_date )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_discharge_date<='",@dis_date,"'" );
  END IF;

  IF LENGTH(@residence )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_residence='",@residence,"'" );
  END IF;

 IF LENGTH(@pc )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_is_pcase='",@pc,"'" );
  END IF;
  
  IF LENGTH(@dc )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_is_death='",@dc,"'" );
  END IF;

  IF LENGTH(@app_status  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_status='",@app_status,"'" );
  END IF;

  IF LENGTH(@app_gender  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_sex='",@app_gender ,"'" );
  END IF;
  IF LENGTH(@adm_no  )>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND fl.sskmfl_patient_folder='",@adm_no ,"'" );
  END IF;

  IF(@limitFrom<>'') THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' '," LIMIT ",@limitFrom," , ",@limitTo,"");
  END IF;


 #SET @sqlDesc=CONCAT(@sqlDesc,' ',' ORDER BY fl.sskmfl_work_commit_time DESC' );
 #SELECT @sqlDesc;
 PREPARE STMT FROM @sqlDesc;
 EXECUTE STMT;

 
  
  #PREPARE STMT FROM " ORDER BY fl.sskmfl_work_commit_time DESC ";
  #SELECT fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'n/a') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'n/a') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status FROM sskm_folder_list AS fl WHERE fl.sskmfl_operator_id=? and fl.sskmfl_status>='2'

  #EXECUTE STMT ;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 06_sskm_get_file_by_id
-- ----------------------------
DROP PROCEDURE IF EXISTS `06_sskm_get_file_by_id`;
delimiter ;;
CREATE PROCEDURE `06_sskm_get_file_by_id`(IN  folderId  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);

  
  PREPARE STMT FROM "SELECT IF(LENGTH(ju.dirpu_mName)>0, CONCAT(ju.dirpu_fName,' ',ju.dirpu_mName,' ',ju.dirpu_lName),CONCAT(ju.dirpu_fName,' ',ju.dirpu_lName)) AS  full_name, sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id, sskml.sskmfl_work_start_time, DATE_FORMAT(sskml.sskmfl_work_start_time,'%d-%m-%Y %H:%i') as start_time, DATE_FORMAT(sskml.sskmfl_work_commit_time,'%d-%m-%Y %H:%i') as complete_time, sskml.sskmfl_work_commit_time, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no, DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date, sskml.sskmfl_admit_date, sskml.sskmfl_discharge_date, IF(sskml.sskmfl_is_pcase='0','No','Yes') as is_police_case, IF(sskml.sskmfl_is_death='0','No',DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y')) as is_death, sskml.sskmfl_is_death, sskml.sskmfl_is_pcase, sskml.sskmfl_death_date, sskml.sskmfl_patient_age_dmy, IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_sex, sskml.sskmfl_patient_age, sskml.sskmfl_residence, IF(sskml.sskmfl_status='2','Complete',IF(sskml.sskmfl_status='3','Hold','Re-Scan')) as app_status FROM sskm_folder_list AS sskml INNER JOIN dir_pro_user AS ju ON sskml.sskmfl_operator_id = ju.dirpu_id WHERE sskml.sskmfl_status>='2' AND sskml.sskmfl_id=?   LIMIT 0,1";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 06_user_login
-- ----------------------------
DROP PROCEDURE IF EXISTS `06_user_login`;
delimiter ;;
CREATE PROCEDURE `06_user_login`(IN  userId varchar(100), IN userPass varchar(100))
BEGIN
	#Routine body goes here...
	set @userId=trim(userId);
  set @userPass=trim(userPass);
	PREPARE STMT FROM "SELECT users.dirpu_id, if(users.dirpu_mName is NULL,CONCAT(users.dirpu_fName,' ',users.dirpu_lName),CONCAT(users.dirpu_fName,' ',users.dirpu_mName,' ',users.dirpu_lName)) as fullName,  users.dirpu_user_type, users.dirpu_user_dept, users.dirpu_user_com,  users.dirpu_status,users.dirpu_role as role,  if(ud.dirpd_name IS NULL,'N/A',ud.dirpd_name) as dept, ud.dirpd_name, if(com.dirpc_name IS NULL,'N/A',com.dirpc_name) as com, com.dirpc_name FROM dir_pro_user AS users LEFT JOIN dir_pro_department AS ud ON users.dirpu_user_dept = ud.dirpd_id LEFT JOIN dir_pro_company AS com ON users.dirpu_user_com = com.dirpc_id WHERE users.dirpu_is_publish = '1' AND  users.dirpu_user_type<>'3' AND users.dirpu_effect_to IS NULL AND users.dirpu_email = ? AND users.dirpu_password = ?
";
  EXECUTE STMT USING @userId,@userPass;
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 06_user_login_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `06_user_login_copy`;
delimiter ;;
CREATE PROCEDURE `06_user_login_copy`(IN  userId varchar(100), IN userPass varchar(100))
BEGIN
	#Routine body goes here...
	set @userId=trim(userId);
  set @userPass=trim(userPass);
	PREPARE STMT FROM "SELECT users.dirpu_id, if(users.dirpu_mName is NULL,CONCAT(users.dirpu_fName,' ',users.dirpu_lName),CONCAT(users.dirpu_fName,' ',users.dirpu_mName,' ',users.dirpu_lName)) as fullName,  users.dirpu_user_type, users.dirpu_user_dept, users.dirpu_user_com,  users.dirpu_status,users.dirpu_role as role,  if(ud.dirpd_name IS NULL,'N/A',ud.dirpd_name) as dept, ud.dirpd_name, if(com.dirpc_name IS NULL,'N/A',com.dirpc_name) as com, com.dirpc_name FROM dir_pro_user AS users LEFT JOIN dir_pro_department AS ud ON users.dirpu_user_dept = ud.dirpd_id LEFT JOIN dir_pro_company AS com ON users.dirpu_user_com = com.dirpc_id WHERE users.dirpu_is_publish = '1' AND users.dirpu_effect_to IS NULL AND users.dirpu_email = ? AND users.dirpu_password = ?
";
  EXECUTE STMT USING @userId,@userPass;
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 07_search_application
-- ----------------------------
DROP PROCEDURE IF EXISTS `07_search_application`;
delimiter ;;
CREATE PROCEDURE `07_search_application`(IN  deptId int(10), IN compId int(10), IN seaerchKey varchar(255))
BEGIN
	#Routine body goes here...
	set @deptId=trim(deptId);
  set @compId=trim(compId);
  set @seaerchKey=trim(seaerchKey);
  SET @seaerchKey=CONCAT("'%",@seaerchKey,"%'");
	PREPARE STMT FROM "SELECT tfile.tf_fileTile, tfile.tf_keywords, tfile.tf_fileLoc FROM temp_file AS tfile WHERE tfile.tf_dept_id = ? AND tfile.tf_com_id = ? AND ( tfile.tf_keywords like ? or tfile.tf_fileTile LIKE ? )
";
 
  EXECUTE STMT USING @deptId,@compId,@seaerchKey,@seaerchKey;
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 07_sskm_get_file_by_id
-- ----------------------------
DROP PROCEDURE IF EXISTS `07_sskm_get_file_by_id`;
delimiter ;;
CREATE PROCEDURE `07_sskm_get_file_by_id`(IN  folderId  varchar(50))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);

  
  PREPARE STMT FROM "SELECT sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id, sskml.sskmfl_work_start_time, DATE_FORMAT(sskml.sskmfl_work_start_time,'%d-%m-%Y %H:%i') as start_time, DATE_FORMAT(sskml.sskmfl_work_commit_time,'%d-%m-%Y %H:%i') as complete_time, sskml.sskmfl_work_commit_time, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no, DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y') as admit_date, DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y') as discharge_date, sskml.sskmfl_admit_date, sskml.sskmfl_discharge_date, IF(sskml.sskmfl_is_pcase='0','No','Yes') as is_police_case, IF(sskml.sskmfl_is_death='0','No',DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y')) as is_death, sskml.sskmfl_is_death, sskml.sskmfl_is_pcase, sskml.sskmfl_death_date, sskml.sskmfl_patient_age_dmy, IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day')) as age_day_month_year, CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y',IF(sskml.sskmfl_patient_age>1,'Years','Year'),IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_sex, sskml.sskmfl_patient_age, sskml.sskmfl_residence, IF(sskml.sskmfl_status='2','Complete',IF(sskml.sskmfl_status='3','Hold','Re-Scan')) as app_status FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status>='0' AND sskml.sskmfl_id=?   LIMIT 0,1";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 08_get_chield_menu
-- ----------------------------
DROP PROCEDURE IF EXISTS `08_get_chield_menu`;
delimiter ;;
CREATE PROCEDURE `08_get_chield_menu`(IN  menuId int(10))
BEGIN
	#Routine body goes here...
	SET @menuId=trim(menuId);
  PREPARE STMT FROM "SELECT dirpm.dirpm_id, dirpm.dirpm_name, dirpm.dirpm_title, dirpm.dirpm_display_order, dirpm.dirpm_url, dirpm.dirpm_type, dirpm.dirpm_icon, dirpm.dirpm_valid_from, if(dirpm.dirpm_is_active='1','Active','In-Active') as active_status, dirpm.dirpm_is_active,if(dirpm.dirpm_menu_type='0','Admin Menu','User Menu') as menuType FROM dir_pro_menu AS dirpm where dirpm.dirpm_type=?  and  dirpm.dirpm_is_active='1' and dirpm.dirpm_valid_to IS NULL  ORDER BY dirpm.dirpm_display_order ASC, dirpm.dirpm_display_order ASC";
  EXECUTE STMT USING @menuId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 08_sskm_patient_list_search
-- ----------------------------
DROP PROCEDURE IF EXISTS `08_sskm_patient_list_search`;
delimiter ;;
CREATE PROCEDURE `08_sskm_patient_list_search`()
BEGIN
	#Routine body goes here...
	
  
  PREPARE STMT FROM "SELECT IF(LENGTH(ju.dirpu_mName)>0, CONCAT(ju.dirpu_fName,' ',ju.dirpu_mName,' ',ju.dirpu_lName),CONCAT(ju.dirpu_fName,' ',ju.dirpu_lName)) AS  full_name, fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'N/A') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'N/A') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status ,IF(fl.sskmfl_status='2','Complete',IF(fl.sskmfl_status='3','Hold','Re-Scan')) as app_status FROM sskm_folder_list AS fl INNER JOIN dir_pro_user AS ju ON  fl.sskmfl_operator_id = ju.dirpu_id WHERE  fl.sskmfl_status>='2' ORDER BY fl.sskmfl_work_commit_time DESC ";
  #SELECT fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'n/a') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'n/a') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status FROM sskm_folder_list AS fl WHERE fl.sskmfl_operator_id=? and fl.sskmfl_status>='2'

  EXECUTE STMT ;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 09_get_prv_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `09_get_prv_list`;
delimiter ;;
CREATE PROCEDURE `09_get_prv_list`(IN  prvId  int(10))
BEGIN
	#Routine body goes here...
	SET @prvId=trim(prvId);
  PREPARE STMT FROM "SELECT pl.dirpppl_id, pl.dirpppl_dirpm_id, pl.dirpppl_dirpup_id, pl.dirpppl_parent_id, pl.dirpppl_is_view, pl.dirpppl_is_add, pl.dirpppl_is_edit, pl.dirpppl_is_del FROM dir_pro_previledge_list AS pl WHERE pl.dirpppl_dirpup_id = ?
";
  EXECUTE STMT USING @prvId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 09_sskm_icd_search_panel
-- ----------------------------
DROP PROCEDURE IF EXISTS `09_sskm_icd_search_panel`;
delimiter ;;
CREATE PROCEDURE `09_sskm_icd_search_panel`(IN  app_year varchar(10), IN app_month  varchar(10), IN start_date varchar(50) , IN end_date varchar(50))
BEGIN
	#Routine body goes here...
	SET @app_year  =trim(app_year);
  SET @app_month  =trim(app_month);
  SET @start_date =trim(start_date);
	SET @end_date =trim(end_date);
  SET @sqlDesc="SELECT COUNT(sskml.sskmfl_id) as total_files, sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status='2' AND (sskml.sskmfl_icd_status='0' AND sskml.sskmfl_icd_operator_id IS NULL)";  
  #PREPARE STMT FROM "SELECT dirputf.dirputf_id, dirputf.dirputf_dirpff_id, dirputf.dirputf_dirpfl_id,dirputf.dirputf_dept_id, dirputf.dirputf_comp_id, dirputf.dirputf_file_entry_name, dirputf.dirputf_file_keywords, dirputf.dirputf_add_time, dirputf.dirputf_updt_cntr, dirputf.dirputf_index_file_name FROM dir_pro_user_temp_file AS dirputf WHERE dirputf.dirputf_status = '0' AND dirputf.dirputf_uploder_id = ? and dirputf.dirputf_dirpfl_id=? ";
  #EXECUTE STMT USING @userId,@folderId;
  IF LENGTH(@app_year)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND sskml.sskmfl_year=',@app_year);
  END IF;

  IF LENGTH(@app_month)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_month='",@app_month,"'");
  END IF;
	
	IF LENGTH(@start_date)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_add_time>='",@start_date,"'");
  END IF;

	IF LENGTH(@end_date)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' '," AND sskml.sskmfl_add_time<='",@end_date,"'");
  END IF;

  SET @sqlDesc=CONCAT(@sqlDesc,' ',' GROUP BY sskml.sskmfl_year_mo_day_folder ','');
  #SELECT @sqlDesc;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 10_get_user_authorised_menu
-- ----------------------------
DROP PROCEDURE IF EXISTS `10_get_user_authorised_menu`;
delimiter ;;
CREATE PROCEDURE `10_get_user_authorised_menu`(IN  prvId  int(10))
BEGIN
	#Routine body goes here...
	SET @prvId=trim(prvId);
  PREPARE STMT FROM "SELECT pl.dirpppl_dirpup_id, GROUP_CONCAT(menu.dirpm_url) as urls FROM dir_pro_previledge_list AS pl INNER JOIN dir_pro_priviledge AS priv ON pl.dirpppl_dirpup_id = priv.dirpp_id INNER JOIN dir_pro_menu AS menu ON pl.dirpppl_dirpm_id = menu.dirpm_id WHERE pl.dirpppl_dirpup_id = ? AND priv.dirpp_status = '1' AND priv.dirpp_is_publish = '1' AND priv.dirpp_effect_to IS NULL AND menu.dirpm_is_active = '1' AND menu.dirpm_valid_to IS NULL  AND menu.dirpm_url <>'#' GROUP BY pl.dirpppl_dirpup_id
";
  EXECUTE STMT USING @prvId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 10_sskm_get_curr_icd_woring_file
-- ----------------------------
DROP PROCEDURE IF EXISTS `10_sskm_get_curr_icd_woring_file`;
delimiter ;;
CREATE PROCEDURE `10_sskm_get_curr_icd_woring_file`(IN  folderId  varchar(50))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  
  PREPARE STMT FROM "SELECT CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no,IF(LENGTH(sskml.sskmfl_admit_date)>0,DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y'),'') as admit_date,IF(LENGTH(sskml.sskmfl_discharge_date)>0,DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y'),'') as dis_date,IF(LENGTH(sskml.sskmfl_death_date)>0,DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y'),'') as death_date, sskml.sskmfl_admit_date,sskml.sskmfl_discharge_date, sskml.sskmfl_is_death,sskml.sskmfl_is_pcase,sskml.sskmfl_death_date,sskml.sskmfl_patient_age,sskml.sskmfl_patient_age_dmy,sskml.sskmfl_patient_sex,sskml.sskmfl_residence,
  sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status='2' AND sskml.sskmfl_icd_status='0'  AND sskml.sskmfl_year_mo_day_folder=? LIMIT 0,1";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 11_get_user_submenu_by_prv
-- ----------------------------
DROP PROCEDURE IF EXISTS `11_get_user_submenu_by_prv`;
delimiter ;;
CREATE PROCEDURE `11_get_user_submenu_by_prv`(IN  menuId  int(10), IN  prvId  int(10))
BEGIN
	#Routine body goes here...
	SET @menuId=trim(menuId);
  SET @prvId=trim(prvId);
  PREPARE STMT FROM "SELECT menu.dirpm_id, menu.dirpm_name, menu.dirpm_title, menu.dirpm_display_order, menu.dirpm_url, menu.dirpm_icon FROM dir_pro_menu AS menu WHERE menu.dirpm_id IN (SELECT upl.dirpppl_dirpm_id FROM dir_pro_previledge_list AS upl WHERE upl.dirpppl_dirpup_id = ? AND upl.dirpppl_parent_id = ?) AND menu.dirpm_is_active = '1' AND menu.dirpm_valid_to IS NULL
";
  EXECUTE STMT USING @prvId,@menuId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 11_sskm_get_operator_icd_mod_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `11_sskm_get_operator_icd_mod_list`;
delimiter ;;
CREATE PROCEDURE `11_sskm_get_operator_icd_mod_list`()
BEGIN
	#Routine body goes here...

#adm_no  

  SET @sqlDesc="SELECT fl.sskmfl_icd_status, IF(LENGTH(ju.dirpu_mName)>0, CONCAT(ju.dirpu_fName,' ',ju.dirpu_mName,' ',ju.dirpu_lName),CONCAT(ju.dirpu_fName,' ',ju.dirpu_lName)) AS  full_name, fl.sskmfl_operator_id, fl.sskmfl_id, fl.sskmfl_work_commit_time, fl.sskmfl_year_mo_day_folder, fl.sskmfl_patient_folder, fl.sskmfl_num_of_files, IF(fl.sskmfl_status='2',fl.sskmfl_patient_name,'N/A') AS p_name, IF(fl.sskmfl_status='2',fl.sskmfl_reg_no,'N/A') AS r_no, fl.sskmfl_patient_name, fl.sskmfl_reg_no, fl.sskmfl_status ,IF(fl.sskmfl_status='2','Complete',IF(fl.sskmfl_status='3','Hold','Re-Scan')) as app_status,fl.sskmfl_icd_mod_req_time,fl.sskmfl_icd_mod_reason, fl.sskmfl_is_modification FROM sskm_folder_list AS fl INNER JOIN dir_pro_user AS ju ON  fl.sskmfl_icd_operator_id = ju.dirpu_id WHERE  fl.sskmfl_icd_status='3'";  

 PREPARE STMT FROM @sqlDesc;
 EXECUTE STMT;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 12_sskm_icd_file_data
-- ----------------------------
DROP PROCEDURE IF EXISTS `12_sskm_icd_file_data`;
delimiter ;;
CREATE PROCEDURE `12_sskm_icd_file_data`(IN  folderId  varchar(50))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  
  PREPARE STMT FROM "SELECT CONCAT(sskml.sskmfl_patient_age,' ',IF(sskml.sskmfl_patient_age_dmy='Y','Year',IF(sskml.sskmfl_patient_age_dmy='M','Month','Day'))) as p_age, IF(sskml.sskmfl_patient_sex='M','Male',IF(sskml.sskmfl_patient_sex='F','Female','Others')) as p_gender, sskml.sskmfl_patient_name, sskml.sskmfl_reg_no,IF(LENGTH(sskml.sskmfl_admit_date)>0,DATE_FORMAT(sskml.sskmfl_admit_date,'%d-%m-%Y'),'') as admit_date,IF(LENGTH(sskml.sskmfl_discharge_date)>0,DATE_FORMAT(sskml.sskmfl_discharge_date,'%d-%m-%Y'),'') as dis_date,IF(LENGTH(sskml.sskmfl_death_date)>0,DATE_FORMAT(sskml.sskmfl_death_date,'%d-%m-%Y'),'') as death_date, sskml.sskmfl_admit_date,sskml.sskmfl_discharge_date, sskml.sskmfl_is_death,sskml.sskmfl_is_pcase,sskml.sskmfl_death_date,sskml.sskmfl_patient_age,sskml.sskmfl_patient_age_dmy,sskml.sskmfl_patient_sex,sskml.sskmfl_residence,
  sskml.sskmfl_id, sskml.sskmfl_year, sskml.sskmfl_month, sskml.sskmfl_year_mo_day_folder, sskml.sskmfl_patient_folder, sskml.sskmfl_num_of_files, sskml.sskmfl_folder_date, sskml.sskmfl_status, sskml.sskmfl_add_time, sskml.sskmfl_operator_id, sskml.sskmfl_icd_code,sskml.sskmfl_icd_diseases_con,sskml.sskmfl_icd_remarks FROM sskm_folder_list AS sskml WHERE sskml.sskmfl_status='2' AND sskml.sskmfl_icd_status='4'  AND sskml.sskmfl_id=? LIMIT 0,1";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 12_userAuthorisedUrl
-- ----------------------------
DROP PROCEDURE IF EXISTS `12_userAuthorisedUrl`;
delimiter ;;
CREATE PROCEDURE `12_userAuthorisedUrl`(IN  menuName  varchar(100), IN  prvId  int(10))
BEGIN
	#Routine body goes here...
	SET @menuName=trim(menuName);
  SET @prvId=trim(prvId);
  PREPARE STMT FROM "SELECT prv_list.dirpppl_is_view as isView, prv_list.dirpppl_is_add as isAdd, prv_list.dirpppl_is_edit as isEdit, prv_list.dirpppl_is_del as isDel FROM dir_pro_previledge_list AS prv_list WHERE prv_list.dirpppl_dirpup_id = ? AND prv_list.dirpppl_dirpm_id IN (SELECT menu.dirpm_id FROM dir_pro_menu AS menu WHERE menu.dirpm_url LIKE ? AND menu.dirpm_is_active = '1' AND menu.dirpm_valid_to IS NULL)
";
  EXECUTE STMT USING @prvId,@menuName;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 13_get_active_folder_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `13_get_active_folder_list`;
delimiter ;;
CREATE PROCEDURE `13_get_active_folder_list`()
BEGIN
	#Routine body goes here...
	SELECT fl.dirpfl_id, fl.dirpfl_real_name, fl.dirpfl_display_name FROM dir_pro_folder_list AS fl WHERE fl.dirpfl_status <= '2' AND fl.dirpfl_is_publish = '1' ORDER BY fl.dirpfl_add_time ASC
;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 14_get_working_folder_cntr
-- ----------------------------
DROP PROCEDURE IF EXISTS `14_get_working_folder_cntr`;
delimiter ;;
CREATE PROCEDURE `14_get_working_folder_cntr`(IN  folderId  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  
  PREPARE STMT FROM "SELECT count(pfl.dirpff_id) as total FROM dir_pro_folder_files AS pfl WHERE pfl.dirpff_dirpfl_id = ? AND pfl.dirpff_status = '0' AND pfl.dirpff_effect_to IS NULL AND pfl.dirpff_uploaders_id IS NULL
";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 16_next_working_file
-- ----------------------------
DROP PROCEDURE IF EXISTS `16_next_working_file`;
delimiter ;;
CREATE PROCEDURE `16_next_working_file`(IN  folderId  int(10),IN  userId  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @userId=trim(userId);
  
  PREPARE STMT FROM "SELECT pfl.dirpff_id,pfl.dirpff_dirpfl_id, pfl.dirpff_file_name, pfl.dirpff_file_dis_name, fl.dirpfl_real_name, fl.dirpfl_display_name,fl.dirpfl_status FROM dir_pro_folder_files AS pfl INNER JOIN dir_pro_folder_list AS fl ON pfl.dirpff_dirpfl_id = fl.dirpfl_id AND fl.dirpfl_status <= '2' WHERE pfl.dirpff_dirpfl_id = ? AND pfl.dirpff_status = '0' AND pfl.dirpff_effect_to IS NULL AND pfl.dirpff_uploaders_id IS NULL AND pfl.dirpff_id NOT IN(SELECT sf.dirpsf_dirpff_id FROM dir_pro_skip_files AS sf WHERE sf.dirpsf_dirpfl_id = ? AND sf.dirpsf_uploader_id = ?
)  LIMIT 0,1";
  EXECUTE STMT USING @folderId,@folderId,@userId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 16_next_working_file_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `16_next_working_file_copy`;
delimiter ;;
CREATE PROCEDURE `16_next_working_file_copy`(IN  folderId  int(10),IN  userId  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  
  PREPARE STMT FROM "SELECT pfl.dirpff_id,pfl.dirpff_dirpfl_id, pfl.dirpff_file_name, pfl.dirpff_file_dis_name, fl.dirpfl_real_name, fl.dirpfl_display_name,fl.dirpfl_status FROM dir_pro_folder_files AS pfl INNER JOIN dir_pro_folder_list AS fl ON pfl.dirpff_dirpfl_id = fl.dirpfl_id AND fl.dirpfl_status >= '1' WHERE pfl.dirpff_dirpfl_id = ? AND pfl.dirpff_status = '0' AND pfl.dirpff_effect_to IS NULL AND pfl.dirpff_uploaders_id IS NULL LIMIT 0,1";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 17_lock_file
-- ----------------------------
DROP PROCEDURE IF EXISTS `17_lock_file`;
delimiter ;;
CREATE PROCEDURE `17_lock_file`(IN  folderId  int(10), IN userId int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @userId=trim(userId);
  
  PREPARE STMT FROM "UPDATE dir_pro_folder_files SET dirpff_status='1',dirpff_lock_time=now() ,dirpff_verifier_id=? where dirpff_status='1' AND dirpff_id=? AND dirpff_uploaders_id IS NULL";
  EXECUTE STMT USING @userId,@folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 18_get_file_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `18_get_file_status`;
delimiter ;;
CREATE PROCEDURE `18_get_file_status`(IN  folderId  int(10), IN fileId int(10) ,IN uploader_id int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @fileId=trim(fileId);
  SET @isOpenForWork='1';
  SET @uploader_id=trim(uploader_id); 
  
  PREPARE STMT FROM "SELECT ffl.dirpff_status FROM dir_pro_folder_files AS ffl WHERE ffl.dirpff_id=? AND ffl.dirpff_dirpfl_id=? AND ffl.dirpff_effect_to IS NULL 
AND dirpff_open_for_work=? AND dirpff_uploaders_id=?";
  EXECUTE STMT USING @fileId,@folderId,@isOpenForWork,@uploader_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 19_get_work_folder_cntr
-- ----------------------------
DROP PROCEDURE IF EXISTS `19_get_work_folder_cntr`;
delimiter ;;
CREATE PROCEDURE `19_get_work_folder_cntr`(IN  folderId  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);

  PREPARE STMT FROM "SELECT count(list.dirputf_id) as total FROM dir_pro_user_temp_file AS list WHERE list.dirputf_dirpfl_id = ?
";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 19_get_work_folder_cntr_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `19_get_work_folder_cntr_copy`;
delimiter ;;
CREATE PROCEDURE `19_get_work_folder_cntr_copy`(IN  folderId  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);

  PREPARE STMT FROM "SELECT count(list.dirputf_id) as total FROM dir_pro_user_temp_file AS list WHERE list.dirputf_dirpfl_id = ?
";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 1_all_featch_table_dt
-- ----------------------------
DROP PROCEDURE IF EXISTS `1_all_featch_table_dt`;
delimiter ;;
CREATE PROCEDURE `1_all_featch_table_dt`(IN `col1` VARCHAR(50), IN `col2` VARCHAR(50), IN `tableName` VARCHAR(50))
BEGIN
	#Routine body goes here...
#DECLARE tablename VARCHAR(50) DEFAULT TRIM(tableName);chd_call_type
SET @mainSQL = CONCAT("SELECT ",TRIM(col1),",",TRIM(col2),"  FROM ",TRIM(tableName));
#SELECT @mainSQL;
PREPARE STMT FROM @mainSQL;
EXECUTE STMT;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 20_get_prv_work_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `20_get_prv_work_list`;
delimiter ;;
CREATE PROCEDURE `20_get_prv_work_list`(IN  folderId  int(10),IN  userId  int(10),IN  cntr  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @userId=trim(userId);
  SET @cntr=trim(cntr);

  PREPARE STMT FROM "SELECT dirputf.dirputf_dirpff_id AS dirpff_id,dirputf.dirputf_file_name as dirpff_file_name,dirputf.dirputf_folder_name as dirpfl_real_name, dirputf.dirputf_dirpfl_id AS dirpff_dirpfl_id, dirputf.dirputf_folder_dis_name AS dirpfl_display_name, dirputf.dirputf_id,dirputf.dirputf_dept_id,dirputf.dirputf_comp_id,dirputf.dirputf_file_entry_name,dirputf.dirputf_file_keywords,dirputf.dirputf_updt_cntr FROM dir_pro_user_temp_file AS dirputf WHERE dirputf.dirputf_dirpfl_id = ? AND dirputf.dirputf_uploder_id = ?    ORDER BY dirputf.dirputf_add_time DESC LIMIT ?, 1
";
  EXECUTE STMT USING @folderId,@userId,@cntr;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 20_get_prv_work_list_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `20_get_prv_work_list_copy`;
delimiter ;;
CREATE PROCEDURE `20_get_prv_work_list_copy`(IN  folderId  int(10),IN  userId  int(10),IN  cntr  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @userId=trim(userId);
  SET @cntr=trim(cntr);

  PREPARE STMT FROM "SELECT dirputf.dirputf_dirpff_id AS dirpff_id,dirputf.dirputf_file_name as dirpff_file_name,dirputf.dirputf_folder_name as dirpfl_real_name, dirputf.dirputf_dirpfl_id AS dirpff_dirpfl_id, dirputf.dirputf_folder_dis_name AS dirpfl_display_name, dirputf.dirputf_id,dirputf.dirputf_dept_id,dirputf.dirputf_comp_id,dirputf.dirputf_file_entry_name,dirputf.dirputf_file_keywords,dirputf.dirputf_updt_cntr FROM dir_pro_user_temp_file AS dirputf WHERE dirputf.dirputf_dirpfl_id = ? AND dirputf.dirputf_uploder_id = ?    ORDER BY dirputf.dirputf_add_time DESC LIMIT ?, 1
";
  EXECUTE STMT USING @folderId,@userId,@cntr;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 21_file_reset_process
-- ----------------------------
DROP PROCEDURE IF EXISTS `21_file_reset_process`;
delimiter ;;
CREATE PROCEDURE `21_file_reset_process`()
BEGIN
	#Routine body goes here...
	####UPDATE ALL FOLDER DISPLAY STATUS 

	UPDATE 	dir_pro_folder_list SET dirpfl_status='1' WHERE dirpfl_id IN (SELECT DISTINCT  ff.dirpff_dirpfl_id FROM dir_pro_folder_files AS ff WHERE ff.dirpff_status <= '1' AND ff.dirpff_open_for_work <= '1' and ff.dirpff_lock_time IS  NOT NULL and  TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%H') >=0 AND  TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%i')>=5
);
  ##now update files status 
   # UPDATE dir_pro_folder_files SET dirpff_lock_time=NULL,dirpff_open_for_work='0',dirpff_status='0',dirpff_uploaders_id=NULL  WHERE  dirpff_status <= '1' AND dirpff_open_for_work <= '1' AND dirpff_id IN (SELECT ff.dirpff_id FROM dir_pro_folder_files AS ff WHERE ff.dirpff_status <= '1' AND ff.dirpff_open_for_work <= '1' and ff.dirpff_lock_time IS  NOT NULL and  TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%H') >=0 AND  TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%i')>=5);

  

  SELECT ff.dirpff_id,TIMEDIFF(now(),ff.dirpff_lock_time) as diff, TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%i') as min_diff FROM dir_pro_folder_files AS ff WHERE ff.dirpff_status <= '1' AND ff.dirpff_open_for_work <= '1' and ff.dirpff_lock_time IS  NOT NULL and  TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%H') >=0 AND  TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%i')>=5;
 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 21_file_reset_process_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `21_file_reset_process_copy`;
delimiter ;;
CREATE PROCEDURE `21_file_reset_process_copy`()
BEGIN
	#Routine body goes here...
	

  SELECT ff.dirpff_id,TIMEDIFF(now(),ff.dirpff_lock_time) as diff, TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%i') as min_diff FROM dir_pro_folder_files AS ff WHERE ff.dirpff_status <= '1' AND ff.dirpff_open_for_work <= '1' and ff.dirpff_lock_time IS  NOT NULL and  TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%H') >=0 AND  TIME_FORMAT(TIMEDIFF(now(),ff.dirpff_lock_time),'%i')>=5;
 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 23_my_work_list_for_verification
-- ----------------------------
DROP PROCEDURE IF EXISTS `23_my_work_list_for_verification`;
delimiter ;;
CREATE PROCEDURE `23_my_work_list_for_verification`(IN userId int(10))
BEGIN
	#Routine body goes here...
  SET @userId=TRIM(userId);
	SELECT count(temp_file.dirputf_id) AS total, temp_file.dirputf_folder_dis_name,temp_file.dirputf_status as fileStatus, date_format(temp_file.dirputf_add_time,"%d/%m/%Y") as date, temp_file.dirputf_add_time,temp_file.dirputf_dirpfl_id FROM dir_pro_user_temp_file AS temp_file where temp_file.dirputf_status='0' and temp_file.dirputf_uploder_id=@userId GROUP BY temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,"%Y-%m-%d") ORDER BY temp_file.dirputf_folder_dis_name ASC;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 24_work_list_by_folder_id
-- ----------------------------
DROP PROCEDURE IF EXISTS `24_work_list_by_folder_id`;
delimiter ;;
CREATE PROCEDURE `24_work_list_by_folder_id`(IN  folderId  int(10), IN userId int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @userId=trim(userId);
  PREPARE STMT FROM "SELECT dirputf.dirputf_id, dirputf.dirputf_dirpff_id, dirputf.dirputf_dirpfl_id,dirputf.dirputf_dept_id, dirputf.dirputf_comp_id, dirputf.dirputf_file_entry_name, dirputf.dirputf_file_keywords, dirputf.dirputf_add_time, dirputf.dirputf_updt_cntr, dirputf.dirputf_index_file_name FROM dir_pro_user_temp_file AS dirputf WHERE dirputf.dirputf_status = '0' AND dirputf.dirputf_uploder_id = ? and dirputf.dirputf_dirpfl_id=?
";
  EXECUTE STMT USING @userId,@folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 25_get_verification_folder_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `25_get_verification_folder_list`;
delimiter ;;
CREATE PROCEDURE `25_get_verification_folder_list`()
BEGIN
	#Routine body goes here...
	SELECT fl.dirpfl_id, fl.dirpfl_real_name, fl.dirpfl_display_name FROM dir_pro_folder_list AS fl WHERE fl.dirpfl_status = '4' AND fl.dirpfl_is_publish = '1' ORDER BY fl.dirpfl_add_time ASC
;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 26_get_verification_folder_cntr
-- ----------------------------
DROP PROCEDURE IF EXISTS `26_get_verification_folder_cntr`;
delimiter ;;
CREATE PROCEDURE `26_get_verification_folder_cntr`(IN  folderId  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  
  PREPARE STMT FROM "SELECT count(pfl.dirpff_id) as total FROM dir_pro_folder_files AS pfl WHERE pfl.dirpff_dirpfl_id = ? AND pfl.dirpff_status = '3' AND pfl.dirpff_effect_to IS NULL AND pfl.dirpff_uploaders_id IS NOT NULL
";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 26_get_verifyfile_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `26_get_verifyfile_status`;
delimiter ;;
CREATE PROCEDURE `26_get_verifyfile_status`(IN  folderId  int(10), IN fileId int(10) ,IN verifier_id int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @fileId=trim(fileId);
  SET @isOpenForWork='2';
  SET @verifier_id=trim(verifier_id); 
  
  PREPARE STMT FROM "SELECT ffl.dirpff_status FROM dir_pro_folder_files AS ffl WHERE ffl.dirpff_id=? AND ffl.dirpff_dirpfl_id=? AND ffl.dirpff_effect_to IS NULL 
AND dirpff_open_for_work=? AND dirpff_verifier_id=?";
  EXECUTE STMT USING @fileId,@folderId,@isOpenForWork,@verifier_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 27_next_verify_file
-- ----------------------------
DROP PROCEDURE IF EXISTS `27_next_verify_file`;
delimiter ;;
CREATE PROCEDURE `27_next_verify_file`(IN  folderId  int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  PREPARE STMT FROM "SELECT pfl.dirpff_id, pfl.dirpff_dirpfl_id, pfl.dirpff_index_file, pfl.dirpff_file_dis_name, fl.dirpfl_real_name, fl.dirpfl_display_name, fl.dirpfl_status, pfl.dirpff_dept_id, pfl.dirpff_comp_id, pfl.dirpff_entry_file_name, pfl.dirpff_file_keywords,pfl.dirpff_uploaders_id FROM dir_pro_folder_files AS pfl INNER JOIN dir_pro_folder_list AS fl ON pfl.dirpff_dirpfl_id = fl.dirpfl_id AND fl.dirpfl_status = '4' WHERE pfl.dirpff_dirpfl_id = ? AND pfl.dirpff_status = '3' AND pfl.dirpff_effect_to IS NULL AND pfl.dirpff_uploaders_id IS NOT NULL LIMIT 0,1";
  EXECUTE STMT USING @folderId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 28_search_file_process
-- ----------------------------
DROP PROCEDURE IF EXISTS `28_search_file_process`;
delimiter ;;
CREATE PROCEDURE `28_search_file_process`(IN  deptId int(10), IN comId int(10), IN keywords varchar(255))
BEGIN
	#Routine body goes here...
	SET @deptId=trim(deptId);
  SET @comId=trim(comId);
  SET @keywords =trim(keywords);
  SET @sqlDesc="SELECT ff.dirpff_id, ff.dirpff_entry_file_name,ff.dirpff_parent_folder,ff.dirpff_parent_fol_dis_name, ff.dirpff_file_keywords, ff.dirpff_index_file FROM dir_pro_folder_files AS ff WHERE ff.dirpff_status = '5' AND ff.dirpff_verifier_id IS NOT NULL ";  
  #PREPARE STMT FROM "SELECT dirputf.dirputf_id, dirputf.dirputf_dirpff_id, dirputf.dirputf_dirpfl_id,dirputf.dirputf_dept_id, dirputf.dirputf_comp_id, dirputf.dirputf_file_entry_name, dirputf.dirputf_file_keywords, dirputf.dirputf_add_time, dirputf.dirputf_updt_cntr, dirputf.dirputf_index_file_name FROM dir_pro_user_temp_file AS dirputf WHERE dirputf.dirputf_status = '0' AND dirputf.dirputf_uploder_id = ? and dirputf.dirputf_dirpfl_id=? ";
  #EXECUTE STMT USING @userId,@folderId;
  IF LENGTH(@deptId)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND ff.dirpff_dept_id=',@deptId);
  END IF;

  IF LENGTH(@comId)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND ff.dirpff_comp_id=',@comId);
  END IF;

  IF LENGTH(@keywords)>0 THEN
		SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND ff.dirpff_file_keywords LIKE ',"'%",@keywords,"%'");
  END IF;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 29_uploaders_work_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `29_uploaders_work_list`;
delimiter ;;
CREATE PROCEDURE `29_uploaders_work_list`(IN  userId int(10), IN dateFrom varchar(100), IN  dateTo varchar(255), IN filterOption int(10))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  SET @dateFrom=trim(dateFrom);
  SET @dateTo =trim(dateTo);
  SET @filterOption=trim(filterOption);
  #SET @sqlDesc=CONCAT("",@userId," ");  
  SET @sqlDesc="SELECT count(temp_file.dirputf_id) AS total,temp_file.dirputf_status as fileStatus, if(temp_file.dirputf_status='0','Not Send for verification',if(temp_file.dirputf_status='1','Waiting For Verification','Verified')) as app_status, temp_file.dirputf_add_time, temp_file.dirputf_submit_time,temp_file.dirputf_verification_time, temp_file.dirputf_uploder_id, temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%d/%m/%Y') as date, temp_file.dirputf_add_time,temp_file.dirputf_dirpfl_id FROM dir_pro_user_temp_file AS temp_file ";
  SET @sqlDesc=CONCAT(@sqlDesc,' WHERE   temp_file.dirputf_uploder_id=',@userId);
 #GROUP BY temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%Y-%m-%d') HAVING temp_file.dirputf_status IS NOT NULL
  
  IF (@filterOption=0) THEN #search My entry List
		SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_status=',@filterOption);
		 IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_add_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_add_time<=',@dateTo);
		END IF;

  END IF;

   IF (@filterOption=1) THEN #search Send list for verification
		SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_status=',@filterOption);
		 IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_submit_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_submit_time<=',@dateTo);
		END IF;

  END IF;

 IF (@filterOption=2) THEN # search verified list
		SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_status=',@filterOption);
		 IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_verification_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_verification_time<=',@dateTo);
		END IF;

  END IF;

  IF (@filterOption=3) THEN #search My ALL entry List
		 #SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_status=',@filterOption);
		 IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_add_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_add_time<=',@dateTo);
		END IF;

  END IF;
  
  SET @sqlDesc=CONCAT(@sqlDesc," "," GROUP BY temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%Y-%m-%d')");
  #SET @sqlDesc=CONCAT(@sqlDesc,' ',' ');
 
  #SELECT @sqlDesc;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 29_uploaders_work_list_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `29_uploaders_work_list_copy`;
delimiter ;;
CREATE PROCEDURE `29_uploaders_work_list_copy`(IN  userId int(10), IN dateFrom varchar(100), IN  dateTo varchar(255), IN filterOption int(10))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  SET @dateFrom=trim(dateFrom);
  SET @dateTo =trim(dateTo);
  SET @filterOption=trim(filterOption);
  #SET @sqlDesc=CONCAT("",@userId," ");  
  SET @sqlDesc="SELECT count(temp_file.dirputf_id) AS total,temp_file.dirputf_status as fileStatus, if(temp_file.dirputf_status='0','Not Send for verification',if(temp_file.dirputf_status='1','Waiting For Verification','Verified')) as app_status, temp_file.dirputf_add_time, temp_file.dirputf_submit_time,temp_file.dirputf_verification_time, temp_file.dirputf_uploder_id, temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%d/%m/%Y') as date, temp_file.dirputf_add_time,temp_file.dirputf_dirpfl_id FROM dir_pro_user_temp_file AS temp_file GROUP BY temp_file.dirputf_folder_dis_name, date_format(temp_file.dirputf_add_time,'%Y-%m-%d') HAVING temp_file.dirputf_status IS NOT NULL";
  SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_uploder_id=',@userId);

  IF (@filterOption=0) THEN #search My entry List
		SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_status=',@filterOption);
		 IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_add_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_add_time<=',@dateTo);
		END IF;

  END IF;

   IF (@filterOption=1) THEN #search Send list for verification
		SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_status=',@filterOption);
		 IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_submit_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_submit_time<=',@dateTo);
		END IF;

  END IF;

 IF (@filterOption=2) THEN # search verified list
		SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_status=',@filterOption);
		 IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_verification_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_verification_time<=',@dateTo);
		END IF;

  END IF;

  IF (@filterOption=3) THEN #search My ALL entry List
		 #SET @sqlDesc=CONCAT(@sqlDesc,' AND temp_file.dirputf_status=',@filterOption);
		 IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_add_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND temp_file.dirputf_add_time<=',@dateTo);
		END IF;

  END IF;

 
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 30_get_verification_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `30_get_verification_list`;
delimiter ;;
CREATE PROCEDURE `30_get_verification_list`(IN userId int(10))
BEGIN
	#Routine body goes here...
  SET @userId=TRIM(userId);
	 SELECT count(ff.dirpff_id) AS totalFile, ff.dirpff_parent_fol_dis_name, ff.dirpff_verification_end_time, DATE_FORMAT(ff.dirpff_verification_end_time,'%d-%m-%Y') as verificationTime FROM dir_pro_folder_files AS ff WHERE ff.dirpff_status = '5' AND ff.dirpff_verifier_id = @userId GROUP BY ff.dirpff_parent_fol_dis_name,DATE_FORMAT(ff.dirpff_verification_end_time,'%d-%m-%Y')
;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 31_adm_user_login
-- ----------------------------
DROP PROCEDURE IF EXISTS `31_adm_user_login`;
delimiter ;;
CREATE PROCEDURE `31_adm_user_login`(IN  userId varchar(100), IN userPass varchar(100))
BEGIN
	#Routine body goes here...
	set @userId=trim(userId);
  set @userPass=trim(userPass);
#PREPARE STMT FROM "SELECT users.dirpu_id, if(users.dirpu_mName is NULL,CONCAT(users.dirpu_fName,' ',users.dirpu_lName),CONCAT(users.dirpu_fName,' ',users.dirpu_mName,' ',users.dirpu_lName)) AS fullName,  users.dirpu_user_type, users.dirpu_user_dept, users.dirpu_user_com, users.dirpu_status, users.dirpu_role AS role, if(ud.dirpd_name IS NULL,'N/A',ud.dirpd_name) AS dept, ud.dirpd_name, if(com.dirpc_name IS NULL,'N/A',com.dirpc_name) AS com, com.dirpc_name, up.dirpp_name FROM dir_pro_user AS users LEFT JOIN dir_pro_department AS ud ON users.dirpu_user_dept = ud.dirpd_id LEFT JOIN dir_pro_company AS com ON users.dirpu_user_com = com.dirpc_id  INNER JOIN dir_pro_priviledge AS up ON users.dirpu_role=up.dirpp_id WHERE users.dirpu_is_publish = '1' AND users.dirpu_effect_to IS NULL AND (users.dirpu_role='4' or users.dirpu_role='5')  AND users.dirpu_email = ? AND users.dirpu_password = ?";
#EXECUTE STMT USING @userId,@userPass;
	
PREPARE STMT FROM "SELECT USER.`CHDUSER_Id`,USER.`CHDUSER_Role` AS role,IF(USER.`CHDUSER_MName` is NULL,CONCAT(USER.`CHDUSER_FName`,' ',USER.`CHDUSER_LName`),CONCAT(USER.`CHDUSER_FName`,' ',USER.`CHDUSER_MName`,' ',USER.`CHDUSER_LName`)) AS fullName
,USER.`CHDUSER_FName`,USER.CHDUSER_MName,USER.CHDUSER_Address,USER.`CHDUSER_LName`,USER.`CHDUSER_NGS`,USER.`CHDUSER_Email`,USER.`CHDUSER_UserName`,USER.`CHDUSER_Password`,USER.CHDUSER_PhNo,PRE.dirpp_name,USER.CHDUSER_Image



FROM `chd_user_admin` AS USER INNER JOIN dir_pro_priviledge AS PRE ON USER.`CHDUSER_Role`= PRE.dirpp_id


WHERE USER.`CHDUSER_Is_Public` = '1' AND USER.`CHDUSER_Effect_To` IS NULL  AND USER.`CHDUSER_UserName` = ? AND USER.`CHDUSER_Password` = ?";
EXECUTE STMT USING @userId,@userPass;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 31_verification_work_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `31_verification_work_list`;
delimiter ;;
CREATE PROCEDURE `31_verification_work_list`(IN  userId int(10), IN dateFrom varchar(100), IN  dateTo varchar(255))
BEGIN
	#Routine body goes here...
	SET @userId=trim(userId);
  SET @dateFrom=trim(dateFrom);
  SET @dateTo =trim(dateTo);
  SET @sqlDesc="SELECT count(ff.dirpff_id) AS totalFile, ff.dirpff_parent_fol_dis_name, ff.dirpff_verification_end_time, DATE_FORMAT(ff.dirpff_verification_end_time,'%d-%m-%Y') as verificationTime,ff.dirpff_status,ff.dirpff_verifier_id FROM dir_pro_folder_files AS ff   GROUP BY ff.dirpff_parent_fol_dis_name,DATE_FORMAT(ff.dirpff_verification_end_time,'%d-%m-%Y') HAVING ff.dirpff_status = '5'
";  
  #PREPARE STMT FROM "SELECT dirputf.dirputf_id, dirputf.dirputf_dirpff_id, dirputf.dirputf_dirpfl_id,dirputf.dirputf_dept_id, dirputf.dirputf_comp_id, dirputf.dirputf_file_entry_name, dirputf.dirputf_file_keywords, dirputf.dirputf_add_time, dirputf.dirputf_updt_cntr, dirputf.dirputf_index_file_name FROM dir_pro_user_temp_file AS dirputf WHERE dirputf.dirputf_status = '0' AND dirputf.dirputf_uploder_id = ? and dirputf.dirputf_dirpfl_id=? ";
  #EXECUTE STMT USING @userId,@folderId;
  SET @sqlDesc=CONCAT(@sqlDesc,' AND ff.dirpff_verifier_id=',@userId);
  IF LENGTH(@dateFrom)>0 THEN
			SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND ff.dirpff_verification_end_time>=',@dateFrom);
		END IF;

		IF LENGTH(@dateTo)>0 THEN
				SET @sqlDesc=CONCAT(@sqlDesc,' ',' AND ff.dirpff_verification_end_time<=',@dateTo);
		END IF;
  PREPARE STMT FROM @sqlDesc;
  EXECUTE STMT;

  #SELECT @sqlDesc;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 32_get_tol_working_file_cntr
-- ----------------------------
DROP PROCEDURE IF EXISTS `32_get_tol_working_file_cntr`;
delimiter ;;
CREATE PROCEDURE `32_get_tol_working_file_cntr`(IN  folderId  int(10),IN userId int(10))
BEGIN
	#Routine body goes here...
	SET @folderId=trim(folderId);
  SET @userId =trim(userId); 

  PREPARE STMT FROM "SELECT count(list.dirputf_id) as total FROM dir_pro_user_temp_file AS list WHERE list.dirputf_dirpfl_id = ? AND list.dirputf_status='0' AND list.dirputf_uploder_id=?
";
  EXECUTE STMT USING @folderId,@userId;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 33_addMore_button
-- ----------------------------
DROP PROCEDURE IF EXISTS `33_addMore_button`;
delimiter ;;
CREATE PROCEDURE `33_addMore_button`(IN userId varchar(30),IN docId varchar(40), IN prv varchar (49))
BEGIN
	#Routine body goes here...
  #DECLARE @@var1 VARCHAR(30);
  DECLARE Abbrv VARCHAR(50);
  SET @docket_ID=TRIM(docId);
  SET @user_Id=TRIM(userId);
  SET @prv=TRIM(prv);
  SELECT substring(@docket_ID,3,3)into Abbrv FROM `chd_inbound_call` WHERE `CHDIC_docket_no`=@docket_ID;
   IF(@prv = 'Super Administrator' OR @prv = 'Admin')THEN
        IF(Abbrv = 'ADM') THEN
							SET @var1="SELECT `CHDUGPG_Sl`, `CHDUGPG_DocketNo`, `CHDUGPG_CallType`, `CHDUGPG_Course`, `CHDUGPG_Subject`, `CHDUGPG_UserId`, `CHDUGPG_IP`, `CHDUGPG_SysDateTime` FROM `chd_ugpg_addmore` WHERE `CHDUGPG_DocketNo`=?";
         ELSEIF(Abbrv = 'UTS')THEN
             SET @var1="SELECT `CHDUTS_Sl`, `CHDUTS_docketNo`, `CHDUTS_Education_Type`, `CHDUTS_CallType`, `CHDUTS_Dist`, `CHDUTS_Circle`, `CHDUTS_Inst`, `CHDUTS_User`, `CHDUTS_IP`, `CHDUTS_DateTime` FROM `chd_utsashree_addmore` WHERE  `CHDUTS_docketNo`=?";
         ELSEIF(Abbrv = 'SIS')THEN
             SET @var1="SELECT `CHDAQ_Sl`, `CHDAQ_DocNo`, `CHDAQ_Edu_Id`, `CHDAQ_Call_Id`, `CHDAQ_AQ`, `CHDAQ_UserId`, `CHDAQ_IP`, `CHDAQ_Status`, `CHDAQ_SysDateTime` FROM `chd_additional_qualification` WHERE `CHDAQ_DocNo`=?";
        END IF;
						PREPARE stmt1 FROM @var1;
						EXECUTE stmt1 USING @docket_ID;
 ELSE 
        IF(Abbrv = 'ADM') THEN
             SET @var1="SELECT `CHDUGPG_Sl`, `CHDUGPG_DocketNo`, `CHDUGPG_CallType`, `CHDUGPG_Course`, `CHDUGPG_Subject`, `CHDUGPG_UserId`, `CHDUGPG_IP`, `CHDUGPG_SysDateTime` FROM `chd_ugpg_addmore` WHERE CHDUGPG_UserId=? AND`CHDUGPG_DocketNo`=?";
      ELSEIF(Abbrv = 'UTS')THEN
           SET @var1="SELECT `CHDUTS_Sl`, `CHDUTS_docketNo`, `CHDUTS_Education_Type`, `CHDUTS_CallType`, `CHDUTS_Dist`, `CHDUTS_Circle`, `CHDUTS_Inst`, `CHDUTS_User`, `CHDUTS_IP`, `CHDUTS_DateTime` FROM `chd_utsashree_addmore` WHERE CHDUTS_User=? AND `CHDUTS_docketNo`=?";
			ELSEIF(Abbrv = 'SIS')THEN
           SET @var1="SELECT `CHDAQ_Sl`, `CHDAQ_DocNo`, `CHDAQ_Edu_Id`, `CHDAQ_Call_Id`, `CHDAQ_AQ`, `CHDAQ_UserId`, `CHDAQ_IP`, `CHDAQ_Status`, `CHDAQ_SysDateTime` FROM `chd_additional_qualification` WHERE `CHDAQ_UserId`=? AND `CHDAQ_DocNo`=? ";
      END IF;
					PREPARE stmt1 FROM @var1;
					EXECUTE stmt1 USING @user_Id,@docket_ID;
   END IF;
#SELECT  @var1;
 #PREPARE stmt1 FROM @var1;
 #EXECUTE stmt1 USING @user_Id,@docket_ID;
#SELECT  @var1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 34_admin_search_all_data
-- ----------------------------
DROP PROCEDURE IF EXISTS `34_admin_search_all_data`;
delimiter ;;
CREATE PROCEDURE `34_admin_search_all_data`(IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
  DECLARE sqlDesc VARCHAR(255);
 
  SET @limitFrom=trim(limitFrom);
  SET @limitTo=trim(limitTo);


  SET @mainSQL="SELECT INCALL.`CHDIC_docket_no`,INCALL.`CHDIC_caller_phNo`,INCALL.`CHDIC_caller_name`,CALLERTYPE.chdct_type,INCALL.`CHDIC_email`,QT.chdqt_name,INCALL.`CHDIC_detail_query`,INCALL.`CHDIC_Ans_caller`,IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,EDU.chde_type_name,CT.chdct_name,INCALL.`CHDIC_Inst_Name`,DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,INCALL.`CHDIC_Cast`,STATE.State_Name,DIST.District,INCALL.`CHDIC_Other_District`,INCALL.`CHDIC_SNTCSSC_Address`,INCALL.`CHDIC_SNTCSSC_PIN`,INCALL.`CHDIC_Highest_Qua`,INCALL.`CHDIC_SNTCSSC_Appear_UPSCCSE`,INCALL.`CHDIC_SNTCSSC_No_Previous_Appearance`,INCALL.`CHDIC_SCC_Complain`,IF(INCALL.`CHDIC_SCC_Complain`='NC','New Complain',IF(INCALL.`CHDIC_SCC_Complain`='EC','Existing Complain','')) AS COMPLAIN,INCALL.`CHDIC_SCC_Docket_No`,SCCINST.csi_inst_name,INCALL.`CHDIC_SCC_Course_Applied`,INCALL.`CHDIC_SCC_Course_Category`,DIROTED.chdsccdn_name,INCALL.`CHDIC_SCC_Other_DirectorateName`,INCALL.`CHDIC_Passing_Year`,INCALL.`CHDIC_Preset_Course_Study`,INCALL.`CHDIC_Application_Id`,INCALL.`CHDIC_SCC_Call_Category`,INCALL.`CHDIC_SCC_Other_Call_Category`,INCALL.`CHDIC_SCC_Line_Transfer`,SCCDEPT.CHDSCC_AD_Name,INCALL.`CHDIC_SCC_Assigned_To`,INCALL.`CHDIC_SCC_Duration_Pending`,INCALL.`CHDIC_Reg_PhNo`,INCALL.`CHDIC_SVMCM_Last_Exam_Qua`,INCALL.`CHDIC_SVMCM_Exam_Qua_Year`,DIROC.chdd_name,INCALL.`CHDIC_SVMCM_Reg_Date`,LEXM.chdleq_name,ADDT.chdat_name,INCALL.`CHDIC_UGPG_Other_Admi_Type`,INCALL.`CHDIC_WBSIS_Location`,INCALL.`CHDIC_WBSIS_Area`,INCALL.`CHDIC_WBSIS_Pancht_Name`,INCALL.`CHDIC_WBSIS_Ward_Name`,INCALL.`CHDIC_WBSIS_PIN`,INCALL.`CHDIC_WBSIS_Work_Exp`,INCALL.`CHDIC_WBSIS_Basic_Qua`,INCALL.`CHDIC_WBSIS_Discipline_Course`,INCALL.`CHDIC_WBSIS_Pct_Markes`,INCALL.`CHDIC_BS_Class`,INCALL.`CHDIC_BS_School_Name`,INCALL.`CHDIC_UTS_JobPosition`,INCALL.`CHDIC_UTS_OSMS_No`,INCALL.`CHDIC_UTS_StaffCategory`,INCALL.`CHDIC_UTS_TransManu`,UTSDIST.District AS UTSDist,INCALL.`CHDIC_UTS_Circle`,INCALL.CHDIC_Status_DocPer,INCALL.`CHDIC_UTS_SchoolName`,INCALL.`CHDIC_UTS_TransferType`,INCALL.`CHDIC_UserId`,INCALL.`CHDIC_IP`,INCALL.`CHDIC_Sys_DateTime` FROM `chd_inbound_call` AS INCALL INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.`CHDIC_caller_type`=CALLERTYPE.chdct_id INNER JOIN chd_query_type AS QT ON INCALL.`CHDIC_query_type`=QT.chdqt_id INNER JOIN chd_education AS EDU ON INCALL.`CHDIC_Edu_Grop`=EDU.chde_id INNER JOIN chd_call_type AS CT ON INCALL.`CHDIC_Call_Type`=CT.chdc_type_id LEFT JOIN chd_state AS STATE ON INCALL.`CHDIC_State`=STATE.SL LEFT JOIN chd_district AS DIST ON INCALL.`CHDIC_District`=DIST.Sl_No  LEFT JOIN chd_scc_institutes AS SCCINST ON INCALL.`CHDIC_SCC_InstName`=SCCINST.csi_id LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.`CHDIC_SCC_DirectorateName`=DIROTED.chdsccdn_id LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.`CHDIC_SCC_Assign_Dept`=SCCDEPT.CHDSCC_AD_Sl LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.`CHDIC_UGPG_Last_Exam_Qua`= LEXM.chdleq_id LEFT JOIN chd_add_type AS ADDT ON INCALL.`CHDIC_UGPG_Admission_Type`= ADDT.chdat_id LEFT JOIN chd_district AS UTSDIST ON INCALL.`CHDIC_UTS_Dist`=UTSDIST.Sl_No";


		IF (LENGTH(sqlDesc) <> 0) THEN 
			 SET @mainSQL=CONCAT(@mainSQL ," WHERE ", sqlDesc , " ORDER BY INCALL.`CHDIC_Sl` DESC");
		ELSE
			 SET @mainSQL=CONCAT(@mainSQL ," ORDER BY INCALL.`CHDIC_Sl` DESC");
		END IF;

		IF(LENGTH(@limitFrom) <> 0)THEN
				#SET sqlDesc=CONCAT(sqlDesc," LIMIT ",@limitFrom," , ",@limitTo,"");
			SET @mainSQL=CONCAT(@mainSQL ," LIMIT ", @limitFrom , ",",@limitTo);
		END IF;

#SELECT @mainSQL;
		PREPARE stmt1 FROM @mainSQL;
		EXECUTE stmt1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 34_admin_search_all_data_copy
-- ----------------------------
DROP PROCEDURE IF EXISTS `34_admin_search_all_data_copy`;
delimiter ;;
CREATE PROCEDURE `34_admin_search_all_data_copy`(IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
  DECLARE sqlDesc VARCHAR(255);
 
  SET @limitFrom=trim(limitFrom);
  SET @limitTo=trim(limitTo);


  SET @mainSQL="SELECT INCALL.`CHDIC_docket_no`,INCALL.`CHDIC_caller_phNo`,INCALL.`CHDIC_caller_name`,CALLERTYPE.chdct_type,INCALL.`CHDIC_email`,QT.chdqt_name,INCALL.`CHDIC_detail_query`,INCALL.`CHDIC_Ans_caller`,IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,EDU.chde_type_name,CT.chdct_name,INCALL.`CHDIC_Inst_Name`,DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,INCALL.`CHDIC_Cast`,STATE.State_Name,DIST.District,INCALL.`CHDIC_Other_District`,INCALL.`CHDIC_SNTCSSC_Address`,INCALL.`CHDIC_SNTCSSC_PIN`,INCALL.`CHDIC_Highest_Qua`,INCALL.`CHDIC_SNTCSSC_Appear_UPSCCSE`,INCALL.`CHDIC_SNTCSSC_No_Previous_Appearance`,INCALL.`CHDIC_SCC_Complain`,IF(INCALL.`CHDIC_SCC_Complain`='NC','New Complain',IF(INCALL.`CHDIC_SCC_Complain`='EC','Existing Complain','')) AS COMPLAIN,INCALL.`CHDIC_SCC_Docket_No`,SCCINST.csi_inst_name,INCALL.`CHDIC_SCC_Course_Applied`,INCALL.`CHDIC_SCC_Course_Category`,DIROTED.chdsccdn_name,INCALL.`CHDIC_SCC_Other_DirectorateName`,INCALL.`CHDIC_Passing_Year`,INCALL.`CHDIC_Preset_Course_Study`,INCALL.`CHDIC_Application_Id`,INCALL.`CHDIC_SCC_Call_Category`,INCALL.`CHDIC_SCC_Other_Call_Category`,INCALL.`CHDIC_SCC_Line_Transfer`,SCCDEPT.CHDSCC_AD_Name,INCALL.`CHDIC_SCC_Assigned_To`,INCALL.`CHDIC_SCC_Duration_Pending`,INCALL.`CHDIC_Reg_PhNo`,INCALL.`CHDIC_SVMCM_Last_Exam_Qua`,INCALL.`CHDIC_SVMCM_Exam_Qua_Year`,DIROC.chdd_name,INCALL.`CHDIC_SVMCM_Reg_Date`,LEXM.chdleq_name,ADDT.chdat_name,INCALL.`CHDIC_UGPG_Other_Admi_Type`,INCALL.`CHDIC_WBSIS_Location`,INCALL.`CHDIC_WBSIS_Area`,INCALL.`CHDIC_WBSIS_Pancht_Name`,INCALL.`CHDIC_WBSIS_Ward_Name`,INCALL.`CHDIC_WBSIS_PIN`,INCALL.`CHDIC_WBSIS_Work_Exp`,INCALL.`CHDIC_WBSIS_Basic_Qua`,INCALL.`CHDIC_WBSIS_Discipline_Course`,INCALL.`CHDIC_WBSIS_Pct_Markes`,INCALL.`CHDIC_BS_Class`,INCALL.`CHDIC_BS_School_Name`,INCALL.`CHDIC_UTS_JobPosition`,INCALL.`CHDIC_UTS_OSMS_No`,INCALL.`CHDIC_UTS_StaffCategory`,INCALL.`CHDIC_UTS_TransManu`,UTSDIST.District AS UTSDist,INCALL.`CHDIC_UTS_Circle`,INCALL.CHDIC_Status_DocPer,INCALL.`CHDIC_UTS_SchoolName`,INCALL.`CHDIC_UTS_TransferType`,INCALL.`CHDIC_UserId`,INCALL.`CHDIC_IP`,INCALL.`CHDIC_Sys_DateTime` FROM `chd_inbound_call` AS INCALL INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.`CHDIC_caller_type`=CALLERTYPE.chdct_id INNER JOIN chd_query_type AS QT ON INCALL.`CHDIC_query_type`=QT.chdqt_id INNER JOIN chd_education AS EDU ON INCALL.`CHDIC_Edu_Grop`=EDU.chde_id INNER JOIN chd_call_type AS CT ON INCALL.`CHDIC_Call_Type`=CT.chdc_type_id LEFT JOIN chd_state AS STATE ON INCALL.`CHDIC_State`=STATE.SL LEFT JOIN chd_district AS DIST ON INCALL.`CHDIC_District`=DIST.Sl_No  LEFT JOIN chd_scc_institutes AS SCCINST ON INCALL.`CHDIC_SCC_InstName`=SCCINST.csi_id LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.`CHDIC_SCC_DirectorateName`=DIROTED.chdsccdn_id LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.`CHDIC_SCC_Assign_Dept`=SCCDEPT.CHDSCC_AD_Sl LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.`CHDIC_UGPG_Last_Exam_Qua`= LEXM.chdleq_id LEFT JOIN chd_add_type AS ADDT ON INCALL.`CHDIC_UGPG_Admission_Type`= ADDT.chdat_id LEFT JOIN chd_district AS UTSDIST ON INCALL.`CHDIC_UTS_Dist`=UTSDIST.Sl_No";


		IF (LENGTH(sqlDesc) <> 0) THEN 
			 SET @mainSQL=CONCAT(@mainSQL ," WHERE ", sqlDesc , " ORDER BY INCALL.`CHDIC_Sl` DESC");
		ELSE
			 SET @mainSQL=CONCAT(@mainSQL ," ORDER BY INCALL.`CHDIC_Sl` DESC");
		END IF;

		IF(LENGTH(@limitFrom) <> 0)THEN
				#SET sqlDesc=CONCAT(sqlDesc," LIMIT ",@limitFrom," , ",@limitTo,"");
			SET @mainSQL=CONCAT(@mainSQL ," LIMIT ", @limitFrom , ",",@limitTo);
		END IF;

#SELECT @mainSQL;
		PREPARE stmt1 FROM @mainSQL;
		EXECUTE stmt1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 34_edit_docket_search
-- ----------------------------
DROP PROCEDURE IF EXISTS `34_edit_docket_search`;
delimiter ;;
CREATE PROCEDURE `34_edit_docket_search`(IN docket varchar(35),IN userid varchar(30))
BEGIN
	#Routine body goes here...
SET @docket_id=TRIM(docket);
SET @userid=TRIM(userid);
		IF(@userid = '900069')THEN
			PREPARE SMTP FROM "SELECT
			substring(@docket_id,3,3) AS doc_Abbrv,
			substring(@docket_id,1,2) AS edu_Abbrv,
			INCALL.CHDIC_docket_no,
			INCALL.CHDIC_caller_phNo,
			INCALL.CHDIC_caller_name,
			CALLERTYPE.chdct_type,
			INCALL.CHDIC_email,
			QT.chdqt_id,
	    QT.chdqt_name,
			INCALL.CHDIC_detail_query,
			INCALL.CHDIC_Ans_caller,
			IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,
			EDU.chde_type_name,
			CT.chdct_name,
	    CT.chdc_type_id,
			INCALL.CHDIC_Inst_Name,
			DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,
			INCALL.CHDIC_DOB,
			INCALL.CHDIC_Cast,
			STATE.State_Name,
			DIST.District,
			INCALL.CHDIC_District,
			INCALL.CHDIC_Other_District,
			INCALL.CHDIC_SNTCSSC_Address,
			INCALL.CHDIC_SNTCSSC_PIN,
			INCALL.CHDIC_Highest_Qua,
			INCALL.CHDIC_SNTCSSC_Appear_UPSCCSE,
			INCALL.CHDIC_SNTCSSC_No_Previous_Appearance,
			INCALL.CHDIC_SCC_Complain,
			IF(INCALL.`CHDIC_SCC_Complain`='NC','New Complain',IF(INCALL.`CHDIC_SCC_Complain`='EC','Existing Complain','')) AS COMPLAIN,
			INCALL.CHDIC_SCC_Docket_No,
			INCALL.CHDIC_UTS_Dist,
			INCALL.CHDIC_State,
			INCALL.CHDIC_SCC_Assign_Dept,
			INCALL.CHDIC_SCC_Other_Assign_Dept,
			SCCINST.csi_inst_name,
			INCALL.CHDIC_SCC_Course_Applied,
			INCALL.CHDIC_SCC_Course_Category,
			INCALL.CHDIC_SCC_InstName,
			cscc.chd_ssc_ctcall_name,
			DIROTED.chdsccdn_name,
			INCALL.CHDIC_SCC_Other_DirectorateName,
			INCALL.CHDIC_Passing_Year,
			INCALL.CHDIC_Preset_Course_Study,
			INCALL.CHDIC_Application_Id,
			INCALL.CHDIC_SCC_Call_Category,
			INCALL.CHDIC_SCC_Other_Call_Category,
			INCALL.CHDIC_SCC_Line_Transfer,
			SCCDEPT.CHDSCC_AD_Name,
			INCALL.CHDIC_SCC_Assigned_To,
			INCALL.CHDIC_SCC_Duration_Pending,
			INCALL.CHDIC_Reg_PhNo,
			INCALL.CHDIC_SVMCM_Last_Exam_Qua,
			INCALL.CHDIC_SVMCM_Exam_Qua_Year,
			INCALL.CHDIC_SVMCM_claim_period,
			DIROC.chdd_name,
			INCALL.CHDIC_SVMCM_Reg_Date,
			LEXM.chdleq_name,
			ADDT.chdat_name,
			INCALL.CHDIC_UGPG_Last_Exam_Qua,
			INCALL.CHDIC_UGPG_Other_Admi_Type,
			INCALL.CHDIC_WBSIS_Location,
			INCALL.CHDIC_WBSIS_Area,
			INCALL.CHDIC_WBSIS_Pancht_Name,
			INCALL.CHDIC_WBSIS_Ward_Name,
			INCALL.CHDIC_WBSIS_PIN,
			INCALL.CHDIC_WBSIS_Work_Exp,
			INCALL.CHDIC_WBSIS_Basic_Qua,
			INCALL.CHDIC_WBSIS_Discipline_Course,
			INCALL.CHDIC_WBSIS_Pct_Markes,
			INCALL.CHDIC_BS_Class,
			INCALL.CHDIC_BS_School_Name,
			INCALL.CHDIC_UTS_JobPosition,
			INCALL.CHDIC_UTS_OSMS_No,
			INCALL.CHDIC_UTS_StaffCategory,
			INCALL.CHDIC_UTS_TransManu,
			UTSDIST.District AS UTSDist,
			INCALL.CHDIC_UTS_Circle,
			INCALL.CHDIC_UTS_SchoolName,
			INCALL.CHDIC_UTS_TransferType,
			INCALL.CHDIC_UserId,
			INCALL.CHDIC_IP,
			INCALL.CHDIC_Sys_DateTime,
			csd.chd_direc_name,
			cji.chd_job_Iss_name,
			chs.chd_scheme_name,
			INCALL.chd_reg_ssin,
			INCALL.chd_bficiary_name ,
			chg.chd_gender_name,
			chc.chd_country_name,
			INCALL.chd_country_other_name,
			INCALL.chd_state_other_name,
			cha.chd_area_name,
			INCALL.chd_area_other_name,
			INCALL.chd_gp_wardno,
			cnc.chd_nature_call_name,
			INCALL.chd_res_phoneNo,
			INCALL.CHDIC_WBSIS_Qua_status,
			INCALL.CHDIC_UTS_Dist_status,
			INCALL.CHDIC_UGPG_Admission_Type,
			INCALL.CHDIC_UGPG_Course_Name,
			INCALL.CHDIC_UGPG_Other_Course,
			cuc.chdcn_name,
			INCALL.CHDIC_UGPG_Course_type,
			INCALL.CHDIC_UGPG_Other_Course_type,
			cuct.chdct_name as course_type,
			INCALL.CHDIC_UGPG_BA_subject,
			INCALL.CHDIC_UGPG_App_ID,
			INCALL.chd_dtl_complain_type,
      cmpdt.chd_cd_name,
			cmpdt.chd_cd_query_type,
			EDU.chde_id
			FROM
			chd_inbound_call AS INCALL
			INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.CHDIC_caller_type = CALLERTYPE.chdct_id
			INNER JOIN chd_query_type AS QT ON INCALL.CHDIC_query_type = QT.chdqt_id
			INNER JOIN chd_education AS EDU ON INCALL.CHDIC_Edu_Grop = EDU.chde_id
			LEFT JOIN chd_call_type AS CT ON INCALL.CHDIC_Call_Type = CT.chdc_type_id
			LEFT JOIN chd_state AS STATE ON INCALL.CHDIC_State = STATE.SL
			LEFT JOIN chd_district AS DIST ON INCALL.CHDIC_District = DIST.Sl_No
			LEFT JOIN chd_scc_institutes AS SCCINST ON INCALL.CHDIC_SCC_InstName = SCCINST.csi_id
			LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.CHDIC_SCC_DirectorateName = DIROTED.chdsccdn_id
			LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id
			LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.CHDIC_SCC_Assign_Dept = SCCDEPT.CHDSCC_AD_Sl
			LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.CHDIC_UGPG_Last_Exam_Qua = LEXM.chdleq_id
			LEFT JOIN chd_add_type AS ADDT ON INCALL.CHDIC_UGPG_Admission_Type = ADDT.chdat_id
			LEFT JOIN chd_district AS UTSDIST ON INCALL.CHDIC_UTS_Dist = UTSDIST.Sl_No
			LEFT JOIN chd_ss_directorate AS csd ON INCALL.chd_directorate = csd.chd_direc_id
			LEFT JOIN chd_job_issue AS cji ON INCALL.chd_job_issue = cji.chd_job_Iss_id
			LEFT JOIN chd_scheme AS chs ON INCALL.chd_scheme = chs.chd_scheme_id
			LEFT JOIN chd_gender AS chg ON INCALL.chd_gender = chg.chd_gender_id
			LEFT JOIN chd_country AS chc ON INCALL.chd_country = chc.chd_country_id
			LEFT JOIN chd_area AS cha ON INCALL.chd_area = cha.chd_area_id
			LEFT JOIN chd_nature_call AS cnc ON INCALL.chd_nature_call = cnc.chd_nature_call_id
			LEFT JOIN chd_ssc_catagory_call AS cscc ON INCALL.CHDIC_SCC_Course_Category = cscc.chd_ssc_ctcall_id
			LEFT JOIN chd_ugpg_course AS cuc ON INCALL.CHDIC_UGPG_Course_Name = cuc.chdcn_id
	    LEFT JOIN chd_ugpg_course_type AS cuct ON INCALL.CHDIC_UGPG_Course_type =cuct.chdct_id 
			LEFT JOIN chd_compalin_details AS cmpdt ON INCALL.chd_dtl_complain_type = cmpdt.chd_cd_id
			WHERE INCALL.`CHDIC_docket_no`=?";
			EXECUTE SMTP USING @docket_id;
		ELSE 
			PREPARE SMTP FROM "SELECT
			substring(@docket_id,3,3) AS doc_Abbrv,
			substring(@docket_id,1,2) AS edu_Abbrv,
			INCALL.CHDIC_docket_no,
			INCALL.CHDIC_caller_phNo,
			INCALL.CHDIC_caller_name,
			CALLERTYPE.chdct_type,
			INCALL.CHDIC_email,
			QT.chdqt_id,
	    QT.chdqt_name,
			INCALL.CHDIC_detail_query,
			INCALL.CHDIC_Ans_caller,
			IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,
			EDU.chde_type_name,
			CT.chdct_name,
	    CT.chdc_type_id,
			INCALL.CHDIC_Inst_Name,
			DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,
			INCALL.CHDIC_DOB,
			INCALL.CHDIC_Cast,
			STATE.State_Name,
			DIST.District,
			INCALL.CHDIC_District,
			INCALL.CHDIC_Other_District,
			INCALL.CHDIC_SNTCSSC_Address,
			INCALL.CHDIC_SNTCSSC_PIN,
			INCALL.CHDIC_Highest_Qua,
			INCALL.CHDIC_SNTCSSC_Appear_UPSCCSE,
			INCALL.CHDIC_SNTCSSC_No_Previous_Appearance,
			INCALL.CHDIC_SCC_Complain,
			IF(INCALL.`CHDIC_SCC_Complain`='NC','New Complain',IF(INCALL.`CHDIC_SCC_Complain`='EC','Existing Complain','')) AS COMPLAIN,
			INCALL.CHDIC_SCC_Docket_No,
			INCALL.CHDIC_UTS_Dist,
			INCALL.CHDIC_State,
			INCALL.CHDIC_SCC_Assign_Dept,
			INCALL.CHDIC_SCC_Other_Assign_Dept,
			SCCINST.csi_inst_name,
			INCALL.CHDIC_SCC_Course_Applied,
			INCALL.CHDIC_SCC_Course_Category,
			cscc.chd_ssc_ctcall_name,
			INCALL.CHDIC_SCC_InstName,
			DIROTED.chdsccdn_name,
			INCALL.CHDIC_SCC_Other_DirectorateName,
			INCALL.CHDIC_Passing_Year,
			INCALL.CHDIC_Preset_Course_Study,
			INCALL.CHDIC_Application_Id,
			INCALL.CHDIC_SCC_Call_Category,
			INCALL.CHDIC_SCC_Other_Call_Category,
			INCALL.CHDIC_SCC_Line_Transfer,
			SCCDEPT.CHDSCC_AD_Name,
			INCALL.CHDIC_SCC_Assigned_To,
			INCALL.CHDIC_SCC_Duration_Pending,
			INCALL.CHDIC_Reg_PhNo,
			INCALL.CHDIC_SVMCM_Last_Exam_Qua,
			INCALL.CHDIC_SVMCM_claim_period,
			INCALL.CHDIC_SVMCM_Exam_Qua_Year,
			DIROC.chdd_name,
			INCALL.CHDIC_SVMCM_Reg_Date,
			LEXM.chdleq_name,
			ADDT.chdat_name,
			INCALL.CHDIC_UGPG_Last_Exam_Qua,
			INCALL.CHDIC_UGPG_Other_Admi_Type,
			INCALL.CHDIC_WBSIS_Location,
			INCALL.CHDIC_WBSIS_Area,
			INCALL.CHDIC_WBSIS_Pancht_Name,
			INCALL.CHDIC_WBSIS_Ward_Name,
			INCALL.CHDIC_WBSIS_PIN,
			INCALL.CHDIC_WBSIS_Work_Exp,
			INCALL.CHDIC_WBSIS_Basic_Qua,
			INCALL.CHDIC_WBSIS_Discipline_Course,
			INCALL.CHDIC_WBSIS_Pct_Markes,
			INCALL.CHDIC_BS_Class,
			INCALL.CHDIC_BS_School_Name,
			INCALL.CHDIC_UTS_JobPosition,
			INCALL.CHDIC_UTS_OSMS_No,
			INCALL.CHDIC_UTS_StaffCategory,
			INCALL.CHDIC_UTS_TransManu,
			UTSDIST.District AS UTSDist,
			INCALL.CHDIC_UTS_Circle,
			INCALL.CHDIC_UTS_SchoolName,
			INCALL.CHDIC_UTS_TransferType,
			INCALL.CHDIC_UserId,
			INCALL.CHDIC_IP,
			INCALL.CHDIC_Sys_DateTime,
			csd.chd_direc_name,
			cji.chd_job_Iss_name,
			chs.chd_scheme_name,
			INCALL.chd_reg_ssin,
			INCALL.chd_bficiary_name,
			chg.chd_gender_name,
			chc.chd_country_name,
			INCALL.chd_country_other_name,
			INCALL.chd_state_other_name,
			cha.chd_area_name,
			INCALL.chd_area_other_name,
			INCALL.chd_gp_wardno,
			cnc.chd_nature_call_name,
			INCALL.chd_res_phoneNo,
			INCALL.CHDIC_WBSIS_Qua_status,
			INCALL.CHDIC_UTS_Dist_status,
			INCALL.CHDIC_UGPG_Admission_Type,
      QT.chdqt_id,
			INCALL.CHDIC_UGPG_Course_Name,
			INCALL.CHDIC_UGPG_Other_Course,
			cuc.chdcn_name,
			INCALL.CHDIC_UGPG_Course_type,
			INCALL.CHDIC_UGPG_Other_Course_type,
			cuct.chdct_name as course_type,
			INCALL.CHDIC_UGPG_BA_subject,
			INCALL.CHDIC_UGPG_App_ID,
			INCALL.chd_dtl_complain_type,
      cmpdt.chd_cd_name,
			cmpdt.chd_cd_query_type,
			EDU.chde_id
			FROM
			chd_inbound_call AS INCALL
			INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.CHDIC_caller_type = CALLERTYPE.chdct_id
			INNER JOIN chd_query_type AS QT ON INCALL.CHDIC_query_type = QT.chdqt_id
			INNER JOIN chd_education AS EDU ON INCALL.CHDIC_Edu_Grop = EDU.chde_id
			LEFT JOIN chd_call_type AS CT ON INCALL.CHDIC_Call_Type = CT.chdc_type_id
			LEFT JOIN chd_state AS STATE ON INCALL.CHDIC_State = STATE.SL
			LEFT JOIN chd_district AS DIST ON INCALL.CHDIC_District = DIST.Sl_No
			LEFT JOIN chd_scc_institutes AS SCCINST ON INCALL.CHDIC_SCC_InstName = SCCINST.csi_id
			LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.CHDIC_SCC_DirectorateName = DIROTED.chdsccdn_id
			LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id
			LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.CHDIC_SCC_Assign_Dept = SCCDEPT.CHDSCC_AD_Sl
			LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.CHDIC_UGPG_Last_Exam_Qua = LEXM.chdleq_id
			LEFT JOIN chd_add_type AS ADDT ON INCALL.CHDIC_UGPG_Admission_Type = ADDT.chdat_id
			LEFT JOIN chd_district AS UTSDIST ON INCALL.CHDIC_UTS_Dist = UTSDIST.Sl_No
			LEFT JOIN chd_ss_directorate AS csd ON INCALL.chd_directorate = csd.chd_direc_id
			LEFT JOIN chd_job_issue AS cji ON INCALL.chd_job_issue = cji.chd_job_Iss_id
			LEFT JOIN chd_scheme AS chs ON INCALL.chd_scheme = chs.chd_scheme_id
			LEFT JOIN chd_gender AS chg ON INCALL.chd_gender = chg.chd_gender_id
			LEFT JOIN chd_country AS chc ON INCALL.chd_country = chc.chd_country_id
			LEFT JOIN chd_area AS cha ON INCALL.chd_area = cha.chd_area_id
			LEFT JOIN chd_nature_call AS cnc ON INCALL.chd_nature_call = cnc.chd_nature_call_id
			LEFT JOIN chd_ssc_catagory_call AS cscc ON INCALL.CHDIC_SCC_Course_Category = cscc.chd_ssc_ctcall_id
			LEFT JOIN chd_ugpg_course AS cuc ON INCALL.CHDIC_UGPG_Course_Name = cuc.chdcn_id
	    LEFT JOIN chd_ugpg_course_type AS cuct ON INCALL.CHDIC_UGPG_Course_type =cuct.chdct_id 
			LEFT JOIN chd_compalin_details AS cmpdt ON INCALL.chd_dtl_complain_type = cmpdt.chd_cd_id
			WHERE INCALL.`CHDIC_docket_no`=? AND  INCALL.CHDIC_UserId=?";
					EXECUTE SMTP USING @docket_id,@userid;
			END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 35_admin_search_all_data
-- ----------------------------
DROP PROCEDURE IF EXISTS `35_admin_search_all_data`;
delimiter ;;
CREATE PROCEDURE `35_admin_search_all_data`(IN user_Id varchar(10),IN select_Group varchar(10),IN call_Type varchar(5),IN userList varchar(5),IN from_Date varchar(20), IN to_date varchar(20), IN docketNo varchar(30), IN limitFrom int(10) , IN limitTo int(10))
BEGIN
	#Routine body goes here...
  DECLARE sqlDesc VARCHAR(255);
  SET @userId=trim(user_Id);
  SET @selectGroup  =trim(select_Group);
  SET @callType  =trim(call_Type);
  SET @start_date =trim(from_Date);
	SET @end_date =trim(to_date);
  SET @limitFrom=trim(limitFrom);
  SET @limitTo=trim(limitTo);
  SET @user_List=trim(userList);
  SET @docketNo=trim(docketNo);

  SET @mainSQL="SELECT INCALL.`CHDIC_docket_no`,INCALL.`CHDIC_caller_phNo`,INCALL.`CHDIC_caller_name`,CALLERTYPE.chdct_type,INCALL.`CHDIC_email`,QT.chdqt_name,INCALL.`CHDIC_detail_query`,INCALL.`CHDIC_Ans_caller`,IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,EDU.chde_type_name,CT.chdct_name,INCALL.`CHDIC_Inst_Name`,DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,INCALL.`CHDIC_Cast`,STATE.State_Name,DIST.District,INCALL.`CHDIC_Other_District`,INCALL.`CHDIC_SNTCSSC_Address`,INCALL.`CHDIC_SNTCSSC_PIN`,INCALL.`CHDIC_Highest_Qua`,INCALL.`CHDIC_SNTCSSC_Appear_UPSCCSE`,INCALL.`CHDIC_SNTCSSC_No_Previous_Appearance`,INCALL.`CHDIC_SCC_Complain`,IF(INCALL.`CHDIC_SCC_Complain`='NC','New Complain',IF(INCALL.`CHDIC_SCC_Complain`='EC','Existing Complain','')) AS COMPLAIN,INCALL.`CHDIC_SCC_Docket_No`,INCALL.CHDIC_Status_DocPer,SCCINST.csi_inst_name,INCALL.`CHDIC_SCC_Course_Applied`,INCALL.`CHDIC_SCC_Course_Category`,DIROTED.chdsccdn_name,INCALL.`CHDIC_SCC_Other_DirectorateName`,INCALL.`CHDIC_Passing_Year`,INCALL.`CHDIC_Preset_Course_Study`,INCALL.`CHDIC_Application_Id`,INCALL.`CHDIC_SCC_Call_Category`,INCALL.`CHDIC_SCC_Other_Call_Category`,INCALL.`CHDIC_SCC_Line_Transfer`,SCCDEPT.CHDSCC_AD_Name,INCALL.`CHDIC_SCC_Assigned_To`,INCALL.`CHDIC_SCC_Duration_Pending`,INCALL.`CHDIC_Reg_PhNo`,INCALL.`CHDIC_SVMCM_Last_Exam_Qua`,INCALL.`CHDIC_SVMCM_Exam_Qua_Year`,DIROC.chdd_name,INCALL.`CHDIC_SVMCM_Reg_Date`,LEXM.chdleq_name,ADDT.chdat_name,INCALL.`CHDIC_UGPG_Other_Admi_Type`,INCALL.`CHDIC_WBSIS_Location`,INCALL.`CHDIC_WBSIS_Area`,INCALL.`CHDIC_WBSIS_Pancht_Name`,INCALL.`CHDIC_WBSIS_Ward_Name`,INCALL.`CHDIC_WBSIS_PIN`,INCALL.`CHDIC_WBSIS_Work_Exp`,INCALL.`CHDIC_WBSIS_Basic_Qua`,INCALL.`CHDIC_WBSIS_Discipline_Course`,INCALL.`CHDIC_WBSIS_Pct_Markes`,INCALL.`CHDIC_BS_Class`,INCALL.`CHDIC_BS_School_Name`,INCALL.`CHDIC_UTS_JobPosition`,INCALL.`CHDIC_UTS_OSMS_No`,INCALL.`CHDIC_UTS_StaffCategory`,INCALL.`CHDIC_UTS_TransManu`,UTSDIST.District AS UTSDist,INCALL.`CHDIC_UTS_Circle`,INCALL.`CHDIC_UTS_SchoolName`,INCALL.`CHDIC_UTS_TransferType`,INCALL.`CHDIC_UserId`,INCALL.`CHDIC_IP`,INCALL.`CHDIC_Sys_DateTime` FROM `chd_inbound_call` AS INCALL INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.`CHDIC_caller_type`=CALLERTYPE.chdct_id INNER JOIN chd_query_type AS QT ON INCALL.`CHDIC_query_type`=QT.chdqt_id INNER JOIN chd_education AS EDU ON INCALL.`CHDIC_Edu_Grop`=EDU.chde_id INNER JOIN chd_call_type AS CT ON INCALL.`CHDIC_Call_Type`=CT.chdc_type_id LEFT JOIN chd_state AS STATE ON INCALL.`CHDIC_State`=STATE.SL LEFT JOIN chd_district AS DIST ON INCALL.`CHDIC_District`=DIST.Sl_No  LEFT JOIN chd_scc_institutes AS SCCINST ON INCALL.`CHDIC_SCC_InstName`=SCCINST.csi_id LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.`CHDIC_SCC_DirectorateName`=DIROTED.chdsccdn_id LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.`CHDIC_SCC_Assign_Dept`=SCCDEPT.CHDSCC_AD_Sl LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.`CHDIC_UGPG_Last_Exam_Qua`= LEXM.chdleq_id LEFT JOIN chd_add_type AS ADDT ON INCALL.`CHDIC_UGPG_Admission_Type`= ADDT.chdat_id LEFT JOIN chd_district AS UTSDIST ON INCALL.`CHDIC_UTS_Dist`=UTSDIST.Sl_No";

	IF (LENGTH(sqlDesc) <> 0) THEN
  IF(LENGTH(@user_List) <> 0)THEN
      SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_UserId = '",@user_List,"'");
  END IF;
ELSE
    IF(LENGTH(@user_List) <> 0)THEN
         SET sqlDesc=CONCAT("INCALL.CHDIC_UserId = '",@user_List,"'");
    END IF;
END IF;

	IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@selectGroup) <> 0)THEN
				 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_Edu_Grop = '",@selectGroup,"'");
			 END IF;
	ELSE
			 IF(LENGTH(@selectGroup) <> 0)THEN
			   SET sqlDesc=CONCAT("INCALL.CHDIC_Edu_Grop = '",@selectGroup,"'");
			 END IF;
	END IF;


	IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@callType) <> 0)THEN
				 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_Call_Type = '",@callType,"'");
			 END IF;
	ELSE
			 IF(LENGTH(@callType) <> 0)THEN
				SET sqlDesc=CONCAT("INCALL.CHDIC_Call_Type = '",@callType,"'");
			 END IF;
	END IF;


	IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@end_date) <> 0)THEN
					 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND (INCALL.CHDID_SysDate >='",@start_date,"' AND INCALL.CHDID_SysDate <='",@end_date,"')");
			 ELSE
				IF(LENGTH(@start_date) <> 0)THEN 
					 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDID_SysDate >='",@start_date,"'");
				END IF; 
			 END IF;
	ELSE
		 IF(LENGTH(@end_date) <> 0)THEN
			   SET sqlDesc=CONCAT("INCALL.CHDID_SysDate >='",@start_date,"' AND INCALL.CHDID_SysDate <='",@end_date,"'");
			 ELSE
					IF(LENGTH(@start_date) <> 0)THEN 
						SET sqlDesc=CONCAT("INCALL.CHDID_SysDate >='",@start_date,"'");
			 END IF;
			END IF;
	END IF;
		IF (LENGTH(sqlDesc) <> 0)THEN
				 IF(LENGTH(@docketNo) <> 0)THEN
					SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_docket_no = '",@docketNo,"'");
				 END IF;
			ELSE
				 IF(LENGTH(@docketNo) <> 0)THEN
					SET sqlDesc=CONCAT("INCALL.CHDIC_docket_no = '",@docketNo,"'");
				 END IF;
			END IF;
		IF (LENGTH(sqlDesc) <> 0) THEN 
			 SET @mainSQL=CONCAT(@mainSQL ," WHERE ", sqlDesc , " ORDER BY INCALL.`CHDIC_Sl` DESC");
		ELSE
			 SET @mainSQL=CONCAT(@mainSQL ," ORDER BY INCALL.`CHDIC_Sl` DESC");
		END IF;

		IF(LENGTH(@limitFrom) <> 0)THEN
				#SET sqlDesc=CONCAT(sqlDesc," LIMIT ",@limitFrom," , ",@limitTo,"");
			SET @mainSQL=CONCAT(@mainSQL ," LIMIT ", @limitFrom , ",",@limitTo);
		END IF;




#SELECT @mainSQL;
		PREPARE stmt1 FROM @mainSQL;
		EXECUTE stmt1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 37_Export_Excle
-- ----------------------------
DROP PROCEDURE IF EXISTS `37_Export_Excle`;
delimiter ;;
CREATE PROCEDURE `37_Export_Excle`(IN select_Group varchar(10),IN call_Type varchar(5),IN callTypeAbbr varchar(5),IN userList varchar(5),IN from_Date varchar(20), IN to_date varchar(20),IN docketNo varchar(30),IN query_type VARCHAR(30),IN district_name VARCHAR(30),IN nature_call VARCHAR(30))
BEGIN
	#Routine body goes here...
  DECLARE sqlDesc VARCHAR(255);
  DECLARE groupBySQL VARCHAR(255);
  SET @selectGroup  =trim(select_Group);
  SET @callType  =trim(call_Type);
  SET @start_date =trim(from_Date);
	SET @end_date =trim(to_date);
  SET @user_List=trim(userList);
  SET @callTypeAbbr=trim(callTypeAbbr);
  SET @docketNo=trim(docketNo);
	SET @query_type=trim(query_type);
	SET @district_name=trim(district_name);
	SET @nature_call=trim(nature_call);
		IF(@callTypeAbbr = 'WADM')THEN
				SET @mainSQL="SELECT substring(INCALL.`CHDIC_docket_no`,3,3) AS doc_Abbrv,
		GROUP_CONCAT(UGPG.CHDUGPG_Subject) AS SUBCONCAT,
		GROUP_CONCAT(UGPG.CHDUGPG_Course) AS COUCONCAT,
		INCALL.CHDIC_docket_no,
		INCALL.CHDIC_Sys_DateTime,
		INCALL.CHDIC_caller_phNo,
		INCALL.CHDIC_caller_name,
		CALLERTYPE.chdct_type,
		INCALL.CHDIC_email,
		QT.chdqt_name,
		INCALL.CHDIC_detail_query,
		INCALL.CHDIC_Ans_caller,
		IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,
		EDU.chde_type_name,
		CT.chdct_name,
		INCALL.CHDIC_Inst_Name,
		DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,
		INCALL.CHDIC_Cast,
		INCALL.CHDIC_Highest_Qua,
		INCALL.CHDIC_Passing_Year,
		INCALL.CHDIC_Preset_Course_Study,
		INCALL.CHDIC_Application_Id,
		INCALL.CHDIC_Reg_PhNo,
		LEXM.chdleq_name,
		ADDT.chdat_name,
		INCALL.CHDIC_UGPG_Other_Admi_Type,
		INCALL.CHDIC_UserId,
		INCALL.CHDIC_IP,
		INCALL.CHDIC_Sys_DateTime,
		INCALL.chd_res_phoneNo,
		cnc.chd_nature_call_name,
		STATE.State_Name,
		INCALL.CHDIC_State,
		INCALL.chd_state_other_name,
		DIST.District,
		INCALL.CHDIC_District,
		INCALL.CHDIC_Other_District,
		INCALL.CHDIC_UGPG_Course_Name,
		INCALL.CHDIC_UGPG_Other_Course,
		cuc.chdcn_name,
		INCALL.CHDIC_UGPG_Course_type,
		INCALL.CHDIC_UGPG_Other_Course_type,
		cuct.chdct_name as course_type,
		
		INCALL.CHDIC_UGPG_BA_subject,
		INCALL.CHDIC_UGPG_App_ID
		FROM
		chd_inbound_call AS INCALL
		INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.CHDIC_caller_type = CALLERTYPE.chdct_id
		INNER JOIN chd_query_type AS QT ON INCALL.CHDIC_query_type = QT.chdqt_id
		INNER JOIN chd_education AS EDU ON INCALL.CHDIC_Edu_Grop = EDU.chde_id
		LEFT JOIN chd_call_type AS CT ON INCALL.CHDIC_Call_Type = CT.chdc_type_id
		LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.CHDIC_UGPG_Last_Exam_Qua = LEXM.chdleq_id
		LEFT JOIN chd_add_type AS ADDT ON INCALL.CHDIC_UGPG_Admission_Type = ADDT.chdat_id
		LEFT JOIN chd_ugpg_addmore AS UGPG ON INCALL.CHDIC_docket_no = UGPG.CHDUGPG_DocketNo
		LEFT JOIN chd_nature_call AS cnc ON INCALL.chd_nature_call = cnc.chd_nature_call_id
		LEFT JOIN chd_state AS STATE ON INCALL.`CHDIC_State` = STATE.SL 
		LEFT JOIN chd_district AS DIST ON INCALL.`CHDIC_District` = DIST.Sl_No
		LEFT JOIN chd_ugpg_course AS cuc ON INCALL.CHDIC_UGPG_Course_Name = cuc.chdcn_id
		LEFT JOIN chd_ugpg_course_type AS cuct ON INCALL.CHDIC_UGPG_Course_type =cuct.chdct_id ";
							SET groupBySQL="GROUP BY UGPG.CHDUGPG_DocketNo";
				ELSEIF(@callTypeAbbr = 'SIS')THEN
							SET @mainSQL="SELECT substring(INCALL.`CHDIC_docket_no`,3,3) AS doc_Abbrv,INCALL.`CHDIC_WBSIS_Work_Exp`,INCALL.`CHDIC_WBSIS_Qua_status`,INCALL.`CHDIC_WBSIS_Basic_Qua`,
			we1.WORKEXP AS WORKEXP,
			we1.COMPANY  AS COMPANY,aq1.AQUA AS AQUA,INCALL.`CHDIC_docket_no`,
		INCALL.CHDIC_Sys_DateTime,INCALL.`CHDIC_caller_phNo`,INCALL.`CHDIC_caller_name`,CALLERTYPE.chdct_type,INCALL.`CHDIC_email`,QT.chdqt_name,	QT.chdqt_id,INCALL.`CHDIC_detail_query`,INCALL.`CHDIC_Ans_caller`,IF(INCALL.`CHDIC_Call_Status` = 'c','Closed',IF(INCALL.`CHDIC_Call_Status` = 'o','Open',''))AS CallStatus,EDU.chde_type_name,CT.chdct_name,CT.chdc_type_id,INCALL.`CHDIC_Inst_Name`, DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y')AS DOB,INCALL.`CHDIC_Cast`,STATE.State_Name,DIST.District,INCALL.`CHDIC_Other_District`,INCALL.`CHDIC_Highest_Qua`,INCALL.`CHDIC_Passing_Year`,INCALL.`CHDIC_Preset_Course_Study`,INCALL.`CHDIC_Application_Id`,INCALL.`CHDIC_Reg_PhNo`,INCALL.`CHDIC_WBSIS_Location`,INCALL.`CHDIC_WBSIS_Area`,INCALL.`CHDIC_WBSIS_Pancht_Name`,INCALL.`CHDIC_WBSIS_Ward_Name`,INCALL.`CHDIC_WBSIS_PIN`,INCALL.`CHDIC_WBSIS_Basic_Qua`,INCALL.`CHDIC_WBSIS_Discipline_Course`,INCALL.`CHDIC_WBSIS_Pct_Markes`,INCALL.`CHDIC_BS_Class`,INCALL.`CHDIC_BS_School_Name`,INCALL.`CHDIC_UserId`,INCALL.`CHDIC_IP`,INCALL.`CHDIC_Sys_DateTime`,INCALL.chd_res_phoneNo,cgd.chd_gender_name,
		cnc.chd_nature_call_name,INCALL.chd_dtl_complain_type,cmpdt.chd_cd_name 
		FROM `chd_inbound_call` AS INCALL 
		INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.`CHDIC_caller_type` = CALLERTYPE.chdct_id 
		INNER JOIN chd_query_type AS QT ON INCALL.`CHDIC_query_type` = QT.chdqt_id 
		INNER JOIN chd_education AS EDU ON INCALL.`CHDIC_Edu_Grop` = EDU.chde_id 
		LEFT JOIN chd_call_type AS CT ON INCALL.`CHDIC_Call_Type` = CT.chdc_type_id 
		LEFT JOIN chd_gender AS cgd ON INCALL.chd_gender = cgd.chd_gender_id
		LEFT JOIN chd_state AS STATE ON INCALL.`CHDIC_State` = STATE.SL 
		LEFT JOIN chd_compalin_details AS cmpdt ON INCALL.chd_dtl_complain_type = cmpdt.chd_cd_id
		LEFT JOIN chd_district AS DIST ON INCALL.`CHDIC_District` = DIST.Sl_No 
		LEFT JOIN(SELECT aq.CHDAQ_DocNo,GROUP_CONCAT(aq.CHDAQ_AQ)AS AQUA 
				 FROM chd_additional_qualification AS aq GROUP BY aq.CHDAQ_DocNo)AS aq1 ON INCALL.`CHDIC_docket_no` = aq1.CHDAQ_DocNo 
		LEFT JOIN(SELECT we.CHDWE_DocNo,GROUP_CONCAT(we.CHDWE_Dua_Exp)AS WORKEXP,GROUP_CONCAT(we.CHDWE_CompanyName) AS COMPANY FROM chd_work_exp AS we GROUP BY we.CHDWE_DocNo)AS we1 ON INCALL.`CHDIC_docket_no` = we1.CHDWE_DocNo
		LEFT JOIN chd_nature_call AS cnc ON INCALL.chd_nature_call = cnc.chd_nature_call_id";
						SET groupBySQL="";
		ELSEIF (@callTypeAbbr = 'UTS')THEN
						SET @mainSQL="SELECT
	substring( INCALL.`CHDIC_docket_no`, 3, 3 ) AS doc_Abbrv,
	INCALL.`CHDIC_docket_no`,
	INCALL.CHDIC_Sys_DateTime,
	INCALL.`CHDIC_caller_phNo`,
	INCALL.`CHDIC_caller_name`,
	CALLERTYPE.chdct_type,
	INCALL.`CHDIC_email`,
	QT.chdqt_id,
	QT.chdqt_name,
	INCALL.`CHDIC_detail_query`,
	INCALL.`CHDIC_Ans_caller`,
IF
	(
		INCALL.`CHDIC_Call_Status` = 'c',
		'Closed',
	IF
	( INCALL.`CHDIC_Call_Status` = 'o', 'Open', '' )) AS CallStatus,
	EDU.chde_type_name,
	CT.chdct_name,
	CT.chdc_type_id,
	INCALL.`CHDIC_Inst_Name`,
	DATE_FORMAT( INCALL.`CHDIC_DOB`, '%d-%m-%Y' ) AS DOB,
	INCALL.`CHDIC_Cast`,
	STATE.State_Name,
	DIST.District,
	cgd.chd_gender_name,
	INCALL.`CHDIC_Other_District`,
	INCALL.`CHDIC_Highest_Qua`,
	INCALL.`CHDIC_Passing_Year`,
	INCALL.`CHDIC_Preset_Course_Study`,
	INCALL.`CHDIC_Application_Id`,
	INCALL.`CHDIC_Reg_PhNo`,
	INCALL.`CHDIC_UTS_JobPosition`,
	INCALL.`CHDIC_UTS_OSMS_No`,
	INCALL.`CHDIC_UTS_StaffCategory`,
	INCALL.`CHDIC_UTS_TransManu`,
	UTSDIST.District AS UTSDist,
	INCALL.`CHDIC_UTS_Circle`,
	INCALL.`CHDIC_UTS_SchoolName`,
	INCALL.`CHDIC_UTS_TransferType`,
	INCALL.`CHDIC_UserId`,
	INCALL.`CHDIC_IP`,
	INCALL.`CHDIC_Sys_DateTime`,
	INCALL.chd_res_phoneNo,
	INCALL.CHDIC_UTS_Dist_status,
	cnc.chd_nature_call_name ,
	UTSADDMORE.addutsdist,
	UTSADDMORE.addutscir,
	UTSADDMORE.addutsins,
	INCALL.chd_dtl_complain_type,
  cmpdt.chd_cd_name
FROM
	`chd_inbound_call` AS INCALL
	INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.`CHDIC_caller_type` = CALLERTYPE.chdct_id
	INNER JOIN chd_query_type AS QT ON INCALL.`CHDIC_query_type` = QT.chdqt_id
	INNER JOIN chd_education AS EDU ON INCALL.`CHDIC_Edu_Grop` = EDU.chde_id
	LEFT JOIN chd_call_type AS CT ON INCALL.`CHDIC_Call_Type` = CT.chdc_type_id
	LEFT JOIN chd_state AS STATE ON INCALL.`CHDIC_State` = STATE.SL
	LEFT JOIN chd_district AS DIST ON INCALL.`CHDIC_District` = DIST.Sl_No
	LEFT JOIN chd_district AS UTSDIST ON INCALL.`CHDIC_UTS_Dist` = UTSDIST.Sl_No
	LEFT JOIN chd_gender AS cgd ON INCALL.chd_gender = cgd.chd_gender_id
	LEFT JOIN chd_compalin_details AS cmpdt ON INCALL.chd_dtl_complain_type = cmpdt.chd_cd_id
	LEFT JOIN chd_nature_call AS cnc ON INCALL.chd_nature_call = cnc.chd_nature_call_id 
	LEFT JOIN (SELECT 
	UTSADD.CHDUTS_docketNo,
	GROUP_CONCAT(CHDDIST.District)AS addutsdist, 
	GROUP_CONCAT(UTSADD.CHDUTS_Circle) as addutscir,
	GROUP_CONCAT(UTSADD.CHDUTS_Inst) as addutsins
	FROM chd_utsashree_addmore  AS UTSADD
	INNER JOIN chd_district AS CHDDIST ON CHDDIST.Sl_No=UTSADD.CHDUTS_Dist 
	GROUP BY UTSADD.CHDUTS_docketNo ) AS UTSADDMORE ON UTSADDMORE.CHDUTS_docketNo=INCALL.CHDIC_docket_no";
					SET groupBySQL="";
		ELSE
				SET @mainSQL="SELECT
	substring(INCALL.`CHDIC_docket_no`,3,3) AS doc_Abbrv,
	INCALL.CHDIC_docket_no,
	INCALL.CHDIC_Sys_DateTime,
	INCALL.CHDIC_caller_phNo,
	INCALL.CHDIC_caller_name,
	CALLERTYPE.chdct_type,
	INCALL.CHDIC_email,
	QT.chdqt_id,
	QT.chdqt_name,
	INCALL.CHDIC_detail_query,
	INCALL.CHDIC_Ans_caller,
	IF(INCALL.`CHDIC_Call_Status`='c','Closed',IF(INCALL.`CHDIC_Call_Status`='o','Open','')) AS CallStatus,
	EDU.chde_type_name,
	CT.chdct_name,
	CT.chdc_type_id,
	INCALL.CHDIC_Inst_Name,
	DATE_FORMAT(INCALL.`CHDIC_DOB`,'%d-%m-%Y') AS DOB,
	INCALL.CHDIC_Cast,
	STATE.State_Name,
	DIST.District,
	INCALL.CHDIC_Other_District,
	INCALL.CHDIC_SNTCSSC_Address,
	INCALL.CHDIC_SNTCSSC_PIN,
	INCALL.CHDIC_Highest_Qua,
	INCALL.CHDIC_SNTCSSC_Appear_UPSCCSE,
	INCALL.CHDIC_SNTCSSC_No_Previous_Appearance,
	INCALL.CHDIC_SCC_Complain,
	IF(INCALL.`CHDIC_SCC_Complain`='NC','New Complain',IF(INCALL.`CHDIC_SCC_Complain`='EC','Existing Complain','')) AS COMPLAIN,
	INCALL.CHDIC_SCC_Docket_No,
	INCALL.CHDIC_SCC_Course_Applied,
	INCALL.CHDIC_SCC_Course_Category,
	DIROTED.chdsccdn_name,
	INCALL.CHDIC_SCC_Other_DirectorateName,
	INCALL.CHDIC_Passing_Year,
	INCALL.CHDIC_Preset_Course_Study,
	INCALL.CHDIC_Application_Id,
	INCALL.CHDIC_SCC_Call_Category,
	INCALL.CHDIC_SCC_Other_Call_Category,
	INCALL.CHDIC_SCC_Line_Transfer,
	SCCDEPT.CHDSCC_AD_Name,
	INCALL.CHDIC_SCC_Assigned_To,
	INCALL.CHDIC_SCC_Duration_Pending,
	INCALL.CHDIC_Reg_PhNo,
	INCALL.CHDIC_SVMCM_Last_Exam_Qua,
	INCALL.CHDIC_SVMCM_Exam_Qua_Year,
	DIROC.chdd_name,
	INCALL.CHDIC_SVMCM_Reg_Date,
	INCALL.CHDIC_SVMCM_claim_period,
	INCALL.CHDIC_BS_Class,
	INCALL.CHDIC_BS_School_Name,
	INCALL.CHDIC_UserId,
	INCALL.CHDIC_IP,
	INCALL.CHDIC_Sys_DateTime,
	INCALL.chd_res_phoneNo,
	cnc.chd_nature_call_name,
	cssde.chd_direc_name,
	cji.chd_job_Iss_name,
	cse.chd_scheme_name,
	INCALL.chd_reg_ssin,
	INCALL.chd_bficiary_name,
	cgd.chd_gender_name,
	cce.chd_country_name,
	INCALL.chd_country_other_name,
	chs.State_Name,
	INCALL.chd_state_other_name,
	chd.District,
	INCALL.CHDIC_Other_District,
	cae.chd_area_name,
	INCALL.chd_area_other_name,
	INCALL.chd_area_other_name,
	INCALL.chd_gp_wardno,
	INCALL.CHDIC_SCC_InstName,
	cscc.chd_ssc_ctcall_name,
	INCALL.CHDIC_UGPG_Course_Name,
	INCALL.CHDIC_UGPG_Other_Course,
	cuc.chdcn_name,
	INCALL.CHDIC_UGPG_Course_type,
	INCALL.CHDIC_UGPG_Other_Course_type,
	cuct.chdct_name as course_type,
	INCALL.CHDIC_UGPG_BA_subject,
	INCALL.CHDIC_UGPG_App_ID,
	LEXM.chdleq_name,
	ADDT.chdat_name,
	INCALL.CHDIC_UGPG_Other_Admi_Type,
	INCALL.chd_dtl_complain_type,
  cmpdt.chd_cd_name
	FROM
	chd_inbound_call AS INCALL
	INNER JOIN chd_caller_type AS CALLERTYPE ON INCALL.CHDIC_caller_type = CALLERTYPE.chdct_id
	INNER JOIN chd_query_type AS QT ON INCALL.CHDIC_query_type = QT.chdqt_id
	INNER JOIN chd_education AS EDU ON INCALL.CHDIC_Edu_Grop = EDU.chde_id
	LEFT JOIN chd_call_type AS CT ON INCALL.CHDIC_Call_Type = CT.chdc_type_id
	LEFT JOIN chd_state AS STATE ON INCALL.CHDIC_State = STATE.SL
	LEFT JOIN chd_district AS DIST ON INCALL.CHDIC_District = DIST.Sl_No
	LEFT JOIN chd_scc_directorate_name AS DIROTED ON INCALL.CHDIC_SCC_DirectorateName = DIROTED.chdsccdn_id
	LEFT JOIN chd_directorate AS DIROC ON INCALL.CHDIC_SVMCM_Directorate = DIROC.chdd_id
	LEFT JOIN chd_scc_assignrd_dept AS SCCDEPT ON INCALL.CHDIC_SCC_Assign_Dept = SCCDEPT.CHDSCC_AD_Sl
	LEFT JOIN chd_nature_call AS cnc ON INCALL.chd_nature_call = cnc.chd_nature_call_id
	LEFT JOIN chd_ss_directorate AS cssde ON INCALL.chd_directorate = cssde.chd_direc_id
	LEFT JOIN chd_job_issue AS cji ON INCALL.chd_job_issue = cji.chd_job_Iss_id
	LEFT JOIN chd_scheme AS cse ON INCALL.chd_scheme = cse.chd_scheme_id
	LEFT JOIN chd_gender AS cgd ON INCALL.chd_gender = cgd.chd_gender_id
	LEFT JOIN chd_country AS cce ON INCALL.chd_country = cce.chd_country_id
	LEFT JOIN chd_state AS chs ON INCALL.CHDIC_State = chs.SL
	LEFT JOIN chd_district AS chd ON INCALL.CHDIC_District = chd.Sl_No
	LEFT JOIN chd_area AS cae ON INCALL.chd_area = cae.chd_area_id
	LEFT JOIN chd_ssc_catagory_call AS cscc ON INCALL.CHDIC_SCC_Course_Category = cscc.chd_ssc_ctcall_id
	LEFT JOIN chd_ugpg_course AS cuc ON INCALL.CHDIC_UGPG_Course_Name = cuc.chdcn_id
	LEFT JOIN chd_ugpg_course_type AS cuct ON INCALL.CHDIC_UGPG_Course_type =cuct.chdct_id 
	LEFT JOIN chd_last_exam_q AS LEXM ON INCALL.CHDIC_UGPG_Last_Exam_Qua = LEXM.chdleq_id
	LEFT JOIN chd_add_type AS ADDT ON INCALL.CHDIC_UGPG_Admission_Type = ADDT.chdat_id
	LEFT JOIN chd_compalin_details AS cmpdt ON INCALL.chd_dtl_complain_type = cmpdt.chd_cd_id
";
				SET groupBySQL="";
	END IF;

 IF (LENGTH(sqlDesc) <> 0)THEN
		 IF(LENGTH(@docketNo) <> 0)THEN
			SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_docket_no = '",@docketNo,"'");
		 END IF;
	ELSE
		 IF(LENGTH(@docketNo) <> 0)THEN
			SET sqlDesc=CONCAT("INCALL.CHDIC_docket_no = '",@docketNo,"'");
		 END IF;
	END IF;

	IF (LENGTH(sqlDesc) <> 0) THEN
		IF(LENGTH(@user_List) <> 0)THEN
				SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_UserId = '",@user_List,"'");
		END IF;
	ELSE
    IF(LENGTH(@user_List) <> 0)THEN
         SET sqlDesc=CONCAT("INCALL.CHDIC_UserId = '",@user_List,"'");
    END IF;
	END IF;

	IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@selectGroup) <> 0)THEN
				 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_Edu_Grop = '",@selectGroup,"'");
			 END IF;
	ELSE
			 IF(LENGTH(@selectGroup) <> 0)THEN
			   SET sqlDesc=CONCAT("INCALL.CHDIC_Edu_Grop = '",@selectGroup,"'");
			 END IF;
	END IF;


	IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@callType) <> 0)THEN
				 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_Call_Type = '",@callType,"'");
			 END IF;
	ELSE
			 IF(LENGTH(@callType) <> 0)THEN
				SET sqlDesc=CONCAT("INCALL.CHDIC_Call_Type = '",@callType,"'");
			 END IF;
	END IF;
 IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@query_type) <> 0)THEN
				 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_query_type = '",@query_type,"'");
			 END IF;
	ELSE
			 IF(LENGTH(@query_type) <> 0)THEN
				SET sqlDesc=CONCAT("INCALL.CHDIC_query_type = '",@query_type,"'");
			 END IF;
	END IF;
	
 IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@district_name) <> 0)THEN
				 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDIC_District = '",@district_name,"'");
			 END IF;
	ELSE
			 IF(LENGTH(@district_name) <> 0)THEN
				SET sqlDesc=CONCAT("INCALL.CHDIC_District = '",@district_name,"'");
			 END IF;
	END IF;
IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@nature_call) <> 0)THEN
				 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.chd_nature_call = '",@nature_call,"'");
			 END IF;
	ELSE
			 IF(LENGTH(@nature_call) <> 0)THEN
				SET sqlDesc=CONCAT("INCALL.chd_nature_call = '",@nature_call,"'");
			 END IF;
	END IF;
	
	IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@end_date) <> 0)THEN
					 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND (INCALL.CHDID_SysDate >='",@start_date,"' AND INCALL.CHDID_SysDate <='",@end_date,"')");
			 ELSE
				IF(LENGTH(@start_date) <> 0)THEN 
					 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND INCALL.CHDID_SysDate >='",@start_date,"'");
				END IF; 
			 END IF;
	ELSE
		 IF(LENGTH(@end_date) <> 0)THEN
			   SET sqlDesc=CONCAT("INCALL.CHDID_SysDate >='",@start_date,"' AND INCALL.CHDID_SysDate <='",@end_date,"'");
			 ELSE
					IF(LENGTH(@start_date) <> 0)THEN 
						SET sqlDesc=CONCAT("INCALL.CHDID_SysDate >='",@start_date,"'");
			 END IF;
			END IF;
	END IF;

		IF (LENGTH(sqlDesc) <> 0) THEN 
			 SET @mainSQL=CONCAT(@mainSQL ," WHERE ", sqlDesc ," ", groupBySQL," ORDER BY INCALL.`CHDIC_Sl` ASC");
		ELSE
			 SET @mainSQL=CONCAT(@mainSQL," ",groupBySQL," ORDER BY INCALL.`CHDIC_Sl` ASC");
		END IF;

-- 	SELECT @mainSQL;
		PREPARE stmt1 FROM @mainSQL;
		EXECUTE stmt1;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 38_edit_fetch_Addmore_Data
-- ----------------------------
DROP PROCEDURE IF EXISTS `38_edit_fetch_Addmore_Data`;
delimiter ;;
CREATE PROCEDURE `38_edit_fetch_Addmore_Data`(IN docId varchar(40),IN userId varchar(30))
BEGIN
	#Routine body goes here...
	DECLARE Abbrv VARCHAR(50);
  SET @docket_ID=TRIM(docId);
  SET @user_Id=TRIM(userId);
  #SET @Abbrv=TRIM(Abbr);


  SELECT substring(@docket_ID,3,3)into Abbrv FROM chd_inbound_call WHERE CHDIC_docket_no=@docket_ID;
				IF(LENGTH(@User_ID) <> 0)THEN
							IF(Abbrv = 'ADM') THEN
									SET @var1="SELECT CHDUGPG_Sl, CHDUGPG_DocketNo, CHDUGPG_CallType, CHDUGPG_Course, CHDUGPG_Subject, CHDUGPG_UserId, CHDUGPG_IP, CHDUGPG_SysDateTime FROM chd_ugpg_addmore WHERE CHDUGPG_DocketNo=? AND CHDUGPG_UserId=?";
							ELSEIF(Abbrv = 'UTS')THEN
									SET @var1="SELECT AD.`CHDUTS_Circle`,AD.`CHDUTS_Inst`,DIS.`District`,AD.`CHDUTS_Dist` FROM `chd_utsashree_addmore` AD INNER JOIN chd_district AS DIS ON AD.`CHDUTS_Dist`= DIS.`Sl_No` WHERE AD.`CHDUTS_docketNo`=? AND AD.`CHDUTS_User`=?";
							ELSEIF(Abbrv = 'SIS')THEN
									SET @var1="SELECT `CHDAQ_Sl`, `CHDAQ_DocNo`, `CHDAQ_Edu_Id`, `CHDAQ_Call_Id`, `CHDAQ_AQ`, `CHDAQ_UserId`, `CHDAQ_IP`, `CHDAQ_Status`, `CHDAQ_SysDateTime` FROM `chd_additional_qualification` WHERE `CHDAQ_DocNo`=? AND `CHDAQ_UserId`=?";
							END IF;
				END IF;
#SELECT  @var1;
 PREPARE stmt1 FROM @var1;
 EXECUTE stmt1 USING @docket_ID,@user_Id;
#SELECT  @var1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 39_WorkExp
-- ----------------------------
DROP PROCEDURE IF EXISTS `39_WorkExp`;
delimiter ;;
CREATE PROCEDURE `39_WorkExp`(IN userId varchar(30),IN docId varchar(40), IN prv varchar (49))
BEGIN
	#Routine body goes here...
  DECLARE Abbrv VARCHAR(50);
  SET @docket_ID=TRIM(docId);
  SET @user_Id=TRIM(userId);
  SET @prv=TRIM(prv);

  SELECT substring(@docket_ID,3,3)into Abbrv FROM `chd_inbound_call` WHERE `CHDIC_docket_no`=@docket_ID;
   IF(@prv = 'Super Administrator' OR @prv = 'Admin')THEN
        PREPARE stmt1 FROM "SELECT `CHDWE_CompanyName`, `CHDWE_Dua_Exp` FROM `chd_work_exp` WHERE `CHDWE_DocNo`=?";
					EXECUTE stmt1 USING @docket_ID;
 ELSE 
             
					PREPARE stmt1 FROM "SELECT `CHDWE_CompanyName`, `CHDWE_Dua_Exp` FROM `chd_work_exp` WHERE `CHDWE_UserId`=? AND `CHDWE_DocNo`=?";
					EXECUTE stmt1 USING @user_Id,@docket_ID;
   END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 40_all_directorate
-- ----------------------------
DROP PROCEDURE IF EXISTS `40_all_directorate`;
delimiter ;;
CREATE PROCEDURE `40_all_directorate`()
BEGIN
  PREPARE SMTP FROM "SELECT cd.chdd_id, cd.chdd_name FROM chd_directorate AS cd ORDER BY cd.chdd_name ASC";
  EXECUTE SMTP;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 40_loginTimeUpdate
-- ----------------------------
DROP PROCEDURE IF EXISTS `40_loginTimeUpdate`;
delimiter ;;
CREATE PROCEDURE `40_loginTimeUpdate`(IN datetime varchar(30), IN ip varchar(20),IN username varchar(15),IN Upassword varchar(20))
BEGIN
	#Routine body goes here...
  SET @datetime=TRIM(datetime);
  SET @ip=TRIM(ip);
  SET @username=TRIM(username);
  SET @Upassword=TRIM(Upassword);

  PREPARE SMTP FROM "UPDATE `chd_user_admin` SET `CHDUSER_login_dateTime`=?,`CHDUSER_login_ip`=? WHERE `CHDUSER_UserName`=? AND `CHDUSER_Password`=?";
  EXECUTE SMTP USING @datetime,@ip,@username,@Upassword;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 41_all_directorate
-- ----------------------------
DROP PROCEDURE IF EXISTS `41_all_directorate`;
delimiter ;;
CREATE PROCEDURE `41_all_directorate`()
BEGIN
  PREPARE SMTP FROM "SELECT cd.chd_direc_id, cd.chd_direc_name FROM chd_ss_directorate AS cd WHERE cd.chd_direc_is_publish = '1' AND cd.chd_direc_to IS NULL ORDER BY cd.chd_direc_name ASC";
  EXECUTE SMTP;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 42_job_issue
-- ----------------------------
DROP PROCEDURE IF EXISTS `42_job_issue`;
delimiter ;;
CREATE PROCEDURE `42_job_issue`()
BEGIN
	SELECT
	cji.chd_job_Iss_id,
	cji.chd_job_Iss_name
	FROM
	chd_job_issue AS cji
	WHERE
	cji.chd_job_Iss_is_publish = '1' AND
	cji.chd_job_Iss_to IS NULL
	ORDER BY
	cji.chd_job_Iss_name ASC ;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 43_scheme
-- ----------------------------
DROP PROCEDURE IF EXISTS `43_scheme`;
delimiter ;;
CREATE PROCEDURE `43_scheme`()
BEGIN
	#Routine body goes here...
	SELECT
		cs.chd_scheme_id,
		cs.chd_scheme_name
		FROM
		chd_scheme AS cs
		WHERE
		cs.chd_scheme_publish = '1' AND
		cs.chd_scheme_to IS NULL
		ORDER BY
		cs.chd_scheme_name ASC;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 44_country
-- ----------------------------
DROP PROCEDURE IF EXISTS `44_country`;
delimiter ;;
CREATE PROCEDURE `44_country`()
BEGIN
	#Routine body goes here...
	SELECT
	cc.chd_country_id,
	cc.chd_country_name
	FROM
	chd_country AS cc
	WHERE
	cc.chd_country_is_publish = '1' AND
	cc.chd_country_to IS NULL
	ORDER BY
	cc.chd_country_name ASC;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 45_state
-- ----------------------------
DROP PROCEDURE IF EXISTS `45_state`;
delimiter ;;
CREATE PROCEDURE `45_state`()
BEGIN
	#Routine body goes here...
	SELECT
	cs.SL,
	cs.State_Name,
	cs.ID
	FROM
	chd_state AS cs
	WHERE
	cs.chd_state_is_publish = '1' AND
	cs.chd_state_to IS NULL;
	

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 46_district
-- ----------------------------
DROP PROCEDURE IF EXISTS `46_district`;
delimiter ;;
CREATE PROCEDURE `46_district`()
BEGIN
	#Routine body goes here...
	SELECT
    cd.Sl_No,
    cd.District
FROM
    chd_district AS cd
WHERE
    cd.chd_district_is_publish = '1' AND
    cd.chd_district_to IS NULL
ORDER BY
    cd.Sl_No ASC;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 47_area
-- ----------------------------
DROP PROCEDURE IF EXISTS `47_area`;
delimiter ;;
CREATE PROCEDURE `47_area`()
BEGIN
	#Routine body goes here...
		SELECT
		ca.chd_area_id,
		ca.chd_area_name
		FROM
		chd_area AS ca
		WHERE
		ca.chd_area_is_publish = '1' AND
		ca.chd_area_to IS NULL
		ORDER BY
		ca.chd_area_name ASC;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 48_quary_type
-- ----------------------------
DROP PROCEDURE IF EXISTS `48_quary_type`;
delimiter ;;
CREATE PROCEDURE `48_quary_type`()
BEGIN
	#Routine body goes here...
		SELECT
		cq.cha_query_id,
		cq.cha_query_name,
		cq.cha_query_to
		FROM
		chd_query AS cq
		WHERE
		cq.cha_query_is_publish = '1' AND
		cq.cha_query_to IS NULL
		ORDER BY
		cq.cha_query_name ASC;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 50_gender
-- ----------------------------
DROP PROCEDURE IF EXISTS `50_gender`;
delimiter ;;
CREATE PROCEDURE `50_gender`()
BEGIN
	#Routine body goes here...
		SELECT
			cg.chd_gender_id,
			cg.chd_gender_name
			FROM
			chd_gender AS cg
			WHERE 
			cg.chd_gender_is_publish='1' AND 
			cg.chd_gender_to IS NULL;
-- 			ORDER BY
-- 			cg.chd_gender_name ASC;



END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 51_ssc_catagory_call
-- ----------------------------
DROP PROCEDURE IF EXISTS `51_ssc_catagory_call`;
delimiter ;;
CREATE PROCEDURE `51_ssc_catagory_call`()
BEGIN
	#Routine body goes here...
		SELECT
	chd_ssc_catagory_call.chd_ssc_ctcall_id,
	chd_ssc_catagory_call.chd_ssc_ctcall_name
	FROM
	chd_ssc_catagory_call;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 52_add_type
-- ----------------------------
DROP PROCEDURE IF EXISTS `52_add_type`;
delimiter ;;
CREATE PROCEDURE `52_add_type`()
BEGIN
	#Routine body goes here...
   SELECT
		chd_add_type.chdat_id,
		chd_add_type.chdat_name,
		chd_add_type.chdat_reff_id
		FROM
		chd_add_type;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 53_natural_calls
-- ----------------------------
DROP PROCEDURE IF EXISTS `53_natural_calls`;
delimiter ;;
CREATE PROCEDURE `53_natural_calls`()
BEGIN
	#Routine body goes here...
	SELECT
	cnc.chd_nature_call_id,
	cnc.chd_nature_call_name
	FROM
	chd_nature_call AS cnc
	WHERE
	cnc.chd_nature_call_is_publish = '1' AND
	cnc.chd_nature_call_to IS NULL
 ORDER BY
    cnc.chd_nature_call_name ASC;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 54_user_name
-- ----------------------------
DROP PROCEDURE IF EXISTS `54_user_name`;
delimiter ;;
CREATE PROCEDURE `54_user_name`(IN userid INT)
BEGIN
    -- Routine body goes here...
    SELECT 
		cua.CHDUSER_UserName ,
		CONCAT_WS(" " ,cua.CHDUSER_FName,
		cua.CHDUSER_MName,cua.CHDUSER_LName) as username,
		cua.CHDUSER_NGS
		FROM chd_user_admin AS cua WHERE cua.CHDUSER_Id =userid;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 55_dist_uts_distname
-- ----------------------------
DROP PROCEDURE IF EXISTS `55_dist_uts_distname`;
delimiter ;;
CREATE PROCEDURE `55_dist_uts_distname`(IN distid INT)
BEGIN
SELECT
chdst.District as UTS_District_Name
FROM
chd_district AS chdst
INNER JOIN chd_utsashree_addmore AS cutsadd ON chdst.Sl_No = cutsadd.CHDUTS_Dist
WHERE  chdst.Sl_No =distid;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 56_edit_doc_count
-- ----------------------------
DROP PROCEDURE IF EXISTS `56_edit_doc_count`;
delimiter ;;
CREATE PROCEDURE `56_edit_doc_count`(IN userList varchar(5),IN from_Date varchar(20), IN to_date varchar(20))
BEGIN
	#Routine body goes here...
	  DECLARE sqlDesc VARCHAR(255);
	  SET @user_List=trim(userList);
		SET @start_date =trim(from_Date);
	  SET @end_date =trim(to_date);
		SET @mainSQL="SELECT
			cde.chde_id,
			cde.chde_dockno,
			cde.chde_updateon,
			cde.chde_aduser,
			CONCAT_WS(' ' ,chduseradd.CHDUSER_FName,chduseradd.CHDUSER_MName,chduseradd.CHDUSER_LName) as adminusername,
			chduseradd.CHDUSER_NGS as adminuserngs, 
			chdc.CHDIC_Sys_DateTime,
			chdc.CHDIC_UserId,
			CONCAT_WS(' ' ,adminuser.CHDUSER_FName,adminuser.CHDUSER_MName,adminuser.CHDUSER_LName) as username,
			adminuser.CHDUSER_NGS as userngs

			FROM
			chd_docket_edit AS cde
			INNER JOIN chd_inbound_call AS chdc ON cde.chde_dockno = chdc.CHDIC_docket_no
			INNER JOIN chd_user_admin AS chduseradd ON chduseradd.CHDUSER_Id = cde.chde_aduser
			INNER JOIN chd_user_admin as adminuser ON adminuser.CHDUSER_Id = chdc.CHDIC_UserId";
		
--     IF (LENGTH(sqlDesc) <> 0) THEN
-- 		IF(LENGTH(@user_List) <> 0)THEN
-- 				SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND cde.chde_aduser = '",@user_List,"'");
-- 		END IF;
-- 	ELSE
--     IF(LENGTH(@user_List) <> 0)THEN
--          SET sqlDesc=CONCAT("cde.chde_aduser = '",@user_List,"'");
--     END IF;
-- 	END IF;

IF (LENGTH(sqlDesc) <> 0)THEN
			 IF(LENGTH(@end_date) <> 0)THEN
					 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND (cde.chde_updateon >='",@start_date,"' AND INCALL.chde_updateon <='",@end_date,"')");
			 ELSE
				IF(LENGTH(@start_date) <> 0)THEN 
					 SET sqlDesc=CONCAT(TRIM(sqlDesc)," AND cde.chde_updateon >='",@start_date,"'");
				END IF; 
			 END IF;
	ELSE
		 IF(LENGTH(@end_date) <> 0)THEN
			   SET sqlDesc=CONCAT("cde.chde_updateon >='",@start_date,"' AND cde.chde_updateon <='",@end_date,"'");
			 ELSE
					IF(LENGTH(@start_date) <> 0)THEN 
						SET sqlDesc=CONCAT("cde.chde_updateon >='",@start_date,"'");
			 END IF;
			END IF;
	END IF;
	IF (LENGTH(sqlDesc) <> 0) THEN 
			 SET @mainSQL=CONCAT(@mainSQL ," WHERE ", sqlDesc ,"  ORDER BY cde.`chde_updateon` ASC");
		ELSE
			 SET @mainSQL=CONCAT(@mainSQL," ORDER BY cde.`chde_updateon` ASC");
		END IF;

		#SELECT @mainSQL;
		PREPARE stmt1 FROM @mainSQL;
		EXECUTE stmt1;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 57_ugpg_course
-- ----------------------------
DROP PROCEDURE IF EXISTS `57_ugpg_course`;
delimiter ;;
CREATE PROCEDURE `57_ugpg_course`()
BEGIN
	#Routine body goes here...
	SELECT
	course.chdcn_id,
	course.chdcn_name,
	course.chdcn_is_publish,
	course.chdcn_from_date,
	course.chdcn_to_date
	FROM
	chd_ugpg_course AS course
	WHERE chdcn_is_publish='1' and chdcn_to_date is NULL;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 58_ugpg_course_type
-- ----------------------------
DROP PROCEDURE IF EXISTS `58_ugpg_course_type`;
delimiter ;;
CREATE PROCEDURE `58_ugpg_course_type`()
BEGIN
	SELECT
	ctype.chdct_id,
	ctype.chdct_name,
	ctype.chdct_is_publish,
	ctype.chdct_from_date,
	ctype.chdct_to_date
	FROM
	chd_ugpg_course_type AS ctype WHERE chdct_is_publish='1' and chdct_to_date is NULL;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for 59_complain_details
-- ----------------------------
DROP PROCEDURE IF EXISTS `59_complain_details`;
delimiter ;;
CREATE PROCEDURE `59_complain_details`()
BEGIN
	#Routine body goes here...\
	SELECT
	cd.chd_cd_id,
	cd.chd_cd_name,
	cd.chd_cd_query_type,
	cd.chd_cd_edu_type,
	cd.chd_cd_is_publish,
	cd.chd_cd_from_date,
	cd.chd_cd_to_date
	FROM
	chd_compalin_details AS cd
   WHERE chd_cd_is_publish='1';

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for Lock_User_List
-- ----------------------------
DROP PROCEDURE IF EXISTS `Lock_User_List`;
delimiter ;;
CREATE PROCEDURE `Lock_User_List`()
BEGIN
	#Routine body goes here...
	SELECT
logintracking.sessionId,
cua.CHDUSER_FName,
cua.CHDUSER_MName,
cua.CHDUSER_LName,
cua.CHDUSER_NGS,
cua.CHDUSER_UserName,
cua.CHDUSER_Password,
cua.CHDUSER_Id,
cua.CHDUSER_Email,
cua.CHDUSER_UserType,
cua.CHDUSER_Role,
cua.CHDUSER_PhNo,
cua.CHDUSER_Address,
cua.CHDUSER_Image,
cua.CHDUSER_Status,
cua.CHDUSER_Is_Public,
cua.CHDUSER_AddTime,
cua.CHDUSER_Effect_To,
cua.CHDUSER_Effect_From,
cua.CHDUSER_edit_status,
cua.CHDUSER_login_dateTime,
cua.CHDUSER_login_ip,
logintracking.login_datetime,
logintracking.refraceDateTime
FROM
logintracking
INNER JOIN chd_user_admin AS cua ON logintracking.userId = cua.CHDUSER_Id
WHERE
logintracking.sessionId IS NOT NULL AND cua.CHDUSER_login_dateTime IS NOT NULL ;
END
;;
delimiter ;

-- ----------------------------
-- Function structure for removeExtraChar
-- ----------------------------
DROP FUNCTION IF EXISTS `removeExtraChar`;
delimiter ;;
CREATE FUNCTION `removeExtraChar`(`str` VARCHAR(2550))
 RETURNS varchar(2550) CHARSET latin1
  NO SQL 
BEGIN 
  DECLARE i, len SMALLINT DEFAULT 1; 
  DECLARE ret CHAR(255) DEFAULT ''; 
  DECLARE c CHAR(1); 
  SET len = CHAR_LENGTH( str ); 
  REPEAT 
    BEGIN 
      SET c = MID( str, i, 1 ); 
      IF c REGEXP '[[:digit:]]' THEN 
        SET ret=CONCAT(ret,c); 
      END IF; 
      SET i = i + 1; 
    END; 
  UNTIL i > len END REPEAT; 
  RETURN ret; 
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
