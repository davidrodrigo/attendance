<?php require 'header_part.php'; ?>
<?php
   		$email_part = $this->session->userdata('p_email');
		$this->db->select('p_name')
				 ->from('participante')
				 ->where('p_email', $email_part);
		$query = $this->db->get();
		$part_name = $query->row('p_name');   	
		$id_edi_part = $this->uri->segment(3);	
		
		$this->db->select('id_edicion')
				 ->from('edi_part')
				 ->where('id_edi_part', $id_edi_part);
		$query = $this->db->get();
		$id_edicion = $query->row('id_edicion');
		
		$this->db->select('ed_name', 'ed_fecha1', 'ed_localizacion')				 
				 ->where('id_edicion', $id_edicion);
		$query = $this->db->get('edicion');
		$ed_name = $query->row('ed_name');		
		
		$this->db->select('ed_fecha1')
				 ->where('id_edicion', $id_edicion);
		$query = $this->db->get('edicion');
		$ed_fecha1 = $query->row('ed_fecha1');
		
		$this->db->select('ed_localizacion')
				 ->where('id_edicion', $id_edicion);
		$query = $this->db->get('edicion');
		$ed_localizacion = $query->row('ed_localizacion');
		
		$this->db->select('id_formador')
				->where('id_edicion', $id_edicion);
		$query = $this->db->get('edicion');
		$id_formador = $query->row('id_formador');
		
		$this->db->select('for_name')
				 ->where('id_formador', $id_formador);
		$query = $this->db->get('formador');
		$for_name = $query->row('for_name');
   	?>
<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
   <h3 style="text-align: center;">
   	Programme Evaluation Summary
   </h3>
   
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
    <!-- LISTADO DE CURSOS -->   
    <!-- Registrar CURSOS -->
    <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
            <h5>Edition Ref:  <?= ' '.$id_edicion;  ?></h5>
          </div>
          <!-- <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>FINISHED!!!</h5>
          </div> -->
          
          <div class="widget-content" style="text-align:center;">
            <ul class="quick-actions">
              	
              <li class="span12"> <a href="#"> <i class="icon-survey"></i> <h3>You have finished your Programme Evaluation Summary! </h3><h4 style="text-align:left;margin-left:2%;margin-top:5%"> Event: <?= $ed_name ?> </h4><h4 style="text-align:left;margin-left:2%"> Start Date: <?= $ed_fecha1  ?> </h4><h4 style="text-align:left;margin-left:2%"> Trainer: <?= $for_name ?></h4></a></li>
			  
			</ul>        
          </div>
          <div class="widget-box">
	      		<div class="widget-title"> <span class="icon"> <i class="icon-ok"></i> </span>
	            	<h5>Continue to see Global Results Email</h5>
	          	</div>
	          	<div class="widget-content">
	          		<p style="text-align: center"><a href="<?php echo base_url() ?>index.php/Results_fb/index/<?php echo $id_edicion ?>"><button class="btn btn-info">Continue Demo</button></a></p>
	          	</div>
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
