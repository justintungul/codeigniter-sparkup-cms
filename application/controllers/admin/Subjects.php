<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends Admin_Controller {
	// Constructor - function runs every class inst'n
	function __construct(){
		// Make sure parent constructor runs
		parent::__construct();

		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
	}

	public function index()
	{
		$data['subjects'] = $this->Subject_model->get_list();

		// Load template
		$this->template->load('admin', 'default', 'subjects/index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		
		if($this->form_validation->run() == FALSE){
			
			// Load template
			$this->template->load('admin', 'default', 'subjects/add');
		
		} else {
			
			// Create post array
			$data = array(
				'name' => $this->input->post('name')
			);
			
			// Insert subject
			$this->Subject_model->add($data);
			
			// Create activity Array
			$data = array(
				'resource_id'	=> $this->db->insert_id(),
				'type'				=> 'subject',
				'action'			=> 'added',
				'user_id'			=> $this->session->userdata('user_id'),
				'message'			=> 'A new subject was added ('.$data["name"].')'
			);
			
			// Insert activity
			$this->Activity_model->add($data);

			// Set message
			$this->session->set_flashdata('success', 'Subject has been added');

			// Redirect
			redirect('admin/subjects');			
		}

	}

	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		
		if($this->form_validation->run() == FALSE){

			// Get current subject
			$data['item'] = $this->Subject_model->get($id);
			
			// Load template
			$this->template->load('admin', 'default', 'subjects/edit', $data);
		
		} else {
			$old_name = $this->Subject_model->get($id)->name;
			$new_name = $this->input->post('name');

			// Create post array
			$data = array(
				'name' => $this->input->post('name')
			);
			
			// Insert subject
			$this->Subject_model->update($id, $data);
			
			// Create activity Array
			$data = array(
				'resource_id'	=> $this->db->insert_id(),
				'type'				=> 'subject',
				'action'			=> 'updated',
				'user_id'			=> $this->session->userdata('user_id'),
				'message'			=> 'A new subject ('.$old_name.') was renamed to ('.$new_name.')'
			);
			
			// Insert activity
			$this->Activity_model->add($data);

			// Set message
			$this->session->set_flashdata('success', 'Subject has been updated');

			// Redirect
			redirect('admin/subjects');			
		}
	}

	public function delete($id)
	{
		$name = $this->Subject_model->get($id)->name;

		// Delete Subject
		$this->Subject_model->delete($id);
			
		// Create activity Array
		$data = array(
			'resource_id'	=> $this->db->insert_id(),
			'type'				=> 'subject',
			'action'			=> 'deleted',
			'user_id'			=> $this->session->userdata('user_id'),
			'message'			=> 'A new subject ('.$name.') was deleted'
		);
		
		// Insert activity
		$this->Activity_model->add($data);

		// Set message
		$this->session->set_flashdata('success', 'Subject has been deleted');

		// Redirect
		redirect('admin/subjects');		
	}

}
