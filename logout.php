<?php require_once("config/globalAdmData.php"); 
   if($_SESSION[$admObj->projectSecrectName]['user']['log_id'] != '900069'){
   	   $admObj->del_logtraking($_SESSION[$admObj->projectSecrectName]['user']['log_id']);
   }
    unset($_SESSION[$admObj->projectSecrectName]['user']['log_id']);
	//session_destroy();
	$admObj->redirect('/');
?>
