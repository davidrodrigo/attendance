<?php require 'header.php'; ?>

<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Cursos</h1> -->
  </div>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">	  
      <li> <a href="<?php echo base_url() ?>index.php/Create_course/"> <i class="icon-book"></i> Add Course </a> </li> 
      <!-- <li> <a href="<?php echo base_url() ?>index.php/Add_trainer/"> <i class="icon-people"></i> Add Trainer </a> </li>  -->
      <li> <a href="<?php echo base_url() ?>index.php/Create_edition/"> <i class="icon-calendar"></i>Create Edition</a> </li>
      <li> <a href="<?php echo base_url() ?>index.php/Add_participant/"> <i class="icon-client"></i> Add Participants </a> </li> 
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
            <h5>Add Trainer</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url() ?>index.php/Add_trainer/reg_process_trainer" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Trainer Name :</label>
                <div class="controls">                  
                  <?php echo form_input('for_name', set_value('for_name'), array('class'=>'span11', 'id'=>'for_name', 'placeholder'=>'')) ?>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Trainer Email :</label>
                <div class="controls">                  
                  <?php echo form_input('username', set_value('username'), array('class'=>'span11', 'id'=>'username', 'placeholder'=>'')) ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Trainer Password :</label>
                <div class="controls">
                  <?php echo form_password('password', set_value('password'), array('class'=>'span11', 'id'=>'password', 'placeholder'=>'')) ?>
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
            	$exito = $this->uri->segment(3);	
            	if($exito){
            		echo '<h5>Trainer added succesfully</h5>';            		
            	}            
            ?>
          </div>
          </div>
       </div>
  	</div>
  	
  	<!-- Listado de Formadores -->
    <div class="row-fluid">
      <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Trainers List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Trainer ID.</th>
                  <th>Name</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                	<?php 
                  		$query = $this->db->query('SELECT for_name, username, id_formador FROM formador');
						foreach ($query->result_array() as $row){
							$id_formador = $row['id_formador'];
							echo '<tr class="gradex"><td>'.$id_formador.'</td>';
							echo '<td><a href="'.base_url().'index.php/Admin_trainers/index/'.$id_formador.'">'.$row['for_name'].'</a></td>';
							echo '<td>'.$row['username'].'</td></tr>';
						}
                  	?>
              </tbody>
            </table>
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

