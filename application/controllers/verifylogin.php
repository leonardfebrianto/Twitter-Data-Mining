<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class verifylogin extends CI_Controller {
 function __construct()
 {
   parent::__construct();
   $this->load->model('usermodel','',TRUE);
 }
 function index()
 {
	 if($this->input->post('submit')){
   //Aksi untuk melakukan validasi
   $this->load->library('form_validation');
   $this->load->helper('security');
   $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
   if($this->form_validation->run() == FALSE)
   {
     //Jika validasi gagal user akan diarahkan kembali ke halaman login
    // $this->load->view('login');
	 redirect('', 'refresh');
	 
   }
   else
   {
     //Jika berhasil user akan di arahkan ke private area
     redirect('home/dashboard/', 'refresh');
   }
 }
 else
 {
redirect('', 'refresh');
 }
 }

 function check_database($password)
 {
   //validasi field terhadap database
   $username = $this->input->post('username');
   //query ke database
   $result = $this->usermodel->login($username, $password);
   
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', '<font color="red"><b>Invalid username or password</b></font>');
     return false;
   }
 }
}
?>
