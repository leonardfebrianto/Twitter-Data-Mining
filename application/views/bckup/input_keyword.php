<html>
<head>
</head>
<body>
<?php
?>
<a href="<?php echo base_url();?>home/dashboard">Dashboard</a> |<br/>
<form method="post" action="<?php echo base_url();?>home/input/keyword/action">
<textarea name="keyword" required="required"></textarea><br/>
<select name="kategori" >
<option value=""></option>
<?php

	foreach($id_kategori as $idkatkey => $idkat)
	{
		?>
		<option value="<?php echo $idkat;?>"><?php echo "".$nama_kategori[$idkatkey].""; ?></option>
		<?php
		
	}
?>
</select>
<input type="submit" name="submit" value="Submit"/>
</form>
<?php
if(isset($totalsukses) or isset($totalgagal))
{
	echo "<b>Total Sukses = ".$totalsukses."</b><br/>";
	foreach($sukses as $isi)
	{
	echo "- ".$isi."<br/>";
	}
	echo "<b>Total Gagal = ".$totalgagal."</b><br/>";
	foreach($gagal as $isi)
	{
	echo "- ".$isi."<br/>";
	}
}
?>
</body>
</html>