<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Admin_Controller {
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
		// Fetch all pages
		$data['pages'] = $this->Page_model->get_list();

		// Load template
		$this->template->load('admin', 'default', 'pages/index', $data);
	}
	
	public function add()
	{
		// Field rules
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
		$this->form_validation->set_rules('body', 'Body', 'trim|required');
		$this->form_validation->set_rules('is_published', 'Publish', 'required');
		$this->form_validation->set_rules('is_featured', 'Feature', 'required');
		$this->form_validation->set_rules('menu_order', 'Order', 'integer');

		if($this->form_validation->run() == FALSE){

			// Dropdown options
			$subject_options = array();
			$subject_options[0] = 'Select Subject';

			$subject_list = $this->Subject_model->get_list();

			foreach ($subject_list as $subject) {
				$subject_options[$subject->id] = $subject->name;
			}

			$data['subject_options'] = $subject_options;

			// Load template
			$this->template->load('admin', 'default', 'pages/add', $data);
		
		} else {

			$slug = str_replace(' ', '-', $this->input->post('title'));
			$slug = strtolower($slug);

			// Page data array
			$data = array(
				'user_id'				=> $this->session->userdata('user_id'), //1
				'subject_id'		=> $this->input->post('subject_id'),
				'slug'					=> $slug,
				'title'					=> $this->input->post('title'),
				'body'					=> $this->input->post('body'),
				'is_published'	=> $this->input->post('is_published'),
				'is_featured'		=> $this->input->post('is_featured'),
				'in_menu'				=> $this->input->post('in_menu'),
				'menu_order'		=> $this->input->post('menu_order')
			);

			// Insert page
			$this->Page_model->add($data);
			
			// Create activity Array
			$data = array(
				'resource_id'	=> $this->db->insert_id(),
				'type'			  => 'page',
				'action'			=> 'added',
				'user_id'			=> $this->session->userdata('user_id'),
				'message'			=> 'A new page was added ('.$data["title"].')'
			);
			
			// Insert activity
			$this->Activity_model->add($data);

			// Set message
			$this->session->set_flashdata('success', 'Page has been added');

			// Redirect
			redirect('admin/pages');
		}
	}

	public function edit($id)
	{
		// Field rules
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
		$this->form_validation->set_rules('body', 'Body', 'trim|required');
		$this->form_validation->set_rules('is_published', 'Publish', 'required');
		$this->form_validation->set_rules('is_featured', 'Feature', 'required');
		$this->form_validation->set_rules('menu_order', 'Order', 'integer');

		if($this->form_validation->run() == FALSE){

			// Fetch item variable
			$data['item'] = $this->Page_model->get($id);

			// Dropdown options
			$subject_options = array();
			$subject_options[0] = 'Select Subject';

			$subject_list = $this->Subject_model->get_list();

			foreach ($this->Subject_model->get_list() as $subject) {
				$subject_options[$subject->id] = $subject->name;
			}

			$data['subject_options'] = $subject_options;

			// Load template
			$this->template->load('admin', 'default', 'pages/edit', $data);
		
		} else {

			$slug = str_replace(' ', '-', $this->input->post('title'));
			$slug = strtolower($slug);

			// Page data array
			$data = array(
				'user_id'				=> $this->session->userdata('user_id'),
				'subject_id'		=> $this->input->post('subject_id'),
				'slug'					=> $slug,
				'title'					=> $this->input->post('title'),
				'body'					=> $this->input->post('body'),
				'is_published'	=> $this->input->post('is_published'),
				'is_featured'		=> $this->input->post('is_featured'),
				'in_menu'				=> $this->input->post('in_menu'),
				'menu_order'		=> $this->input->post('menu_order')
			);

			// Update page
			$this->Page_model->update($id, $data);
			
			// Create activity Array
			$data = array(
				'resource_id'	=> $this->db->insert_id(),
				'type'				=> 'page',
				'action'			=> 'updated',
				'user_id'			=> $this->session->userdata('user_id'),
				'message'			=> 'A page was updated ('.$data["title"].')'
			);
			
			// Insert activity
			$this->Activity_model->add($data);

			// Set message
			$this->session->set_flashdata('success', 'Page has been updated');

			// Redirect
			redirect('admin/pages');
		}

	}

	public function delete($id)
	{
		$title = $this->Page_model->get($id)->title;

		// Delete Page
		$this->Page_model->delete($id);
			
		// Create activity Array
		$data = array(
			'resource_id'	=> $this->db->insert_id(),
			'type'				=> 'page',
			'action'			=> 'deleted',
			'user_id'			=> $this->session->userdata('user_id'),
			'message'			=> 'A page ('.$title.') was deleted'
		);
		
		// Insert activity
		$this->Activity_model->add($data);

		// Set message
		$this->session->set_flashdata('success', 'Page has been deleted');

		// Redirect
		redirect('admin/pages');	
	}
}
