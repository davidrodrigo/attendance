<?php require 'header.php'; ?>

<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Cursos</h1> -->
  </div>
  <div class="container-fluid">
  	
  	<!-- INGRESAR CURSOS -->
    <!-- <div class="row-fluid">
       <div class="span3"></div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Crear Curso</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="<?php echo base_url('index.php/Create_course/create');?>" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">ID :</label>
                <div class="controls">
                  <input type="text" name="table" class="span11" placeholder="ID del Curso" />
                </div>
              </div>
          	  <div class="form-actions">
                <button type="submit" class="btn btn-success">Crear</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    
      <div class="span3"></div>
	</div> -->
	
    <!-- LISTADO DE CURSOS -->  	
    
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Courses List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Edition</th>
                  <th>Date</th>
                  <th>Localitation</th>
                  <th>Course Ref.</th>
                </tr>
              </thead>
              <tbody>
                	<?php 
                  		$query = $this->db->query('SELECT ed_name, ed_fecha1, ed_location, id_formador FROM edicion');
						foreach ($query->result_array() as $row){
							echo '<tr class="gradex"><td>'.$row['c_name'].'</td>';
							echo '<td>'.$row['ed_fecha1'].'</td>';
							echo '<td>'.$row['ed_location'].'</td>';
							echo '<td>'.$row['id_formador'].'</td></tr>';
						}
                  	?>
              </tbody>
            </table>
          </div>
        </div>
     </div>
    </div>
    <!-- Listado de Formadores -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Trainers List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Trainer Ref.</th>
                  <!-- <th>ID</th> -->
                </tr>
              </thead>
              <tbody>
                	<?php 
                  		$query = $this->db->query('SELECT t_name, t_email, t_ref FROM trainer');
						foreach ($query->result_array() as $row){
							echo '<tr class="gradex"><td>'.$row['t_name'].'</td>';
							echo '<td>'.$row['t_email'].'</td>';
							echo '<td>'.$row['t_ref'].'</td></tr>';
						}
                  	?>
              </tbody>
            </table>
          </div>
        </div>
     </div>
    </div>
    <!-- Listado de Alumnos -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Participants List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Course</th>
                  <th>Trainer</th>
                </tr>
              </thead>
              <tbody>
                	<?php 
                  		$query = $this->db->query('SELECT p_name, p_email, p_curso, p_trainer FROM participant');
						foreach ($query->result_array() as $row){
							echo '<tr class="gradex"><td>'.$row['p_name'].'</td>';
							echo '<td>'.$row['p_email'].'</td>';
							echo '<td>'.$row['p_curso'].'</td>';
							echo '<td>'.$row['p_trainer'].'</td></tr>';
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

