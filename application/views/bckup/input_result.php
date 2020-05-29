<html>
<head>
</head>
<body>
<form method="post">
<textarea name="stc"></textarea><br/>
<input type="submit" name="submit" value="Submit"/>
</form>
<?php
if(isset($_POST["submit"]))
{
	$data =  trim($_POST["stc"]);
		$pattern = '/\?/';
		$replacement = '';
		$a = preg_replace($pattern, $replacement, $data);
		$pattern = '/\./';
		$replacement = '';
		$b = preg_replace($pattern, $replacement, $a);
		$pattern = '/\,/';
		$replacement = '';
		$c = preg_replace($pattern, $replacement, $b);
		$pattern = '/\!/';
		$replacement = '';
		$d = preg_replace($pattern, $replacement, $c);
		$e = preg_replace('/\s+/', ' ', $d);
		$result = array_count_values(explode(' ', $e));
		
		
		foreach($result as $x=>$x_value)
		{
			$word = str_replace("'","",$x);
			$query = $this->db->query("select * from keyword where nama_keyword='$word'");
			if($query->num_rows()<=0)
		{
			unset($result[$x]);
		}
		}
		
		
		print_r($result);
		
		$query = $this->db->query("select * from kategori_keyword");
		foreach($query->result() as $isi)
		{
		$totalkat["".$isi->nama_kategori_keyword.""] = "0";	
		}
		echo "<br/>";
		foreach($result as $x=>$x_value)
		{
			$word = str_replace("'","",$x);
			$query = $this->db->query("select * from keyword inner join kategori_keyword where kategori_keyword.id_kategori_keyword = keyword.id_kategori_keyword and keyword.nama_keyword = '$word'");
			foreach($query->result() as $isi)
			{
				$totalkat["".$isi->nama_kategori_keyword.""] = $totalkat["".$isi->nama_kategori_keyword.""] + $x_value;	
			}
		}
		
		print_r($totalkat);
		
	echo "<br/>";
	echo "============================";
	echo "<br/>";
	
		$keyword =  trim($_POST["stc"]);
		$textAr = explode("\n", $keyword);
		$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind
		$querykeyword = $this->db->query("select * from keyword inner join kategori_Keyword where kategori_keyword.id_kategori_keyword = keyword.id_kategori_keyword order by id_keyword ASC");
		$querykategory = $this->db->query("select * from kategori_keyword order by nama_kategori_keyword ASC");
		
		$arrayresult = array();
		
				foreach ($textAr as $key=>$line)
		{
			foreach($querykategory->result() as $isikategory)
			{
				$arrayresult[$key]["".$isikategory->nama_kategori_keyword.""] = "0";
			}
			foreach($querykeyword->result() as $isikeyword)
			{
				
			//if (strpos("".strtolower($line)."", "".strtolower($isikeyword->nama_keyword)."") !== false)
				if (!!preg_match('#\b' . preg_quote("".strtolower($isikeyword->nama_keyword)."", '#') . '\b#i', "".strtolower($line).""))
				{
					$cek[] = strtolower($isikeyword->nama_keyword);
					$arrayresult[$key]["".$isikeyword->nama_kategori_keyword.""] = "1";
				}
				
			}
		}
			
		//	foreach ($textAr as $key=>$line)
		//{
		//	echo "".$line." | ";
		//	foreach($querykategory->result() as $isikategory)
		//	{
			//	echo " | ".$isikategory->nama_kategori_keyword." : ".$arrayresult[$key][$isikategory->nama_kategori_keyword]." | ";
			//}
			//echo "<br/>";
		//}
		foreach($querykategory->result() as $isikategory)
			{
				if($isikategory->nama_kategori_keyword != "Female")
				{
				$arrayresultakhir["Female"][$isikategory->nama_kategori_keyword] = 0;
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
			}
		}
		
		print_r($cek);
}
?>
</body>
</html>