<?php require 'header.php'; ?>

<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Cursos</h1> -->
  </div>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">	  
      <!-- <li> <a href="<?php echo base_url() ?>index.php/Create_course/"> <i class="icon-book"></i> Add Course </a> </li> -->
      <li> <a href="<?php echo base_url() ?>index.php/Add_trainer/"> <i class="icon-people"></i> Add Trainer </a> </li> 
      <li> <a href="<?php echo base_url() ?>index.php/Create_edition/"> <i class="icon-calendar"></i>Create Edition</a> </li>
      <li> <a href="<?php echo base_url() ?>index.php/Add_participant/"> <i class="icon-client"></i> Add Participants </a> </li>     
      <li> <a href="<?php echo base_url() ?>index.php/Enroll_participants/"> <i class="icon-client"></i> Enroll Participants </a> </li>    
    </ul>
  </div>
  <div class="container-fluid">
  	
  	<!-- Registrar CURSOS -->
    <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Add New Course</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Create_course/reg_process_course" method="post" class="form-horizontal">           	
              <div class="control-group">
                <label class="control-label">Course Ref. :</label>
                <div class="controls">
                  	<?php echo form_input('id_curso', set_value('id_curso'), array('class'=>'span11', 'id'=>'id_curso', 'placeholder'=>'')); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Course Name :</label>
                <div class="controls">
                  	<?php echo form_input('c_name', set_value('c_name'), array('class'=>'span11', 'id'=>'c_name', 'placeholder'=>'')); ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Duration :</label>
                <div class="controls">
                	<ph></ph>
                 	<?php
                 		$att_duracion = array(
                 					'1'=> '1 Day',
                 					'2'=> '2 Days',
                 					'3'=> '3 Days'
								);
                 		echo form_dropdown('c_days', $att_duracion,'', array('class'=>'span2', 'id'=>'c_days', 'placeholder'=>'Fecha de Inicio')); 
                 	?>
                </div>
              </div>          
              <div class="form-actions">                
                <?php echo form_submit('submit','Add', array('class'=>'btn btn-success')); ?>
              </div>
            </form>            
          </div>
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo validation_errors(); ?></h5>
            <?php  
            
            	$exito = $this->uri->segment(3);	
            	if($exito){
            		echo '<h5>Course added succesfully</h5>';            		
            	}            
            ?>
          </div>
        </div>
      </div>
    
      <div class="span3"></div>
	</div>
	<!-- Listado de Cursos -->
	<div class="row-fluid">
	  <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Courses List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Course Ref</th>
                  <th>Course Name</th>
                  <th>Duration</th>
                </tr>
              </thead>
              <tbody>
                	<?php 
                  		$query = $this->db->query('SELECT id_curso, c_name, c_days FROM cursos');
						foreach ($query->result_array() as $row){
							$id_curso = $row['id_curso'];
							echo '<tr class="gradex"><td>'.$row['id_curso'].'</td>';
							echo '<td><a href="'.base_url().'index.php/Admin_courses/index/'.$id_curso.'">'.$row['c_name'].'</a></td>';
							echo '<td>'.$row['c_days'].'</td></tr>';
             			 } 	
                  	?>
              </tbody>
            </table>
          </div>
        </div>
     </div>
     <div class="span3"></div>
    </div>
	
	
	<!--Registrar Formador -->
	 <!-- <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Registrar Formador</h5>
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
  </div> -->
  	<!-- REGISTRAR PARTICIPANTE -->
    <!-- <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Agregar Participante</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Create_course/reg_process_student" method="post" class="form-horizontal">
            	
              <div class="control-group">
                <label class="control-label">Curso :</label>
                <div class="controls">
                	<select name="p_curso" class="form-control">
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
	</div> -->  
	
	
	
	
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

