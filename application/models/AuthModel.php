<?php
/**
 * 
 */
class AuthModel extends CI_model
{
	public function setUserSignup($name,$email,$mobile,$pass,$rand)
	{

		

		$this->db->where("email",$email);
		$getM = $this->db->get("users_profile")->num_rows();
		if($getM > 0)
		{
			//Email Exist
			$return = "emlExst";
		}
		else
		{
			$this->db->where("mobile",$mobile);
		    $getMob = $this->db->get("users_profile")->num_rows();
		    if($getMob > 0)
		    {
		    	//Mobile Exist
		    	$return = "mobExst";
		    }
		    else
		    {
		    	//Insert
		    	$data = array
		    				(
		    					"name"=>$name,
		    					"email"=>$email,
		    					"mobile"=>$mobile,
		    					"status"=>0,
		    					"password"=>$pass,
		    					"verification_code"=>$rand
		    				);
		    	$this->db->insert("users_profile",$data);
		    	$return = "succ";
		    }
		}

		return $return;
	}

	public function signin($username,$password)
	{
		$this->db->where("email",$username);
		$this->db->or_where("mobile",$username);
		$get = $this->db->get("users_profile");
		if($get->num_rows()==0)
		{
			$return= ["statuss"=>"notExist"];
		}
		else
		{
			$row = $get->row();
			$status = $row->status;
			if($status ==0)
			{
				$return= ["statuss"=>"pend","email"=>$row->email];
			}
			else
			{
				$pass = $row->password;
				$ver = password_verify($password, $pass);
				if(!$ver)
				{
					$return = ["statuss"=>"wrong","email"=>$row->email];
				}
				else
				{
					$return = ["statuss"=>"succ","userId"=>$row->id];
				}
			}
		}

		return $return;
	}

	public function getTrue($username)
	{
		$seed = str_split('abc123456789defghijk1234567890lmnopqrstuvwxyz'
                     .'ABC123456789DEFGHIJK1234567890LMNOPQRSTUVWXYZ'
                     ); // and any other characters
	    shuffle($seed); // probably optional since array_is randomized; this may be redundant
	    $rand = '';
	    foreach (array_rand($seed, 50) as $k) $rand .= $seed[$k];
		$this->db->where("email",$username);
		$this->db->or_where("mobile",$username);
		$get = $this->db->get("users_profile");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $get->row();
			$this->db->where("email",$row->email);
			$set = $this->db->update("users_profile",["verification_code"=>$rand]);
			$data = ["email"=>$row->email,"code"=>$rand,"name"=>$row->name];
		}
		return $data;
	}
}