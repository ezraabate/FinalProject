<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_auth');
    $this->load->model('model_users');
    $this->data['page_title'] = 'Dashboard';
    if(!($this->session->blockTime))
    { 
      $us = $this->session->userdata('username');
      $this->model_auth->activateAccount($us);
      unset(

            $_SESSION['blockTime'],
            $_SESSION['username']
      );

                  
    }
    
	}

	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{
    $attempt = $this->session->userdata('attempt');
    $username = $this->input->post('username');
    $this->session->set_userdata('username',$username);
		$this->logged_in();

		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case

           	$username_exists = $this->model_auth->check_username($this->input->post('username'));

           	if($username_exists == TRUE) {
           		$login = $this->model_auth->login($this->input->post('username'), 
           			$this->input->post('pass'));

           		if($login) {
           				$login += array(
           					'id' => $login['Account_id'],
                    'username' => $login['Account_username'],
                    'password' => $login['Account_password'],
           					'log_in' => TRUE);

           				$this->session->set_userdata($login);

                  $user_data_login = $this->model_users->getUserData($this->session->userdata('id'));
                  $this->data['user_data_login'] = $user_data_login;
                  
                  $user_data_login = array(
                    'u_id' => $user_data_login['User_id'],
                    'fname' => $user_data_login['FirstName'],
                    'lname' => $user_data_login['LastName'],
                    'role' =>   $user_data_login['roleID'],
                    'photo' => $user_data_login['photo']

                  );
                 // $this->data['total_retailers'] = $this->model_users->countTotalRetailers();
                 // $this->data['total_wholesalers'] = $this->model_users->countTotalWholesalers();

                  $this->session->set_userdata($user_data_login);
           			  
                    if ($this->session->userdata('role') == '2') {
                      redirect('retailer_dashboard','refresh');
                    }else{
                    redirect('dashboard', 'refresh');
                    } 
           		}
           		else {

           			$attempt++;
                $this->session->set_userdata('attempt', $attempt);
                $this->data['errors'] = 'Incorrect username/password combination';
                
                if ($attempt >= 3)
                { 
                    $this->data['maxAttempt'] = 'Your account is blocked. Try again in';
                    $this->model_auth->maxLoginAttempt($username);
                    $this->session->set_tempdata('blockTime',TRUE,19);
                    header("Refresh:21; url=");
                    
                }
                $this->load->view('login', $this->data);
           		}
           	}
           	else {
           		$this->data['errors'] = 'Username does not exists';

           		$this->load->view('login', $this->data);
           	}	
        }
        else {
            // false case
            $this->load->view('login');
        }	
	}
  
 
      

//       public function createwholesalepublic()
//   {
    
//     $this->form_validation->set_rules('fnameww', 'firstname', 'trim|required');
//     $this->form_validation->set_rules('snameww', 'secondname', 'trim|required');
//     $this->form_validation->set_rules('lnameww', 'lastname', 'trim|required');
//     $this->form_validation->set_rules('wnameww', 'Wholesalename', 'trim|required');
//     $this->form_validation->set_rules('banknameww', 'BankName', 'trim|required');
//     $this->form_validation->set_rules('baccnoww', 'Bank Acc No', 'trim|required|is_unique[userbank.BankAccountNumber]');
//     $this->form_validation->set_rules('tnoww', 'TinNo', 'trim|required');
//     $this->form_validation->set_rules('lnoww', 'License No', 'trim|required|is_unique[tinlicense.License_number]');
//     $this->form_validation->set_rules('phoneww', 'Phone No', 'trim|required|is_unique[address.PhoneNumber]');
//     $this->form_validation->set_rules('emailww', 'Email', 'trim|required|is_unique[address.email]');
//     $this->form_validation->set_rules('cityww', 'City', 'trim');
//     $this->form_validation->set_rules('scityww', 'subcity', 'trim');
//     $this->form_validation->set_rules('mplaceww', 'marketplace', 'trim');
//     $this->form_validation->set_rules('rdateww', 'registrationdate', 'trim|required');
//     $this->form_validation->set_rules('usernameww', 'Username', 'trim|required');
//     $this->form_validation->set_rules('passwordww', 'Password', 'trim|required|min_length[8]');
//     $this->form_validation->set_rules('cpasswordww', 'Confirm password', 'trim|required|matches[password]');
//     $this->form_validation->set_rules('statusww', 'Status', 'trim|required');
//     $password=  password_hash($this->input->post('passwordww'),PASSWORD_DEFAULT);

//         if ($this->form_validation->run() == TRUE) {
//             // true case
//                  $data = array(
//                 'FirstName' => $this->input->post('fnameww'),
//             'SecondName' =>  $this->input->post('snameww'),
//             'LastName'=> $this->input->post('lnameww'), 
//             'wholesale_name' => $this->input->post('wnameww'), 
//             'Bank_account_number' => $this->input->post('baccnoww'),
//             'License_number' => $this->input->post('lnoww'),    
//             'Registration_date' => $this->input->post('rdateww'),
//             'Role' => '3' 
//           );

