<?php
    include 'koneksi.php';

    $kode = $_GET['kode_atk'];
	
	$query = mysql_query("delete from data_atk where kode_atk='$kode'") or die(mysql_error());
	
if ($query) {
	header('location:dashboard.php?cat=administrator&page=search&ans=1');
}else{
    header('location:dashboard.php?cat=administrator&page=search&ans=0');
}
?>