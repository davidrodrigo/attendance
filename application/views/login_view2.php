<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Panel de Acceso</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/maruti-login.css" />
</head>
<body>	
	<?php
		$username = array('class' => 'form-control', 'name' => 'username', 'placeholder' => 'User Name');
		$password = array('class' => 'form-control', 'name' => 'password',	'placeholder' => 'Password');
		$submit = array('class'=>'btn btn-success', 'name' => 'submit', 'value' => 'Log in', 'title' => 'Iniciar sesión');
		if($this->session->flashdata('errors')){
			echo $this->session->flashdata('errors');
		}
	?>
	<div id="loginbox">            
		<?=form_open(base_url().'index.php/Login_con/new_user')?>        
		<div class="control-group normal_text"> <h3><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo-cegos.png" alt="Logo" /></a></h3></div>
		<div class="control-group">
			<div class="controls">
				<div class="main_input_box">
					<span class="add-on"><i class="icon-user"></i></span>
					<?=form_input($username)?><p><?=form_error('username')?>                        
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="main_input_box">
					<span class="add-on"><i class="icon-lock"></i></span>                       
					<?=form_password($password)?><p><?=form_error('password')?></p>
					<?=form_hidden('token',$token)?>
				</div>
			</div>
		</div>
		<div class="form-actions">                
			<span class="pull-right">
				<?=form_submit($submit)?>                	
			</span>
		</div>
		<?php echo form_close(); ?>
		<?php 
			if($this->session->flashdata('usuario_incorrecto'))
			{
			?>
				<p><?=$this->session->flashdata('usuario_incorrecto')?></p>
			<?php
			}
		?>		
	</div>    
	<script src="js/jquery.min.js"></script>  
	<script src="js/maruti.login.js"></script> 
</body>
</html>