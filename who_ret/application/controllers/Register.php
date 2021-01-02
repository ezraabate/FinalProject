<?php 

	class Register extends Admin_Controller 
	{
            public function __construct()
    {
        parent::__construct();

        $this->load->model('model_users');
        $this->load->model('model_category');
        
    }
    
		public function index()
		{
            $this->data['categData'] = $this->model_category->getCategoryData();
			$this->load->view('users/public_signup',$this->data);


		}


		

		public function registerRetailer()
		{
          // $this->load->model('model_users');
          // $this->load->model('model_category');
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

                      
				
        
        $password=  password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $subs = $this->input->post('subs');

        if ($this->form_validation->run() === TRUE) {

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
                redirect('register', 'refresh');
                
        	}
        	else {

        		$this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('register', 'refresh');
                
        	}
        }

        else{
            // $cat_data = $this->model_category->getCategoryData();
            // $this->data['cat_data'] = $cat_data;
            $this->data['categData'] = $this->model_category->getCategoryData();
            $this->load->view('users/public_signup',$this->data);


            // echo validation_errors(); 
            // redirect('register','refresh');
            
        }
        
	
		}
                

                public function registerWholesaler()
        {
            
            // $this->load->model('model_users');
            // $this->load->model('model_category');
        $this->form_validation->set_rules('fname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('sname', 'secondname', 'trim|required');
        $this->form_validation->set_rules('lname', 'lastname', 'trim|required');
        $this->form_validation->set_rules('wname', 'Wholesalename', 'trim|required');
        $this->form_validation->set_rules('tno', 'TinNo', 'trim|required|is_unique[tinlicense.TIN_number]');
        $this->form_validation->set_rules('lno', 'License No', 'trim|required|is_unique[tinlicense.License_number]');
        $this->form_validation->set_rules('phone', 'Phone No', 'trim|required|is_unique[address.phone_number]');
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[address.email]');
        $this->form_validation->set_rules('city', 'City', 'trim');
        $this->form_validation->set_rules('scity', 'subcity', 'trim');
        $this->form_validation->set_rules('mplace', 'marketplace', 'trim');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
        $password=  password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $subs = $this->input->post('subs');

            if ($this->form_validation->run() === TRUE) {
                 $this->load->model('model_users');
                 if(!empty($_FILES['photo']['name'])){

                $config['upload_path'] =  './images/';
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['max_width'] = '1024';
                $config['max_height'] = '786';
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

            // $password=   password_hash($this->input->post('password'),PASSWORD_DEFAULT);

            $create = $this->model_users->createwholesale($data,$password,$subs);
            if($create) {
                $this->session->set_flashdata('success', 'Successfully Registered');
                redirect('register', 'refresh');
                
            }
            else {
                
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('register', 'refresh');
                
        }
    }
    else{
        $this->data['categData'] = $this->model_category->getCategoryData();
        $this->load->view('users/public_signup',$this->data);

            // echo validation_errors(); 
            // redirect('register','refresh');
    }

    }

		
	}


 ?>