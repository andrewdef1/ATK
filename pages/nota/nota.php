<?php
include("koneksi.php");
?>
<?php
ob_start();
$SQL="Select max(kode_nota) from data_nota";
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
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-228678" href="#panel-element-666874">Input Data Nota</a> <span>&laquo;---Click To Show/Hide</span>
					</div>
					<div id="panel-element-666874" class="panel-collapse collapse">
						<div class="panel-body">

					<form name="form1" method="post" action="?cat=nota&page=nota&act=1">
 	
    <label>Tanggal</label>
    <input type="text" name="tglr" id="datepicker" placeholder="Pilih tanggal.." required="required" />
 
  <label>Kode Nota</label>
     <input name="kodenota" type="text" required="required" id="kodenota" value="<?php echo $new; ?>" readonly="readonly">
   <label>Divisi</label>
   <select name="divisi" id="divisi" >
       	
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
  </select>
      <label>Kode ATK</label>
  <input type="text" name="kodeatk" id="kodebarang" placeholder="Pilih ATK.."  onClick="window.open('http://localhost/ATK/pages/nota/viewnota.php','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');" required="required">
      <label>Nama ATK</label>
      <input name="namabarang" type="text" id="namabarang" readonly="readonly">
      <label>Jumlah</label>
      <input type="text" name="jumlah" id="jumlah" required="required">
      <label>Satuan</label>
      <select name="satuan" id="satuan" >
       	
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
      </select>
         
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
</form>

						</div>
					</div>
				</div>
  </div>
                </div>


<p>
  <?php
ob_end_flush();
?>
</p>
<p>  <span class="span4">
  </span></p>
<span class="span4">
<?php
include("notaview.php");
?>
</span>
<?php
if(isset($_GET['act']))
{
	$newDate = date("Y-m-d", strtotime($_POST['tglr']));
	$rs=mysql_query("Insert into data_nota (`tgl`,`kode_nota`,`divisi`,`kode_atk`,`nama_atk`,`jumlah`,`satuan`) values ('".$newDate."','".$_POST['kodenota']."','".$_POST['divisi']."','".$_POST['kodeatk']."','".$_POST['namabarang']."','".$_POST['jumlah']."','".$_POST['satuan']."')") or die(mysql_error());
	if($rs)
	{
		
		echo "<script>window.location='?cat=nota&page=nota'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from data_nota Where sha1(kode_nota)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=nota&page=nota'</script>";
	}
}
?>
