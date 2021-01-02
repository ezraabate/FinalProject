 <?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($accId = null) 
	{
		if($accId) {
			$sql = "SELECT * FROM user WHERE Account_id = ?";
			$query = $this->db->query($sql, array($accId));
			$result = $query->row_array();
			return $result;

		}

		$sql = "SELECT * FROM user WHERE Account_id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

		public function getAccountData($Id = null) 
	{
		if($Id) {
			$sql = "SELECT * FROM user WHERE User_id = ?";
			$query = $this->db->query($sql, array($Id));
			$result = $query->row_array();

			$acc_id = $result['Account_id'];
			$sql = "SELECT * FROM account WHERE Account_id = ?";
			$query = $this->db->query($sql, array($acc_id));
			return $query->row_array();

		}

		$sql = "SELECT * FROM account WHERE User_id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}



	public function getUserAddress($Acc_Id = null) 
	{
		if($Acc_Id) {
			$sql = "SELECT * FROM user WHERE Account_id = ?";
			$query = $this->db->query($sql, array($Acc_Id));
			$result = $query->row_array();

			$u_id = $result['User_id'];
			$a_sql = "SELECT * FROM address WHERE User_id = ?";
			$a_query = $this->db->query($a_sql, array($u_id));
			$q_result = $a_query->row_array();
			return $q_result;
		}
	}

		public function getUserBankData($Accc_Id = null) 
	{
		if($Accc_Id) {
			$sql = "SELECT * FROM user WHERE Account_id = ?";
			$query = $this->db->query($sql, array($Accc_Id));
			$result = $query->row_array();

			$u_id = $result['User_id'];
			
			$b_sql = "SELECT * FROM bankaccount WHERE User_id = ?";
			$b_query = $this->db->query($b_sql, array($u_id));
			$b_result = $b_query->row_array();
			return $b_result;
		}
	}


			public function getBankData($Id = null) 
	{
		if($Id) {
			$b_sql = "SELECT * FROM bankaccount WHERE User_id = ?";
			$b_query = $this->db->query($b_sql, array($Id));
			$b_result = $b_query->row_array();
			return $b_result;
		}
	}
		public function getUserTinData($Ac_Id = null) 
	{
		if($Ac_Id) {
			$sql = "SELECT * FROM user WHERE Account_id = ?";
			$query = $this->db->query($sql, array($Ac_Id));
			$result = $query->row_array();

			$u_id = $result['User_id'];
			
			$t_sql = "SELECT * FROM tinlicense WHERE User_id = ?";
			$t_query = $this->db->query($t_sql, array($u_id));
			$t_result = $t_query->row_array();
			return $t_result;
		}
	}

			public function getTinData($Id = null) 
	{
		if($Id) {
			$t_sql = "SELECT * FROM tinlicense WHERE User_id = ?";
			$t_query = $this->db->query($t_sql, array($Id));
			$t_result = $t_query->row_array();
			return $t_result;
		}
	}

	public function getRetailData($User_id = null) 
	{
		if($User_id) {
			$sql = "SELECT * FROM user WHERE User_id = ? AND roleID = '2'";
			$query = $this->db->query($sql, array($User_id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM user WHERE roleID = '2'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getWholesaleData($User_id = null) 
	{
		if($User_id) {
			$sql = "SELECT * FROM user WHERE User_id = ? AND roleID = '3'";
			$query = $this->db->query($sql, array($User_id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM user WHERE roleID = '3'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getAdminData($User_id = null) 
	{
		if($User_id) {
			$sql = "SELECT * FROM user WHERE User_id = ? AND roleID = '1'";
			$query = $this->db->query($sql, array($User_id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM user WHERE roleID = '1'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function getAddress($User_id = null) 
	{
		if($User_id) {
			$add_sql = "SELECT * FROM address WHERE User_id = ?";
			$add_query = $this->db->query($add_sql, array($User_id));
			$q_result = $add_query->row_array();
			return $q_result;
		}
	}

	public function createAdmin($data = '',$password='')
	{

		if($data && $password) {
			$data2 = array(
        		'Account_username' => $this->input->post('username'),
        		'Account_password' =>  $password,
        		
        	);

        	$user_account_data = $this->db->insert('account', $data2);

        	$acc_id = $this->db->insert_id();

		$data += array(
			'Account_id' => $acc_id
		);

		$create = $this->db->insert('user', $data);

		$user_id = $this->db->insert_id();

		$data1 = array (
				'User_id' => $user_id,
        		'phone_number' => $this->input->post('phone'),
        		'City'=> $this->input->post('city'),
        		'SubCity' => $this->input->post('scity'),	
        		'Email' =>  $this->input->post('email')
        	);


        	$user_address_data = $this->db->insert('address', $data1);

			return ($create == true && $user_address_data == true && $user_account_data == true) ? true : false;
		}
	}



		public function createRetail($data = '',$password='',$subs = '')
	{

	
		if($data && $password && $subs) {

			$data2 = array(
        		'Account_username' => $this->input->post('username'),
        		'Account_password' =>  $password,
        		
        	);

        	$user_account_data = $this->db->insert('account', $data2);

        	$acc_id = $this->db->insert_id();

		$data += array(
			'Account_id' => $acc_id
		);

		$create = $this->db->insert('user', $data);

		$user_id = $this->db->insert_id();

		$data1 = array (
				'User_id' => $user_id,
        		'phone_number' => $this->input->post('phone'),
        		'City'=> $this->input->post('city'),
        		'SubCity' => $this->input->post('scity'),	
        		'Email' =>  $this->input->post('email')
        	);


        	$user_address_data = $this->db->insert('address', $data1);

			// $bankdata = array (
			// 	'Bank_account_number' => $this->input->post('baccno'),
   //      		'Bank_name' => $this->input->post('bankname'),
   //      		'User_id' => $user_id
   //      		);

   //      	$user_bank_data = $this->db->insert('bankaccount', $bankdata);

        	foreach ($subs as $subsk => $subsv) {
        	$subs_data = array(
        		'Categ_id' => $subsv,
        		'User_id' =>  $user_id
 	
        	);
        	$this->db->insert('subscribefor', $subs_data);
        	}
        	

			return ($create == true && $user_address_data == true && $user_account_data == true) ? true : false;
		}
	}
		public function createwholesale($data = '',$password='', $subs = '')
	{

		if($data && $password && $subs) {

		$data2 = array(
        		'Account_username' => $this->input->post('username'),
        		'Account_password' =>  $password,
        		
        	);

        	$user_account_data = $this->db->insert('account', $data2);

        	$acc_id = $this->db->insert_id();

		$data += array(
			'Account_id' => $acc_id
		);

		$create = $this->db->insert('user', $data);

		$user_id = $this->db->insert_id();

		$data1 = array (
				'User_id' => $user_id,
        		'phone_number' => $this->input->post('phone'),
        		'Email' =>  $this->input->post('email'),
        		'City'=> $this->input->post('city'),
        		'SubCity' => $this->input->post('scity'),	
        		'MarketPlace' => $this->input->post('mplace')
        	);


        	$user_address_data = $this->db->insert('address', $data1);

			// $bankdata = array (
			// 	'Bank_account_number' => $this->input->post('baccno'),
   //      		'Bank_name' => $this->input->post('bankname'),
   //      		'User_id' => $user_id
   //      		);

   //      	$user_bank_data = $this->db->insert('bankaccount', $bankdata);

        	$licensedata = array (
        		'License_number' => $this->input->post('lno'),
				'TIN_number' => $this->input->post('tno'),
				'User_id' => $user_id
        		);

        	$user_license_data = $this->db->insert('tinlicense', $licensedata);
			
        	$subs_data = array(
        		'Categ_id' => $subs,
        		'User_id' =>  $user_id
        	);
        	$this->db->insert('subscribefor', $subs_data);

        	$user_stock = array(
        		'Stock_name' => $this->input->post('stockname'),
        		'User_id' =>  $user_id
        	);
        	$this->db->insert('stock', $user_stock);
        	
        	
			return ($create == true && $user_address_data == true && $user_account_data == true && $user_license_data == true && $user_stock == true ) ? true : false;
		}
	}
				
	

	public function adminedit($data = '', $user_id = null, $acc_id = null, $data1 = '' )
	{

		$this->db->where('User_id', $user_id);
		$update = $this->db->update('user', $data);
		

		if($data1){
			$this->db->where('Account_id', $acc_id);
			$admin_account = $this->db->update('account' , $data1);
			}
			
			$data2 = array (
			 'phone_number' => $this->input->post('phone'),
			 'City'=> $this->input->post('city'),
			 'SubCity' => $this->input->post('scity'), 	
			 'Email' =>  $this->input->post('email')
        	);


			$this->db->where('User_id', $user_id);
			$admin_address = $this->db->update('address',$data2);
				

			
		return ($update == true || $admin_address == true || $admin_account == true) ? true : false;			
	}


	public function retailedit($data = '', $data1 = '' , $user_id = null, $ac_id = null)
	{
					

			$this->db->where('User_id', $user_id);
			$update = $this->db->update('user', $data);

			
			if($data1){		
			$this->db->where('Account_id', $ac_id);
			$retail_account = $this->db->update('account' , $data1);
			}
			
			$data2 = array (
			 'phone_number' => $this->input->post('phone'),
			 'City'=> $this->input->post('city'),
			 'SubCity' => $this->input->post('scity'), 	
			 'Email' =>  $this->input->post('email')
        	);


			$this->db->where('User_id', $user_id);
			$retail_address = $this->db->update('address',$data2);
				

			// return true;
		return ($update == true || $retail_account == true || $retail_address == true ) ? true : false;			
	}





	public function wholesaleedit($data = '', $data1 = '' , $acc_id = null, $user_id = null)
	{


        	
        	$licensedata = array (
        		'License_number' => $this->input->post('lno'),
				'TIN_number' => $this->input->post('tno')
        		);

        	$this->db->where('User_id', $user_id);
			$updatelicense = $this->db->update('tinlicense', $licensedata);

			$this->db->where('User_id', $user_id);
			$update = $this->db->update('user', $data);

			
			if($data1){		
			$this->db->where('Account_id', $acc_id);
			$wholesale_account = $this->db->update('account' , $data1);
			
			}
			
			$data2 = array (
			 'phone_number' => $this->input->post('phone'),
			 'City' => $this->input->post('city'),
			 'SubCity' => $this->input->post('scity'), 	
			 'Email' =>  $this->input->post('email'),
			 'MarketPlace' => $this->input->post('mplace')
        	);


			$this->db->where('User_id', $user_id);
			$wholesale_address = $this->db->update('address',$data2);
				

			// return true;
		return ($updatelicense == true || $update == true || $wholesale_account == true || $wholesale_address == true ) ? true : false;					
	}






	public function changestatus($id = null, $data = '')
	{
		if($id) {
			$sql = "SELECT * FROM user WHERE User_id = ?";
			$query = $this->db->query($sql, array($id));
			$result = $query->row_array();

			$acc_id = $result['Account_id'];
			$this->db->where('Account_id', $acc_id);
			$update = $this->db->update('account', $data);
		}
		return ($update == true) ? true : false;
	}

	public function countTotalRetailers()
	{
		$sql = "SELECT * FROM user WHERE roleID = '2' ";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	public function countTotalWholesalers()
	{
		$sql = "SELECT * FROM user WHERE roleID = '3' ";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
}