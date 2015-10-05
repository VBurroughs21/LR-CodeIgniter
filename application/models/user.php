<?php

class User extends CI_Model {
   
   function get_user($email)
   { 
       return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))
                         ->row_array();
   }

   function create($reg_info)
   {
   		$query = "INSERT INTO users(first_name, last_name, password, email, created_at, updated_at) 
   					VALUES(?,?,?,?,NOW(),NOW())";
   		$values = array($reg_info['first_name'], $reg_info['last_name'], $reg_info['password'], $reg_info['email']);

   		return $this->db->query($query, $values);
   }
}

?>