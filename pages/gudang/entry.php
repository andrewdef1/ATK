<script src="js/jquery-ui.js"></script>
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel-group" id="panel-228678">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-228678" href="#panel-element-666874">Input Data ATK Masuk</a> <span>&laquo;---Click To Show/Hide</span>
					</div>
					<div id="panel-element-666874" class="panel-collapse collapse">
						<div class="panel-body">

					<h2>Entry ATK Masuk</h2>
<form name="form1" method="post" action="" autocomplete="on">

<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Tanggal</td>
    <td><input type="text" name="tglr" id="datepicker" placeholder="Pilih tanggal.." required="required" /></td>
  </tr>
  <tr>
    <td width="40%">Kode ATK</td>
    <td width="60%"><label for="kodebarang"></label>
      <input type="text" name="kodeatk" id="kodebarang" placeholder="Pilih Barang.."  onClick="window.open('http://localhost/ATK/pages/web/viewbarang.php','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=400,top=100,left=100');" required="required">
     
</td>
  </tr>
  <tr>
    <td>Nama ATK</td>
    <td><input name="namabarang" type="text" id="namabarang" readonly></td>
  </tr>
  <tr>
    <td>Jumlah</td>
    <td><input type="text" name="qty" id="qty" required="required"></td>
  </tr>
  <tr>
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
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p></p><input type="submit" class="btn btn-primary" name="button" id="button" value="Tambah">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset"></td>
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
	$q=mysql_query("Insert into atk_masuk (`tgl`,`kode_atk`,`jumlah`,`satuan`) values ('".$newDate."','".$_POST['kodeatk']."','".$_POST['qty']."','".$_POST['satuan']."')") or die(mysql_error());
	$q2=mysql_query("Select * from data_atk where kode_atk='".$_POST['kodeatk']."'");
	$rc=mysql_num_rows($q2);
	if($rc==1)
	{
		$q3=mysql_query("Update data_atk SET masuk=masuk + ".$_POST['qty'].",stok_tersedia=stok_tersedia + ".$_POST['qty']." Where kode_atk='".$_POST['kodeatk']."'");
		if($q3)
		{
			echo "Data sudah disimpan";
		}
	}else{
		$q4=mysql_query("Insert into data_atk (`kode_atk`,`masuk`,`stok_tersedia`) values ('".$_POST['kodeatk']."','".$_POST['qty']."','".$_POST['qty']."')");
		if($q4)
		{
			echo "Data sudah disimpan";
		}
	
		}
}
?>

<?php
include('atkmasukview.php');
?>
