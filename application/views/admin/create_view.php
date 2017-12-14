<?php require 'header.php'; ?>

<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Cursos</h1> -->
  </div>
  <div class="container-fluid">
  	
  	<!-- Registrar CURSOS -->
    <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Registrar Curso</h5>
          </div>
          <div class="widget-content nopadding">
            
            <!-- 
            <?php 
            	$tables = $this->db->list_tables();
				
				foreach ($tables as $table){
					echo '<ul>'.'<li>'."<a href='$table'>". $table.'</a>'.'</li>'.'</ul>';
				}
				
            ?> -->
            <form action="<?php echo base_url() ?>index.php/Create_course/reg_process_course" method="post" class="form-horizontal">           	
              <div class="control-group">
                <label class="control-label">Referencia del Curso :</label>
                <div class="controls">
                  	<?php echo form_input('c_ref', set_value('c_ref'), array('class'=>'span11', 'id'=>'c_ref', 'placeholder'=>'Referencia del Curso')); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nombre del Curso :</label>
                <div class="controls">
                  	<?php echo form_input('c_name', set_value('c_name'), array('class'=>'span11', 'id'=>'c_name', 'placeholder'=>'Nombre del Curso')); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Fecha del Curso :</label>
                <div class="controls">
                	<ph></ph>
                 	<?php echo form_input('dob', set_value('dob'), array('class'=>'span4', 'id'=>'dob', 'placeholder'=>'Fecha de Inicio')); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Duración :</label>
                <div class="controls">
                	<ph></ph>
                 	<?php
                 		$att_duracion = array(
                 					'1'=> '1 Día',
                 					'2'=> '2 Días',
                 					'3'=> '3 Días',
                 					'4'=> '4 Días',
                 					'5'=> '5 Días'
								);
                 		echo form_dropdown('c_days', $att_duracion,'', array('class'=>'span2', 'id'=>'c_days', 'placeholder'=>'Fecha de Inicio')); 
                 	?>
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Localización :</label>
                <div class="controls">
                  <?php echo form_input('c_location', set_value('c_location'), array('class'=>'span11', 'id'=>'c_location', 'placeholder'=>'Localización')); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Room :</label>
                <div class="controls">
                  <?php echo form_input('c_room', set_value('c_room'), array('class'=> 'span11', 'id'=>'c_room', 'placeholder'=>'Room')) ?>
                </div>
              </div>              
              <div class="form-actions">                
                <?php echo form_submit('submit','Agregar', array('class'=>'btn btn-success')); ?>
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
	<!--Registrar Formador -->
	 <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Registrar Formador<!-- <?php echo $Table ?> --></h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Create_course/reg_process_trainer" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Referencia del Formador :</label>
                <div class="controls">                  
                  <?php echo form_input('t_ref', set_value('t_ref'), array('class'=>'span11', 'id'=>'t_ref', 'placeholder'=>'Referencia del formador')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nombre del Formador :</label>
                <div class="controls">
                  <?php echo form_input('t_name', set_value('t_name'), array('class'=>'span11', 'id'=>'t_name', 'placeholder'=>'Nombre del formador')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email del Formador :</label>
                <div class="controls">                  
                  <?php echo form_input('t_email', set_value('trainer_email'), array('class'=>'span11', 'id'=>'t_email', 'placeholder'=>'Email del formador')) ?>
                </div>
              </div>
              <div class="form-actions">                
                 <?php echo form_submit('submit','Agregar', array('class'=>'btn btn-success')); ?>
              </div>
            </form>
           </div>
           <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo validation_errors(); ?></h5>
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
            <h5>Agregar Participante <!-- <?php echo $Table ?> --></h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Create_course/reg_process_student" method="post" class="form-horizontal">
            	
              <div class="control-group">
                <label class="control-label">Curso :</label>
                <div class="controls">
                	<select name="p_curso" class="form-control">
	                  	<!-- <?php 
	                  		$query = $this->db->query('SELECT c_name FROM cursos');
							foreach ($query->result_array() as $row){
								echo form_dropdown('p_curso', $row, array('class'=>'span11', 'id'=>'p_curso', 'placeholder'=>'Elija un Curso')); 
							}
	                  	?> -->
                  		<?php 
	                  		$query = $this->db->query('SELECT c_name FROM cursos');
							foreach ($query->result_array() as $row){
								echo '<option value="'.$row['c_name'].'">'.set_select($row['c_name'],$row['c_name']).$row['c_name'].'</option>';
						}?>
                  	</select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Nombre del Participante :</label>
                <div class="controls">
                  <?php echo form_input('p_name', set_value('p_name'), array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'Nombre del Participante')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email del Participante :</label>
                <div class="controls">                  
                  <?php echo form_input('p_email', set_value('p_email'), array('class'=>'span11', 'id'=>'p_email', 'placeholder'=>'Email del Participante')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Departamento :</label>
                <div class="controls">
                  
                  <?php echo form_input('p_department', set_value('p_department'), array('class'=>'span11', 'id'=>'p_department', 'placeholder'=>'Departamento')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Nombre el Formador :</label>
                <div class="controls">
                	<select name="p_trainer" class="form-control">
	                	<!-- <?php 
	                  		$query = $this->db->query('SELECT t_name FROM trainer');
							foreach ($query->result_array() as $row){
								echo form_dropdown('p_trainer', $row, array('class'=>'span11', 'id'=>'p_trainer', 'placeholder'=>'Elija un Formador')); 
							}
	                  	?>	 -->
	                  	<?php 
	                  		$query = $this->db->query('SELECT t_name FROM trainer');
							foreach ($query->result_array() as $row){
								echo '<option value="'.$row['t_name'].'">'.set_select($row['t_name'],$row['t_name']).$row['t_name'].'</option>';
						}?>
                  	</select>
                </div>
              </div>
              
              <div class="form-actions">
                
                <?php echo form_submit('submit','Agregar', array('class'=>'btn btn-success')); ?>
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
<script type="text/javascript">
$(function() {
    $("#dob").datepicker();
});
</script>
</body>
</html>

