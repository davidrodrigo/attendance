<?php require 'header_part.php'; ?>
<?php
   		$email_part = $this->session->userdata('p_email');
		$this->db->select('p_name')
				 ->from('participante')
				 ->where('p_email', $email_part);
		$query = $this->db->get();
		$part_name = $query->row('p_name');   		
   	?>
<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
   <h3 style="margin-left:5%;"><br/>
   	<?php echo 'Welcome, '.$part_name;  ?>   		
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
                  <th>Feedback</th>
                  <th>Edition</th>
                  <th>Start Date</th>
                  <th>Localitation</th>
                  
                </tr>
              </thead>
              <tbody>
                	<?php 
                		$email_part = $this->session->userdata('p_email');					
						$this->db->select('id_part');
						$this->db->from('participante');
						$this->db->where('p_email', $email_part);
						$query = $this->db->get();
						//ID del Formador
						$part_id = $query->row('id_part');    
						//Nombre del Curso
						$query = $this->db->query("SELECT id_edicion, id_edi_part FROM edi_part WHERE id_part='$part_id'");
						foreach($query->result_array() as $row){
							$ref_curso = $row['id_edicion'];
							$id_edi_part = $row['id_edi_part'];
							
							$this->db->select('hecho')
									 ->from('pre_event')
									 ->where('id_edi_part',$id_edi_part);
							$query = $this->db->get();
							$hecho = $query->row('hecho');
							if(!$hecho){
								echo '<tr class="gradex"><td>Not Done <a class="btn btn-warning" href="'.base_url().'index.php/Feedback_pre/index/'.$id_edi_part.'" style="margin-left:5%">Feedback</a></td>';
								//echo $id_edi_part;
								
								
							}else{
								echo '<tr class="gradex"><td>Done</td>';
							}

							$query = $this->db->query("SELECT ed_name, ed_fecha1, ed_localizacion FROM edicion WHERE id_edicion='$ref_curso' ");
							foreach($query->result_array() as $row){
								
								echo '<td>'.$row['ed_name'].'</a></td>';
								echo '<td>'.$row['ed_fecha1'].'</td>';
								echo '<td>'.$row['ed_localizacion'].'</td>';
								// echo '<td>'.$row['id_edicion'].'</td></tr>';
								
							}
							
							
							// echo '<tr class="gradex"><td><a href="Part_list_con/index/'.$ref_curso.'">'.$row['ed_name'].'</a></td>';
							// echo '<td>'.$row['ed_fecha1'].'</td>';
							// echo '<td>'.$row['ed_localizacion'].'</td>';
							// echo '<td>'.$row['id_edicion'].'</td></tr>';
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
