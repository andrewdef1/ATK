
<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from atk_keluar where sha1(id_keluar)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
?>
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel-group" id="panel-228678">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-228678" href="#panel-element-666874">Edit Data ATK Keluar</a> <span>&laquo;---Click To Show/Hide</span>
					</div>
					<div id="panel-element-666874" class="panel-collapse collapse">
						<div class="panel-body">

					<form name="form1" method="post" action="?cat=nota&page=updatenota">

<script src="js/jquery.min.js"></script>
<script src="js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="css/default.css" />
<script>
$(document).ready(function() {
 
    // diasumsikan elemen yang ingin kita isi datepicker
    // sudah memiliki class "datepicker"
    $('#tanggal').Zebra_DatePicker();
 
 });
 </script>
	
    <label>Tanggal</label>
    <input type="text" name="tanggal" id="tanggal" placeholder="Pilih Tanggal.." value="<?php echo $row['tgl'];?>"/>
 
  <label>Kode ATK</label>
     <input name="kodeatk" type="text" required="required" id="kodebarang" value="<?php echo $row['kode_atk']; ?>" readonly onClick="window.open('http://localhost/ATK/pages/web/viewbarangkeluar.php','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');">
     <label>Nama ATK</label>
     <input type="text" name="namabarang" id="namabarang" value="" required="required">
     <label>Divisi</label>
   <select name="divisi" id="divisi" >
       	
        <option selected="selected">[--PILIH--]</option>
        <option value="Direksi" <?php if($row['divisi_penerima'] == 'Direksi'){ echo 'selected'; } ?>>Direksi</option>
   		<option value="SKAI" <?php if($row['divisi_penerima'] == 'SKAI'){ echo 'selected'; } ?>>Divisi SKAI</option>
        <option value="RM" <?php if($row['divisi_penerima'] == 'RM'){ echo 'selected'; } ?>>Divisi Menajemen Resiko</option>
        <option value="Hukum" <?php if($row['divisi_penerima'] == 'Hukum'){ echo 'selected'; } ?>>Divisi Hukum</option>
        <option value="SKAF" <?php if($row['divisi_penerima'] == 'SKAF'){ echo 'selected'; } ?>>Divisi SKAF</option>
        <option value="RBG" <?php if($row['divisi_penerima'] == 'RBG'){ echo 'selected'; } ?>>Divisi Perencanaan & Pengembangan</option>
        <option value="Pemasaran" <?php if($row['divisi_penerima'] == 'Pemasaran'){ echo 'selected'; } ?>>Divisi Pemasaran</option>
        <option value="SDM" <?php if($row['divisi_penerima'] == 'SDM'){ echo 'selected'; } ?>>Divisi SDM</option>
        <option value="Kepatuhan" <?php if($row['divisi_penerima'] == 'Kepatuhan'){ echo 'selected'; } ?>>Divisi Kepatuhan</option>
        <option value="Umum" <?php if($row['divisi_penerima'] == 'Umum'){ echo 'selected'; } ?>>Divisi Umum</option>
        <option value="Treasury" <?php if($row['divisi_penerima'] == 'Treasury'){ echo 'selected'; } ?>>Divisi Treasury & Internasional</option>
        <option value="Akuntansi" <?php if($row['divisi_penerima'] == 'Akuntansi'){ echo 'selected'; } ?>>Divisi Akuntansi</option>
        <option value="KCU" <?php if($row['divisi_penerima'] == 'KCU'){ echo 'selected'; } ?>>KCU Jayapura</option>
        <option value="IT" <?php if($row['divisi_penerima'] == 'IT'){ echo 'selected'; } ?>>Divisi IT</option>
        <option value="PER" <?php if($row['divisi_penerima'] == 'PER'){ echo 'selected'; } ?>>Divisi Pengembangan Ekonomi Rakyat</option>
  </select>
   <label>Jumlah</label>
      <input type="text" name="jumlah" id="jumlah" value="<?php echo $row['jumlah']; ?>" required="required">
      <label>Satuan</label>
      <select name="satuan" id="satuan" >
       	
        <option selected="selected">[--PILIH--]</option>
        <option value="pack" <?php if($row['satuan'] == 'pack'){ echo 'selected'; } ?>>Pack</option>
   		<option value="pcs" <?php if($row['satuan'] == 'pcs'){ echo 'selected'; } ?>>Pcs</option>
        <option value="lusin" <?php if($row['satuan'] == 'lusin'){ echo 'selected'; } ?>>Lusin</option>
        <option value="gross" <?php if($row['satuan'] == 'gross'){ echo 'selected'; } ?>>Gross</option>
        <option value="roll" <?php if($row['satuan'] == 'roll'){ echo 'selected'; } ?>>Roll</option>
        <option value="box" <?php if($row['satuan'] == 'box'){ echo 'selected'; } ?>>Box</option>
        <option value="rim" <?php if($row['satuan'] == 'rim'){ echo 'selected'; } ?>>Rim</option>
        <option value="set" <?php if($row['satuan'] == 'set'){ echo 'selected'; } ?>>Set</option>
        <option value="buah" <?php if($row['satuan'] == 'buah'){ echo 'selected'; } ?>>Buah</option>
        <option value="lembar" <?php if($row['satuan'] == 'lembar'){ echo 'selected'; } ?>>Lembar</option>
        <option value="unit" <?php if($row['satuan'] == 'unit'){ echo 'selected'; } ?>>Unit</option>
      </select>
   
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Ubah">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Batal" onClick="window.location='?cat=gudang&page=sell'">
</form>

						</div>
					</div>
				</div>
                </div>
                </div>


<?php
ob_end_flush();
}else{
	echo "<script>window.location='?cat=nota&page=nota'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{
	
	$rs=mysql_query("Update atk_keluar SET tgl='".$_POST['tanggal']."',kode_atk='".$_POST['kodeatk']."',divisi='".$_POST['divisi']."',,nama_atk='".$_POST['namaatk']."',jumlah='".$_POST['jumlah']."',satuan='".$_POST['satuan']."' Where sha1(kode_nota)='".$_GET['id']."'");
	if($rs)
	{
		echo "<script>window.location='?cat=gudang&page=sell'</script>";
	}
}
?>