//           $create = $this->model_users->createwholesaleww($data,$password);
//           if($create == true) {
//             $this->session->set_flashdata('success', 'Successfully created');
//             redirect('users/public_signup', 'refresh');
//           }
//           else {
//             $this->session->set_flashdata('errors', 'Error occurred!!');
//             redirect('users/public_signup', 'refresh');
//           }
//         }
      

    
//   }

//     public function createretailpublic()
//   {
//     $this->data['page_title'] = 'New Retailers';
//     $this->form_validation->set_rules('fname', 'firstname', 'trim|required');
//     $this->form_validation->set_rules('sname', 'secondname', 'trim|required');
//     $this->form_validation->set_rules('lname', 'lastname', 'trim|required');
//     $this->form_validation->set_rules('retname', 'retailname', 'trim|required');
//     $this->form_validation->set_rules('bankname', 'BankName', 'trim|required');
//     $this->form_validation->set_rules('baccno', 'Bank Acc No', 'trim|required|is_unique[userbank.BankAccountNumber]');
//     $this->form_validation->set_rules('phone', 'Phone No', 'trim|required|is_unique[address.PhoneNumber]');
//     $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[address.email]');
//     $this->form_validation->set_rules('city', 'City', 'trim');
//     $this->form_validation->set_rules('scity', 'subcity', 'trim');
//     $this->form_validation->set_rules('rdate', 'registrationdate', 'trim|required');
//     $this->form_validation->set_rules('username', 'Username', 'trim|required');
//     $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
//     $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
//     $this->form_validation->set_rules('status', 'Status', 'trim|required');
//     $password=  password_hash($this->input->post('password'),PASSWORD_DEFAULT);

//         if ($this->form_validation->run() == TRUE) {
//             // true case
//                     $data = array(
//                 'FirstName' => $this->input->post('fname'),
//             'SecondName' =>  $this->input->post('sname'),
//             'LastName'=> $this->input->post('lname'), 
//             'Retail_name' => $this->input->post('retname'), 
//             'Bank_account_number' => $this->input->post('baccno'),    
//             'Registration_date' => $this->input->post('rdate'),
//             'Role' => '2' 
//           );

//           $create = $this->model_users->createRetail($data,$password);
//           if($create == true) {
//             $this->session->set_flashdata('success', 'Successfully created');
//             redirect('users/public_signup', 'refresh');
//           }
//           else {
//             $this->session->set_flashdata('errors', 'Error occurred!!');
//             redirect('users/public_signup', 'refresh');
//           }
// } 
//   }

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login', 'refresh');
	}
  public function forgetpassword(){
    $this->load->view('forgetpassword');
  }
    public function resetlink(){
    $email = $this->input->post('email');
    $result = $this->model_auth->check_email($email);
    if($result == true){
      $info = $this->model_auth->getinfo($email);
      $id = $info['Account_id'];

  $to =  $email;  
    $subject = 'Password Reset Link';

    $from = 'Logstics';              

    $emailContent = "Click the link below to reset your password <br> <a href='http://localhost:8085/who_ret/auth/reset/$id'>Click here</a> <br> From the admin team";

                
  $email_config = Array(
            'protocol'  => 'smtp.gmail.com',
            'smtp_host' => 'localhost',
            'smtp_port' => 587,
            'smtp_user' => 'ezraabate7@gmail.com',
            'smtp_pass' => 'localhost123',
            'mailtype'  => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE

        );

        $this->load->library('email', $email_config);

        $this->email->set_newline("\r\n");
        $this->email->from('ezraabate7');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($emailContent);

         if($this->email->send()){
          $this->session->set_flashdata('success', 'Password reset link have been sent to your email');
      redirect('auth/forgetpassword','refresh');
         }

    }else{
      $this->session->set_flashdata('error', 'Your email does not match with any of our records OR your account is blocked');
      redirect('auth/forgetpassword','refresh');
    }
    // $this->load->view('forgetpassword');
  }
  public function reset($id){
    $this->form_validation->set_rules('pass', 'Pass', 'trim|required');
    $this->form_validation->set_rules('cpass', 'Confirm password', 'trim|required|matches[pass]');
    $password=  password_hash($this->input->post('pass'),PASSWORD_DEFAULT);
        if ($this->form_validation->run() == TRUE) {
          $data = array(
            'Account_Password' => $password
          );
       
           $update = $this->model_auth->update($data,$id);
          if($update == true) {
            $this->session->set_flashdata('success', 'Password successfully changed you can now login with your new password');
            sleep(3);
            redirect('auth/login', 'refresh');
          }
          else {
            $this->session->set_flashdata('error', 'Error occurred!!');
            redirect('auth/reset/'.$id, 'refresh');
          }


        }

        else{
    $data = array(
      'a_id' => $id
    );
    $this->load->view('resetpass', $data);
  }
}

}
