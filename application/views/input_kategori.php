<html>
<head>
</head>
<body>
<a href="<?php echo base_url();?>home/dashboard">Dashboard</a> |<br/>
<?php
if(isset($array))
{
	if($array["sukses"] == "input1")
	{
		echo "Kategori ".$array["kategori"]." Berhasil Diinput.";
	}
	elseif($array["sukses"] == "input00")
	{
		echo "Input Kategori Gagal, ".$array["kategori"]." Sudah Ada.";
	}
	elseif($array["sukses"] == "input000")
	{
		echo "Kategori Tidak Boleh Kosong.";
	}
	else
	{
		echo "Input Kategori Gagal, Coba Kembali Beberapa Saat Lagi.";
	}
}
?>
<br/>
<form method="post" action="<?php echo base_url();?>home/input/kategori/action">
<input type="text" name="kategori" value="" autocomplete=off required="required" /><br/>
<input type="submit" name="submit" value="Submit"/>
</form>
</body>
</html>