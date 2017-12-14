<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register User</title>
</head>
<body>
	<?php echo form_open('user/register_process'); 
			echo form_label('Full Name: ', 'fullname'); 
			echo form_input('fullname', set_value('fullname'), array('class'=>'username', 'id'=>'username', 'placeholder'=>'Enter your Full Name')); 
			echo '<br/>';
			echo form_label('User Name: ', 'username'); 
			echo form_input('username', set_value('username'), array('class'=>'username', 'id'=>'username', 'placeholder'=>'Enter your User Name'));
			echo '<br/>';
			echo form_label('E-mail: ', 'email'); 
			echo form_input('email', set_value('email'), array('class'=>'email', 'id'=>'email', 'placeholder'=>'Enter your E-mail'));
			echo '<br/>';
			echo form_label('Password: ', 'password'); 
			echo form_password('password','', set_value('email'), array('class'=>'password', 'id'=>'password', 'placeholder'=>'Enter your password'));
			echo '<br/>';
			echo form_label('Confirm Password: ', 'cpassword'); 
			echo form_password('cpassword', '', array('class'=>'password', 'id'=>'password', 'placeholder'=>'Enter your password again'));
			echo '<br/>';
			// echo form_label('Marital Status: ','status' );
			// echo form_dropdown('status', array('single'=>'Single', 'married'=>'Married'), 'single', array('class'=> 'status', 'id'=>'status'));
			// echo '<br/>';
			echo form_label('Gender: ', 'gender'); 
			echo form_radio('gender', 'male', true, array('class'=>'gender', 'id'=>'gender'));
			echo form_radio('gender', 'female', false, array('class'=>'gender', 'id'=>'gender'));
			echo '<br/>';
			echo form_submit('submit', 'Register', array('class'=>'submit', 'id'=>'submit'));
			echo form_reset('reset', 'Reset', array('class'=>'reset', 'id'=>'reset'));
		 echo form_close(); ?>
</body>
</html>