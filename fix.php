<?php $page ='fix'; 
include 'php/safe_encode.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'template/header.html';?>
</head>
<body class="off">
<div class="wrapbox" >
	<!-- TOP AREA -->
	<?php include 'template/toparea.html';?>

	<!-- NAV -->
	<?php include 'template/nav.html';?>

	<!-- TOP-BANNER -->
	<?php include 'content/fix_1_topbanner.html';?>

	<!-- WRAPSEMIBOX -->
	<div class="wrapsemibox">

		<!-- SEMIBOXSHADOW -->
		<?php include 'template/semiboxshadow.html';?>

		<!-- BREADCRUMB -->
		<?php include 'content/fix_2_breadcrumb.html';?>		
			
		<section class="container animated fadeInUp notransition" style="padding:0;">
		<!-- 1ST ROW -->
		<div class="row">
			<!-- GRUPOS da gama FIXAÇÂO -->
			<div class="col-md-12">
				<dl class="cat">
					<dt><div id="cat_ring" class="cat_img"><img src="img/grupos/ring2_24.png"></div>Anilhas e Freios</dt>
						<dd><?php $grupo = 'ani'; $file_path = 'normas/anilhas_freios.csv';	include 'normas/update_normas.php';?></dd>
					<dt><div id="cat_buc" class="cat_img"><img src="img/grupos/buc2_24.png"></div>Buchas</dt>
						<dd><?php $grupo = 'buc'; $file_path = 'normas/buchas.csv';	include 'normas/update_normas.php';?></dd>
					<dt><div id="cat_aab" class="cat_img"><img src="img/grupos/aab2_24.png"></div>Parafusos para Madeira</dt>
						<dd><?php $grupo = 'pfm'; $file_path = 'normas/parafusos_madeira.csv';	include 'normas/update_normas.php';?></dd>
					<dt><div id="cat_aaa2" class="cat_img"><img src="img/grupos/aaa2_24.png"></div>Parafusos Rosca de Chapa</dt>
						<dd><?php $grupo = 'prc'; $file_path = 'normas/parafusos_chapa.csv';	include 'normas/update_normas.php';?></dd>
					<dt><div id="cat_cat3" class="cat_img"><img src="img/grupos/cat2_24.png"></div>Parafusos Rosca de Metal</dt>
						<dd><?php $grupo = 'prm'; $file_path = 'normas/parafusos_metal.csv';	include 'normas/update_normas.php';?></dd>
					<dt><div id="cat_nut2" class="cat_img"><img src="img/grupos/nut2_24.png"></div>Porcas</dt>
						<dd><?php $grupo = 'por'; $file_path = 'normas/porcas.csv';	include 'normas/update_normas.php';?></dd>
				</dl>
			</div>
			<!-- end GRUPOS -->
		</div>
		</section>
	</div>
	<!-- /.wrapsemibox end-->

	<!-- BEGIN FOOTER -->
	<?php include 'template/footer.html';?>
	<!-- /footer section end-->

</div>
<!-- /.wrapbox ends-->

<!-- SCRIPTS - GERAL -->
<?php include 'template/scripts.html';?>

<!-- SCRIPTS - FIX -->
<script src="js/fix.js"></script>

</body>
</html>