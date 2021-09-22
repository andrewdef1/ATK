<!--NAVIGASI MENU UTAMA-->

<div class="leftmenu">
  <ul class="nav nav-tabs nav-stacked">
    <li class="active"><a href="dashboard.php"><span class="icon-align-justify"></span> Dashboard</a></li>
    
    <!--MENU GUDANG-->
    <?php
	if($_SESSION['login_hash']=="gudang")
	{
	?>
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Data Master</a>
      <ul>
        <li><a href="?cat=gudang&page=barang">ATK</a></li>
        <li><a href="?cat=gudang&page=search">Search</a></li>
      </ul>
    </li>        
    <li class="dropdown"><a href="#"><span class="icon-pencil"></span> Transaksi</a>
      <ul>
        <li><a href="?cat=gudang&page=entry">ATK Masuk</a></li>
        <li><a href="?cat=gudang&page=sell">ATK Keluar</a></li>  
         <li><a href="?cat=nota&page=nota">Data Nota</a></li>      
          <li><a href="?cat=distribusi&page=distribusi">Data Distribusi</a></li> 
      </ul>
    </li>
    <li class="dropdown"><a href="#"><span class="icon-pencil"></span> Laporan</a>
      <ul>
        <li><a href="?cat=gudang&page=monthreportingatkmasuk">Laporan Masuk</a></li>
         <li><a href="?cat=gudang&page=monthreportingatkkeluar">Laporan Keluar</a></li>        
      </ul>
    </li>

    
   <!--MENU PIMPINAN-->
        <?php
	}elseif($_SESSION['login_hash']=="pimpinan"){
	?>    
    <li class="dropdown"><a href="#"><span class="icon-pencil"></span> Laporan</a>
      <ul>       
        <li><a href="?cat=pimpinan&page=monthreportingatkmasuk">Laporan ATK Masuk</a></li>
         <li><a href="?cat=pimpinan&page=monthreportingatkkeluar">Laporan ATK Keluar</a></li>     
      </ul>
    </li>
     <!--MENU ADMIN-->
        <?php
	}elseif($_SESSION['login_hash']=="administrator"){
	?>    
    <li class="dropdown"><a href="#"><span class="icon-pencil"></span> System</a>
      <ul>       
        <li><a href="?cat=administrator&page=user">User Management</a>
        </ul>
        </li>
       <!--<li class="dropdown"><a href="#"><span class="icon-th-list"></span> Data Master</a>
       <ul>
        <li><a href="?cat=gudang&page=barang">ATK</a></li>
        <li><a href="?cat=gudang&page=search">Search</a></li>
      </ul>
    </li>
    <li class="dropdown"><a href="#"><span class="icon-pencil"></span> Transaksi</a>
      <ul>
        <li><a href="?cat=gudang&page=entry">Barang Masuk</a></li>
        <li><a href="?cat=gudang&page=sell">Barang Keluar</a></li>  
         <li><a href="?cat=nota&page=nota">Data Nota</a></li>      
          <li><a href="?cat=distribusi&page=distribusi">Data Distribusi</a></li> 
      </ul>
    </li>    
         <li class="dropdown"><a href="#"><span class="icon-pencil"></span> Laporan</a>
      <ul>
        <li><a href="?cat=gudang&page=monthreportingatkmasuk">Laporan ATK Masuk</a></li>
         <li><a href="?cat=gudang&page=monthreportingatkkeluar">Laporan ATK Keluar</a></li> 
        
      </ul>
    </li>-->
  	<?php
	}
	?>
  </ul>
</div>
<!--leftmenu-->

</div>
<!--mainleft--> 
<!-- END OF LEFT PANEL -->