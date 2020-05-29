<?php 

class Model extends CI_model
{
	function inputkategori()
	{
		$kategori = $this->input->post("categoryname");
		
		if (strlen(trim($kategori)) == 0)
		{
			return array(
    'kategori' => $kategori,
    'sukses' => 'input000'
);
		}
		else
		{
		$query = $this->db->query("select * from kategori_keyword where nama_kategori_keyword='$kategori'");
		
		if($query->num_rows()==0)
		{
		
		$simpan = array(
		'nama_kategori_keyword' => $kategori
		);
		
		$this->db->insert('kategori_keyword', $simpan);
		if($this->db->affected_rows() > 0)
{
  return array(
    'kategori' => $kategori,
    'sukses' => 'input1'
);
}
else
{
	return array(
    'kategori' => $kategori,
    'sukses' => 'input0'
);
}
		}
		else
		{
	return array(
    'kategori' => $kategori,
    'sukses' => 'input00'
);
		}
		}
	}
	
	function getkategori()
	{
		$query = $this->db->query("select * from kategori_keyword order by nama_kategori_keyword ASC");
		//foreach($query->result() as $isi)
		//{
			//$id_kategori[] = $isi->id_kategori_keyword;
			//$nama_kategori[] = $isi->nama_kategori_keyword;
		//}
		
		//return array(
   // 'id_kategori' => $id_kategori,
   // 'nama_kategori' => $nama_kategori
//);
	return $query;
	}
	
	function getkategori1()
	{
		$query = $this->db->query("select * from kategori_keyword order by nama_kategori_keyword ASC");
		foreach($query->result() as $isi)
		{
			$id_kategori[] = $isi->id_kategori_keyword;
			$nama_kategori[] = $isi->nama_kategori_keyword;
		}
		
		return array(
    'id_kategori' => $id_kategori,
    'nama_kategori' => $nama_kategori
);
	}
	
	function deletekategori($id)
	{
		$this->load->helper(array('url'));
		$this->db->where('id_kategori_keyword', $id);
		$this->db->delete('kategori_keyword');
	}
	
	function deletekeyword($id)
	{
		$this->load->helper(array('url'));
		$this->db->where('id_keyword', $id);
		$this->db->delete('keyword');
	}
	
	function inputkeyword()
	{
		$arraysukses = array();
		$arraygagal = array();
		$idkat = $this->input->post('kategori');
		if (strlen(trim($idkat)) != 0)
		{
		$keyword =  trim($this->input->post('keyword'));
		$textAr = explode("\n", $keyword);
		$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind
		foreach ($textAr as $line)
{
	$line = preg_replace( "/\r|\n/", "", $line );
	$line = str_replace("'","",$line);
	$line = str_replace(">","",$line);
	$line = str_replace(":","",$line);
    // processing here. 
	$query = $this->db->query("select * from keyword INNER JOIN kategori_keyword ON keyword.id_kategori_keyword = kategori_keyword.id_kategori_keyword and keyword.nama_keyword='".$line."'");
	if($query->num_rows()==0)
		{
			$simpan = array(
		'id_kategori_keyword' => $idkat,
		'nama_keyword' => $line,
		'tanggal_keyword' => date('Y-m-d H:i:s')
		);
		
		$this->db->insert('keyword', $simpan);
		
		if($this->db->affected_rows() > 0)
{
	$arraysukses[] = $line;
}
		}
	else
		{
			foreach($query->result() as $isi)
			{
				$namakat = $isi->nama_kategori_keyword;
				$arraygagal[] = "".$line." (".$namakat.")";
			}
		}
}
	
		}
		else
		{
			$arraygagal[] = "Kategori Tidak Boleh Kosong";
		}
		return array(
    'sukses' => $arraysukses,
    'gagal' => $arraygagal
);
	}
	
	function inputuser()
	{
		$username = $this->input->post('username');
		$query = $this->db->query("select * from user where username = '".$username."'");
		if($query->num_rows()==0)
		{
		$simpan = array(
		'username' => $username,
		'nama_user' => $this->input->post('nama'),
		'password_user' => $this->input->post('password')
		);
		
		$this->db->insert('user', $simpan);
		}
	}
	
