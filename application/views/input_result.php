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
	
	
		$keyword =  trim($_POST["stc"]);
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
				
			//if (strpos("".strtolower($line)."", "".strtolower($isikeyword->nama_keyword)."") !== false)
				if (!!preg_match('#\b' . preg_quote("".strtolower($isikeyword->nama_keyword)."", '#') . '\b#i', "".strtolower($line).""))
				{
					//$cek[] = strtolower($isikeyword->nama_keyword);
					$arrayresult[$key]["".$isikeyword->nama_kategori_keyword.""] = "1";
					$arraytotal["".$isikeyword->nama_kategori_keyword.""] = $arraytotal["".$isikeyword->nama_kategori_keyword.""] + 1;
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
				
				if($isikategory->nama_kategori_keyword != "16-25 tahun")
				{
				$arrayresultakhir_age["16-25 tahun"][$isikategory->nama_kategori_keyword] = 0;
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
						//$cek[] = $key;
						$arrayresultakhir["Female"][$isikategory->nama_kategori_keyword] = $arrayresultakhir["Female"][$isikategory->nama_kategori_keyword] + 1;
					}
				}
				
				if($isikategory->nama_kategori_keyword != "16-25 tahun")
				{
					if($arrayresult[$key]["16-25 tahun"] == 1 && $arrayresult[$key][$isikategory->nama_kategori_keyword] == 1)
					{
						//$cek[] = $key;
						$arrayresultakhir_age["16-25 tahun"][$isikategory->nama_kategori_keyword] = $arrayresultakhir_age["16-25 tahun"][$isikategory->nama_kategori_keyword] + 1;
					}
				}
			}
		}
		
		
		//print_r($cek);
		echo "<br/><br/>";
		//print_r($textAr);
		echo "<br/><br/>";
		print_r($arrayresultakhir);
		echo "<br/><br/>";
		print_r($arrayresultakhir_age);
		echo "<br/><br/>";
		print_r($arraytotal);
		echo "<br/>";
		echo "=========";
		echo "<br/>";
		foreach($arrayresultakhir_age as $key=>$isi)
		{
			foreach($isi as $key1=>$value)
			{
				echo "".$key." - ".$key1." - ".$value."";
				echo "<br/>";
			}
		}
}
?>
</body>
</html>