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
      <li> <a href="<?php echo base_url() ?>index.php/Create_edition/"> <i class="icon-calendar"></i>Create Edition</a> </li>
      <!-- <li> <a href="<?php echo base_url() ?>index.php/Add_participant/"> <i class="icon-client"></i> Add Participants </a> </li>   -->     
      <li> <a href="<?php echo base_url() ?>index.php/Enroll_participants/"> <i class="icon-client"></i> Enroll Participants </a> </li>  
    </ul>
  </div>
  <div class="container-fluid">
  	
	<!--Registrar Formador -->
	 <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Add Participant</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Add_participant/reg_process_participant" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Participant Name :</label>
                <div class="controls">                  
                  <?php echo form_input('p_name', set_value('p_name'), array('class'=>'span11', 'id'=>'p_name', 'placeholder'=>'')) ?>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Participant Email :</label>
                <div class="controls">                  
                  <?php echo form_input('p_email', set_value('p_email'), array('class'=>'span11', 'id'=>'p_email', 'placeholder'=>'')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Participant Password :</label>
                <div class="controls">
                  <?php echo form_password('p_pass', set_value('p_pass'), array('class'=>'span11', 'id'=>'p_pass', 'placeholder'=>'')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Confirm Password :</label>
                <div class="controls">
                  <?php echo form_password('password2', set_value('password2'), array('class'=>'span11', 'id'=>'password2', 'placeholder'=>'')) ?>
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
            	$exito = $this->uri->segment(4);	
            	if($exito){
            		echo '<h5>Trainer added succesfully</h5>';            		
            	}            
            ?>
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
<script type="text/javascript">
$(function() {
    $("#dob").datepicker();
});
</script>
</body>
</html>

