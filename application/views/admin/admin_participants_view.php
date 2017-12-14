<?php require 'header.php'; ?>

<?php 
$administrador = $this->session->userdata('username'); 	
$id_part = $this->uri->segment(3);
?>

<div id="content">
	<div id="content-header">
		<!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
	</div>
	<div  class="quick-actions_homepage">
		<ul class="quick-actions">	  
			<li> <a href="<?php echo base_url() ?>index.php/Create_course/"> <i class="icon-book"></i> Add Course </a> </li> 
			<li> <a href="<?php echo base_url() ?>index.php/Add_trainer/"> <i class="icon-people"></i> Add Trainer </a> </li> 
			<li> <a href="<?php echo base_url() ?>index.php/Create_edition/"> <i class="icon-calendar"></i> Create Edition </a> </li>
			<li> <a href="<?php echo base_url() ?>index.php/Add_participant/"> <i class="icon-client"></i> Add Participants </a> </li>      
			<li> <a href="<?php echo base_url() ?>index.php/Enroll_participants/"> <i class="icon-client"></i> Enroll Participants </a> </li>   
		</ul>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<!-- DATOS DEL EVENTO -->
			<div class="span4">
				<div class="widget-box">
					<div class="widget-title"> 
						<span class="icon"> <i class="icon-user"></i> </span>
						<h5>Participant</h5>
					</div>
					<div class="widget-content">
						<?php 	          									
							$this->db->select('p_name, p_email')
									 ->where('id_part',$id_part);
							$query = $this->db->get('participante');						
							$p_name = $query->row('p_name');
							$p_email = $query->row('p_email');						
						?>
						<!-- EDITAR NOMBRE -->
						<form action="<?=base_url()  ?>index.php/Admin_participants/cambiar_nombre" method="post" class="form-horizontal"> 
							<div class="control-group">
								<label class="control-label">Name :</label>
								<div class="controls">                  	
									<?php 
										echo form_input('p_name', $p_name,$disabled_nombre, array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>$p_name)); 
										echo form_hidden('id_part', $id_part, array('class'=>'span4', 'id'=>'id_part'));
									?>
								</div>
							</div> 
							<?= '<p style="text-align:center">'.$boton_nombre('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?>           
						</form>
						<?='<p style="text-align:center; visibility:'.$visibility_nombre.'"><span class="icon"><a href="'.base_url().'index.php/Admin_participants/edit_nombre/'.$id_part.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'; ?>    
						<!-- EDITAR EMAIL -->
						<form action="<?=base_url()  ?>index.php/Admin_participants/cambiar_email" method="post" class="form-horizontal">
							<div class="control-group">
								<label class="control-label">Email :</label>
								<div class="controls">  
									<?php
										echo form_input('p_email', $p_email,$disabled_email, array('class'=>'span11', 'id'=>'p_email', 'placeholder'=>$p_email)); 
										echo form_hidden('id_part', $id_part, array('class'=>'span4', 'id'=>'id_part'));
									?>
								</div>
							</div>	
							<?= '<p style="text-align:center">'.$boton_email('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?>
						</form> 
						<?='<p style="text-align:center; visibility:'.$visibility_email.'"><span class="icon"><a href="'.base_url().'index.php/Admin_participants/edit_email/'.$id_part.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'; ?>     
						<!-- EDITAR EMAILS ALTERNATIVOS -->
						<form action="<?=base_url()  ?>index.php/Admin_participants/cambiar_alt_email" method="post" class="form-horizontal">
							<div class="control-group">
								<label class="control-label">Alternative Emails :</label>
								<div class="controls">  
									<?php 
										$alt_email = array();
										$query = $this->db->query("SELECT email, id_email FROM emails WHERE id_part='$id_part'");
										if($query->num_rows() === 0){
											echo '';
										}else{											
											foreach($query->result_array() as $row){
											$alt_email = $row['email'];
											$id_email = $row['id_email'];
											echo '<p>'.form_input('alt_email', $alt_email,'disabled', array('class'=>'span11', 'id'=>'alt_email', 'placeholder'=>$alt_email)).'</p>';
											}										
										}	
									?>
								</div>
							</div>
						</form>
						<?php
							$query = $this->db->query("SELECT email, id_email FROM emails WHERE id_part='$id_part'");
							if($query->num_rows() === 0){
								echo 	'<p style="text-align:center; visibility:'.$visibility_boton_email.'">
											<span class="icon">
												<a href="'.base_url().'index.php/Admin_participants/edit_alt_email/'.$id_part.'">
													<button class="btn-mini btn-success"><i class="icon-pencil"></i>Add New Email</button>
												</a>
											</span>
										</p>'; 
							}else{
								echo 	'<p style="text-align:center; visibility:'.$visibility_boton_email.'">
											<span class="icon">
												<a href="'.base_url().'index.php/Admin_participants/edit_alt_email/'.$id_part.'">
													<button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button>
												</a>
											</span>
										</p>'; 							
							} 
							if($visibility_alt_email == ''){
								echo  	'<form action="'.base_url().'index.php/Admin_participants/cambiar_alt_email" method="post" class="form-horizontal">
											<div class="control-group">
												<label class="control-label">Select Email to edit :</label>
												<div class="controls">  
													<select name="alt_email" class="form-control ">'; 
														$alt_email = array();
														$query = $this->db->query("SELECT email, id_email FROM emails WHERE id_part='$id_part'");
														foreach($query->result_array() as$row){
															$alt_email = $row['email'];
															echo '<option value="'.$alt_email.'">'.set_select($alt_email,$alt_email).$alt_email.'</option>';
														}   				             		
															echo	'</select>
												</div>
											</div>
											<div class="control-group">
												<label for="" class="control-label">Write new email :</label>
												<div class="controls">';					             				
													echo form_input('nuevo_email', set_value('Edit email'), array('class'=>'span11', 'id'=>'id_part'));
													echo form_hidden('id_part', $id_part, array('class'=>'span4', 'id'=>'id_part'));	             				
													echo    '</div>
											</div>
											<div class="control-group">
												<label for="" class="control-label"></label>
												<div class="controls">
													<p style="text-align:center">'.form_submit('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p> 
												</div>
											</div>
										</form>';
							}
						?>  
					</div>
				</div>
			</div>
			<!-- EDICIONES A LOS QUE ESTA MATRICULADO -->
			<div class="span8">
				<div class="widget-box">
					<div class="widget-title"> 
						<span class="icon"> <i class="icon-pencil"></i> </span>
						<h5>Enrolled editions</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>Edition</th>
									<th>Email</th>
									<th>Location</th>
									<th>Day 1</th>
									<th>Day 2</th>
									<th>Day 3</th>                   
								</tr>
							</thead>
							<tbody>
								<?php 				
									$query = $this->db->query("SELECT id_edicion FROM edi_part WHERE id_part='$id_part'");
									foreach($query->result_array() as $row){
										$id_edicion = $row['id_edicion'];						
										$query = $this->db->query("SELECT ed_name, ed_fecha1, ed_fecha2, ed_fecha3, ed_localizacion, id_formador FROM edicion WHERE id_edicion='$id_edicion' ");
										foreach($query->result_array() as $row){
											$ed_name = $row['ed_name'];
											$ed_localizacion = $row['ed_localizacion'];
											$ed_fecha1 = $row['ed_fecha1'];
											$ed_fecha2 = $row['ed_fecha1'];
											$ed_fecha2 = $row['ed_fecha2'];
											$ed_fecha3 = $row['ed_fecha3'];		
											$id_formador = $row['id_formador'];					
											echo '<tr class="gradex"><td><a href="'.base_url().'index.php/Part_list_con/index/'.$id_edicion.'">'.$ed_name.'</td>';
											echo '<td style="text-align:center">'.$p_email.'</td>';
											echo '<td>'.$ed_localizacion.'</td>';
											$query = $this->db->query("SELECT activo1, activo2, activo3 FROM edi_part WHERE id_edicion='$id_edicion' AND id_part='$id_part' ");
											foreach($query->result_array() as $row){
												$activo1 = $row['activo1'];
												$activo2 = $row['activo2'];
												$activo3 = $row['activo3'];
												if($activo1 == '0'){
													echo '<td style="text-align:center;">'.$ed_fecha1.' <button class="btn-mini btn-danger" style="margin-left:3%">NO</button></td>';

												}else{
													echo '<td style="text-align:center;">'.$ed_fecha1.' <button class="btn-mini btn-success" style="margin-left:3%">YES</button></td>';
												}		
												if(!$ed_fecha2){
													echo '<td style="text-align:center;"> --- </td>';
												}else{
													if($activo2 == '0'){
													echo '<td style="text-align:center;">'.$ed_fecha2.' <button class="btn-mini btn-danger" style="margin-left:3%">NO</button></td>';
													}else{
														echo '<td style="text-align:center;">'.$ed_fecha2.' <button class="btn-mini btn-success" style="margin-left:3%">YES</button></td>';
													}		
												}
												if(!$ed_fecha3){
													echo '<td style="text-align:center;"> --- </td>';
												}else{
													if($activo3 == '0'){
														echo '<td style="text-align:center;">'.$ed_fecha3.' <button class="btn-mini btn-danger" style="margin-left:3%">NO</button></td>';
													}else{
													echo '<td style="text-align:center;">'.$ed_fecha3.' <button class="btn-mini btn-success" style="margin-left:3%">YES</button></td>';
													}		
												}									
											}
										}
									}					
								?>			 	
							</tbody>
						</table>
					</div>
				</div>
			</div>
		 
		
		
		<!-- MATRICULAR EN UN EVENTO -->
		<div class="span8">
			<div class="widget-box">
				<div class="widget-title"> 
					<span class="icon"> <i class="icon-user"></i> </span>
					<h5>Enroll in a Edition</h5>
				</div>
				<div class="widget-content">
					<?php 	          									
						$this->db->select('p_name, p_email')
							 ->where('id_part',$id_part);
						$query = $this->db->get('participante');						
						$p_name = $query->row('p_name');
						$p_email = $query->row('p_email');						
					?>
					<!-- MATRICULAR PARTICIPANTE -->
					<form action="<?=base_url()  ?>index.php/Admin_participants/matricular_participante" method="post" class="form-horizontal"> 
						<div class="control-group">
							<label class="control-label">Name :</label>
							<div class="controls">                  	
								<?php echo form_input('p_name', $p_name,$disabled_nombre, array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>$p_name)); ?>
							</div>
						</div> 
						<div class="control-group">
							<label class="control-label">Select Edition :</label>
							<div class="controls">     
								<select name="ed_name" class="form-control ">             	
									<?php 
										$query = $this->db->query("SELECT ed_name FROM edicion");
										foreach($query->result_array() as $row){
											$ed_name = $row['ed_name'];
											echo '<option value="'.$ed_name.'">'.set_select($ed_name,$ed_name).$ed_name.'</option>';
										}
										echo form_hidden('id_part', $id_part, array('class'=>'span4', 'id'=>'id_part'));
									?>
								</select>
							</div>
						</div> 
						<?php echo '<p style="text-align:center;">'.form_submit('submit','SELECT COURSE', array('class'=>'btn-mini btn-success')).'</p>'; ?>    
					</form>
				</div>
				<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
					<h5><?php echo validation_errors(); ?></h5>
				</div>
			</div>
		</div>		
	</div>  
</div>
<div class="row-fluid">
<?php require 'footer.php'; ?>
</div>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/maruti.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/maruti.tables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.js"></script> 

<script src="<?php echo base_url(); ?>assets/js/maruti.form_common.js"></script>
<script type="text/javascript">
$(function() {
$("#dob").datepicker();
});
</script>
<script type="text/javascript">
$(function() {
$("#dob2").datepicker();
});
</script>
<script type="text/javascript">
$(function() {
$("#dob3").datepicker();
});
</script>
</body>
</html>
