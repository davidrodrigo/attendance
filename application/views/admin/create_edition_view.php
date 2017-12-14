<?php require 'header.php'; ?>

<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Cursos</h1> -->
  </div>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">	  
      <li> <a href="<?php echo base_url() ?>index.php/Create_course/"> <i class="icon-book"></i> Add Course </a> </li>
      <li> <a href="<?php echo base_url() ?>index.php/Add_trainer/"> <i class="icon-people"></i> Add Trainer </a> </li> 
      <!-- <li> <a href="<?php echo base_url() ?>index.php/Create_edition/"> <i class="icon-calendar"></i>Create Edition</a> </li> -->
      <li> <a href="<?php echo base_url() ?>index.php/Add_participant/"> <i class="icon-client"></i> Add Participants </a> </li>         
      <li> <a href="<?php echo base_url() ?>index.php/Enroll_participants/"> <i class="icon-client"></i> Enroll Participants </a> </li>
    </ul>
  </div>
  <div class="container-fluid">
  	<!-- REGISTRAR PARTICIPANTE -->
    <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Create New Edition</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Create_edition/elegir_curso" method="post" class="form-horizontal">
            	
            	<div class="control-group">
                <label class="control-label">Course :</label>
                <div class="controls">
                	<select name="c_name" class="form-control ">
                  		<?php 
	                  		$query = $this->db->query('SELECT c_name FROM cursos');
							foreach ($query->result_array() as $row){
								$c_name = $row['c_name'];
								echo '<option value="'.$c_name.'">'.set_select($c_name,$c_name).$c_name.'</option>';								
							}		
						?>
                  	</select>
                  	<label class="control-label"></label>
                  	<div class="controls">
                  		<?php echo form_submit('submit','SELECT COURSE', array('class'=>'btn btn-danger')); ?>  
                  	</div>                	
                </div>
              </div>
          </form>    
          <form action="<?php echo base_url() ?>index.php/Create_edition/reg_process_edition" method="post" class="form-horizontal">    
              <div class="control-group">
                <label class="control-label">Edition Ref. :</label>
                <div class="controls">
                  <?php echo form_input('id_edicion', set_value('id_edicion'), array('class'=>'span11', 'id'=>'id_edicion', 'placeholder'=>'')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Edition Name :</label>
                <div class="controls">                  
                  <?php echo form_input('ed_name', set_value('ed_name'), array('class'=>'span11', 'id'=>'ed_name', 'placeholder'=>'')) ?>
                </div>
              </div>
              
              
             <?php 
             					$id_curso = $this->uri->segment(3);
								
								echo form_hidden('id_curso', $id_curso, array('class'=>'span4', 'id'=>'id_curso'));
								
								$this->db->select('c_days')
										 ->from('cursos')
										 ->where('id_curso',$id_curso);
								$query = $this->db->get();
								$c_days = $query->row('c_days');
             
             
								foreach ($query->result_array() as $row){
									$c_days = $row['c_days'];
									
									switch ($c_days) {
						  				case '3':
											
											echo '<div class="control-group">
									                <label class="control-label">Day 1 :</label>
									                <div class="controls">'                 
									                  .form_input('dob', set_value('dob'), array('class'=>'span4', 'id'=>'dob', 'placeholder'=>'')).
									                '</div>
									              </div>';
											
											echo '<div class="control-group">
									                <label class="control-label">Day 2 :</label>
									                <div class="controls">'                 
									                  .form_input('dob2', set_value('dob2'), array('class'=>'span4', 'id'=>'dob2', 'placeholder'=>'')).
									                '</div>
									              </div>';
									              
									        echo '<div class="control-group">
									                <label class="control-label">Day 3 :</label>
									                <div class="controls">'                 
									                  .form_input('dob3', set_value('dob3'), array('class'=>'span4', 'id'=>'dob3', 'placeholder'=>'')).
									                '</div>
									              </div>';
					                 		
                 								break;
										
											case '2':
											
												echo '<div class="control-group">
										                <label class="control-label">Day 1 :</label>
										                <div class="controls">'                 
										                  .form_input('dob', set_value('dob'), array('class'=>'span4', 'id'=>'dob', 'placeholder'=>'')).
										                '</div>
										              </div>';
												
												echo '<div class="control-group">
										                <label class="control-label">Day 2 :</label>
										                <div class="controls">'                 
										                  .form_input('dob2', set_value('dob2'), array('class'=>'span4', 'id'=>'dob2', 'placeholder'=>'')).
										                '</div>
										              </div>';
												break;
												
											case '1':
											
												echo '<div class="control-group">
										                <label class="control-label">Day 1 :</label>
										                <div class="controls">'                 
										                  .form_input('dob', set_value('dob'), array('class'=>'span4', 'id'=>'dob', 'placeholder'=>'')).
										                '</div>
										              </div>';
											default :
												
												echo '<div class="control-group">
										                <label class="control-label">Day 1 :</label>
										                <div class="controls">'                 
										                  .form_input('dob', set_value('dob'), array('class'=>'span4', 'id'=>'dob', 'placeholder'=>'')).
										                '</div>
										              </div>';
												
										}
											
									
								} ?>
              
              
   
              <div class="control-group">
                <label class="control-label">Location :</label>
                <div class="controls">
                  
                  <?php echo form_input('ed_localization', set_value('ed_localization'), array('class'=>'span11', 'id'=>'ed_localization', 'placeholder'=>'')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Trainer :</label>
                <div class="controls">                  
                  <select name="for_name" class="form-control ">
                  		<?php 

	                  		$query = $this->db->query('SELECT for_name FROM formador');
							foreach ($query->result_array() as $row){
								$for_name = $row['for_name'];
								echo '<option value="'.$for_name.'">'.set_select($for_name,$for_name).$for_name.'</option>';								
							}		
						?>
                  	</select>
                </div>
              </div>
              <div class="control-group">
                <div class="form-actions">
                
	                <?php echo form_submit('submit','Create Edition', array('class'=>'btn btn-success')); ?>
	              </div>
                
              </div>
              
              
            </form>
          </div>
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><?php echo validation_errors(); ?></h5>
            <?php  
            
            	$exito = $this->uri->segment(4);	
            	if($exito){
            		echo '<h5>Edition added succesfully</h5>';            		
            	}            
            ?>
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
<script type="text/javascript">
$(function() {
    $("#dob2").datepicker();
});
</script>
<script type="text/javascript">
$(function() {
    $("#dob3").datepicker();
});
</script>

</html>

															




