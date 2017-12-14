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
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Edition Ref:  <?= ' '.$id_edicion;  ?></h5>
          </div>
          <div class="widget-content nopadding">
            <form action="" method="post" class="form-horizontal"> 
              <div class="control-group">
                <label class="control-label">Event :</label>
                <div class="controls">
                  	
                  	<?php echo form_input('ed_name', set_value($ed_name), array('class'=>'span11', 'id'=>'ed_name', 'placeholder'=>$ed_name, 'disabled'=>'')); ?>
                </div>
              </div>          	
              <div class="control-group">
                <label class="control-label">Start Date :</label>
                <div class="controls">
                  	<?php echo form_input('ed_fecha1', set_value($ed_fecha1), array('class'=>'span11', 'id'=>'ed_fecha1', 'placeholder'=>$ed_fecha1, 'disabled'=>'')); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Location :</label>
                <div class="controls">
                  <?php echo form_input('ed_location', set_value($ed_localizacion), array('class'=>'span11', 'id'=>'ed_location', 'placeholder'=>$ed_localizacion, 'disabled'=>'')); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Trainer :</label>
                <div class="controls">
                  	<?php echo form_input('for_name', set_value($for_name), array('class'=>'span11', 'id'=>'for_name', 'placeholder'=>$for_name, 'disabled'=>'')); ?>
                </div>
              </div>      
            </form>            
          </div>
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>PRE-EVENT ADMINISTRATION</h5>
          </div>
          
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Feedback_pre/pre_event_process" method="post" class="form-horizontal"> 
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                	For each of the following questions please indiceate how satisfied you were with.<br/>
                  	 1: Poor - 5: Excelent <br/>&nbsp;
                  	<?php echo form_hidden('id_edi_part', $id_edi_part, array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>$id_edi_part)); ?>
                  	<?php echo form_hidden('hecho', '1', array('class'=>'span11', 'id'=>'hecho')); ?>
                </div>
              </div>   
              
              <div class="control-group">
                <label class="control-label"></label>
                1. The ease of making a booking?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="1A" id="1A" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="1A" id="1A" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="1A" id="1A" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="1A" id="1A" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="1A" id="1A" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="1A" id="1A" value="5"/>
                    5</label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                2. The accuracy of information provided before event?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="2A" id="2A" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="2A" id="2A" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="2A" id="2A" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="2A" id="2A" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="2A" id="2A" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="2A" id="2A" value="5"/>
                    5</label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                3. The timeliness of information provided before event?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="3A" id="3A" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="3A" id="3A" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="3A" id="3A" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="3A" id="3A" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="3A" id="3A" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="3A" id="3A" value="5"/>
                    5</label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                4. Comments
                <div class="controls">
                  <textarea class="span11" name="comment_a"></textarea>
                </div>
              </div>    
              <div class="form-actions">                
                <?php echo form_submit('submit','Save and Conitnue', array('class'=>'btn btn-success')); ?>
                <div class="progress progress-striped progress-warning active" style="padding: 3%;">
				 <div class="bar" style="width: 25%;">Progress 25%</div>
				</div>
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
