<?php require 'header_trainer.php'; ?>
<?php
   		$email_formador = $this->session->userdata('username');
		$this->db->select('for_name')
				 ->from('formador')
				 ->where('username', $email_formador);
		$query = $this->db->get();
		$for_name = $query->row('for_name');   		
   	?>
<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
   <h3 style="margin-left:5%;"><br/>
   	<?php echo 'Welcome, '.$for_name;  ?>   		
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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Editions List</h5>
          </div>          
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Edition</th>
                  <th>Start Date</th>
                  <th>Localitation</th>
                  <th>Edition ID</th>
                </tr>
              </thead>
              <tbody>
                	<?php 
                		$formador = $this->session->userdata('username'); 						
						$this->db->select('id_formador');
						$this->db->from('formador');
						$this->db->where('username', $formador);
						$query = $this->db->get();
						//ID del Formador
						$for_id = $query->row('id_formador');    
						//Nombre del Curso
						$query = $this->db->query("SELECT ed_name, ed_fecha1, ed_localizacion, id_edicion FROM edicion WHERE id_formador='$for_id'");
						foreach($query->result_array() as $row){
							$ref_curso = $row['id_edicion'];
							//$course_name = $row['p_curso'];
							echo '<tr class="gradex"><td><a href="Part_list_con/index/'.$ref_curso.'">'.$row['ed_name'].'</a></td>';
							echo '<td>'.$row['ed_fecha1'].'</td>';
							echo '<td>'.$row['ed_localizacion'].'</td>';
							echo '<td>'.$row['id_edicion'].'</td></tr>';
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
