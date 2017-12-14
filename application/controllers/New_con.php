<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_con extends CI_Controller {
	
	public function index(){
		
		//$this->load->model('New_model'); ---> La he cargado por autoload
		$data['posts'] = $this->New_model->database();
		
		
		$this->load->view('new_view', $data);
		
	}
	
	// public function insert_post(){
// 		 
		// $this->New_model->create_post([
			// 'post_title' => 'Health is Wealth',
			// 'post_description' => 'Health is a gift of nature, so make sure you&apos;re healthy enough',
			// 'post_author' => 'Paco Pérez',
			// 'post_date' => '2016-10-19'
		// ]);
// 		
	// }
// 	
	// public function update_post(){
		 // $id = 4;
		// $this->New_model->update([
			// 'post_title' => 'Health is very Important',
			// 'post_description' => 'Health is a gift of nature, so make sure you&apos;re healthy enough. bla, bla, bla...',			
			// 'post_date' => '2017-10-19'
		// ], $id);
// 		
	// }
	
	public function delete_post(){
		 
		$id = 4; 
		$this->New_model->delete($id);
		
	}
	
	//crear tabla
	function create()
	{
	    $table = $this->input->post('table');
	    $this->New_model->create($table);
	
	}  
	
	
}