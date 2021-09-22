<?php

include ('koneksi.php');
$kdnota = $_POST['kodenota'];
$tgl = $_POST['tanggal'];
$divisi = $_POST['divisi'];
$kdatk = $_POST['kodeatk'];
$namaatk = $_POST['namaatk'];
$jumlah = $_POST['jumlah'];
$satuan = $_POST['satuan'];
$update = mysql_query("update data_nota set tgl='$tgl', kode_nota='$kdnota', divisi='$divisi', kode_atk='$kdatk', nama_atk='$namaatk', jumlah='$jumlah', satuan='$satuan' where kode_nota='$kdnota'");
if ($update) {
	echo "<script>window.location='?cat=nota&page=nota'</script>";
  
} else {
    echo "gagal mengupdate data";
}
?>