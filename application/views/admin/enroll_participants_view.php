<?php require 'header.php'; ?>

<?php 
$administrador = $this->session->userdata('username'); 	
?>

<div id="content">
	<div id="content-header">
		<!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
	</div>
	<div  class="quick-actions_homepage">
		<ul class="quick-actions">	  
			<li> <a href="<?php echo base_url() ?>index.php/Create_course/"> <i class="icon-book"></i> Add Course </a> </li> 
			<li> <a href="<?php echo base_url() ?>index.php/Add_trainer/"> <i class="icon-people"></i> Add Trainer </a> </li> 
			<li> <a href="<?php echo base_url() ?>index.php/Create_edition/"> <i class="icon-calendar"></i> Create Edition </a> </li>
			<li> <a href="<?php echo base_url() ?>index.php/Add_participant/"> <i class="icon-client"></i> Add Participants </a> </li>         
		</ul>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3"></div>
			<!-- MATRICULAR EN UN EVENTO -->
			<div class="span6">
				<div class="widget-box">
					<div class="widget-title"> 
						<span class="icon"> <i class="icon-user"></i> </span>
						<h5>Enroll in a Edition</h5>
					</div>
					<div class="widget-content">						
						<!-- MATRICULAR PARTICIPANTE -->
						<form action="<?=base_url()  ?>index.php/Enroll_participants/matricular_participante" method="post" class="form-horizontal"> 
							<div class="control-group">
								<label class="control-label">Name :</label>
								<div class="controls">
									<select multiple name="p_name[]" class="form-control ">                   	
									<?php 
										$p_name = array ();
										$query = $this->db->query("SELECT p_name, id_part FROM participante");
										foreach($query->result_array() as $row){
											$p_name = $row['p_name'];
											$id_part = $row['id_part'];
											echo '<option value"'.$p_name.'">'.set_select($p_name,$p_name).$p_name.'</option>';
										}
									?>
									</select>
								</div>
							</div> 
							<div class="control-group">
								<label class="control-label">Select Edition :</label>
								<div class="controls">     
									<select name="ed_name" class="form-control ">             	
										<?php 
											$query = $this->db->query("SELECT ed_name FROM edicion");
											foreach($query->result_array() as $row){
												$ed_name = $row['ed_name'];
												echo '<option value="'.$ed_name.'">'.set_select($ed_name,$ed_name).$ed_name.'</option>';
											}
										?>
									</select>
								</div>
							</div> 
							<?php echo '<p style="text-align:center;">'.form_submit('submit','SELECT COURSE', array('class'=>'btn-mini btn-success')).'</p>'; ?>    
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
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.uniform.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/maruti.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/maruti.tables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.js"></script> 
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
</body>
</html>
