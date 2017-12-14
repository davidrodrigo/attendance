<?php require 'header.php'; ?>

<div id="content">
  <div id="content-header">
     <h1> <br/>	
     	<?php             	
			$ed_name = 'ed_name';
			$ed_fecha1 = 'ed_fecha1';
			$ed_fecha2 = 'ed_fecha2';
			$ed_fecha3 = 'ed_fecha3';
			$this->db->select($ed_name);
			$this->db->from('edicion');
			$this->db->where('id_edicion', 'ed_001_c_001');
			$query = $this->db->get();
			echo $query->row($ed_name).' / ';     
			$this->db->select($ed_fecha1);
			$this->db->from('edicion');
			$this->db->where('id_edicion', 'ed_001_c_001');
			$query = $this->db->get();
			echo $query->row($ed_fecha1);           	
		?>
  	</h1>
  </div>
  <div class="container-fluid">
    <!-- LISTADO DE 1 CURSOS -->    
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>
            	Course: <?php 
            	
            				$ed_name = 'ed_name';
							$ed_fecha1 = 'ed_fecha1';
							$ed_fecha2 = 'ed_fecha2';
							$ed_fecha3 = 'ed_fecha3';
							$this->db->select($ed_name);
							$this->db->from('edicion');
							$this->db->where('id_edicion', 'ed_001_c_001');
							$query = $this->db->get();
							echo $query->row($ed_name).' / ';     
							$this->db->select($ed_fecha1);
							$this->db->from('edicion');
							$this->db->where('id_edicion', 'ed_001_c_001');
							$query = $this->db->get();
							echo $query->row($ed_fecha1);     	
				            			?>
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Trainer</th>
                  <th>Participant Name</th>
                  <th>Email</th>   
                  <th>Active</th> 
                                
                  <!-- <th>Course Ref.</th> -->
                </tr>
              </thead>
              <tbody>
                	<?php 
                		//$p_curso = 'Curso de lo que sea';
                  		$query = $this->db->query('SELECT p_trainer, p_name, p_email, p_active FROM participant');
						//$this->db->where('p_curso', $p_curso);
						//$query = $this->db->get();
						foreach ($query->result_array() as $row){
							echo '<tr class="gradex"><td>'.$row['p_trainer'].'</td>';
							
							echo '<td>'.$row['p_name'].'</td>';
							echo '<td>'.$row['p_email'].'</td>';
							if ($row['p_active']=0){
								echo '<td>No</td></tr>';
							} else {
								echo '<td>Yes</td></tr>';
							}
							//echo '<td>'.$row['p_active'].'</td></tr>';
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

