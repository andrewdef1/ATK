<?php
include("../../_db.php");
?>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function sendValue (s,s2){

window.opener.document.getElementById('kodebarang').value = s;
window.opener.document.getElementById('namabarang').value = s2;
window.close();
}
//  End -->
</script>

<style>
.pagin {
padding: 10px 0;
font:bold 11px/30px arial, serif;
}
.pagin * {
padding: 2px 6px;
color:#0A7EC5;
margin: 2px;
border-radius:3px;
}
.pagin a {
		border:solid 1px #8DC5E6;
		text-decoration:none;
		background:#000000;
		padding:6px 7px 5px;
}

.pagin span, a:hover, .pagin a:active,.pagin span.current {
		color:#4e4e4e;
		background:-moz-linear-gradient(top,#B4F6FF 1px,#63D0FE 1px,#58B0E7);
		    
}
.pagin span,.current{
	padding:8px 7px 7px;
}
.content{
	padding:10px;
	font:bold 12px/30px gegoria,arial,serif;
	border:1px dashed #0686A1;
	border-radius:5px;
	background:-moz-linear-gradient(top,#E2EEF0 1px,#CDE5EA 1px,#E2EEF0);
	margin-bottom:10px;
	text-align:left;
	line-height:20px;
}
.outer_div{
	margin:auto;
	width:600px;
}
#loader{
	position: absolute;
	text-align: center;
	top: 75px;
	width: 100%;
	display:none;
}

</style>
<h2>Data ATK</h2>
<?php 
	/* Koneksi database*/
	include 'paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 5; //berapa banyak blok
	$adjacents  = 5;
	$offset = ($hal - 1) * $per_hal;
	$reload="viewbarang.php?";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(data_atk.kode_atk) AS numrows,data_atk.kode_atk, data_atk.nama_atk, data_atk.jenis_atk, data_atk.stok_tersedia FROM data_atk");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT data_atk.kode_atk, data_atk.nama_atk, data_atk.jenis_atk, data_atk.stok_tersedia
FROM data_atk WHERE data_atk.kode_atk GROUP BY data_atk.kode_atk LIMIT $offset,$per_hal");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
<thead>
  <tr>
    <td colspan="2" align="right" class="no_sort">      </td>
    </tr>
  <tr>
    <td class="no_sort"></td>
    <td class="no_sort"></td>
  </tr>
  <tr align="center">
    <td class="no_sort">Nama ATK</td>
    <td class="no_sort">Jenis ATK</td>
    <td class="no_sort">Tersedia</td>
    <td class="no_sort">Action</td>
    </tr>
  </thead>
<?php
while($result = mysql_fetch_array($query)){
?>
<tr align="center" >
    
    <td><?php echo $result['nama_atk']; ?></td> 
    <td><?php echo $result['jenis_atk']; ?></td> 
    <td><?php echo $result['stok_tersedia']; ?></td> 
    <?php
	$ids=sha1($result['kode_atk']);
	?>  
    <td><a href="#" onClick="sendValue('<?php echo $result['kode_atk']; ?>','<?php echo $result['nama_atk']; ?>');"><span class="btn btn-success"><i class="icon-edit"></i>Pilih</span></a></td>   
  </tr>
<?php
}
?>
</table>
<?php
echo paginate($reload, $hal, $total_hals, $adjacents);
?>

