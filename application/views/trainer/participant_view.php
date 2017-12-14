<?php require 'header_trainer.php'; ?>

<div id="content">
  <div id="content-header">
    <!-- <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
   <!--  <h1 style="text-align: center"><br/><?=$this->session->userdata('username')?> Control Panel</h1> -->
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
    
    <!-- Listado de Alumnos -->
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
          	<?php 
          		$formador = $this->session->userdata('username'); 	
				$id_part = $this->uri->segment(3);				
				$this->db->select('p_name')
						 ->from('participante')
						 ->where('id_part', $id_part);
				$query = $this->db->get();
				$nombre_participante = $query->row('p_name');						 
						 
				$this->db->select('p_email')
						 ->from('participante')
						 ->where('id_part', $id_part);
				$query = $this->db->get();
				$p_email = $query->row('p_email');
				
				$this->db->select('id_formador')
						 ->from('formador')
						 ->where('username', $formador);
				$query = $this->db->get();
				$id_formador = $query->row('id_formador');				
				$this->db->select('for_name');
				$this->db->from('formador');
				$this->db->where('username', $formador);
				$query = $this->db->get();
				//nombre del Formador
				$t_name = $query->row('for_name');          	
             echo '<span class="icon"><i class="icon-th"></i></span> ';
             echo '<h5>'.$nombre_participante.'</h5>';?>
         </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
              	<tr>
              	  <th>Edition</th>
              	  <th>Email</th>
              	  <th>Location</th>
                  <th>Day 1</th>
                  <th>Day 2</th>
                  <th>Day 3</th> 
                  
                </tr>
            </thead>
         	  <tbody>
				<?php 
				
					$query = $this->db->query("SELECT id_edicion FROM edi_part WHERE id_part='$id_part'");
					foreach($query->result_array() as $row){
						$ref_curso = $row['id_edicion'];
						
						$query = $this->db->query("SELECT ed_name,  ed_fecha1, ed_fecha2, ed_fecha3, ed_localizacion FROM edicion WHERE id_formador='$id_formador' AND id_edicion='$ref_curso' ");
						foreach($query->result_array() as $row){
							$ed_name = $row['ed_name'];
							$ed_localizacion = $row['ed_localizacion'];
							$ed_fecha1 = $row['ed_fecha1'];
							$ed_fecha2 = $row['ed_fecha1'];
							$ed_fecha2 = $row['ed_fecha2'];
							$ed_fecha3 = $row['ed_fecha3'];							
							echo '<tr class="gradex"><td><a href="'.base_url().'index.php/Part_list_con/index/'.$ref_curso.'">'.$ed_name.'</td>';
							echo '<td style="text-align:center">'.$p_email.'</td>';
							echo '<td>'.$ed_localizacion.'</td>';
							
							$query = $this->db->query("SELECT activo1, activo2, activo3 FROM edi_part WHERE id_edicion='$ref_curso' AND id_part='$id_part' ");
							foreach($query->result_array() as $row){
								$activo1 = $row['activo1'];
								$activo2 = $row['activo2'];
								$activo3 = $row['activo3'];
								if($activo1 == '0'){
									echo '<td style="text-align:center;">'.$ed_fecha1.' <button class="btn-mini btn-danger" style="margin-left:3%">NO</button></td>';
									
								}else{
									echo '<td style="text-align:center;">'.$ed_fecha1.' <button class="btn-mini btn-success" style="margin-left:3%">YES</button></td>';
									
								}		
								if(!$ed_fecha2){
									echo '<td style="text-align:center;"> --- </td>';
									
								}else{
									if($activo2 == '0'){
										echo '<td style="text-align:center;">'.$ed_fecha2.' <button class="btn-mini btn-danger" style="margin-left:3%">NO</button></td>';
										
									}else{
										echo '<td style="text-align:center;">'.$ed_fecha2.' <button class="btn-mini btn-success" style="margin-left:3%">YES</button></td>';
										
									}		
								}
								if(!$ed_fecha3){
									echo '<td style="text-align:center;"> --- </td>';
									
								}else{
									if($activo3 == '0'){
										echo '<td style="text-align:center;">'.$ed_fecha3.' <button class="btn-mini btn-danger" style="margin-left:3%">NO</button></td>';
										
									}else{
										echo '<td style="text-align:center;">'.$ed_fecha3.' <button class="btn-mini btn-success" style="margin-left:3%">YES</button></td>';
										
									}		
								}									
							}
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
