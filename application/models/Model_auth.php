<?php 

class Model_auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_username($username) 
	{
		if($username) {
			$sql = 'SELECT * FROM account WHERE Account_username = ?';
			$query = $this->db->query($sql, array($username));
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}

		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/
	
	public function login($username, $password) {
		if($username && $password) {
			$sql = "SELECT * FROM account WHERE Account_username = ? AND Status = '1'";
			$query = $this->db->query($sql, array($username));

			if($query->num_rows() == 1) {
				$result = $query->row_array();

				// $hash_password = password_verify($password, $result['Account_password']);
				if(password_verify($password, $result['Account_password'])) {
					return $result;	
				}
				else {
					return false;
				}

				
			}
			else {

				return false;
			}
		}
	}
	public function maxLoginAttempt($username)
  {
    $this->db->set('Status',0);
    $this->db->where('Account_username',$username);
    $this->db->update('account');

  }

  public function activateAccount($username)
  {
    $this->db->set('Status',1);
        $this->db->where('Account_username',$username);
        $this->db->update('account'); 
        
  }
  public function check_email($email){
  	 if($email){
      $sql = "SELECT * FROM account,address,user WHERE Email = ? AND account.Account_id = user.Account_id AND account.Status = '1' AND user.User_id = address.User_id";
      $query = $this->db->query($sql, array($email));

      if($query->num_rows() == 1) {
        return true;
      }
      else{
        return false;
      }
  }
  }
  public function getinfo($email){
  	  $sql = "SELECT * FROM account,user,address WHERE address.Email = ? AND user.Account_id = account.Account_id AND address.User_id = user.User_id";
      $query = $this->db->query($sql, array($email));
      return $query->row_array();
  }
  public function update($data,$id){
  	 if($data && $id){
    $this->db->where('Account_id', $id);
    $update = $this->db->update('account', $data);
  }
  return ($update == true) ? true : false;
  }

}