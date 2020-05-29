<?php
//$array = array();
ini_set('max_execution_time', 3600); 
ini_set('memory_limit','2048M');
class Home extends CI_controller{

	function index()
	{
		if($this->session->userdata('logged_in'))
		{
        redirect('home/dashboard'); 
		}
		else
		{
		redirect('home/login');
		}
    }
	
	function test()
	{
		echo trim("123 asd qwe");
	}
	
	function dashboard()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$data["tipe"] = "Dashboard";
			if($username == "admin")
			{
				$this->load->view("dashboard_admin", $data);
			}
			else
			{
				$data["username"] = $username;
				$this->load->view("dashboard_user", $data);
			}
		}
		else
		{
		redirect('home/login');
		}
	}
	
	function kategori($param1 = null, $param2 = null)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			if($username == "admin")
			{
				$data["tipe"] = "Category";
				$this->load->model('Model');
				
				//$data["id_kategori"] = $kategori["id_kategori"];
				//$data["nama_kategori"] = $kategori["nama_kategori"];
				$kategori = $this->Model->getkategori();
				$data["query_kategori"] = $kategori;
				if($param1 == null and $param2 == null)
				{
				$this->load->view("kategori", $data);
				}
				elseif($param1 == "input" and $param2 == null)
				{
					if($this->input->post('submit'))
					{
					
					$sukses = $this->Model->inputkategori();
					$data["array"] = $sukses;
					$kategori = $this->Model->getkategori();
					$data["query_kategori"] = $kategori;
					$this->load->view("kategori", $data);
					}
					else
					{
						redirect('home/kategori');
					}
				}
				elseif($param1 == "delete" and $param2 != null)
				{
					$this->Model->deletekategori($param2);
					redirect('home/kategori');
				}
				else
				{
					redirect('home/kategori');
				}
			}
			else
			{
				redirect('home/dashboard'); 
			}
		}
		else
		{
		redirect('home/login');
		}
	}
	
	function keyword($param1 = null, $param2 = null)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			if($username == "admin")
			{
				$this->load->model('Model');
				$kategori = $this->Model->getkategori();
				$data["tipe"] = "Keyword";
				$data["query_kategori"] = $kategori;
				if($param1 == null and $param2 == null)
				{
					$this->load->view("keyword", $data);
				}
				elseif($param1 == "input" and $param2 == null)
				{
					if($this->input->post('submit'))
					{
					$sukses = $this->Model->inputkeyword();
					$data["totalsukses"] = count($sukses["sukses"]);
					$data["sukses"] = $sukses["sukses"];
					$data["totalgagal"] = count($sukses["gagal"]);
					$data["gagal"] = $sukses["gagal"];
					$this->load->view("keyword", $data);
					}
					else
					{
						redirect('home/keyword');
					}
				}
				elseif($param1 == "list" and $param2 == null)
				{
					$this->load->view("keyword_list", $data);
				}
				elseif($param1 == "delete" and $param2 != null)
				{
					$this->Model->deletekeyword($param2);
					redirect('home/keyword/list');
				}
				else
				{
					redirect('home/keyword');
				}
			}
			else
			{
				redirect('home/dashboard'); 
			}
		}
		else
		{
			redirect('home/login');
		}
	}
	
	function result($param1 = null, $param2 = null)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			if($username == "admin")
			{
				$this->load->model('Model');
				$this->load->library('upload');
				$data["tipe"] = "Result";
				if($param1 == null and $param2 == null)
				{
					$this->load->view("result", $data);
				}
				elseif($param1 == "input" and $param2 == null)
				{
					if($this->input->post('submit'))
					{
						$username = $this->Model->inputresult();
						if($username != "0")
						{
						redirect('home/result/list/'.$username.'');
						}
						else
						{
						redirect('home/result');	
						}
					}
					else
					{
						redirect('home/result');
					}
				}
				elseif($param1 == "list" and $param2 != null)
				{
					$data["username"] = $param2;
					$data["login"] = $username;
					$this->load->view("result_list", $data);
				}
				else
				{
					redirect('home/result');
				}
			}
			else
			{
				$data["username"] = $username;
				$data["login"] = $username;
				$data["tipe"] = "Result";
				$this->load->view("result_list", $data);
			}
		}
		else
		{
			redirect('home/login');
		}
	}
	
	function user($param1 = null, $param2 = null)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			if($username == "admin")
			{
				$this->load->model('Model');
				$data["tipe"] = "User";
				if($param1 == null and $param2 == null)
				{
					$this->load->view("user", $data);
				}
				elseif($param1 == "input" and $param2 == null)
				{
					if($this->input->post('submit'))
					{
						$this->Model->inputuser();
						redirect('home/user');
					}
					else
					{
						redirect('home/user'); 
					}
				}
				elseif($param1 == "delete" and $param2 != null)
				{
					$this->Model->deleteuser($param2);
					redirect('home/user');
				}
				else
				{
					redirect('home/user'); 
				}
			}
			else
			{
				redirect('home/dashboard'); 
			}
		}
		else
		{
			redirect('home/login');
		}
	}
	
	function input($param1 = null, $param2 = null)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			if($username == "admin")
			{
				if($param1 == "kategori" and $param2 == null)
				{
					$this->load->view("input_kategori");
				}
				elseif($param1 == "kategori" and $param2 == "action")
				{
					if($this->input->post('submit'))
					{
					$this->load->model('Model');
					$sukses = $this->Model->inputkategori();
					$array["array"] = $sukses;
					$this->load->view("input_kategori", $array);
					}
					else
					{
						redirect('home/input/kategori');
					}
				}
				elseif($param1 == "keyword" and $param2 == null)
				{
					$this->load->model('Model');
					$kategori = $this->Model->getkategori1();
					$array["id_kategori"] = $kategori["id_kategori"];
					$array["nama_kategori"] = $kategori["nama_kategori"];
					$this->load->view("input_keyword", $array);
				}
				elseif($param1 == "keyword" and $param2 == "action")
				{
					if($this->input->post('submit'))
					{
					$this->load->model('Model');
					$sukses = $this->Model->inputkeyword();
					$array["totalsukses"] = count($sukses["sukses"]);
					$array["sukses"] = $sukses["sukses"];
					$array["totalgagal"] = count($sukses["gagal"]);
					$array["gagal"] = $sukses["gagal"];
					$kategori = $this->Model->getkategori();
					$array["id_kategori"] = $kategori["id_kategori"];
					$array["nama_kategori"] = $kategori["nama_kategori"];
					$this->load->view("input_keyword", $array);
					}
					else
					{
						redirect('home/input/keyword');
					}
				}
				elseif($param1 == "result" and $param2 == null)
				{
					$this->load->view("input_result");
				}
				else
				{
					redirect('home/dashboard'); 
				}
			}
			else
			{
				redirect('home/dashboard'); 
			}
		}
		else
		{
		redirect('home/login');
		}
	}
	
	function login()
	{
		if($this->session->userdata('logged_in'))
		{
        redirect('home/dashboard'); 
		}
		else
		{
		$this->load->view("login");
		}
	}
	
	function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('', 'refresh');
    }
}
?>