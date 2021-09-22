<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="../../style.css" /></head>

<body>
<div id="container">
<div align="center"><h2>Tabel Search ATK</h2>
</div>

<form name="form1" method="post" action="">
        <p> 
    	<label for="textarea"></label>
        <label for="qcari"></label>
	<div class="input-group">
           <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
           <input type="text" class="form-control" name="qcari" id="qcari" placeholder="Pencarian" required="required" />
            </div></p>
</form>
<p align="left"><strong>SEARCH!!!</strong></p>

<table class="table" width="100%" height="100%" cellpadding="0" cellspacing="0" cols="0">
      		  <tr>
      		  <td>
              <table cellpadding="3" cellspacing="0" cols="7" class="table">
      		    <thead>
      		      <tr valign="middle">
      		        <th width="12%"><div align="center"><font
                    color="white">Kode ATK</font></div></th>
      		        <th width="20%"><div align="center"><font color="#FFFFFF">Nama ATK</font></div></th>
      		        <th width="23%"><div align="center"><font color="#FFFFFF">Jenis ATK ATK</font></div></th>
      		        <th width="26%"><div align="center"><font color="#FFFFFF">ACTIONS</font></div></th>
                  </tr>
   		        </thead>
      		     <?php		

require_once('koneksi.php');
if(isset($_POST['qcari'])&& $_POST['qcari'] !="" ){
	$qcari=$_POST['qcari'];
	$query1="SELECT * FROM data_atk where nama_atk like '%$qcari%'";
} else if(isset ($_POST['tampilsemua'])) {
	$query1="select * from data_atk";								
} else {
	$query1="select * from data_atk where kode_atk = 'xxxxxxxxxxxx' "; 
}  
$result=mysql_query($query1) or die(mysql_error());

while($rows = mysql_fetch_array($result)){
			?>
            	
      		    <tr align="center">
                
      		      <td height="53"><div align="center">
      		        <?php echo $rows['kode_atk']; ?>
   		          </div></td>
      		      <td><div align="center">
      		       <?php echo $rows['nama_atk']; ?>
   		          </div></td>
      		      <td><div align="center">
      		        <?php echo $rows['jenis_atk']; ?>
   		          </div></td>
                    <td>
                  
                  <div align="center"><a href="?cat=administrator&page=barangedit&id=<?php echo sha1($rows['kode_atk']); ?>">EDIT</a> | <a href="delete.php?kode_atk=<?php echo $rows['kode_atk']; ?>">DELETE</a></div></td>
                </tr>
  <?php             
}if ($rows==0) { ?>



	
                <?php
}
?>
  		    </table>
                </td>
    </tr>
  </table>
</div>
      		  </tr>
</table>
</body>
</html>