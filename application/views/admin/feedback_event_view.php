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
            <h5>EVENT CONTENT</h5>
          </div>
          
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Feedback_event/event_process" method="post" class="form-horizontal"> 
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                	For each of the following questions please indiceate how satisfied you were with.<br/>
                  	 1: Poor - 5: Excelent<br/>&nbsp;
                  	<?php echo form_hidden('id_edi_part', $id_edi_part, array('class'=>'span11', 'id'=>'id_edi_part', 'placeholder'=>$id_edi_part)); ?>
                  	
                </div>
              </div>   
              
              <div class="control-group">
                <label class="control-label"></label>
                5. How satisfied you were witn the pre-course material (Leave blank if not applicable)?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="5B" id="5B" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="5B" id="5B" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="5B" id="5B" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="5B" id="5B" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="5B" id="5B" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="5B" id="5B" value="5"/>
                    5</label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                6. To what extent were the event objectives achieved?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="6B" id="6B" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="6B" id="6B" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="6B" id="6B" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="6B" id="6B" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="6B" id="6B" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="6B" id="6B" value="5"/>
                    5</label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                7. To what extent were your objectives achieved?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="7B" id="7B" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="7B" id="7B" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="7B" id="7B" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="7B" id="7B" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="7B" id="7B" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="7B" id="7B" value="5"/>
                    5</label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                8. Was the event relevant to your job role and requirements?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="8B" id="8B" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="8B" id="8B" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="8B" id="8B" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="8B" id="8B" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="8B" id="8B" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="8B" id="8B" value="5"/>
                    5</label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                9. Was the event a worthwhile investment of your time?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="9B" id="9B" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="9B" id="9B" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="9B" id="9B" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="9B" id="9B" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="9B" id="9B" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="9B" id="9B" value="5"/>
                    5</label>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                10. Was the event a good investment by your organization?
                <div class="controls">
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="10B" id="10B" value="0"/>
                    NA</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="10B" id="10B" value="1"/>
                    1</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="10B" id="10B" value="2"/>
                    2</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="10B" id="10B" value="3"/>
                    3</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="10B" id="10B" value="4"/>
                    4</label>
                  <label style="display:inline; margin-right: 2%">
                    <input type="radio" name="10B" id="10B" value="5"/>
                    5</label>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label"></label>
                11. Comments on the event overall?
                <div class="controls">
                  <textarea class="span11" name="comment_b"></textarea>
                </div>
              </div>    
              <div class="form-actions">                
                <?php echo form_submit('submit','Save and Continue', array('class'=>'btn btn-success')); ?>
                <div class="progress progress-striped progress-warning active" style="padding: 3%;">
				 <div class="bar" style="width: 50%;">Progress 50%</div>
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
