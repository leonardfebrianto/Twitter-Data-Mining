<?php
class usermodel extends CI_model{
     function login($username, $password)
 {
  $this -> db -> select('username, password_user');
   $this -> db -> from('user');
   $this -> db -> where('username', $username);
   $this -> db -> where('password_user', $password);
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 }