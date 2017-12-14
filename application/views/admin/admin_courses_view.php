<?php require 'header.php'; ?>

<?php 
$administrador = $this->session->userdata('username'); 	
$id_curso = $this->uri->segment(3);
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
							$this->db->select('c_name, c_days')
									 ->where('id_curso',$id_curso);
							$query = $this->db->get('cursos');						
							$c_name = $query->row('c_name');
							$c_days = $query->row('c_days');						
		          		?>	          		
	          			<!-- EDITAR CURSO -->
		          		<form action="<?=base_url()  ?>index.php/Admin_courses/cambiar_course" method="post" class="form-horizontal"> 
				        	<div class="control-group">
				        		<label class="control-label">Course Name :</label>
				                <div class="controls">                  	
				                  	<?php echo form_input('c_name', $c_name,$disabled_curso, array('class'=>'span11', 'id'=>'c_name', 'placeholder'=>$c_name)); 
				                  		  echo form_hidden('id_curso', $id_curso, array('class'=>'span4', 'id'=>'id_curso'));?>
				                </div>
				         	</div> 
				         	<?= '<p style="text-align:center">'.$boton_curso('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?>           
				   		</form>
			        	<?='<p style="text-align:center; visibility:'.$visibility_curso.'"><span class="icon"><a href="'.base_url().'index.php/Admin_courses/edit_curso/'.$id_curso.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'; ?>  	
	          			<!-- EDITAR DÍAS -->
			         	<form action="<?=base_url()  ?>index.php/Admin_courses/cambiar_dias" method="post" class="form-horizontal">
		            		<div class="control-group">
		                		<label class="control-label">Duration :</label>
			                	<?php  
				                	if($visibility_dias == ''){
				                		echo 	'<div class="controls">'.
													form_input('c_days', $c_days,$disabled_dias, array('class'=>'span11', 'id'=>'c_days', 'placeholder'=>$c_days)).
												'</div>';								
				                	}else{
				                		echo 	'<div class="controls">';
				                		$att_duracion = array(
		                 					'1'=> '1 Day',
		                 					'2'=> '2 Days',
		                 					'3'=> '3 Days'
										);
					                 				echo form_dropdown('c_days', $att_duracion,'', array('class'=>'span6', 'id'=>'c_days', 'placeholder'=>'Fecha de Inicio')); 
													echo form_hidden('id_edicion', $id_curso, array('class'=>'span4', 'id'=>'id_edicion')).
												'</div>';								
				                	}		                	
			                	?>	
		              		</div>
		              		<?= '<p style="text-align:center">'.$boton_dias('submit','Save Change', array('class'=>'btn-mini btn-success')).'</p>'; ?> 
		             	</form>    
				        <?= '<p style="text-align:center; visibility:'.$visibility_dias.'"><span class="icon"><a href="'.base_url().'index.php/Admin_courses/edit_dias/'.$id_curso.'"><button class="btn-mini btn-info"><i class="icon-pencil"></i>Edit</button></a></span></p>'?>

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
		            		<h5>Editions of <?= $c_name ?></h5>
		          		</div>
		          		<div class="widget-content nopadding">
		            		<table class="table table-bordered data-table">
		              			<thead>
					              	<?php  
						              	switch($c_days){
						              		case '3':
						              			echo 	'<tr>
							              					<th>Edition Name</th>
							              					<th>Day 1</th>
							              					<th>Day 2</th>
							              					<th>Day 3</th>
							              					<th>Location</th>
							              					<th>Trainer</th>
						              					</tr>';
						              			break;
						              		case '2':
						              			echo 	'<tr>
							              					<th>Edition Name</th>
							              					<th>Day 1</th>
							              					<th>Day 2</th>
							              					<th>Location</th>
							              					<th>Trainer</th>
						              					</tr>';
						              			break;
						              		case '1':
						              			echo 	'<tr>
							              					<th>Edition Name</th>
							              					<th>Date</th>
							              					<th>Location</th>
							              					<th>Trainer</th>
						              					</tr>';
						              			break;
					              		}
					              	?>
		              			</thead>
		              			<tbody>
									<?php  
										$query = $this->db->query("SELECT id_edicion, ed_name, ed_fecha1, ed_fecha2, ed_fecha3, ed_localizacion, id_formador FROM edicion WHERE id_curso='$id_curso'");
										foreach($query->result_array() as $row){
											$id_edicion = $row['id_edicion'];
											$ed_name =$row['ed_name'];
											$ed_fecha1 = $row['ed_fecha1'];
											$ed_fecha2 = $row['ed_fecha2'];
											$ed_fecha3 = $row['ed_fecha3'];
											$ed_localizacion = $row['ed_localizacion'];
											$id_formador = $row['id_formador'];

											echo '<tr class="gradex">';
											echo '<td><a href="'.base_url().'index.php/Admin_edition/index/'.$id_edicion.'">'.$ed_name.'</td>';

											switch ($c_days){
												case '3':
													echo '<td>'.$ed_fecha1.'</td>';
													echo '<td>'.$ed_fecha2.'</td>';
													echo '<td>'.$ed_fecha3.'</td>';
												break;
												case '2':
													echo '<td>'.$ed_fecha1.'</td>';
													echo '<td>'.$ed_fecha2.'</td>';
												break;
												case '1':
													echo '<td>'.$ed_fecha1.'</td>';
												break;
											}
											echo '<td>'.$ed_localizacion.'</td>';
											$query = $this->db->query("SELECT for_name FROM formador WHERE id_formador='$id_formador'");
											foreach($query->result_array() as $row){
												$for_name = $row['for_name'];
												echo '<td>'.$for_name.'</td>';
											}
											echo '</tr>';
										}
									?>
		              			</tbody>
		            		</table>
		        		</div>
	        		</div>
	     		</div>
	     		<!-- CURSOS LISTADO -->	     		
    			<div class="widget-box">
      				<div class="widget-title">
         				<span class="icon"><i class="icon-th"></i></span> 
        				<h5>Courses</h5>
      				</div>
      				<div class="widget-content nopadding">
        				<table class="table table-bordered data-table">
          					<thead>
	                			<tr>
				                	<th>Course ID.</th>
				                  	<th>Name</th>
				                  	<th>Duration</th>
				                </tr>
          					</thead>
         					<tbody>
			                	<?php 
			                  		$query = $this->db->query('SELECT id_curso, c_name, c_days FROM cursos');
									foreach ($query->result_array() as $row){
										$id_curso = $row['id_curso'];
										echo '<tr class="gradex"><td>'.$id_curso.'</a></td>';
										echo '<td><a href="'.base_url().'index.php/Admin_courses/index/'.$id_curso.'">'.$row['c_name'].'</a></td>';
										echo '<td>'.$row['c_days'].'</td></tr>';
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
