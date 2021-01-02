<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Users';
		$this->load->model('model_users');
		$this->load->model('model_category');
		$this->load->model('model_stock');
		
	}
	
	public function adminindex()
	{
		$this->data['page_title'] = 'Adminstrators';
		$admin_data = $this->model_users->getAdminData();

		$result = array();
		foreach ($admin_data as $k => $v) {

			$result[$k]['admin_info'] = $v;

			$address = $this->model_users->getAddress($v['User_id']);
			$result[$k]['admin_address'] = $address;
		}

		$this->data['admin_data'] = $result;

		$this->render_template('users/admin/adminindex', $this->data);
	}
public function retailindex(){

$this->data['page_title'] = 'Retailers';
		$retail_data = $this->model_users->getRetailData();

		$result = array();
		foreach ($retail_data as $k => $v) {

			$result[$k]['retail_info'] = $v;
			$address = $this->model_users->getAddress($v['User_id']);
			$result[$k]['retail_address'] = $address;
		}
		$this->data['retail_data'] = $result;

		$this->render_template('users/retailer/retailindex', $this->data);
}

public function wholesaleindex(){
	$this->data['page_title'] = 'Wholesalers';


		$wholesale_data = $this->model_users->getWholesaleData();

		$result = array();
		foreach ($wholesale_data as $k => $v) {

			$result[$k]['wholesale_info'] = $v;

			$address = $this->model_users->getAddress($v['User_id']);
			$result[$k]['wholesale_address'] = $address;
		}

		$this->data['wholesale_data'] = $result;

		$this->render_template('users/wholesaler/wholesaleindex', $this->data);


}
	
	public function admincreate()
	{
		$this->data['page_title'] = 'New Adminstrators';
		

		$this->form_validation->set_rules('fname', 'firstname', 'trim|required');
		$this->form_validation->set_rules('sname', 'secondname', 'trim|required');
		$this->form_validation->set_rules('lname', 'lastname', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required|is_unique[address.phone_number]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[address.email]');
		$this->form_validation->set_rules('city', 'City', 'trim');
		$this->form_validation->set_rules('scity', 'subcity', 'trim');
		// $this->form_validation->set_rules('photo', 'Photo', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
		
		$password=	password_hash($this->input->post('password'),PASSWORD_DEFAULT);
	
        if ($this->form_validation->run() == TRUE) {
            // true case
            if(!empty($_FILES['photo']['name'])){

            	$config['upload_path'] =  './images/';
            	$config['allowed_types'] = 'png|jpg|jpeg';
            	// $config['file_name'] = $_FILES['photo']['name'];

            	$this->load->library('upload',$config);
            	// $this->upload->initialize($config);

            	if($this->upload->do_upload('photo')){
            		$uploadData = $this->upload->data();
            		$picture = $uploadData['file_name'];
            	}else{
            		$picture = '';
            	}
            }
            else{
            	$picture = '';
            }
               $data = array(
                'FirstName' => $this->input->post('fname'),
        		'SecondName' =>  $this->input->post('sname'),
        		'LastName'=> $this->input->post('lname'),   		
        		'photo' => $picture,
        		'roleID' => '1',	
        	);

        	$create = $this->model_users->createAdmin($data,$password);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('users/adminindex', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/admincreate', 'refresh');
        	}
        }
        else {
            
            $this->render_template('users/admin/admincreate', $this->data);
        }	

		
	}

	public function createretail()
	{
		$this->form_validation->set_rules('fname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('sname', 'secondname', 'trim|required');
        $this->form_validation->set_rules('lname', 'lastname', 'trim|required');
        $this->form_validation->set_rules('retname', 'retailname', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone No', 'trim|required|is_unique[address.phone_number]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[address.email]');
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('scity', 'subcity', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

		$password=	password_hash($this->input->post('password'),PASSWORD_DEFAULT);
		$subs = $this->input->post('subs');

        if ($this->form_validation->run() == TRUE) {
            // true case
             if(!empty($_FILES['photo']['name'])){

            	$config['upload_path'] =  './images/';
            	$config['allowed_types'] = 'png|jpg|jpeg';
            	// $config['file_name'] = $_FILES['photo']['name'];

            	$this->load->library('upload',$config);
            	// $this->upload->initialize($config);

            	if($this->upload->do_upload('photo')){
            		$uploadData = $this->upload->data();
            		$picture = $uploadData['file_name'];
            	}else{
            		$picture = '';
            	}
            }
            else{
            	$picture = '';
            }
                   	 $data = array(
                'FirstName' => $this->input->post('fname'),
        		'SecondName' =>  $this->input->post('sname'),
        		'LastName'=> $this->input->post('lname'), 
        		'Retail_name' => $this->input->post('retname'), 
        		'photo' => $picture,
        		'roleID' => '2'	
        	);

        	$create = $this->model_users->createRetail($data,$password,$subs);
        	if($create) {
        		$this->session->set_flashdata('success', 'Successfully Registered');
                redirect('users/retailindex', 'refresh');
                
        	}
        	else {

        		$this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('users/createretail', 'refresh');
                
        	}
        }
        else {
			$cat_data = $this->model_category->getCategoryData();
        	$this->data['cat_data'] = $cat_data;
            
            $this->render_template('users/retailer/retailcreate', $this->data);
        	}	

		
	}
	public function createwholesale()
	{

		$this->data['page_title'] = 'New Wholesalers';
		$this->form_validation->set_rules('fname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('sname', 'secondname', 'trim|required');
        $this->form_validation->set_rules('lname', 'lastname', 'trim|required');
        $this->form_validation->set_rules('wname', 'Wholesalename', 'trim|required');
        $this->form_validation->set_rules('tno', 'TinNo', 'trim|required|is_unique[tinlicense.TIN_number]');
        $this->form_validation->set_rules('lno', 'License No', 'trim|required|is_unique[tinlicense.License_number]');
        $this->form_validation->set_rules('phone', 'Phone No', 'trim|required|is_unique[address.phone_number]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[address.email]');
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('scity', 'subcity', 'trim');
        $this->form_validation->set_rules('mplace', 'marketplace', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
        $password=  password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $subs = $this->input->post('subs');

        if ($this->form_validation->run() == TRUE) {
            // true case
                         if(!empty($_FILES['photo']['name'])){

            	$config['upload_path'] =  './images/';
            	$config['allowed_types'] = 'png|jpg|jpeg';
            	// $config['file_name'] = $_FILES['photo']['name'];

            	$this->load->library('upload',$config);
            	// $this->upload->initialize($config);

            	if($this->upload->do_upload('photo')){
            		$uploadData = $this->upload->data();
            		$picture = $uploadData['file_name'];
            	}else{
            		$picture = '';
            	}
            }
            else{
            	$picture = '';
            }
                 $data = array(
                'FirstName' => $this->input->post('fname'),
                'SecondName' =>  $this->input->post('sname'),
                'LastName'=> $this->input->post('lname'), 
                'wholesale_name' => $this->input->post('wname'), 
                'photo' => $picture,
                'roleID' => '3'   
            );

        	$create = $this->model_users->createwholesale($data,$password,$subs);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('users/wholesaleindex', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('users/createwholesale', 'refresh');
        	}
        }
        else {
        	$cat_data = $this->model_category->getCategoryData();
        	$this->data['cat_data'] = $cat_data;
            $this->render_template('users/wholesaler/createwholesale', $this->data);
        }	

		
	}


	
	public function changeaccountstatus($id)
	{		
		$response = array();

		if($id) {
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'Status' => $this->input->post('status'),
	        	);

	        	$update = $this->model_users->changestatus($id,$data);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updating the user account status';			
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



	public function profile()
	{
		$role = $this->session->userdata('role');
	
		$this->data['page_title'] = 'Profile';
		
		$acc_id = $this->session->userdata('id');

		$user_data = $this->model_users->getUserData($acc_id);
		$this->data['user_data'] = $user_data;

		$user_add = $this->model_users->getUserAddress($acc_id);
		$this->data['user_add'] = $user_add;

        		if($role == '1'):
                $this->render_template('users/profile', $this->data);
                elseif($role == '2'): 
                $this->render_template_new('users/profile', $this->data);
                elseif($role == '3'): 
                $this->render_template_who('users/profile', $this->data);
                endif; 
        		
	}

	public function adminsetting()
	{	
		$id = $this->session->userdata('id');
		
		$user_data = $this->model_users->getUserData($id);
		$this->data['user_data'] = $user_data;
		$user_id= $user_data['User_id'];
		$user_add = $this->model_users->getUserAddress($id);
		$this->data['user_add'] = $user_add;

		if($id) {
			$this->data['page_title'] = 'Edit Profile';
		

		$this->form_validation->set_rules('fname', 'firstname', 'trim|required');
		$this->form_validation->set_rules('sname', 'secondname', 'trim|required');
		$this->form_validation->set_rules('lname', 'lastname', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('scity', 'subcity', 'trim');
		$this->form_validation->set_rules('username', 'Username', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|matches[password]');
		
		$password=	password_hash($this->input->post('password'),PASSWORD_DEFAULT);


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))&&empty($this->input->post('username'))) {
		        	$data = array(
		        		'FirstName' => $this->input->post('fname'),
        				'SecondName' =>  $this->input->post('sname'),
        				'LastName'=> $this->input->post('lname')
		        	);
		      

		        	$update = $this->model_users->adminedit($data, $user_id, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/adminsetting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/adminsetting/', 'refresh');
		        	}
		        }
		        else {
		        	
		        	$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

						$data = array(
		        		'FirstName' => $this->input->post('fname'),
        				'SecondName' =>  $this->input->post('sname'),
        				'LastName'=> $this->input->post('lname')
		        		);

						$data1 = array(
			        		'Account_username' => $this->input->post('username'),
			        		'Account_password' => $password
			        	);
			        		

			        	$update = $this->model_users->adminedit($data, $user_id,$id,$data1);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/adminsetting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/adminsetting/', 'refresh');
			        	}
					}
			        else {
			            // false case
						$user_data = $this->model_users->getUserData($id);
						
						$this->data['user_data'] = $user_data;

						$user_add = $this->model_users->getUserAddress($id);
						$this->data['user_add'] = $user_add;

						$this->render_template('users/admin/adminsetting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	            		$user_data = $this->model_users->getUserData($id);
						
						$this->data['user_data'] = $user_data;

						$user_add = $this->model_users->getUserAddress($id);
						$this->data['user_add'] = $user_add;

						$this->render_template('users/admin/adminsetting', $this->data);	
	        }	
		}
	}
		

		public function retailsetting()
	{	

		$id = $this->session->userdata('id');
		$user_data = $this->model_users->getUserData($id);
		$this->data['user_data'] = $user_data;

		$user_id=  $user_data['User_id'];
		
		
		$user_add = $this->model_users->getUserAddress($id);
		$this->data['user_add'] = $user_add;



		if($id) {
			$this->data['page_title'] = 'Edit Profile';
			$this->form_validation->set_rules('fname', 'firstname', 'trim|required');
			$this->form_validation->set_rules('sname', 'secondname', 'trim|required');
			$this->form_validation->set_rules('lname', 'lastname', 'trim|required');
			$this->form_validation->set_rules('retname', 'retailname', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('scity', 'subcity', 'trim');
		
			$this->form_validation->set_rules('username', 'Username', 'trim');
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
			$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|matches[password]');
			


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword')) && empty($this->input->post('username'))) {
		        $data = array(
		                'FirstName' => $this->input->post('fname'),
		        		'SecondName' =>  $this->input->post('sname'),
		        		'LastName'=> $this->input->post('lname'), 
		        		'Retail_name' => $this->input->post('retname')
		        		 		
        		);
        		$data1 = array(
        					'Account_username' => $this ->session->userdata('username'),
			        		'Account_password' => $this->session->userdata('password')
        		);
		        	$update = $this->model_users->retailedit($data, $data1 , $user_id, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/retailsetting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/retailsetting/', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('username', 'Username', 'trim');
		        	$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

						 $data = array(
		                'FirstName' => $this->input->post('fname'),
		        		'SecondName' =>  $this->input->post('sname'),
		        		'LastName'=> $this->input->post('lname'), 
		        		'Retail_name' => $this->input->post('retname') 
		        			
        					);
						$data1 = array(
			        		'Account_username' => $this->input->post('username'),
			        		'Account_password' => $password
			        	);

			        	$update = $this->model_users->retailedit($data, $data1, $user_id , $id);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/retailsetting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/retailsetting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
						$this->data['user_data'] = $user_data;
												
						$user_add = $this->model_users->getUserAddress($id);
						$this->data['user_add'] = $user_add;


						$this->render_template_new('users/retailer/retailsetting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
				$this->data['user_data'] = $user_data;

				$user_add = $this->model_users->getUserAddress($id);
				$this->data['user_add'] = $user_add;


				$this->render_template_new('users/retailer/retailsetting', $this->data);	
	        }	
		}
	}
		


		public function wholesalesetting()
	{	
	

		$id = $this->session->userdata('id');
		$user_data = $this->model_users->getUserData($id);
		$this->data['user_data'] = $user_data;
		$user_id=$user_data['User_id'];
		// $user_b_acc_no = $user_data ['Bank_account_number'];
		// $lic_no = $user_data ['License_number'];
		// $w_name = $user_data['wholesale_name'];

		
		$user_add = $this->model_users->getUserAddress($id);
		$this->data['user_add'] = $user_add;


		$user_tin = $this->model_users->getUserTinData($id);
		$this->data['user_tin'] = $user_tin;


		if($id) {
				$this->data['page_title'] = 'Edit Profile';
		$this->form_validation->set_rules('fname', 'firstname', 'trim|required');
		$this->form_validation->set_rules('sname', 'secondname', 'trim|required');
		$this->form_validation->set_rules('lname', 'lastname', 'trim|required');
		$this->form_validation->set_rules('wname', 'Wholesalename', 'trim|required');
		$this->form_validation->set_rules('tno', 'TinNo', 'trim|required');
		$this->form_validation->set_rules('lno', 'License No', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('scity', 'subcity', 'trim|required');
		$this->form_validation->set_rules('mplace', 'marketplace', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|matches[password]');
		
		


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword')) && empty($this->input->post('username'))) {
		        	
		        	 $data = array(
                'FirstName' => $this->input->post('fname'),
        		'SecondName' =>  $this->input->post('sname'),
        		'LastName'=> $this->input->post('lname'), 
        		'wholesale_name' => $this->input->post('wname'), 	
        			);
		        	 $data1 = array(
        					'Account_username' => $this ->session->userdata('username'),
			        		'Account_password' => $this->session->userdata('password')
        		);

		        	$update = $this->model_users->wholesaleedit($data, $data1, $id, $user_id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/wholesalesetting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/wholesalesetting/', 'refresh');
		        	}
		        }
		        else {
		        	
		        	$this->form_validation->set_rules('username', 'Username', 'trim');
		        	$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|matches[password]');


					if($this->form_validation->run() == TRUE) {

						$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

						  	 $data = array(
			                'FirstName' => $this->input->post('fname'),
			        		'SecondName' =>  $this->input->post('sname'),
			        		'LastName'=> $this->input->post('lname'), 
			        		'wholesale_name' => $this->input->post('wname') 
			        );
						  	 $data1 = array(
			        		'Account_username' => $this->input->post('username'),
			        		'Account_password' => $password
			        	);

			        	$update = $this->model_users->wholesaleedit($data, $data1, $id, $user_id);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/wholesalesetting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/wholesalesetting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        		$user_data = $this->model_users->getUserData($id);
							$this->data['user_data'] = $user_data;
							
							$user_add = $this->model_users->getUserAddress($id);
							$this->data['user_add'] = $user_add;

							$user_tin = $this->model_users->getUserTinData($id);
							$this->data['user_tin'] = $user_tin;

						   $this->render_template_who('users/wholesaler/wholesalesetting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        				$user_data = $this->model_users->getUserData($id);
							$this->data['user_data'] = $user_data;
							
							$user_add = $this->model_users->getUserAddress($id);
							$this->data['user_add'] = $user_add;

							$user_tin = $this->model_users->getUserTinData($id);
							$this->data['user_tin'] = $user_tin;

							$this->render_template_who('users/wholesaler/wholesalesetting', $this->data);	
	        }	
		}
	}



		public function fetchWholeData()
	{
		$result = array('data' => array());

		$data = $this->model_users->getWholesaleData();


		foreach ($data as $key => $value) {

			// button
			$buttons = '';
		
				$buttons .= '<button type="button" class="btn btn-success" onclick="ActiveDeactiveFunc('.$value['User_id'].')" data-toggle="modal" data-target="#acdeaModal"><i class="fa fa-edit"></i></button>';
				$buttons .='  <a href="'.base_url('Users/WholesaleInfo/'.$value['User_id']).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';

			$result['data'][$key] = array(
				$value['FirstName'] .' '. $value['LastName'],
				$value['wholesale_name'],
				$buttons
			);
		}

		echo json_encode($result);
	} 




public function fetchRetailData()
	{
		$result = array('data' => array());

		$data = $this->model_users->getRetailData();


		foreach ($data as $key => $value) {

			// button
			$buttons = '';

		
				$buttons .= '<button type="button" class="btn btn-success" onclick="ActiveDeactiveFunc('.$value['User_id'].')" data-toggle="modal" data-target="#acdeaModal"><i class="fa fa-edit"></i></button>';

				
				$buttons .='  <a href="'.base_url('Users/RetailInfo/'.$value['User_id']).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';

			$result['data'][$key] = array(
				$value['FirstName'] .' '. $value['LastName'],
				$value['Retail_name'],
				$buttons
			);
		} 

		echo json_encode($result);
	}




	public function fetchAdminData()
	{
		$result = array('data' => array());

		$data = $this->model_users->getAdminData();
		

		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			
				$buttons .= '<button type="button" class="btn btn-success" onclick="ActiveDeactiveFunc('.$value['User_id'].')" data-toggle="modal" data-target="#acdeaModal"><i class="fa fa-edit"></i></button>';
				$buttons .='  <a href="'.base_url('Users/AdminInfo/'.$value['User_id']).'" class="btn btn-default"><i class="fa fa-eye"></i></a>';


			$result['data'][$key] = array(
				$value['FirstName'],
				$value ['SecondName'],
				$value['LastName'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}





		public function fetchWholesaleDataById($id) 
	{
		if($id) {
			$data = $this->model_users->getWholesaleData($id);
			echo json_encode($data);
		}

		return false;
	}
	public function fetchRetailDataById($id) 
	{
		if($id) {
			$data = $this->model_users->getRetailData($id);
			echo json_encode($data);
		}

		return false;
	}

		public function fetchAdminDataById($id) 
	{
		if($id) {
			$data = $this->model_users->getAdminData($id);
			echo json_encode($data);
		}

		return false;
	}
	
	public function RetailInfo($id){


		$ret_data = $this->model_users->getRetailData($id);
		$this->data['ret_data'] = $ret_data;

		$ret_add = $this->model_users->getAddress($id);
		$this->data['ret_add'] = $ret_add;
		
		$strtimestamp = $ret_data['Registration_date'];
         $date = date('d/m/Y', strtotime($strtimestamp));
         $this->data['date_data'] = $date;

		$ret_bank = $this->model_users->getBankData($id);
		$this->data['ret_bank'] = $ret_bank;

		$ret_acc= $this->model_users->getAccountData($id);
		$this->data['ret_acc'] = $ret_acc;
		

        $this->render_template('users/retailer/retailinfo', $this->data);


	}
	public function WholesaleInfo($id){


		$who_data = $this->model_users->getWholesaleData($id);
		$this->data['who_data'] = $who_data;

		$who_add = $this->model_users->getAddress($id);
		$this->data['who_add'] = $who_add;

		$strtimestamp = $who_data['Registration_date'];
         $date = date('d/m/Y', strtotime($strtimestamp));
         $this->data['date_data'] = $date;

		$who_bank = $this->model_users->getBankData($id);
		$this->data['who_bank'] = $who_bank;

		$who_acc= $this->model_users->getAccountData($id);
		$this->data['who_acc'] = $who_acc;

		$who_tin= $this->model_users->getTinData($id);
		$this->data['who_tin'] = $who_tin;

		$who_stock_data = $this->model_stock->getuserstockid($id);
		$this->data['who_stock_data'] = $who_stock_data;
		

        $this->render_template('users/wholesaler/wholesaleinfo', $this->data);


	}
	
	public function AdminInfo($id){


		$ad_data = $this->model_users->getAdminData($id);
		$this->data['ad_data'] = $ad_data;

		 $strtimestamp = $ad_data['Registration_date'];
         $date = date('d/m/Y', strtotime($strtimestamp));
         $this->data['date_data'] = $date;

		$ad_add = $this->model_users->getAddress($id);
		$this->data['ad_add'] = $ad_add;

		$ad_acc= $this->model_users->getAccountData($id);
		$this->data['ad_acc'] = $ad_acc;

        $this->render_template('users/admin/admininfo', $this->data);


	}
	





}