	function deleteuser($id)
	{
		$this->load->helper(array('url'));
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}
	
	function inputresult()
	{
		if($this->input->post('teks') != "")
		{
		$username = $this->input->post("username");
		$query = $this->db->query("select * from result where username = '".$username."'");
		if($query->num_rows()==0)
		{
			//insert
			$simpan = array(
		'username' => $username,
		'waktu' => date('Y-m-d H:i:s')
		);
			$this->db->insert('result', $simpan);
		}
		else
		{
			//update
			$simpan = array(
		'waktu' => date('Y-m-d H:i:s')
		);
			$this->db->where('username', $username);
			$this->db->update('result', $simpan); 
		}
		
		$query = $this->db->query("select * from result where username = '".$username."'");
		foreach($query->result() as $isi)
		{
			$idresult = $isi->id_result;
		}
		
		$this->db->where('id_result', $idresult);
		$this->db->delete('result_temp');
		
		$keyword =  trim($this->input->post('teks'));
		$textAr = explode("\n", $keyword);
		$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind
		$querykeyword = $this->db->query("select * from keyword inner join kategori_Keyword where kategori_keyword.id_kategori_keyword = keyword.id_kategori_keyword order by id_keyword ASC");
		$querykategory = $this->db->query("select * from kategori_keyword order by nama_kategori_keyword ASC");
		
		$arrayresult = array();
		foreach($querykategory->result() as $isikategory)
			{
				$arraytotal["".$isikategory->nama_kategori_keyword.""] = "0";
			}
			
				foreach ($textAr as $key=>$line)
		{
			foreach($querykategory->result() as $isikategory)
			{
				$arrayresult[$key]["".$isikategory->nama_kategori_keyword.""] = "0";
			}
			foreach($querykeyword->result() as $isikeyword)
			{
				
				if (!!preg_match('#\b' . preg_quote("".strtolower($isikeyword->nama_keyword)."", '#') . '\b#i', "".strtolower($line).""))
				{
					$arrayresult[$key]["".$isikeyword->nama_kategori_keyword.""] = "1";
					$arraytotal["".$isikeyword->nama_kategori_keyword.""] = $arraytotal["".$isikeyword->nama_kategori_keyword.""] + 1;
				}
				
			}
		}
			
		foreach($querykategory->result() as $isikategory)
			{
				if($isikategory->nama_kategori_keyword != "Female")
				{
				$arrayresultakhir["Female"][$isikategory->nama_kategori_keyword] = 0;
				}
				
				if($isikategory->nama_kategori_keyword != "16-25 tahun")
				{
				$arrayresultakhir_age["16-25 tahun"][$isikategory->nama_kategori_keyword] = 0;
				}
				
				if($isikategory->nama_kategori_keyword != "Sentiment -")
				{
				$arrayresultakhir_min["Sentiment -"][$isikategory->nama_kategori_keyword] = 0;
				}
				
				if($isikategory->nama_kategori_keyword != "Sentiment +")
				{
				$arrayresultakhir_plus["Sentiment +"][$isikategory->nama_kategori_keyword] = 0;
				}
			}
			
		foreach ($textAr as $key=>$line)
		{
		foreach($querykategory->result() as $isikategory)
			{
				if($isikategory->nama_kategori_keyword != "Female")
				{
					if($arrayresult[$key]["Female"] == 1 && $arrayresult[$key][$isikategory->nama_kategori_keyword] == 1)
					{
						$arrayresultakhir["Female"][$isikategory->nama_kategori_keyword] = $arrayresultakhir["Female"][$isikategory->nama_kategori_keyword] + 1;
					}
				}
				
				if($isikategory->nama_kategori_keyword != "16-25 tahun")
				{
					if($arrayresult[$key]["16-25 tahun"] == 1 && $arrayresult[$key][$isikategory->nama_kategori_keyword] == 1)
					{
						$arrayresultakhir_age["16-25 tahun"][$isikategory->nama_kategori_keyword] = $arrayresultakhir_age["16-25 tahun"][$isikategory->nama_kategori_keyword] + 1;
					}
				}
				
				if($isikategory->nama_kategori_keyword != "Sentiment -")
				{
					if($arrayresult[$key]["Sentiment -"] == 1 && $arrayresult[$key][$isikategory->nama_kategori_keyword] == 1)
					{
						$arrayresultakhir_min["Sentiment -"][$isikategory->nama_kategori_keyword] = $arrayresultakhir_min["Sentiment -"][$isikategory->nama_kategori_keyword] + 1;
					}
				}
				
				if($isikategory->nama_kategori_keyword != "Sentiment +")
				{
					if($arrayresult[$key]["Sentiment +"] == 1 && $arrayresult[$key][$isikategory->nama_kategori_keyword] == 1)
					{
						$arrayresultakhir_plus["Sentiment +"][$isikategory->nama_kategori_keyword] = $arrayresultakhir_plus["Sentiment +"][$isikategory->nama_kategori_keyword] + 1;
					}
				}
			}
		}
		
		
		foreach($arraytotal as $key=>$isi)
		{
			$simpan = array(
		'id_result' => $idresult,
		'kategori_1' => $key,
		'kategori_2' => "0",
		'hasil' => $isi
		);
			$this->db->insert('result_temp', $simpan);
		}
		
		foreach($arrayresultakhir as $key=>$isi)
		{
			foreach($isi as $key1=>$value)
			{
				$simpan = array(
		'id_result' => $idresult,
		'kategori_1' => $key,
		'kategori_2' => $key1,
		'hasil' => $value
		);
			$this->db->insert('result_temp', $simpan);
			}
		}
		
		foreach($arrayresultakhir_age as $key=>$isi)
		{
			foreach($isi as $key1=>$value)
			{
				$simpan = array(
		'id_result' => $idresult,
		'kategori_1' => $key,
		'kategori_2' => $key1,
		'hasil' => $value
		);
			$this->db->insert('result_temp', $simpan);
			}
		}
		
		foreach($arrayresultakhir_min as $key=>$isi)
		{
			foreach($isi as $key1=>$value)
			{
				$simpan = array(
		'id_result' => $idresult,
		'kategori_1' => $key,
		'kategori_2' => $key1,
		'hasil' => $value
		);
			$this->db->insert('result_temp', $simpan);
			}
		}
		
		foreach($arrayresultakhir_plus as $key=>$isi)
		{
			foreach($isi as $key1=>$value)
			{
				$simpan = array(
		'id_result' => $idresult,
		'kategori_1' => $key,
		'kategori_2' => $key1,
		'hasil' => $value
		);
			$this->db->insert('result_temp', $simpan);
			}
		}
		
		}
		else
		{
			$username = $this->input->post("username");
		}
		
		$filename = $_FILES['userfile']['name'];
		if($filename != "")
		{
		$namafolder = md5($username);
		
		if (!file_exists('./assets/excel/'.$namafolder.''))
		{
		mkdir('./assets/excel/'.$namafolder.'', 0777, true);
		}
		
		foreach (glob("./assets/excel/".$namafolder."/*") as $excelname)
		{
		$namaexcel = pathinfo($excelname)['basename'];
		}
		
		if(isset($namaexcel))
		{
		if (file_exists('./assets/excel/'.$namafolder.'/'.$namaexcel.''))
		{
		unlink('./assets/excel/'.$namafolder.'/'.$namaexcel.'');
		}
		}
		
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$namafile = "excel.".$ext."";
		
		$config['upload_path'] = './assets/excel/'.$namafolder.''; //path folder 
		$config['allowed_types'] = 'xlsx|xls'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '327680'; //maksimum besar file 2M 
		//$config['max_width'] = '3264'; //lebar maksimum 1288 px 
		//$config['max_height'] = '3264'; //tinggi maksimu 768 px 
		$config['file_name'] = $namafile; //nama yang terupload nantinya
		
		$this->upload->initialize($config);
		$this->upload->do_upload('userfile');
		
		}
		
		return $username;
	}
	
}
?>