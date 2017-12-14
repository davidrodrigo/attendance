<?php require 'header.php'; ?>

<?php 
$administrador = $this->session->userdata('username'); 	
$id_edicion = $this->uri->segment(3);
?>

<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
    
  </div>
  <!-- <div  class="quick-actions_homepage">
    <ul class="quick-actions">
    	  <li> <a href="<?php echo base_url() ?>index.php/Create_course/"> <i class="icon-calendar"></i>Crear Curso </a> </li>
          <li> <a href="#"> <i class="icon-dashboard"></i> Cursos </a> </li>
          <li> <a href="#"> <i class="icon-shopping-bag"></i> Formadores</a> </li> 
          <li> <a href="#"> <i class="icon-book"></i> Formadores </a> </li>
          <li> <a href="#"> <i class="icon-people"></i> Participantes </a> </li>
          
        </ul>
  </div> -->
  <div class="container-fluid">
  	<div class="row-fluid">
  		<div class="span3"></div>
  		<!-- DATOS DEL EVENTO -->
  		<div class="span6">
  			<div class="widget-box">
	      		<div class="widget-title"> <span class="icon"> <i class="icon-ok"></i> </span>
	            	<h5>Event</h5>
	          	</div>
	          	<div class="widget-content">
	          		<?php 	          									
						$this->db->select('ed_name, id_curso, ed_fecha1, ed_fecha2, ed_fecha3, ed_localizacion, id_formador, id_curso')
								 ->where('id_edicion',$id_edicion);
						$query = $this->db->get('edicion');
						$ed_name = $query->row('ed_name');
						$id_curso = $query->row('id_curso');
						$ed_fecha1 = $query->row('ed_fecha1');
						$ed_fecha2 = $query->row('ed_fecha2');
						$ed_fecha3 = $query->row('ed_fecha3');
						$ed_localizacion = $query->row('ed_localizacion');
						$id_formador = $query->row('id_formador');
						$id_curso = $query->row('id_curso');
						
						$this->db->select('c_days, c_name')
								 ->from('cursos')
								 ->where('id_curso', $id_curso);
						$query = $this->db->get();
						$c_days = $query->row('c_days');
						$c_name = $query->row('c_name');	
						
						$this->db->select('for_name')
								 ->where('id_formador',$id_formador);
						$query = $this->db->get('formador');
						$for_name = $query->row('for_name');						
	          		?>
	          		
	          		<form action="<?= base_url() ?>index.php/Admin_edit_edition/editar_evento" method="post" class="form-horizontal"> 
			        	<div class="control-group">
			        		<label class="control-label">Event :</label>
			                <div class="controls">                  	
			                  	<?php echo form_input('ed_name', set_value($ed_name), array('class'=>'span11', 'id'=>'ed_name', 'placeholder'=>$ed_name )); ?>
			                </div>
			         	</div> 
			         	<div class="control-group">
			        		<label class="control-label">Course :</label>
			                <div class="controls">     
			                	<select name="for_name" class="form-control ">
			                  		<!-- <?php 
			
				                  		$query = $this->db->query('SELECT for_name FROM formador');
										foreach ($query->result_array() as $row){
											$formador = $row['for_name'];
											echo '<option value="'.$formador.'">'.set_select($for_name,$for_name).$for_name.'</option>';								
										}		
									?> -->
                  				</select>
			                	
			                	
			                	             	
			                  	<?php echo form_input('c_name', set_value($c_name), array('class'=>'span11', 'id'=>'c_name', 'placeholder'=>$c_name )); ?>
			                </div>
			         	</div>         	
			            <div class="control-group">
			            	<?php 
			                  		switch ($c_days) {
						  				case '3':
											echo '<label class="control-label">Day 1 :</label>
			                					<div class="controls">'.
													form_input('ed_fecha1', set_value($ed_fecha1), array('class'=>'span11', 'id'=>'ed_fecha1', 'placeholder'=>$ed_fecha1)).
												'</div>';
										
											echo '<label class="control-label">Day 2 :</label>
			                					<div class="controls">'.
													form_input('ed_fecha2', set_value($ed_fecha2), array('class'=>'span11', 'id'=>'ed_fecha2', 'placeholder'=>$ed_fecha2)).
												'</div>';
												
											echo '<label class="control-label">Day 3 :</label>
			                					<div class="controls">'.
													form_input('ed_fecha3', set_value($ed_fecha3), array('class'=>'span11', 'id'=>'ed_fecha3', 'placeholder'=>$ed_fecha3)).
												'</div>';	
											break;	
			                  			
										case '2':
											echo '<label class="control-label">Day 1 :</label>
			                					<div class="controls">'.
													form_input('ed_fecha1', set_value($ed_fecha1), array('class'=>'span11', 'id'=>'ed_fecha1', 'placeholder'=>$ed_fecha1)).
												'</div>';
										
											echo '<label class="control-label">Day 2 :</label>
			                					<div class="controls">'.
													form_input('ed_fecha2', set_value($ed_fecha2), array('class'=>'span11', 'id'=>'ed_fecha2', 'placeholder'=>$ed_fecha2)).
												'</div>';
											break;
										
										case '1':
											echo '<label class="control-label">Date :</label>
			                					<div class="controls">'.
													form_input('ed_fecha1', set_value($ed_fecha1), array('class'=>'span11', 'id'=>'ed_fecha1', 'placeholder'=>$ed_fecha1)).
												'</div>';
											break;										
									}
											
			                  ?>			                
			            </div>
		            	<div class="control-group">
		                	<label class="control-label">Location :</label>
		                	<div class="controls">
		                  		<?php echo form_input('ed_location', set_value($ed_localizacion), array('class'=>'span11', 'id'=>'ed_location', 'placeholder'=>$ed_localizacion)); ?>
		                	</div>
		              	</div>
		              	<div class="control-group">
		                	<label class="control-label">Trainer :</label>
		                	<div class="controls"><?php echo $for_name; ?>
		                		<select name="for_name" class="form-control" disabled>
			                  		<?php echo $for_name;
										$formador = array();										
				                  		$query = $this->db->query('SELECT for_name FROM formador');
										foreach ($query->result_array() as $row){																						
											$formador = $row['for_name'];
											echo '<option value="'.$formador.'" selected="'.$formador.'">'.$formador.'</option>';							
										}												
									?>
                  				</select>	
                  				
		                	</div>
		              	</div>    
		              	<div class="control-group">
		                	<label class="control-label"></label>
		                	<div class="controls">
		                  		<?php
		                  			$boton = 'form_hidden';
		                  			echo $boton('submit','Save', array('class'=>'btn btn-success')); 
		                  		?>
		                	</div>
		              	</div>      
			   		</form>      
	          	</div>
	      	</div>
  		</div>
  		<div class="span3"></div>
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
</body>
</html>
