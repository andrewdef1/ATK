<?php
ob_start();
?><head>
<script type="text/javascript" src="js/psscheck.js"></script>
</head>
 <div class="container-fluid">
	<div class="row">
 <div class="col-md-12">
			
			<div class="panel-group" id="panel-228678">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-228678" href="#panel-element-666874">Input User</a> <span>&laquo;---Click To Show/Hide</span>
					</div>
					<div id="panel-element-666874" class="panel-collapse collapse">
						<div class="panel-body">

					<form name="form1" method="post" action="?cat=administrator&page=user&act=1">
  <label>Username</label>
  <input type="text" name="username" id="username" required="required">
      <label>Password</label>
      <input type="password" name="password" id="password" required="required">
      <label>Jenis Login</label>
  <select name="jenis" id="jenis">
       <option selected="selected">[--PILIH--]</option>
    <option value="administrator">Admin</option>
        <option value="gudang">Bagian Gudang</option>
        <option value="pimpinan">Pimpinan</option>
      </select>
   
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
</form>

						</div>
					</div>
				</div>
   </div>
                </div>



<?php
ob_end_flush();
?>
<p></p>
<p></p>
<span class="span4">
<table width="100%" height="40" border="0" cellpadding="0" cellspacing="0" class="table table-striped">
  <tr align="center">
    <td>Username</td>
    <td>Jenis Login</td>   
    <td>Actions</td>
  </tr>
  <?php
  $rw=mysql_query("Select * from user_login");
  while($s=mysql_fetch_array($rw))
  {
  ?>
  <tr align="center">
    <td><?php echo $s['username']; ?></td>
    <td><?php echo $s['login_hash']; ?></td>

    <td><a href="?cat=administrator&page=useredit&id=<?php echo sha1($s['username']); ?>">Edit</a> - <a href="?cat=administrator&page=user&del=1&id=<?php echo sha1($s['username']); ?>">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>
</span>
<?php
if(isset($_GET['act']))
{
	
	$rs=mysql_query("Insert into user_login (`username`,`password`,`login_hash`) values ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['jenis']."')") or die(mysql_error());
	if($rs)
	{
		echo "<script>window.location='?cat=administrator&page=user'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from user_login Where sha1(username)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=administrator&page=user'</script>";
	}
}
?>
