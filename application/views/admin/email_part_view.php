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
    	<div class="span2"></div>
      <div class="span8">
      	<h3>
    		This is the email that Participants recieves:		 
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
             echo '<h5>'.$nombre_curso.'  </h5>';
          echo '</div>' ?>
          <div class="widget-content">
            <h4>
            	Dear John Donnaldson,
            </h4>
            <h4><br/>You have participated in this event: <?php echo '&nbsp;'.$nombre_curso ?>.</h4>				
			<h4><br/>Please, take five minutes to complete the feedback.</h4>
			<h4><br/>You will have access to this form for just a few hours.</h4>
			<h4><br/>Please click "START FEDDBACK" button.</h4>
            <p><br/><a href="<?php echo base_url() ?>index.php/Feedback_pre/index/7"><button class="btn btn-info">Start Feedback</button></a></p>
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
