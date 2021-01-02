<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends Admin_Controller  
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Filter';

		$this->load->model('model_filters');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{

		$result = $this->model_filters->getFilterData();

		$this->data['results'] = $result;

		$this->render_template('filters/index', $this->data);
	}

	
	public function fetchFilterData()
	{
		$result = array('data' => array());

		$data = $this->model_filters->getFilterData();
		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			
				$buttons .= '<button type="button" class="btn btn-success" onclick="editFilter('.$value['Filter_id'].')" data-toggle="modal" data-target="#editFilterModal"><i class="fa fa-edit"></i></button>';	
			
			
			
				// $buttons .= ' <button type="button" class="btn btn-danger" onclick="removeFilter('.$value['Filter_id'].')" data-toggle="modal" data-target="#removeFilterModal"><i class="fa fa-trash"></i></button>
				// ';


			$result['data'][$key] = array(
				$value['Filter_type'],
				$value['Filter_value'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	
	public function fetchFilterDataById($id)
	{
		if($id) {
			$data = $this->model_filters->getFilterData($id);
			echo json_encode($data);
		}

		return false;
	}

	
	public function create()
	{

		$response = array();

		$this->form_validation->set_rules('filter_name', 'Filter name', 'trim|required');
		$this->form_validation->set_rules('filter_val', 'Filter type', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'Filter_type' => $this->input->post('filter_name'),
        		'Filter_value' => $this->input->post('filter_val')
        	);

        	$create = $this->model_filters->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the filter information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);

	}

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	public function update($id)
	{
		

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_filter_name', 'Filter name', 'trim|required');
			$this->form_validation->set_rules('edit_filter_val', 'Filter type', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'Filter_type' => $this->input->post('edit_filter_name'),
	        		'Filter_value' => $this->input->post('edit_filter_val')	
	        	);

	        	$update = $this->model_filters->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* It removes the brand information from the database 
	* and returns the json format operation messages
	*/
	// public function remove()
	// {
		
		
	// 	$brand_id = $this->input->post('brand_id');
	// 	$response = array();
	// 	if($brand_id) {
	// 		$delete = $this->model_brands->remove($brand_id);

	// 		if($delete == true) {
	// 			$response['success'] = true;
	// 			$response['messages'] = "Successfully removed";	
	// 		}
	// 		else {
	// 			$response['success'] = false;
	// 			$response['messages'] = "Error in the database while removing the brand information";
	// 		}
	// 	}
	// 	else {
	// 		$response['success'] = false;
	// 		$response['messages'] = "Refersh the page again!!";
	// 	}

	// 	echo json_encode($response);
	// }

}