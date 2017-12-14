<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_trainers_list extends CI_Controller {
  
  
  public function index(){
    
    $this->load->view('admin/admin_trainers_list_view');
    
  }
}