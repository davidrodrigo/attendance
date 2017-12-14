<?php require 'header.php'; ?>

<?php 
$administrador = $this->session->userdata('username'); 	
$id_formador = $this->uri->segment(3);
?>

<div id="content">
	<div id="content-header">
   		<!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
    
  	</div>
 	<div  class="quick-actions_homepage">
	    <ul class="quick-actions">	  
	    	<li> <a href="<?php echo base_url() ?>index.php/Create_course/"> <i class="icon-book"></i> Add Course </a> </li> 
		    <li> <a href="<?php echo base_url() ?>index.php/Add_trainer/"> <i class="icon-people"></i> Add Trainer </a> </li> 
		    <li> <a href="<?php echo base_url() ?>index.php/Create_edition/"> <i class="icon-calendar"></i>Create Edition</a> </li>
		    <li> <a href="<?php echo base_url() ?>index.php/Add_participant/"> <i class="icon-client"></i> Add Participants </a> </li>   
		    <li> <a href="<?php echo base_url() ?>index.php/Enroll_participants/"> <i class="icon-client"></i> Enroll Participants </a> </li>      
	    </ul>
  	</div>
  	<div class="container-fluid">
  		<div class="row-fluid">
  			<!-- DATOS DEL EVENTO -->
  			<div class="span4">
  				<div class="widget-box">
	      			<div class="widget-title"> <span class="icon"> <i class="icon-ok"></i> </span>
	            		<h5>Course</h5>
	          		</div>
	          		<div class="widget-content">
		          		<?php 	          									
							$this->db->select('for_name, username, password')
									 ->where('id_formador',$id_formador);
							$query = $this->db->get('formador');						
							$for_name = $query->row('for_name');
							$for_email = $query->row('username');
							$for_password = $query->row('password');						
		          		?>	          		
	          			<!-- EDITAR NOMBRE -->
		          		<form action="<?=base_url()  ?>index.php/Admin_trainers/cambiar_nombre" method="post" class="form-horizontal"> 
				        	<div class="control-group">
				        		<label class="control-label">Name :</label>
				                <div class="controls">                  	
				                  	<?php echo form_input('for_name', $for_name,$disabled_nombre, array('class'=>'span11', 'id'=>'for_name', 'placeholder'=>$for_name)); 
				                  		  echo form_hidden('id_formador', $id_formador, array('class'=>'span4', 'id'=>'id_formador'));?>
				                </div>
				         	</div> 
				         	<?= '<p style="text-align:center">'.$boton_nombre('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?>           
				   		</form>
			        	<?='<p style="text-align:center; visibility:'.$visibility_nombre.'"><span class="icon"><a href="'.base_url().'index.php/Admin_trainers/edit_nombre/'.$id_formador.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'; ?>  	
	          			<!-- EDITAR EMAIL -->
			         	<form action="<?=base_url()  ?>index.php/Admin_trainers/cambiar_email" method="post" class="form-horizontal">
		            		<div class="control-group">
		                		<label class="control-label">Email :</label>
		                		<div class="controls">
			                		<?php echo form_input('for_email', $for_email,$disabled_email, array('class'=>'span11', 'id'=>'for_email', 'placeholder'=>$for_email)); 
				                  		echo form_hidden('id_formador', $id_formador, array('class'=>'span4', 'id'=>'id_formador'));?>
				                </div>
		              		</div>
		              		<?= '<p style="text-align:center">'.$boton_email('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?> 
		             	</form>    
				        <?= '<p style="text-align:center; visibility:'.$visibility_email.'"><span class="icon"><a href="'.base_url().'index.php/Admin_trainers/edit_email/'.$id_formador.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'?>
						<!-- CAMBIAR PASSWORD -->
			         	<form action="<?=base_url()  ?>index.php/Admin_trainers/cambiar_password" method="post" class="form-horizontal">
		            		<div class="control-group">
		                		<label class="control-label">Password :</label>
		                		<div class="controls">
			                		<?php echo form_password('for_password', $for_password,$disabled_password, array('class'=>'span11', 'id'=>'for_password', 'placeholder'=>'')); 
				                  		echo form_hidden('id_formador', $id_formador, array('class'=>'span4', 'id'=>'id_formador'));?>
				                </div>
		              		</div>
		              		
		              		<?php 
		              			if($visibility_password2 === TRUE){
		              				echo 	'<div class="control-group">
		              							<label class="control-label">Confirm Password</label>
		              							<div class="controls">'.
		              								form_password('for_password2', '', array('class'=>'span11', 'id'=>'for_password2', 'placeholder'=>'')).
		              							'</div>
		              						</div>';
		              			}
		              		?>
		              		<?= '<p style="text-align:center">'.$boton_password('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?> 
		             	</form>    
				        <?= '<p style="text-align:center; visibility:'.$visibility_password.'"><span class="icon"><a href="'.base_url().'index.php/Admin_trainers/edit_password/'.$id_formador.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'?>
					</div>
	          		<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            			<h5><?php echo validation_errors(); ?></h5>
          			</div>
	      		</div>
  			</div>
  			<div class="span8">
	  			<!-- EDICIONES DEL CURSO -->
	  			<div class="span12">
		        	<div class="widget-box">
		          		<div class="widget-title">
		            		<span class="icon"><i class="icon-th"></i></span> 
		            		<h5>Editions of <?= $for_name ?></h5>
		          		</div>
		          		<div class="widget-content nopadding">
		            		<table class="table table-bordered data-table">
		              			<thead>
					              	<tr>
		              					<th>Edition Name</th>
		              					<th>Start Date</th>
		              					<th>Location</th>							              					
	              					</tr>
		              			</thead>
		              			<tbody>
									<?php  
										$query = $this->db->query("SELECT id_edicion, ed_name, ed_fecha1, ed_fecha2, ed_fecha3, ed_localizacion, id_curso FROM edicion WHERE id_formador='$id_formador'");
										foreach($query->result_array() as $row){
											$id_edicion = $row['id_edicion'];
											$ed_name =$row['ed_name'];
											$ed_fecha1 = $row['ed_fecha1'];
											$ed_fecha2 = $row['ed_fecha2'];
											$ed_fecha3 = $row['ed_fecha3'];
											$ed_localizacion = $row['ed_localizacion'];
											$id_curso = $row['id_curso'];

											echo '<tr class="gradex">';
											echo '<td><a href="'.base_url().'index.php/Admin_edition/index/'.$id_edicion.'">'.$ed_name.'</td>';
											echo '<td>'.$ed_fecha1.'</td>';										
											echo '<td>'.$ed_localizacion.'</td>';											
											echo '</tr>';
										}
									?>
		              			</tbody>
		            		</table>
		        		</div>
	        		</div>
	     		</div>
	     		<!-- FORMADORES LISTADO -->	     		
    			<div class="widget-box">
      				<div class="widget-title">
         				<span class="icon"><i class="icon-th"></i></span> 
        				<h5>Trainers</h5>
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
										echo '<tr class="gradex"><td>'.$id_formador.'</a></td>';
										echo '<td><a href="'.base_url().'index.php/Admin_trainers/index/'.$id_formador.'">'.$row['for_name'].'</a></td>';
										echo '<td>'.$row['username'].'</td></tr>';
									}
			                  	?>
          					</tbody>
        				</table>
      				</div>
    			</div>     			
	  		</div>
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
