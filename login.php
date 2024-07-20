<?php require_once("config/globalAdmData.php"); 

if(isset($_REQUEST['logAction']) &&  $_REQUEST['logAction']=='doLogin'){
   if(1) 
  {

    
          $loginMsg = $admObj->doLogin();
          //print_r($loginMsg);exit();
   } else {
          $loginMsg = "Captcha verification is wrong.";
   }  
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/rocker/white-version/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Feb 2020 09:57:31 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Login</title>
  <!--favicon-->
  <link rel="icon" href="<?=$admObj->cssPath?>assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="<?=$admObj->cssPath?>assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?=$admObj->cssPath?>assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?=$admObj->cssPath?>assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="<?=$admObj->cssPath?>assets/css/app-style.css" rel="stylesheet"/>
  <!-- Error Style-->
  <link href="<?=$admObj->cssPath?>assets/css/login.css?<?=time();?>" rel="stylesheet"/>

</head>

<body>
  <input type="hidden" name="ipAddr" id="ipAddr" value="<?=$_SERVER['REMOTE_ADDR']?>" />
 <!-- Start wrapper-->
 <div id="wrapper">
	<div class="card border-primary border-top-sm border-bottom-sm card-authentication1 mx-auto my-5 animated bounceInDown">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img style="width: 100px;" src="<?=$admObj->cssPath?>assets/images/data-core-systems-squarelogo-1426163301160.png">
		 	</div>
			 <div class="card-title text-center font-italic" style="margin-top: 20px; font-size: 20px;">Citizen Help Desk</div>
		  <div class="card-title text-uppercase text-center py-3">LOGIN</div>
      <?php if($admObj::hasWithMessage('message')){ ?>
      <?= $admObj::getWithMessage('message'); ?><?php } ?>
      <?php if(isset($loginMsg) && trim($loginMsg) != '') { ?>
                 <!--<div id="errorInfo" class="error_box2"></div> -->
                 <div style="margin:10px 0px 20px 0px; text-align:center;"><span class="error" id="errorInfo"><?=$loginMsg?></span></div>
            <?php unset($loginMsg); } else { ?> 
                 <!--<div id="errorInfo" class="warning_box2">Please provide userid, password &amp; captcha to login</div>  -->
                 <div style="margin:10px 0px 20px 0px; text-align:center;" class="font-italic"><span class="warning" id="errorInfo">Please provide userid, password &amp; captcha to login</span></div>
      <?php } ?>
		    <form method="post" id="loginForm">
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputUsername" class="sr-only">Username</label>
				  <input type="text" id="userName" name="userName" class="form-control form-control-rounded" placeholder="Username">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="exampleInputPassword" class="sr-only">Password</label>
				  <input type="password" id="password" name="password" class="form-control form-control-rounded" placeholder="Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
        
          <!--<div class="row">
            <div class="form-group">
            <div class="col-sm-6">
              <label><img src="captcha.php"/></label>
            </div>
            <div class="col-sm-12"><input type="text" name="captcha" id="captcha" autocomplete="off" maxlength="6" class="inp-form-small form-control" /></div>
          </div>  
        </div>-->
        
        <div class="row">      
            <div class="col-md-11">
              <div class="form-group row">
                <label class="col-sm-4" ><img src="captcha.php"/></label>
                <label class="col-sm-1" ><i class="fa fa-refresh" aria-hidden="true"></i></label>
                <div class="col-sm-5">
                  <input type="text" name="captcha" id="captcha" autocomplete="off" maxlength="6" class="inp-form-small form-control form-control-rounded" />
                </div>
              </div>
            </div>
        </div> 

			 <input type="hidden" name="logAction" id='logAction'>
			  <div style="margin: 0px; text-align: center;">
				  <button id='doLogin' name="doLogin" type="button" class="btn btn-primary form-control-rounded" style="width: 150px;">Sign In</button>
			  </div>
			 </form>
		   </div>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="<?=$admObj->cssPath?>assets/js/jquery.min.js"></script>
  <script src="<?=$admObj->cssPath?>assets/js/popper.min.js"></script>
  <script src="<?=$admObj->cssPath?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	/*$(document).ready(function() {
  		$("#doLogin").click(function(event) {
  			// Act on the event 
  			var userName=$.trim($("#userName").val());
  			var password=$.trim($("#password").val());
        var captcha=$.trim($("#captcha").val());
  			var err=0;
  			if(userName==''){
  				$("#userName").css('border', '1px solid red');
  				err++;
  			}else{
  				$("#userName").css('border', '1px solid #ccc');
  			}

  			if(password==''){
  				$("#password").css('border', '1px solid red');
  				err++;
  			}else{
  				$("#password").css('border', '1px solid #ccc');
  			}

        if(captcha==''){
          $("#captcha").css('border', '1px solid red');
          err++;
        }else{
          $("#captcha").css('border', '1px solid #ccc');
        }

  			if(err==0){
  				$("#logAction").val('doLogin');
  				$("#loginForm").submit();

  			}

  		});
  	});*/
  </script>
  <script src="<?=$admObj->cssPath?>assets/js/userJS/pageTitle.js"></script>
  <script src="<?=$admObj->cssPath?>assets/js/userJS/dologin.js?<?= time();?>"></script>
</body>
</html>
