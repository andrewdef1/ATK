<?php

include ('koneksi.php');
$kddist = $_POST['kodedist'];
$kdnota = $_POST['kodenota'];
$tgl = $_POST['tanggal'];
$divisi = $_POST['divisi'];
$kdatk = $_POST['kodeatk'];
$namaatk = $_POST['namaatk'];
$jenisatk = $_POST['jenis'];
$jumlah = $_POST['jumlah'];
$satuan = $_POST['satuan'];
$update = mysql_query("update data_distribusi set tgl='$tgl', kode_distribusi='$kddist', kode_nota='$kdnota', divisi_penerima='$divisi', kode_atk='$kdatk', nama_atk='$namaatk', jenis_atk='$jenisatk', jumlah='$jumlah', satuan='$satuan' where kode_distribusi='$kddist'");
if ($update) {
	echo "<script>window.location='?cat=distribusi&page=distribusi'</script>";
  
} else {
    echo "gagal mengupdate data";
}
?>