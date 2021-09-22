<?php
ob_start();
$SQL="Select max(id_keluar) from atk_keluar";
$exe=mysql_query($SQL);
$list=mysql_fetch_array($exe);
$new=$list[0]+1;
 ?>
<script src="js/jquery-ui.js"></script>
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel-group" id="panel-228678">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-228678" href="#panel-element-666874">Input Data ATK Keluar</a> <span>&laquo;---Click To Show/Hide</span>
					</div>
					<div id="panel-element-666874" class="panel-collapse collapse">
						<div class="panel-body">

					<h2>Entry ATK Keluar</h2>
<form name="form1" method="post" action="" autocomplete="on">

<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Tanggal</td>
    <td><input type="text" name="tglr" id="datepicker" placeholder="Pilih tanggal.." required="required" /></td>
  </tr>
  <tr>
    <td width="40%">Kode ATK</td>
    <td width="60%"><label for="kodebarang"></label>
      <input type="text" name="kodeatk" id="kodebarang" placeholder="Pilih ATK.."  onClick="window.open('http://localhost/ATK/pages/web/viewbarangkeluar.php','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');" required="required">
     
</td>
  </tr>
  <tr>
    <td>Nama ATK</td>
    <td><input name="namabarang" type="text" id="namabarang" readonly></td>
  </tr>
    <tr>
    <td>Divisi</td>
    <td><select name="divisi" id="divisi" >
       	
        <option selected="selected">[--PILIH--]</option>
        <option value="Direksi">Direksi</option>
   		<option value="SKAI">Divisi SKAI</option>
        <option value="RM">Divisi Menajemen Resiko</option>
        <option value="Hukum">Divisi Hukum</option>
        <option value="SKAF">Divisi SKAF</option>
        <option value="RBG">Divisi Perencanaan & Pengembangan</option>
        <option value="Pemasaran">Divisi Pemasaran</option>
        <option value="SDM">Divisi SDM</option>
        <option value="Kepatuhan">Divisi Kepatuhan</option>
        <option value="Umum">Divisi Umum</option>
        <option value="Treasury">Divisi Treasury & Internasional</option>
        <option value="Akuntansi">Divisi Akuntansi</option>
        <option value="KCU">KCU Jayapura</option>
        <option value="IT">Divisi IT</option>
        <option value="PER">Divisi Pengembangan Ekonomi Rakyat</option>
      </select></td>
  </tr>
  <tr>
    <td>Jumlah</td>
    <td><input type="text" name="qty" id="qty" required="required"></td>
  </tr>
<td>Satuan</td>
    <td><select name="satuan" id="satuan" >
       	
        <option selected="selected">[--PILIH--]</option>
        <option value="pack">Pack</option>
   		<option value="pcs">Pcs</option>
        <option value="lusin">Lusin</option>
        <option value="gross">Gross</option>
        <option value="roll">Roll</option>
        <option value="box">Box</option>
        <option value="rim">Rim</option>
        <option value="set">Set</option>
        <option value="buah">Buah</option>
        <option value="lembar">Lembar</option>
        <option value="unit">Unit</option>
      </select></td>
  <tr>
    <td>&nbsp;</td>
    <td><p>
      <input type="text" name="idkeluar" id="idkeluar" class="laptext" readonly="readonly" value="<?php echo $new; ?>">
    </p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Tambah">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset"></td>
  </tr>

</table>
</form>


						</div>
					</div>
				</div>
                </div>
                </div>

<p>
                </p>
<?php
if(isset($_POST['button']))
{
	$newDate = date("Y-m-d", strtotime($_POST['tglr']));
	
	$q2=mysql_query("Select * from data_atk where kode_atk='".$_POST['kodeatk']."'");
	$rw=mysql_fetch_array($q2);
	$rc=mysql_num_rows($q2);
	if($rc==1)
	{
		if($_POST['qty'] < $rw['stok_tersedia'])
		{
			$q=mysql_query("INSERT INTO atk_keluar (`tgl`,`kode_atk`,`jumlah`,`divisi_penerima`,`satuan`) values ('".$newDate."','".$_POST['kodeatk']."','".$_POST['qty']."','".$_POST['divisi']."','".$_POST['satuan']."')") or die(mysql_error());
			if($q)
			{
				$q3=mysql_query("Update data_atk SET keluar=keluar + ".$_POST['qty'].",stok_tersedia=stok_tersedia - ".$_POST['qty']." Where kode_atk='".$_POST['kodeatk']."'");
				if($q3)
				{
					echo "Data sudah disimpan";
				}
			}
		}else{
		echo "Stok barang kurang";
		}
	}else{
		echo "Barangnya Kosong!";
	}
}
?>

<?php
include('atkkeluarview.php');
?>
