<?php require 'header.php'; ?>

<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
   <!--  <h1 style="text-align: center"><br/><?=$this->session->userdata('username')?> Control Panel</h1> -->
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
    
    <!-- Listado de Alumnos -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
          	<?php 
          		$formador = $this->session->userdata('username'); 	
				$ref_curso = $this->uri->segment(3);
				
				
				$this->db->select('ed_name')
						 ->from('edicion')
						 ->where('id_edicion', $ref_curso);
				$query = $this->db->get();
				$nombre_curso = $query->row('ed_name');
				//echo $nombre_curso;
				
				$this->db->select('id_curso')
						 ->from('edicion')
						 ->where('ed_name', $nombre_curso);
				$query = $this->db->get();
				$id_curso = $query->row('id_curso');
				
				$this->db->select('c_days')
						 ->from('cursos')
						 ->where('id_curso', $id_curso);
				$query = $this->db->get();
				$dias_curso = $query->row('c_days');
				//echo $dias_curso;
				
				
				
								
				$this->db->select('for_name');
				$this->db->from('formador');
				$this->db->where('username', $formador);
				$query = $this->db->get();
				//nombre del Formador
				$t_name = $query->row('for_name');    
          	
             echo '<span class="icon"><i class="icon-th"></i></span> ';
             echo '<h5>'.$nombre_curso.'  - Participants List</h5>';
          echo '</div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>';
              	  
              	
              		switch ($dias_curso) {
						  case '3':
							  
							  $query = $this->db->query("SELECT ed_fecha1, ed_fecha2, ed_fecha3 FROM edicion WHERE id_edicion='$ref_curso' ");
							  foreach($query->result_array() as $row){
								  	
									echo '<tr>
					                  <th>Name</th>
					                  <th>Email</th>					                  
					                  <th>'.$row['ed_fecha1'].'</th>
					                  
					                  <th>'.$row['ed_fecha2'].'</th>
					                  
					                  <th>'.$row['ed_fecha3'].'</th>
					                 
					                </tr>
					            </thead>
					         <tbody>';								  
								  
							  }
							  
							  
							 
							 	$query = $this->db->query("SELECT id_edi_part, id_part, activo1, activo2, activo3 FROM edi_part WHERE id_edicion='$ref_curso'");
								foreach($query->result_array() as $row){
									$id_part = $row['id_part'];
									$attendance1 = $row['activo1'];
									$attendance2 = $row['activo2'];
									$attendance3 = $row['activo3'];
									$id_edi_part = $row['id_edi_part'];
									
									$query = $this->db->query("SELECT p_name, p_email FROM participante WHERE id_part='$id_part'");
									foreach($query->result_array() as $row){
										//$course_name = $row['p_curso'];							
										echo '<tr class="gradex"><td>'.$row['p_name'].'</td>';
										echo '<td>'.$row['p_email'].'</td>';
										
										$participante = $row['p_name'];
										if(!$attendance1){
											
											// echo '<td style="text-align:center;"><i style="color:#00ff00;"class="icon icon-remove"></td>';
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia1');																	
												
												echo form_hidden('p_active1', $attendance1, array('class'=>'span11', 'id'=>'p_active1', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_hidden('id_edi_part', $id_edi_part,array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>'Referencia'));
												echo form_submit('submit','Change', array('class'=>'btn btn-danger')).'</td>';
											echo form_close();
										}else{
											// echo '<td style="text-align:center;"><i style="color:#00ff00;"class="icon icon-ok"></td>';
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia1');																	
												
												echo form_hidden('p_active1', $attendance1, array('class'=>'span11', 'id'=>'p_active1', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_hidden('id_edi_part', $id_edi_part,array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>'Referencia'));
												echo form_submit('submit','Change', array('class'=>'btn btn-success')).'</td>';
											echo form_close();
										}
										if(!$attendance2){	
											// echo '<td style="text-align:center;"><i style="color:#00ff00;"class="icon icon-remove"></td>';
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia2');																	
												
												echo form_hidden('p_active2', $attendance2, array('class'=>'span11', 'id'=>'p_active2', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_hidden('id_edi_part', $id_edi_part,array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>'Referencia'));
												echo form_submit('submit','Change', array('class'=>'btn btn-danger')).'</td>';
											echo form_close();
										}else{	
											// echo '<td style="text-align:center;"><i style="color:#00ff00;"class="icon icon-ok"></td>';
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia2');																	
												
												echo form_hidden('p_active2', $attendance2, array('class'=>'span11', 'id'=>'p_active2', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_hidden('id_edi_part', $id_edi_part,array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>'Referencia'));
												echo form_submit('submit','Change', array('class'=>'btn btn-success')).'</td>';
											echo form_close();
										}								
										if(!$attendance3){	
											// echo '<td style="text-align:center;"><i style="color:#00ff00;"class="icon icon-remove"></td>';
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia3');																	
												
												echo form_hidden('p_active3', $attendance3, array('class'=>'span11', 'id'=>'p_active3', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_hidden('id_edi_part', $id_edi_part,array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>'Referencia'));
												echo form_submit('submit','Change', array('class'=>'btn btn-danger')).'</td></tr>';
											echo form_close();
											
										}else{
											// echo '<td style="text-align:center;"><i style="color:#00ff00;"class="icon icon-ok"></td>';
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia3');																	
												
												echo form_hidden('p_active3', $attendance3, array('class'=>'span11', 'id'=>'p_active3', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_hidden('id_edi_part', $id_edi_part,array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>'Referencia'));
												echo form_submit('submit','Change', array('class'=>'btn btn-success')).'</td></tr>';
											echo form_close();
											
										}							
									}			
									
								}
							
								
										
							  break;
							  
						  case '2':
						  
						  		$query = $this->db->query("SELECT ed_fecha1, ed_fecha2 FROM edicion WHERE id_edicion='$ref_curso' ");
							  foreach($query->result_array() as $row){
								  	
									echo '<tr>
					                  <th>Name</th>
					                  <th>Email</th>					                  
					                  <th>'.$row['ed_fecha1'].'</th>
					                  
					                  <th>'.$row['ed_fecha2'].'</th>
					                 
					                  
					                </tr>
					            </thead>
					         <tbody>';								  
								  
							  }
							 
							 	$query = $this->db->query("SELECT id_edi_part, id_part, activo1, activo2, activo3 FROM edi_part WHERE id_edicion='$ref_curso'");
								foreach($query->result_array() as $row){
									$id_part = $row['id_part'];
									$attendance1 = $row['activo1'];
									$attendance2 = $row['activo2'];
									$attendance3 = $row['activo3'];
									$id_edi_part = $row['id_edi_part'];
									
							
									$query = $this->db->query("SELECT p_name, p_email FROM participante WHERE id_part='$id_part'");
									foreach($query->result_array() as $row){
										//$course_name = $row['p_curso'];							
										echo '<tr class="gradex"><td>'.$row['p_name'].'</td>';
										echo '<td>'.$row['p_email'].'</td>';
										
										$participante = $row['p_name'];
										if(!$attendance1){
											
											// echo '<td style="text-align:center;"><i style="color:#00ff00;"class="icon icon-remove"></td>';
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia1');																	
												echo form_hidden('p_name', $participante, array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'Nombre del participante'));
												echo form_hidden('p_active1', $attendance1, array('class'=>'span11', 'id'=>'p_active1', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_submit('submit','Change', array('class'=>'btn btn-danger')).'</td>';
											echo form_close();
										}else{
											
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia1');																	
												echo form_hidden('p_name', $participante, array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'Nombre del participante'));
												echo form_hidden('p_active1', $attendance1, array('class'=>'span11', 'id'=>'p_active1', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_submit('submit','Change', array('class'=>'btn btn-success')).'</td>';
											echo form_close();
										}
										
										
										if(!$attendance2){	
											
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia2');																	
												echo form_hidden('p_name', $participante, array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'Nombre del participante'));
												echo form_hidden('p_active2', $attendance2, array('class'=>'span11', 'id'=>'p_active2', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_submit('submit','Change', array('class'=>'btn btn-danger')).'</td></tr>';
											echo form_close();
										}else{	
											
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia2');																	
												echo form_hidden('p_name', $participante, array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'Nombre del participante'));
												echo form_hidden('p_active2', $attendance2, array('class'=>'span11', 'id'=>'p_active2', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_submit('submit','Change', array('class'=>'btn btn-success')).'</td></tr>';
											echo form_close();	
										}							
									}			
								}		
							  break;
						  
							case '1':
							  
							  $query = $this->db->query("SELECT ed_fecha1 FROM edicion WHERE id_edicion='$ref_curso' ");
							  foreach($query->result_array() as $row){
								  	
									echo '<tr>
					                  <th>Name</th>
					                  <th>Email</th>					                  
					                  <th>'.$row['ed_fecha1'].'</th>
					                  
					                </tr>
					            </thead>
					         <tbody>';								  
								  
							  }
							 
							 	$query = $this->db->query("SELECT id_edi_part, id_part, activo1, activo2, activo3 FROM edi_part WHERE id_edicion='$ref_curso'");
								foreach($query->result_array() as $row){
									$id_part = $row['id_part'];
									$attendance1 = $row['activo1'];
									$attendance2 = $row['activo2'];
									$attendance3 = $row['activo3'];
									$id_edi_part = $row['id_edi_part'];
									
							
									$query = $this->db->query("SELECT p_name, p_email, p_active1 FROM participante WHERE id_part='$id_part'");
									foreach($query->result_array() as $row){
										//$course_name = $row['p_curso'];							
										echo '<tr class="gradex"><td>'.$row['p_name'].'</td>';
										echo '<td>'.$row['p_email'].'</td>';
										
										
										
										$participante = $row['p_name'];
										if(!$attendance1){
											
											
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia1');																	
												echo form_hidden('p_name', $participante, array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'Nombre del participante'));
												echo form_hidden('p_active1', $attendance1, array('class'=>'span11', 'id'=>'p_active1', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_submit('submit','Change', array('class'=>'btn btn-danger')).'</td></tr>';
											echo form_close();
										} else {
											
											
											echo '<td style="text-align:center;">'.form_open(base_url().'index.php/Part_list_con/cambiar_asistencia_dia1');																	
												echo form_hidden('p_name', $participante, array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'Nombre del participante'));
												echo form_hidden('p_active1', $attendance1, array('class'=>'span11', 'id'=>'p_active1', 'placeholder'=>''));
												echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));
												echo form_submit('submit','Change', array('class'=>'btn btn-success')).'</td></tr>';
											echo form_close();	
										}							
									}			
								}
							  break;
					  }
              	
              	?>
              </tbody>
            </table>
          </div>
        </div>
     </div>
    </div>
  	<!-- REGISTRAR PARTICIPANTE -->
    <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Add New Participant <!-- <?php echo $Table ?> --></h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Part_list_con/agregar_participante" method="post" class="form-horizontal"> 	
              <!-- <div class="control-group">
                <div class="controls">
	            	<?php echo form_hidden('p_curso', $nombre_curso, array('class'=>'span11', 'id'=>'p_curso', 'placeholder'=>'Nombre del curso')); ?>
                </div>
              </div> -->
              
              <div class="control-group">
                <label class="control-label">Name :</label>
                <div class="controls">
                  <?php echo form_input('part_name', set_value('part_name'), array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email :</label>
                <div class="controls">                  
                  <?php echo form_input('p_email', set_value('p_email'), array('class'=>'span11', 'id'=>'p_email', 'placeholder'=>'')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password :</label>
                <div class="controls">                  
                  <?php echo form_password('password', set_value('password'), array('class'=>'span11', 'id'=>'password', 'placeholder'=>'')); 
                  		echo form_hidden('c_ref', $ref_curso, array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso'));?>
                </div>
              </div>
              <!-- <div class="control-group">
                <div class="controls">                	
              		<?php echo form_hidden('p_trainer', $t_name, array('class'=>'span11', 'id'=>'p_trainer', 'placeholder'=>'Nombre del formador')); ?>              		
                </div>
              </div>               -->
              <div class="form-actions">                
                <?php echo form_submit('submit','Add', array('class'=>'btn btn-success')); ?>
              </div>
            </form>
          </div>
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo validation_errors(); ?></h5>
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
