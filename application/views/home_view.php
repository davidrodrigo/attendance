<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Panel de Acceso</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/maruti-login2.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/maruti-style2.css" /> 
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/maruti-media.css"  class="skin-color"  /> -->


</head>
<body>
	
	<div id="loginbox">            
			<div class="control-group normal_text"> <h3><img src="<?php echo base_url(); ?>assets/img/logo-cegos.png" alt="Logo" /></h3></div>
            <div id="content">
  <div class="container-fluid">
   	<div class="quick-actions_homepage">
	    <ul class="quick-actions">
	          <li> <a href="<?php echo base_url(); ?>index.php/Login_con"> <i class="icon-dashboard"></i> Admin </a> </li>
	          <li> <a href="<?php echo base_url(); ?>index.php/Login_trainer"> <i class="icon-people"></i> Trainer </a> </li>
	    </ul>
	    <!-- <ul class="quick-actions">      
	          <li> <a href="<?php echo base_url(); ?>index.php/Login_trainer"> <i class="icon-people"></i> Trainer </a> </li>
	          <!-- <li> <a href="<?php echo base_url(); ?>index.php/Login_part"> <i class="icon-book"></i> Participant </a> </li> 
	   </ul> -->
   </div>
        
    </div>
    
    <script src="js/jquery.min.js"></script>  
    <script src="js/maruti.login.js"></script> 

</body>
</html>