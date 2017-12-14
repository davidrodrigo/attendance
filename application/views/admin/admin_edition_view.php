<?php require 'header.php'; ?>
<?php 
$administrador = $this->session->userdata('username'); 	
$id_edicion = $this->uri->segment(3);
?>
<div id="content">
	<div id="content-header">
		<!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->    
	</div>
	<div  class="quick-actions_homepage">
		<ul class="quick-actions">	  
			<li> <a href="<?php echo base_url() ?>index.php/Create_course/"> <i class="icon-book"></i> Add Course </a> </li> 
			<li> <a href="<?php echo base_url() ?>index.php/Add_trainer/"> <i class="icon-people"></i> Add Trainer </a> </li> 
			<li> <a href="<?php echo base_url() ?>index.php/Create_edition/"> <i class="icon-calendar"></i>Create Edition</a> </li>
			<li> <a href="<?php echo base_url() ?>index.php/Add_participant/"> <i class="icon-client"></i> Add Participants </a> </li>    
			<li> <a href="<?php echo base_url() ?>index.php/Enroll_participants/"> <i class="icon-client"></i> Enroll Participants </a> </li>     
		</ul>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<!-- DATOS DEL EVENTO -->
			<div class="span4">
				<?php 	          									
					$this->db->select('ed_name, id_curso, ed_fecha1, ed_fecha2, ed_fecha3, ed_localizacion, id_formador')
							 ->where('id_edicion',$id_edicion);
					$query = $this->db->get('edicion');
					$ed_name = $query->row('ed_name');
					$id_curso = $query->row('id_curso');
					$ed_fecha1 = $query->row('ed_fecha1');
					$ed_fecha2 = $query->row('ed_fecha2');
					$ed_fecha3 = $query->row('ed_fecha3');
					$ed_localizacion = $query->row('ed_localizacion');
					$id_formador = $query->row('id_formador');
					$this->db->select('c_days, c_name')
							 ->where('id_curso', $id_curso);
					$query = $this->db->get('cursos');
					$c_days = $query->row('c_days');	
					$c_name = $query->row('c_name');
					$this->db->select('for_name')
							 ->where('id_formador',$id_formador);
					$query = $this->db->get('formador');
					$for_name = $query->row('for_name');
				?>
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-ok"></i> </span>
						<h5>Event</h5>
					</div>
					<div class="widget-content">
						<!-- EDITAR EVENTO -->
						<form action="<?=base_url()  ?>index.php/Admin_edition/cambiar_event" method="post" class="form-horizontal"> 
							<div class="control-group">
								<label class="control-label">Event :</label>
								<div class="controls">                  	
									<?php 
										echo form_input('ed_name', $ed_name,$disabled_event, array('class'=>'span11', 'id'=>'ed_name', 'placeholder'=>$ed_name)); 
										echo form_hidden('id_edicion', $id_edicion, array('class'=>'span4', 'id'=>'id_edicion'));
									?>
								</div>
							</div> 
							<?= '<p style="text-align:center">'.$boton_event('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?>           
						</form>
						<?='<p style="text-align:center; visibility:'.$visibility_event.'"><span class="icon"><a href="'.base_url().'index.php/Admin_edition/edit_event/'.$id_edicion.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'; ?>    

						<!-- EDITAR CURSO -->
						<form action="<?=base_url()  ?>index.php/Admin_edition/cambiar_curso" method="post" class="form-horizontal"> 
							<div class="control-group">
							<label class="control-label">Course :</label>
							<?php 			        		
								if($visibility_course == ''){			        				
									echo 	'<div class="controls">'.
												form_input('c_name', $c_name, $disabled_course,array('class'=>'span11', 'id'=>'c_name', 'placeholder'=>$c_name, 'style' => $visibility_course ,'disabled'=>'')).
											'</div>';									
								}else{
									echo 	'<div class="controls">
												<select name="c_name" class="form-control">';
													$query = $this->db->query('SELECT c_name FROM cursos');
													foreach ($query->result_array() as $row){																					
														$cursos = $row['c_name'];	
														echo '<option value="'.$cursos.'" selected="'.$cursos.'">'.$cursos.'</option>';				
													}
									echo 		'</select>'.
												form_hidden('id_edicion', $id_edicion, array('class'=>'span4', 'id'=>'id_edicion')).
											'</div>';					
									}
							?> 	 
							</div> 
							<?= '<p style="text-align:center">'.$boton_course('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?> 
						</form>    
						<?= '<p style="text-align:center; visibility:'.$visibility_course.'"><span class="icon"><a href="'.base_url().'index.php/Admin_edition/edit_course/'.$id_edicion.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Change Course</button></a></span></p>'?>
						<!-- EDITAR DÍAS -->
						<form action="<?=base_url()  ?>index.php/Admin_edition/cambiar_dias" method="post" class="form-horizontal">	         	    	
							<div class="control-group">
								<?php 
									switch ($c_days) {
										case '3':
											echo 	'<label class="control-label">Day 1 :</label>
													<div class="controls">'.
														form_input('dob', $ed_fecha1,$disabled_days, array('class'=>'span11', 'id'=>'ed_fecha1', 'placeholder'=>$ed_fecha1)).
													'</div>';
											echo 	'<label class="control-label">Day 2 :</label>
													<div class="controls">'.
														form_input('dob2', $ed_fecha2,$disabled_days, array('class'=>'span11', 'id'=>'ed_fecha2', 'placeholder'=>$ed_fecha2)).
													'</div>';
											echo 	'<label class="control-label">Day 3 :</label>
													<div class="controls">'.
														form_input('dob3', $ed_fecha3,$disabled_days, array('class'=>'span11', 'id'=>'ed_fecha3', 'placeholder'=>$ed_fecha3)).
													'</div>';	
										break;
										case '2':
											echo 	'<label class="control-label">Day 1 :</label>
													<div class="controls">'.
														form_input('dob', $ed_fecha1,$disabled_days, array('class'=>'span11', 'id'=>'ed_fecha1', 'placeholder'=>$ed_fecha1)).
													'</div>';
											echo 	'<label class="control-label">Day 2 :</label>
													<div class="controls">'.
														form_input('dob2', $ed_fecha2,$disabled_days, array('class'=>'span11', 'id'=>'ed_fecha2', 'placeholder'=>$ed_fecha2)).
													'</div>';
										break;
										case '1':
											echo 	'<label class="control-label">Date :</label>
													<div class="controls">'.
														form_input('dob', $ed_fecha1,$disabled_days, array('class'=>'span11', 'id'=>'ed_fecha1', 'placeholder'=>$ed_fecha1)).
													'</div>';
										break;										
									}
									echo form_hidden('id_edicion', $id_edicion, array('class'=>'span4', 'id'=>'id_edicion'));	
								?>			                
							</div>
							<?= '<p style="text-align:center">'.$boton_days('submit','Save Changes', array('class'=>'btn-mini btn-success')).'</p>'; ?> 
						</form>    
						<?= '<p style="text-align:center; visibility:'.$visibility_days.'"><span class="icon"><a href="'.base_url().'index.php/Admin_edition/edit_days/'.$id_edicion.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'?>
						<!-- EDITAR LOCALIZACIÓN -->
						<form action="<?=base_url()  ?>index.php/Admin_edition/cambiar_localizacion" method="post" class="form-horizontal">
							<div class="control-group">
								<label class="control-label">Location :</label>
								<div class="controls">
									<?php 
										echo form_input('ed_localizacion', $ed_localizacion,$disabled_location, array('class'=>'span11', 'id'=>'ed_location', 'placeholder'=>$ed_localizacion, 'disabled'=>'')) ;
										echo form_hidden('id_edicion', $id_edicion, array('class'=>'span4', 'id'=>'id_edicion'));
									?>
								</div>
							</div>
							<?= '<p style="text-align:center">'.$boton_location('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?> 
						</form>    
						<?= '<p style="text-align:center; visibility:'.$visibility_location.'"><span class="icon"><a href="'.base_url().'index.php/Admin_edition/edit_location/'.$id_edicion.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'?>
						<!-- EDITAR FORMADOR -->
						<form action="<?=base_url()  ?>index.php/Admin_edition/cambiar_formador" method="post" class="form-horizontal">
							<div class="control-group">
							<label class="control-label">Trainer :</label>
							<?php 
								if($visibility_trainer == ''){
									echo 	'<div class="controls">'.
												form_input('for_name', $for_name,$disabled_trainer, array('class'=>'span11', 'id'=>'for_name', 'placeholder'=>$for_name, 'disabled'=>'')).
											'</div>';		
								}else{
									echo 	'<div class="controls">
												<select name="for_name" class="form-control">';
													$query = $this->db->query('SELECT for_name FROM formador');
													foreach ($query->result_array() as $row){				
														$formador = $row['for_name'];	
														echo '<option value="'.$formador.'" selected="'.$formador.'">'.$formador.'</option>';				
													}
									echo 		'</select>'.
													form_hidden('id_edicion', $id_edicion, array('class'=>'span4', 'id'=>'id_edicion')).
											'</div>';			
								}
							?>	
							</div>
							<?= '<p style="text-align:center">'.$boton_trainer('submit','Save', array('class'=>'btn btn-success')).'</p>'; ?> 
						</form>    
						<?= '<p style="text-align:center; visibility:'.$visibility_trainer.'"><span class="icon"><a href="'.base_url().'index.php/Admin_edition/edit_trainer/'.$id_edicion.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'?>
					</div>
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5><?php echo validation_errors(); ?></h5>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon"><i class="icon-th"></i></span> 
						<h5>Course</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>Course Name</th>
									<th>Duration</th>
								</tr>
							</thead>
							<tbody>
								<tr class="gradex">
									<?= '<td><a href="'.base_url().'index.php/Admin_courses/index/'.$id_curso.'">'.$c_name.'</a></td>'; ?>
									
									<td><?= $c_days;  ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="span4"></div>
			<div class="span8">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon"><i class="icon-th"></i></span> 
						<h5>Editions List</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>Course Edition</th>
									<th>Start Date</th>
									<th>Location</th>
									<!-- <th>Course Ref.</th> -->
									<th>Trainer</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$query = $this->db->query('SELECT ed_name, ed_fecha1, ed_localizacion, id_edicion, id_formador FROM edicion');
								foreach ($query->result_array() as $row){
									$ed_name = $row['ed_name'];
									$ed_fecha1 = $row['ed_fecha1'];
									$ed_localizacion = $row['ed_localizacion'];
									$id_edicion = $row['id_edicion'];
									$formador = $row['id_formador'];
									echo 	'<tr class="gradex"><td><a href="'.base_url().'index.php/Admin_edition/index/'.$id_edicion.'">'.$ed_name.'</td>';
									echo 		'<td>'.$ed_fecha1.'</td>';
									echo 		'<td>'.$ed_localizacion.'</td>';
									//echo 		'<td>'.$id_edicion.'</td>';
									$query = $this->db->query("SELECT for_name FROM formador WHERE id_formador='$formador'");
									foreach ($query->result_array() as $row){
										$for_name = $row['for_name'];
										echo 	'<td><a href="'.base_url().'index.php/Admin_trainer/index/'.$formador.'">'.$for_name.'</td>
											</tr>';
									}

								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>  	
	</div>
</div>
<div class="row-fluid">
	<?php require 'footer.php'; ?>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/maruti.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/maruti.tables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script> 
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
