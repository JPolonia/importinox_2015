<?php $page ='artigo'; 
/* 
$nm = $_GET['nm']; */
include 'php/safe_encode.php';
$nm ="DIN 571";
if(isset($_GET['nm']) && isset($_GET['equi']) && isset($_GET['desc']) && isset($_GET['img'])){
	$nm = decode($_GET['nm']);
	$equi = decode($_GET['equi']);
	$desc = decode($_GET['desc']);
	$img = decode($_GET['img']);
	list($width_img,$height_img) = getimagesize('normas/img/' .$img);
	//echo "<script type='text/javascript'>alert('$width_img');</script>";

} 

//echo "<script type='text/javascript'>alert('$nm');</script>";

?>
<!DOCTYPE html>
<html lang="pt">
<head>

	<?php include 'template/header.html';?>
	<link rel="stylesheet" href="css/bootstrap-table.css">
	<link rel="stylesheet" href="css/default-skin/photoswipe_artigo.css"> 

</head>
<body class="off">
<!-- /.wrapbox start-->
<div class="wrapbox" >
	<!-- TOP AREA -->
	<?php include 'template/toparea.html';?>
	<!-- /.toparea end-->

	<!-- NAV -->
	<?php include 'template/nav.html';?>
	<!-- /nav end-->

	<!-- TOP-BANNER -->
	<?php include 'content/fix_1_topbanner.html';?>
	<!-- /top-banner end-->

	<!-- WRAPSEMIBOX start-->
	<div class="wrapsemibox">

		<!-- SEMIBOXSHADOW -->
		<?php include 'template/semiboxshadow.html';?>

		<!-- BREADCRUMB -->
		<?php include 'content/art_4_breadcrumb.php';?>	
		
		<section  class="container animated fadeInUp notransition fixwidth" style="padding:0px;">
				<!-- SIDEBAR -->
	            <aside id="side-produto" class="col-md-1 anime" style="padding:0px; margin-bottom:20px;">
	            	<!--ACCPRDION-->
					<?php include 'content/art_1_accordion.php';?>
	            </aside>  
				<div id="main-produto" class="col-md-11 anime" style="">
					<div class="row" style="border: 0px solid; ">
						<div class="col-xs-8" style="border: 0px solid; margin:0px -10px 0px 10px;">
							<h3 style="margin-top:0px;"><?php echo $nm; if(!empty($equi)){?><span class="barra_vertical" style="font-size:30px;">&nbsp;|&nbsp;</span><?php } ?><span class="catitemeq"><?php echo $equi; ?></span></h3>
							<h5><?php echo $desc; ?></h5><br>
							<img src="img/green.svg" align="middle" width="20" height="20">&nbsp;&nbsp;Disponibilidade imediata<br>
							<img src="img/yellow.svg" align="middle" width="20" height="20">&nbsp;&nbsp;Disponível em aprox. 1 semana<br>
							<img src="img/grey.svg" align="middle" width="20" height="20">&nbsp;&nbsp;Sob consulta 
						</div>
						<div class="col-xs-4" style="border: 0px solid; padding:0px;">
							<!-- GALLERY - Photoswipe -->
							<?php include 'content/art_2_gallery.php';?>
						</div>
					</div>
					<div class="row" style="margin-top:10px;border: 0px solid; margin-left:20px;">
						<!--TABLE -->
						<?php include 'content/art_3_table.php';?>
						<div style="float:right;margin-bottom:20px;">
							<button id="buttonAddCart" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							<button id="buttonModal" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalTable"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>
						</div>
					</div>
				</div>
			<!--</div>-->
		</section>
	</div>
	<!-- /.wrapsemibox end-->

	<!-- MODAL TABLE-->
	<?php include 'content/art_5_modaltable.php';?>

	<!-- FOOTER-->
	<?php include 'template/footer.html';?>
	<!-- /footer section end-->

</div>
<!-- /.wrapbox ends-->

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<?php include 'template/photoswipe.html';?>

<!-- SCRIPTS - GERAL -->
<?php include 'template/scripts.html';?>

<!-- SCRIPTS - HOME -->
<script src="js/artigo.js"></script>
<!-- Latest compiled JavaScript -->
<script src="js/bootstrap-table/bootstrap-table.js"></script>

<!-- Latest compiled Locales -->
<script src="js/bootstrap-table/bootstrap-table-pt-PT.js"></script>

<!--<script src="js/bootstrap-table/extensions/bootstrap-table-filter-control.js"></script>-->
<!--<script>window.paceOptions = {restartOnPushState: false}</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>-->

<script type="text/javascript" src="js/tableExport.js"></script>
<script type="text/javascript" src="js/FileSaver.js"></script>
<script type="text/javascript" src="js/bootstrap-table/extensions/bootstrap-table-export.js"></script>
<script type="text/javascript" src="js/bootstrap-table/extensions/bootstrap-table-filter/bootstrap-table-filter.js"></script>
<script type="text/javascript" src="js/bootstrap-table/extensions/bootstrap-table-filter/bootstrap-table-filter.pt-BR.js"></script>
<script type="text/javascript" src="js/bootstrap-table/extensions/bootstrap-table-filter/bs-table.js"></script>
<script type="text/javascript" src="js/bootstrap-table-filter.js"></script>
<script>
    function operateFormatter(value, row, index) {
        return [
            '<a class="remove ml10" href="javascript:void(0)" title="Remove" style="color:#D43F3A; font-size: 16px;" >',
                '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }

    window.operateEvents = {
        'click .remove': function (e, value, row, index) {
            $('#modalTable-table').bootstrapTable('remove', {
		        field: 'ref',
		        values: [row.ref]
		    });
        }
    };
</script>
</body>
</html>