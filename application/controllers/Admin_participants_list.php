<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_participants_list extends CI_Controller {
  
  
  public function index(){
    
    $this->load->view('admin/admin_participants_list_view');
    
  }
}