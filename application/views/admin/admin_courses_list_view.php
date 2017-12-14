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
    <!-- Listado de Cursos -->
    <div class="row-fluid">
      <div class="span3"></div>
      <div class="span6">
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
                    echo  '<tr class="gradex"><td>'.$id_curso.'</a></td>';
                    echo    '<td><a href="'.base_url().'index.php/Admin_courses/index/'.$id_curso.'">'.$row['c_name'].'</a></td>';
                    echo    '<td>'.$row['c_days'].'</td>
                          </tr>';
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
