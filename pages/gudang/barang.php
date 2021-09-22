<?php
ob_start();
?>
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel-group" id="panel-228678">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-228678" href="#panel-element-666874">Input Data ATK</a> <span>&laquo;---Click To Show/Hide</span>
					</div>
					<div id="panel-element-666874" class="panel-collapse collapse">
						<div class="panel-body">

					<form name="form1" method="post" action="?cat=gudang&page=barang&act=1">
 
     <label>Nama ATK</label>
     <input type="text" name="namaatk" id="namabarang" required="required">
     <label>Jenis ATK</label>
     <select name="jenis" id="jenis" >
     
     	<option selected="selected">[--PILIH--]</option>
        <option value="kertas">Kertas</option>
        <option value="tulis">Alat Tulis</option>
        <option value="hapus">Alat Hapus</option>
        <option value="arsip">Alat Arsip</option>
        <option value="alat kantor">Alat Kantor</option>
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
                </p>
<?php
ob_end_flush();
?>
<span class="span4">
<?php
include("barangview.php");
?>
</span>
<?php
if(isset($_GET['act']))
{
	
	$rs=mysql_query("Insert into data_atk (`nama_atk`,`jenis_atk`) values ('".$_POST['namaatk']."','".$_POST['jenis']."')") or die(mysql_error());
	if($rs)
	{
		
		echo "<script>window.location='?cat=gudang&page=barang'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from data_atk Where sha1(kode_atk)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=gudang&page=barang'</script>";
	}
}
?>
