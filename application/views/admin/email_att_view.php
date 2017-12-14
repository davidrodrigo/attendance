<?php require 'header_trainer.php'; ?>

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
    
    <!-- Listado de Alumnos -->
    <div class="row-fluid">
    	<div class="span3"></div>
      <div class="span6">
      	<h3><br/>
    	This is the email that Administrator recieves:		 
    	</h3>
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
            <table class="table table-bordered ">
              <thead>';
              	  
              	
              		switch ($dias_curso) {
						  case '3':
							  
							  $query = $this->db->query("SELECT ed_fecha1, ed_fecha2, ed_fecha3 FROM edicion WHERE id_edicion='$ref_curso' ");
							  foreach($query->result_array() as $row){
								  	
									echo '<tr>
					                  <th><h5>Name</h5></th>

					                  <th><h5>'.$row['ed_fecha1'].'</h5><a href="'.base_url().'index.php/Part_list_con/cambiar_asistencia_all_dia1/'.$ref_curso.'">
					                  
					                  <th><h5>'.$row['ed_fecha2'].'</h5><a href="'.base_url().'index.php/Part_list_con/cambiar_asistencia_all_dia2/'.$ref_curso.'">
					                  
					                  <th><h5>'.$row['ed_fecha3'].'</h5><a href="'.base_url().'index.php/Part_list_con/cambiar_asistencia_all_dia3/'.$ref_curso.'">
					                 
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
									
									$query = $this->db->query("SELECT p_name, p_email FROM participante WHERE id_part='$id_part' ORDER BY p_name ASC;");
									foreach($query->result_array() as $row){
										//$course_name = $row['p_curso'];							
										echo '<tr class="gradex"><td><a href="'.base_url().'index.php/Participant/index/'.$id_part.'">'.$row['p_name'].'</a></td>';
										// echo '<td>'.$row['p_email'].'</td>';
										
										$participante = $row['p_name'];
										if(!$attendance1){
											
											
											echo '<td style="text-align:center;"><button class="btn btn-danger">NO</button></td>';
											
											
										}else{
											
											echo '<td style="text-align:center;"><button class="btn btn-success">YES</button></td>';
											
										}
										if(!$attendance2){	
											
											echo '<td style="text-align:center;"><button class="btn btn-danger">NO</button></td>';

										}else{	
											
											echo '<td style="text-align:center;"><button class="btn btn-success">YES</button></td>';

										}								
										if(!$attendance3){	
											// echo '<td style="text-align:center;"><i style="color:#00ff00;"class="icon icon-remove"></td>';
											
											echo '<td style="text-align:center;"><button class="btn btn-danger">NO</button></td>';
											
										}else{
											
											echo '<td style="text-align:center;"><button class="btn btn-success">YES</button></td>';
											
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
					                  <th>'.$row['ed_fecha1'].'<br/><a href="'.base_url().'index.php/Part_list_con/cambiar_asistencia_all_dia1">
					                  
					                  <th>'.$row['ed_fecha2'].'<br/><a href="'.base_url().'index.php/Part_list_con/cambiar_asistencia_all_dia2">
					                 
					                  
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
										echo '<tr class="gradex"><td><a href="'.base_url().'index.php/Participant/index/'.$id_part.'">'.$row['p_name'].'</a></td>';
										echo '<td>'.$row['p_email'].'</td>';
										
										$participante = $row['p_name'];
										if(!$attendance1){
											
											echo '<td style="text-align:center;"><button class="btn btn-danger">NO</button></td>';

										}else{
											
											echo '<td style="text-align:center;"><button class="btn btn-success">YES</button></td>';

										}
										
										
										if(!$attendance2){	
											
											echo '<td style="text-align:center;"><button class="btn btn-danger">NO</button></td>';

										}else{	
											
											echo '<td style="text-align:center;"><button class="btn btn-success">YES</button></td>';

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
					                  <th>'.$row['ed_fecha1'].'<br/><a href="'.base_url().'index.php/Part_list_con/cambiar_asistencia_all_dia1">
					                  
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
										echo '<tr class="gradex"><td><a href="'.base_url().'index.php/Participant/index/'.$id_part.'">'.$row['p_name'].'</a></td>';
										echo '<td>'.$row['p_email'].'</td>';
										
										
										
										$participante = $row['p_name'];
										if(!$attendance1){
											
											echo '<td style="text-align:center;"><button class="btn btn-danger">NO</button></td>';											
											
										} else {
											
											echo '<td style="text-align:center;"><button class="btn btn-success">YES</button></td>';

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
     <div class="span3">
	      	<div class="widget-box">
	      		<div class="widget-title"> <span class="icon"> <i class="icon-ok"></i> </span>
	            	<h5>Continue to See Participants Email</h5>
	          	</div>
	          	<div class="widget-content">
	          		<p style="text-align: center"><a href="<?php echo base_url() ?>index.php/Email_part/index/<?php echo $ref_curso ?>"><button class="btn btn-info">Continue Demo</button></a></p>
	          	</div>
	      	</div>
        </div>
    </div>
  	<!-- REGISTRAR PARTICIPANTE -->
    <div class="row-fluid">
    	<div class="span3"></div>  
       	<div class="span6">
	      	<div class="widget-box">
	      		<div class="widget-title"> <span class="icon"> <i class="icon-ok"></i> </span>
	            	<h5>Continue to See Participants Email</h5>
	          	</div>
	          	<div class="widget-content">
	          		<p style="text-align: center"><a href="<?php echo base_url() ?>index.php/Email_part/index/<?php echo $ref_curso ?>"><button class="btn btn-info">Continue Demo</button></a></p>
	          	</div>
	      	</div>
        </div>
      	<div class="span6"></div>  
      
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
