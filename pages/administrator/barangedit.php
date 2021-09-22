<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from data_atk where sha1(kode_atk)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
?>
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel-group" id="panel-228678">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-228678" href="#panel-element-666874">Edit Data ATK</a> <span>&laquo;---Click To Show/Hide</span>
					</div>
					<div id="panel-element-666874" class="panel-collapse collapse">
						<div class="panel-body">

					<form name="form1" method="post" action="?cat=administrator&page=barangedit&id=<?php echo $_GET['id']; ?>&edit=1">
 
      <label>Nama ATK</label>
      <input type="text" name="namaatk" id="namaatk" value="<?php echo $row['nama_atk']; ?>" required="required">
      <label>Jenis ATK</label>
     <select name="jenis" id="jenis">
		<option selected="selected">[--PILIH--]</option>
        <option value="kertas" <?php if($row['jenis_atk'] == 'kertas'){ echo 'selected'; } ?>>Kertas
</option>
        <option value="tulis" <?php if($row['jenis_atk'] == 'tulis'){ echo 'selected'; } ?>>Alat Tulis</option>
        <option value="hapus" <?php if($row['jenis_atk'] == 'hapus'){ echo 'selected'; } ?>>Alat Hapus</option>
        <option value="arsip" <?php if($row['jenis_atk'] == 'arsip'){ echo 'selected'; } ?>>Alat Arsip</option>
        <option value="alat kantor" <?php if($row['jenis_atk'] == 'alat kantor'){ echo 'selected'; } ?>>Alat Kantor</option>
      </select>
   
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Ubah">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Batal" onclick="window.location='?cat=administrator&page=barang'">
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
}else{
	echo "<script>window.location='?cat=administrator&page=barang'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{
	
	$rs=mysql_query("Update data_atk SET nama_atk='".$_POST['namaatk']."',jenis_atk='".$_POST['jenis']."' Where sha1(kode_atk)='".$_GET['id']."'");
	if($rs)
	{
		echo "<script>window.location='?cat=administrator&page=barang'</script>";
		
	}
}
?>
