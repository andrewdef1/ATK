<?php
session_start();
if(!isset($_SESSION['login_hash']))
{
	echo "<script>window.location='index.php'</script>";
}
include("_db.php");
?>

<!DOCTYPE html><head>

<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/default.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="css/pace.min.css" />
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/zebra_datepicker.js"></script>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/pace.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width"/>
<link rel="shortcut icon" href='Graphicloads-100-Flat-2-Bank.ico' />
<script type="text/javascript">
$(window).load(function() { $(".preload-wrapper").fadeOut("slow"); })
</script>

    <title>Inventory ATK</title>
	<?php include("_scr.php"); ?>

</head>

<body>

<div class="preload-wrapper">
    <div id="preloader_7"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>
<div class="mainwrapper fullwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
      <div class="logopanel">
        	<h1><a href="dashboard.php">INVENTORY ATK</a></h1>
      </div><!--logopanel-->
        
        <table width="259" border="0"><td><div class="datewidget"><?php echo 'Hari ini : '.date('d-M-Y'); ?>
        <div id="clock"></div>
		<script type="text/javascript">
        <!--
        function startTime() {
        var today=new Date(),
        curr_hour=today.getHours(),
        curr_min=today.getMinutes(),
        curr_sec=today.getSeconds();
        curr_hour=checkTime(curr_hour);
        curr_min=checkTime(curr_min);
        curr_sec=checkTime(curr_sec);
        document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;
                }
                function checkTime(i) {
                    if (i<10) {
                        i="0" + i;
                    }
                    return i;
                }
                setInterval(startTime, 500);
				//-->
				
				</script>
</div></td></table>
    	
        <?php include("_main-nav.php"); ?> <!--NAVIGASI MENU UTAMA-->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="" class="showmenu"></a>
            <div class="headerright">
            	<span  style="color:#FFF">
                <?php 
				echo "Selamat Datang ".$_SESSION['login_user'];
				?>
                </span>
                <?php
				include("_userinfo.php"); 
				?>
            </div><!--headerright-->
    	</div><!--headerpanel-->
        
        <div class="breadcrumbwidget">
        	<ul class="breadcrumb">
                <li></li>
            </ul>
      </div> 
        <!--breadcrumbwidget-->
        
		<div class="pagetitle">
        	<h1>INVENTORY <a href="dashboard.php">ATK</a></h1> 
       	  <!--<span>This is a sample description for dashboard page...</span>-->
        </div><!--pagetitle-->
        
      <div class="maincontent">
       	<div class="contentinner content-dashboard">
            	<!--<div class="alert alert-info">
                	<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Welcome!</strong> This alert needs your attention, but it's not super important.
                </div>--><!--alert-->
                
                <div class="row-fluid"><!--span8-->
                <?php
				$v_cat = (isset($_REQUEST['cat'])&& $_REQUEST['cat'] !=NULL)?$_REQUEST['cat']:'';
				$v_page = (isset($_REQUEST['page'])&& $_REQUEST['page'] !=NULL)?$_REQUEST['page']:'';
				if(file_exists("pages/".$v_cat."/".$v_page.".php"))
				{
					include("pages/".$v_cat."/".$v_page.".php");
				}else{
					include("pages/web/homepage.php");
				}
				
				
				?>
                
                <!--span4-->
              </div>
                <!--row-fluid-->
        </div><!--contentinner-->
      </div><!--maincontent-->
      </div>
        
</div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
<div class="clearfix"></div>
    
	<!--FOOTER-->
    <?php include("_footer.php"); ?>
    
</div><!--mainwrapper-->
	<!--SLIDE NAVIGASI-->
    <?php include("_nav-slider.php"); ?>
</body>
</html>
