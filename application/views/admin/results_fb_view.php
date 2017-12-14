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
  <?php 
		$administrador = $this->session->userdata('username'); 	
		$id_edicion = $this->uri->segment(3);
		
		$this->db->select('ed_name, ed_fecha1, ed_localizacion, id_formador')
				 ->from('edicion')
				 ->where('id_edicion', $id_edicion);
		$query = $this->db->get();
		$ed_name = $query->row('ed_name');
		$ed_fecha1 = $query->row('ed_fecha1');
		$ed_localizacion = $query->row('ed_localizacion');
		$id_formador = $query->row('id_formador');
	
		$this->db->select('for_name')
		         ->where('id_formador', $id_formador);
		$query = $this->db->get('formador');
		$for_name = $query->row('for_name');
	?>
  <div class="container-fluid">	
    
    <!-- Listado de Alumnos -->
    <div class="row-fluid">
      <div class="span3">
      	<div class="widget-box">
      		<div class="widget-title"> <span class="icon"> <i class="icon-ok"></i> </span>
            <h5>Edition</h5>
          	</div>
          	<div class="widget-content">
          		<h5>Edition :  <?php echo $ed_name ?></h5><hr>
		      	<h5>Start Date :  <?php echo $ed_fecha1 ?></h5><hr>
		      	<h5>Location :  <?php echo $ed_localizacion ?></h5><hr>
		      	<h5>Trainer :  <?php echo $for_name ?></h5>
          	</div>
      	</div>
      </div>
      <div class="span6">
      	
        <div class="widget-box">
          <div class="widget-title">
          	<h5>Feedback Results</h5>
          </div>
          <div class="widget-content ">
            <form action="" method="post" class="form-horizontal"> 
              
			  <?php 

			  	$this->db->where('id_edicion', $id_edicion)
			  				 ->from('edi_part');
			  		$todas_col_1a = $this->db->count_all_results();
			  		//echo $todas_col_1a;
				$id_edi_part = array();
				
			  	$query = $this->db->query("SELECT id_edi_part FROM edi_part WHERE id_edicion='$id_edicion'");
			  	foreach($query->result_array() as $row){

					
					$id_edi_part = $row['id_edi_part'];
					
				
			  		
			  		$this->db->select_sum('hecho')
			  				 ->where('id_edi_part',$id_edi_part);
			  		$query = $this->db->get('pre_event');
			  		$filas = $query->row('hecho');
			  		
			  		$this->db->select_sum('1a')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('pre_event');
			  		$suma_1a = $query->row('1a');
							 			  		
			  		$this->db->select_sum('2a')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('pre_event');
			  		$suma_2a = $query->row('2a');

			  		$this->db->select_sum('3a')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('pre_event');
			  		$suma_3a = $query->row('3a');

			  		$this->db->select_sum('5b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_5b = $query->row('5b');

			  		$this->db->select_sum('6b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_6b = $query->row('6b');

			  		$this->db->select_sum('7b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_7b = $query->row('7b');
					
					$this->db->select_sum('8b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_8b= $query->row('8b');
			  		
			  		$this->db->select_sum('9b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_9b = $query->row('9b');
					
					$this->db->select_sum('10b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_10b = $query->row('10b');
					
					$this->db->select_sum('12c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_12c = $query->row('12c');

			  		$this->db->select_sum('13c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_13c = $query->row('13c');

			  		$this->db->select_sum('14c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_14c = $query->row('14c');
					
					$this->db->select_sum('15c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_15c= $query->row('15c');
			  		
			  		$this->db->select_sum('16c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_16c = $query->row('16c');



			  		if($filas |= 0){
			  			$suma_pre_event = ($suma_1a+$suma_2a+$suma_3a)/3;						
			  			$result_pre_event = round($suma_pre_event/$filas, 2);
						$porcentaje_pre_event = $result_pre_event*20;
						$suma_event = ($suma_5b+$suma_6b+$suma_7b+$suma_8b+$suma_9b+$suma_10b+$suma_13c+$suma_16c)/8;
			  			$result_event = round($suma_event/$filas,2);
						$porcentaje_event = $result_event*20;
						$suma_trainer = ($suma_14c+$suma_15c)/2;
			  			$result_trainer = round($suma_trainer/$filas,2);
						$porcentaje_trainer = $result_trainer*20;
						$suma_global = ($suma_trainer+$suma_event)/2;
						$result_global = round($suma_global/$filas,2);
						$porcentaje_global = $result_global*20;
						echo
						'<div class="control-group">
							<label class="control-label">GLOBAL :</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_global.'%; margin-right:2%">'.$result_global.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">PRE-EVENT (Admin) :</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_pre_event.'%; margin-right:2%">'.$result_pre_event.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">EVENT (Content & Methodology) :</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_event.'%; margin-right:2%">'.$result_event.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">TRAINER :</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_trainer.'%; margin-right:2%">'.$result_trainer.'</div>
									</div>
								</label>
							</div>						
						</div>'
			  		;}
			  	}?>              
            </form>            
          </div>
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo validation_errors(); ?></h5>
          </div>
        </div>
     </div>
      <div class="span3"></div>
    </div>
    <div class="row-fluid">
      <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
            <h5>Pre-Event Administration</h5>
          </div>          
          <div class="widget-content ">
            <form action="" method="post" class="form-horizontal"> 
              
			  <?php 

			  	$this->db->where('id_edicion', $id_edicion)
			  				 ->from('edi_part');
			  		$todas_col_1a = $this->db->count_all_results();
			  		//echo $todas_col_1a;

			  	$query = $this->db->query("SELECT id_edi_part FROM edi_part WHERE id_edicion='$id_edicion'");
			  	foreach($query->result_array() as $row){

			  		$id_edi_part = $row['id_edi_part'];
			  		
			  		$this->db->select_sum('hecho')
			  				 ->where('id_edi_part',$id_edi_part);
			  		$query = $this->db->get('pre_event');
			  		$filas = $query->row('hecho');
			  		
			  				 			  		
			  		$this->db->select_sum('2a')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('pre_event');
			  		$suma_2a = $query->row('2a');

			  		$this->db->select_sum('3a')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('pre_event');
			  		$suma_3a = $query->row('3a');

			  		$this->db->select_sum('1a')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('pre_event');
			  		$suma_1a = $query->row('1a');



			  		if($filas |= 0){
			  			$result_1a = round($suma_1a/$filas,2);
						$porcentaje_1a = $result_1a*20;
			  			$result_2a = round($suma_2a/$filas,2);
			  			$porcentaje_2a = $result_2a*20;
			  			$result_3a = round($suma_3a/$filas,2);
						$porcentaje_3a = $result_3a*20;
						echo
						'<div class="control-group">
							<label class="control-label">1. The ease of making a booking?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_1a.'%; margin-right:2%">'.$result_1a.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">2. The accuracy of information provided before event?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_2a.'%; margin-right:2%">'.$result_2a.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">2. The accuracy of information provided before event?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_3a.'%; margin-right:2%">'.$result_3a.'</div>
									</div>
								</label>
							</div>						
						</div>'
			  		;}
			  	}?>              
            </form>            
          </div>
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo validation_errors(); ?></h5>
          </div>



        </div>
      </div>  
      <div class="span3">
      	
      </div>      
	</div>
	<div class="row-fluid">
		<div class="span3"></div>
		<div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
            <h5>Event Content</h5>
          </div>          
          <div class="widget-content ">
            <form action="" method="post" class="form-horizontal"> 
			  <?php 

			  	$this->db->where('id_edicion', $id_edicion)
			  				 ->from('edi_part');
			  		$todas_col_1a = $this->db->count_all_results();
			  		//echo $todas_col_1a;

			  	$query = $this->db->query("SELECT id_edi_part FROM edi_part WHERE id_edicion='$id_edicion'");
			  	foreach($query->result_array() as $row){

			  		$id_edi_part = $row['id_edi_part'];
			  		
			  		$this->db->select_sum('hecho')
			  				 ->where('id_edi_part',$id_edi_part);
			  		$query = $this->db->get('event');
			  		$filas = $query->row('hecho');
			  		
			  				 			  		
			  		$this->db->select_sum('5b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_5b = $query->row('5b');

			  		$this->db->select_sum('6b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_6b = $query->row('6b');

			  		$this->db->select_sum('7b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_7b = $query->row('7b');
					
					$this->db->select_sum('8b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_8b= $query->row('8b');
			  		
			  		$this->db->select_sum('9b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_9b = $query->row('9b');
					
					$this->db->select_sum('10b')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_10b = $query->row('10b');

			  		if($filas |= 0){
			  			echo $filas;
			  			$result_5b = round($suma_5b/$filas,2);
						$porcentaje_5b =$result_5b*20;
			  			$result_6b = round($suma_6b/$filas,2);
						$porcentaje_6b =$result_6b*20;
			  			$result_7b = round($suma_7b/$filas,2);
						$porcentaje_7b =$result_7b*20;
						$result_8b = round($suma_8b/$filas,2);
						$porcentaje_8b =$result_8b*20;
						$result_9b = round($suma_9b/$filas,2);
						$porcentaje_9b =$result_9b*20;
						$result_10b = round($suma_10b/$filas,2);
						$porcentaje_10b =$result_10b*20;
						echo
						'<div class="control-group">
							<label class="control-label">5. How satisfied you were witn the pre-course material (Leave blank if not applicable)?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_5b.'%; margin-right:2%">'.$result_5b.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">6. To what extent were the event objectives achieved?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_6b.'%; margin-right:2%">'.$result_6b.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">7. To what extent were your objectives achieved?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_7b.'%; margin-right:2%">'.$result_7b.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">8. Was the event relevant to your job role and requirements?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_8b.'%; margin-right:2%">'.$result_8b.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">9. Was the event a worthwhile investment of your time?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_9b.'%; margin-right:2%">'.$result_9b.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">10. Was the event a good investment by your organization?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_10b.'%; margin-right:2%">'.$result_10b.'</div>
									</div>
								</label>
							</div>						
						</div>'
			  		;}
			  	}?>              
            </form>            
          </div>
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo validation_errors(); ?></h5>
          </div>
        </div>
      </div>
	</div>
	<div class="row-fluid">
		<div class="span3"></div>
		<div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
            <h5>Event Effectiveness</h5>
          </div>          
          <div class="widget-content ">
            <form action="" method="post" class="form-horizontal"> 
			  <?php 

			  	$this->db->where('id_edicion', $id_edicion)
			  				 ->from('edi_part');
			  		$todas_col_1a = $this->db->count_all_results();
			  		//echo $todas_col_1a;

			  	$query = $this->db->query("SELECT id_edi_part FROM edi_part WHERE id_edicion='$id_edicion'");
			  	foreach($query->result_array() as $row){

			  		$id_edi_part = $row['id_edi_part'];
			  		
			  		$this->db->select_sum('hecho')
			  				 ->where('id_edi_part',$id_edi_part);
			  		$query = $this->db->get('event');
			  		$filas = $query->row('hecho');
			  		
			  				 			  		
			  		$this->db->select_sum('12c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_12c = $query->row('12c');

			  		$this->db->select_sum('13c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_13c = $query->row('13c');

			  		$this->db->select_sum('14c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_14c = $query->row('14c');
					
					$this->db->select_sum('15c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_15c= $query->row('15c');
			  		
			  		$this->db->select_sum('16c')
			  			     ->where('id_edi_part',$id_edi_part);
			  		$query= $this->db->get('event');
			  		$suma_16c = $query->row('16c');
					
			  		if($filas |= 0){
			  			$result_12c = round($suma_12c/$filas,2);
						$porcentaje_12c = $result_12c*20;
			  			$result_13c = round($suma_13c/$filas,2);
						$porcentaje_13c = $result_13c*20;
			  			$result_14c = round($suma_14c/$filas,2);
						$porcentaje_14c = $result_14c*20;
						$result_15c = round($suma_15c/$filas,2);
						$porcentaje_15c = $result_15c*20;
						$result_16c = round($suma_16c/$filas,2);
						$porcentaje_16c = $result_16c*20;
						
						echo
						'<div class="control-group">
							<label class="control-label">12. the facilities at the venue?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_12c.'%; margin-right:2%">'.$result_12c.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">13. The supporting notes and material provided?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_13c.'%; margin-right:2%">'.$result_13c.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">14. The subject knowledge demostrated by the trainer?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_14c.'%; margin-right:2%">'.$result_14c.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">15. The training skills and techniques demostrated by the trainer?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_15c.'%; margin-right:2%">'.$result_15c.'</div>
									</div>
								</label>
							</div>						
						</div>'.
						'<div class="control-group">
							<label class="control-label">16. How appropiate was the structure and method of instruction to the subject you were learning?</label>
							<div class="controls">
								<label style="display:inline; margin-left:2%">
									<div class="progress">
										<div class="bar" style="width:'.$porcentaje_15c.'%; margin-right:2%">'.$result_16c.'</div>
									</div>
								</label>
							</div>						
						</div>'
			  		;}
			  	}?>              
            </form>            
          </div>
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo validation_errors(); ?></h5>
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
</body>
</html>
