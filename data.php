<?php 
include_once('include/fungsi.php');
include_once('include/config.php');
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'firewall/firewall.php' );

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title><?php echo $title;?></title>

    <!-- CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
    <link href="resources/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="resources/css/style.css" rel="stylesheet" />
	<style>
dl {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  background-color: white;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  width: 100%;
  max-width: 500px;
  position: relative;
  padding: 20px;
}

dt {
  -ms-flex-item-align: start;
      align-self: flex-start;
  width: 100%;
  font-weight: 700;
  display: block;
  text-align: center;
  font-size: 1.2em;
  font-weight: 700;
  margin-bottom: 20px;
  margin-left: 400px;
}

.text {
  font-weight: 600;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  height: 40px;
  width: 130px;
  background-color: white;
  position: absolute;
  left: 0;
  -webkit-box-pack: end;
      -ms-flex-pack: end;
          justify-content: flex-end;
}

.percentage {
  font-size: .8em;
  line-height: 1;
  text-transform: uppercase;
  width: 100%;
  height: 40px;
  margin-left: 130px;
  background: -webkit-repeating-linear-gradient(left, #ddd, #ddd 1px, #fff 1px, #fff 5%);
  background: repeating-linear-gradient(to right, #ddd, #ddd 1px, #fff 1px, #fff 5%);
}
.percentage:after {
  content: "";
  display: block;
  background-color: #3d9970;
  width: 50px;
  margin-bottom: 10px;
  height: 90%;
  position: relative;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  -webkit-transition: background-color .3s ease;
  transition: background-color .3s ease;
  cursor: pointer;
}
.percentage:hover:after, .percentage:focus:after {
  background-color: #aaa;
}

.percentage-1:after {
  width: 1%;
}

.percentage-2:after {
  width: 2%;
}

.percentage-3:after {
  width: 3%;
}

.percentage-4:after {
  width: 4%;
}

.percentage-5:after {
  width: 5%;
}

.percentage-6:after {
  width: 6%;
}

.percentage-7:after {
  width: 7%;
}

.percentage-8:after {
  width: 8%;
}

.percentage-9:after {
  width: 9%;
}

.percentage-10:after {
  width: 10%;
}

.percentage-11:after {
  width: 11%;
}

.percentage-12:after {
  width: 12%;
}

.percentage-13:after {
  width: 13%;
}

.percentage-14:after {
  width: 14%;
}

.percentage-15:after {
  width: 15%;
}

.percentage-16:after {
  width: 16%;
}

.percentage-17:after {
  width: 17%;
}

.percentage-18:after {
  width: 18%;
}

.percentage-19:after {
  width: 19%;
}

.percentage-20:after {
  width: 20%;
}

.percentage-21:after {
  width: 21%;
}

.percentage-22:after {
  width: 22%;
}

.percentage-23:after {
  width: 23%;
}

.percentage-24:after {
  width: 24%;
}

.percentage-25:after {
  width: 25%;
}

.percentage-26:after {
  width: 26%;
}

.percentage-27:after {
  width: 27%;
}

.percentage-28:after {
  width: 28%;
}

.percentage-29:after {
  width: 29%;
}

.percentage-30:after {
  width: 30%;
}

.percentage-31:after {
  width: 31%;
}

.percentage-32:after {
  width: 32%;
}

.percentage-33:after {
  width: 33%;
}

.percentage-34:after {
  width: 34%;
}

.percentage-35:after {
  width: 35%;
}

.percentage-36:after {
  width: 36%;
}

.percentage-37:after {
  width: 37%;
}

.percentage-38:after {
  width: 38%;
}

.percentage-39:after {
  width: 39%;
}

.percentage-40:after {
  width: 40%;
}

.percentage-41:after {
  width: 41%;
}

.percentage-42:after {
  width: 42%;
}

.percentage-43:after {
  width: 43%;
}

.percentage-44:after {
  width: 44%;
}

.percentage-45:after {
  width: 45%;
}

.percentage-46:after {
  width: 46%;
}

.percentage-47:after {
  width: 47%;
}

.percentage-48:after {
  width: 48%;
}

.percentage-49:after {
  width: 49%;
}

.percentage-50:after {
  width: 50%;
}

.percentage-51:after {
  width: 51%;
}

.percentage-52:after {
  width: 52%;
}

.percentage-53:after {
  width: 53%;
}

.percentage-54:after {
  width: 54%;
}

.percentage-55:after {
  width: 55%;
}

.percentage-56:after {
  width: 56%;
}

.percentage-57:after {
  width: 57%;
}

.percentage-58:after {
  width: 58%;
}

.percentage-59:after {
  width: 59%;
}

.percentage-60:after {
  width: 60%;
}

.percentage-61:after {
  width: 61%;
}

.percentage-62:after {
  width: 62%;
}

.percentage-63:after {
  width: 63%;
}

.percentage-64:after {
  width: 64%;
}

.percentage-65:after {
  width: 65%;
}

.percentage-66:after {
  width: 66%;
}

.percentage-67:after {
  width: 67%;
}

.percentage-68:after {
  width: 68%;
}

.percentage-69:after {
  width: 69%;
}

.percentage-70:after {
  width: 70%;
}

.percentage-71:after {
  width: 71%;
}

.percentage-72:after {
  width: 72%;
}

.percentage-73:after {
  width: 73%;
}

.percentage-74:after {
  width: 74%;
}

.percentage-75:after {
  width: 75%;
}

.percentage-76:after {
  width: 76%;
}

.percentage-77:after {
  width: 77%;
}

.percentage-78:after {
  width: 78%;
}

.percentage-79:after {
  width: 79%;
}

.percentage-80:after {
  width: 80%;
}

.percentage-81:after {
  width: 81%;
}

.percentage-82:after {
  width: 82%;
}

.percentage-83:after {
  width: 83%;
}

.percentage-84:after {
  width: 84%;
}

.percentage-85:after {
  width: 85%;
}

.percentage-86:after {
  width: 86%;
}

.percentage-87:after {
  width: 87%;
}

.percentage-88:after {
  width: 88%;
}

.percentage-89:after {
  width: 89%;
}

.percentage-90:after {
  width: 90%;
}

.percentage-91:after {
  width: 91%;
}

.percentage-92:after {
  width: 92%;
}

.percentage-93:after {
  width: 93%;
}

.percentage-94:after {
  width: 94%;
}

.percentage-95:after {
  width: 95%;
}

.percentage-96:after {
  width: 96%;
}

.percentage-97:after {
  width: 97%;
}

.percentage-98:after {
  width: 98%;
}

.percentage-99:after {
  width: 99%;
}

.percentage-100:after {
  width: 100%;
}

html, body {
  height: 500px;
  font-family: "fira-sans-2",sans-serif;
  color: #333;
}
	</style>


    <!-- Javascript for animation -->

    <script type="text/javascript" src="resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/js/expand.js"></script>
    <script type="text/javascript" src="resources/js/common.js"></script>
</head>

<body>

<!-- MAIN WEBSITE BEGIN -->
<div id="main">

    <!-- HEADER WEBSITE BEGIN -->
    <?php include_once('header.php');?>

    <!-- CONTENT WEBSITE BEGIN -->
    <div id="content">

        <!-- LEFT CONTENT WEBSITE BEGIN -->
        <div id="left-content">
	    <?php
		if (isset($_GET['jenis'])){
			$jenis_dok=anti_injection($_GET['jenis']);	
		}else{
			$jenis_dok='kelamin';
		}	
			$qcontent="select * from tbl_statistik where jenis='$jenis_dok' limit 1";
			$rcontent=mysqli_query($konek,$qcontent);
			$row_content=mysqli_fetch_array($rcontent);
			
			if ($row_content['jenis']=='kelamin'){
				echo '
					 <h2 class="title-top">STATISTIK PENDUDUK BERDASARKAN JENIS KELAMIN</h2>
					<div>
					   <p>'.html_entity_decode($row_content['content']).'
					   </p>
					</div> 
					';
			}
			if ($row_content['jenis']=='pekerjaan'){
				echo '
					 <h2 class="title-top">STATISTIK PENDUDUK BERDASARKAN PEKERJAAN</h2>
					<div>
					   <p>'.html_entity_decode($row_content['content']).'
					   </p>
					</div> 
					';
			}
				if ($row_content['jenis']=='agama'){
				echo '
					 <h2 class="title-top">STATISTIK PENDUDUK BERDASARKAN AGAMA</h2>
					<div>
					   <p>'.html_entity_decode($row_content['content']).'
					   </p>
					</div> 
					';
			}
				if ($row_content['jenis']=='lahir'){
				echo '
					 <h2 class="title-top">STATISTIK KELAHIRAN</h2>
					<div>
					   <p>'.html_entity_decode($row_content['content']).'
					   </p>
					</div> 
					';
			}
				if ($row_content['jenis']=='mati'){
				echo '
					 <h2 class="title-top">STATISTIK WARGA MENINGGAL</h2>
					<div>
					   <p>'.html_entity_decode($row_content['content']).'
					   </p>
					</div> 
					';
			}
					if ($row_content['jenis']=='pindah'){
				echo '
					 <h2 class="title-top">STATISTIK WARGA PINDAH</h2>
					<div>
					   <p>'.html_entity_decode($row_content['content']).'
					   </p>
					</div> 
					';
			}
				if ($row_content['jenis']=='miskin'){
				echo '
					 <h2 class="title-top">STATISTIK WARGA MISKIN</h2>
					<div>
					   <p>'.html_entity_decode($row_content['content']).'
					   </p>
					</div> 
					';
			}
					if ($row_content['jenis']=='umur'){
				echo '
					 <h2 class="title-top">STATISTIK PENDUDUK BERDASARKAN KELOMPOK UMUR</h2>
					<div>
					   <p>'.html_entity_decode($row_content['content']).'
					   </p>
					</div> 
					';
			}
		
		?>
		

                  
				
		</div>
        <!-- END OF LEFT CONTENT WEBSITE -->

        <!-- RIGHT CONTENT WEBSITE BEGIN -->
        <div id="right-content">
		
           <?php include_once('data_menu.php');?>

            <!-- INFO USER -->
			<?php include_once('info_user.php');?>	

        </div>
        <!-- END OF RIGHT CONTENT WEBSITE -->

        <div class="clear"></div>

    </div>
    <!-- END OF CONTENT WEBSITE -->

    <!-- FOOTER WEBSITE BEGIN -->
  <?php include_once('footer.php');?>
</div>
<!-- END OF MAIN WEBSITE -->


</body>
</html>