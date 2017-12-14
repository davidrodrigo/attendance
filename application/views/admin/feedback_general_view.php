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
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>GENERAL</h5>
          </div>
          
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Feedback_general/general_process" method="post" class="form-horizontal"> 
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                	
                  	<?php echo form_hidden('id_edi_part', $id_edi_part, array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>$id_edi_part)); ?>
                  	
                </div>
              </div>   
              <div class="control-group">
                <label class="control-label">18. List your top 3 action or activities which you are going to put into place first?</label>
                <div class="controls">
                  <textarea class="span11" name="18D"></textarea>
                </div>
              </div>    
              <div class="control-group">
                <label class="control-label">19. Any further comments? In particular how can improve our service to you?</label>
                <div class="controls">
                  <textarea class="span11" name="19D"></textarea>
                </div>
              </div>    
              <div class="form-actions">                
                <?php echo form_submit('submit','Finish', array('class'=>'btn btn-success')); ?>
                <div class="progress progress-striped progress-success active" style="padding: 3%;">
				 <div class="bar" style="width: 100%;">Progress 100%</div>
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
