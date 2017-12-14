<?php require 'header.php'; ?>

<div id="content">
  <div id="content-header">
    <!-- <h1 style="text-align: center">Welcome <?=$this->session->userdata('perfil')?></h1> -->
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
    <!-- LISTADO DE EDICIONES -->   
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
                  <th>Course Edition</th>
                  <th>Start Date</th>
                  <th>Location</th>
                  <th>Course Ref.</th>
                  <th>Trainer</th>
                </tr>
              </thead>
              <tbody>
                	<?php 
                  		$query = $this->db->query('SELECT ed_name, ed_fecha1, ed_localizacion, id_edicion, id_formador FROM edicion');
						foreach ($query->result_array() as $row){
							$ed_name = $row['ed_name'];
							$ed_fecha1 = $row['ed_fecha1'];
							$ed_localizacion = $row['ed_localizacion'];
							$id_edicion = $row['id_edicion'];
							$formador = $row['id_formador'];
							
							echo '<tr class="gradex"><td><a href="'.base_url().'index.php/Admin_edition/index/'.$id_edicion.'">'.$ed_name.'</td>';
							echo '<td>'.$ed_fecha1.'</td>';
							echo '<td>'.$ed_localizacion.'</td>';
							echo '<td>'.$id_edicion.'</td>';
              
              $query = $this->db->query("SELECT for_name FROM formador WHERE id_formador='$formador'");
              foreach ($query->result_array() as $row){
                  echo '<td>'.$row['for_name'].'</td></tr>';
              }
              
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