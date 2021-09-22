<script src="js/jquery-ui.js"></script>
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
<script>
$(function() {
$("#datepicker3").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});
$(function() {
$("#datepicker2").datepicker({     
		 dateFormat: "yy-mm-dd",      
    });
});

</script>
<h2>Laporan ATK Masuk</h2>
<form name="form1" method="post" action="">
  <!--Laporan -->
  Cari tanggal
<input type="text" name="tglr" id="datepicker3" placeholder="Pilih tanggal.." class="span2 input-small" required="required"/>
Hingga 
  <input type="text" name="tglr2" id="datepicker2" placeholder="Pilih tanggal.." class="span2 input-small" required="required"/>
<input type="submit" name="submit" value="Cari" class="btn btn-large btn-primary">

   <select name="lp" id="lp" class="laptext">
      <option value="masuk">ATK Masuk</option>
    </select>
</form>
<?php

?>
<?php 
	/* Koneksi database*/
	include 'paging.php'; //include pagination _POST['lp']e
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 10; //berapa banyak blok
	$adjacents  = 10;
	$offset = ($hal - 1) * $per_hal;
	$reload="dashboard.php?cat=pimpinan&page=monthreportingatkmasuk";
	if(isset($_POST['submit']))
{
	?>
    <input type="hidden" value="<?php echo $_POST['tglr']; ?>" name="tgl1" />
<input type="hidden" value="<?php echo $_POST['tglr2']; ?>" name="tgl2" />
    <?php
	echo "Pencarian tanggal ". $_POST['tglr']." sampai ".$_POST['tglr2'];
	//Cari berapa banyak jumlah data*/
	$count_query=mysql_query("SELECT COUNT(ID_".$_POST['lp'].") AS numrows
FROM atk_".$_POST['lp']." LEFT JOIN data_atk ON atk_".$_POST['lp'].".kode_atk = data_atk.kode_atk  Where tgl BETWEEN '".$_POST['tglr']."' AND '".$_POST['tglr2']."' GROUP BY ID_".$_POST['lp']."");
	$count_query2   = mysql_query("SELECT COUNT(ID_".$_POST['lp'].") AS numrows FROM atk_".$_POST['lp']." Where tgl BETWEEN '".$_POST['tglr']."' AND '".$_POST['tglr2']."'");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query2 = mysql_query("SELECT * from atk_".$_POST['lp']." Where tgl BETWEEN '".$_POST['tglr']."' AND '".$_POST['tglr2']."' GROUP BY ID_".$_POST['lp']." LIMIT $offset,$per_hal");
	$query=mysql_query("SELECT atk_".$_POST['lp'].".tgl, atk_".$_POST['lp'].".kode_atk, data_atk.nama_atk, data_atk.jenis_atk, atk_".$_POST['lp'].".jumlah, atk_masuk.satuan
FROM atk_".$_POST['lp']." LEFT JOIN data_atk ON atk_".$_POST['lp'].".kode_atk = data_atk.kode_atk  Where tgl BETWEEN '".$_POST['tglr']."' AND '".$_POST['tglr2']."' GROUP BY ID_".$_POST['lp']." LIMIT $offset,$per_hal");
?>
<?php
if($numrows > 0 )
{
?>
<div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td width="89%">&nbsp;</td>
    <td width="11%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        
        <td width="17%">Export To <img src="img/excel.ico" border="1" width="32" height="32" onClick="window.open('<?php echo $baseurl."pages/web/export-excel-atk-masuk.php?tgl1=".$_POST['tglr']."&tgl2=".$_POST['tglr2']."&field=".$_POST['lp']; ?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');" /></td>
        
      </tr>
    </table></td>
  </tr>
</table>
</div>
<?php
}
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
    <td class="no_sort">Tanggal Transaksi</td>
    <td class="no_sort">Kode ATK</td>
    <td class="no_sort">Nama ATK</td>
    <td class="no_sort">Jumlah</td>
    <td class="no_sort">Satuan</td>
  </tr>
  </thead>
<?php
while($result = mysql_fetch_array($query)){
?>
<tr align="center" >
    
    <td><?php echo $result['tgl']; ?></td> 
    <td><?php echo $result['kode_atk']; ?></td> 
    <td><?php echo $result['nama_atk']; ?></td> 
    <td><?php echo $result['jumlah']; ?></td> 
    <td><?php echo $result['satuan']; ?></td> 
       
  </tr>
<?php
}
?>
</table>
<?php
echo paginate($reload, $hal, $total_hals, $adjacents);
?>
<?php
}
?>