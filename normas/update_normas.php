<div class="row">
<?php 
	//Select page requesting
	switch ($page) {
		case 'artigo':
			$col = 'col-md-6';
			break;
		case 'fix':
			$col = 'col-md-4';
			break;
		default:
			$col = 'col-md-4';
			break;
	}

	//Select CSS for rectangular and square img (anilhas vs parafusos)
	switch($grupo){
		case 'ani':
			$css_1 = 'cat_p_ani';
			$css_2 = 'cat_buttons_ani';
			$css_3 = 'img_ani_2';
			break;
		case 'por':
			$css_1 = 'cat_p_ani';
			$css_2 = 'cat_buttons_ani';
			$css_3 = 'img_ani';
			break;
		case 'buc':
			$css_1 = 'dummy';
			$css_2 = 'cat_buttons_ani';
			$css_3 = 'img_buc';
			break;
		default:
			$css_1 = 'dummy';
			$css_2 = 'cat_buttons';
			$css_3 = '';
	}

	$file = fopen($file_path, 'r');
	if ($file == FALSE) {
		echo 'fopen failed!';
		return 0;
	}

	//Discard headers
	$headers = fgetcsv($file,0,';');

	//$line is an array of the csv elements
	while (($line = fgetcsv($file,0,';')) !== FALSE) { ?>
		<?php $norma = encode($line[1]); ?>
		<?php echo '<div class="' .$col .' col-sm-6" >';?>
			<div class="catitem">
			<?php echo '<a href="artigo.php?nm=' .$norma  .'&equi=' .encode($line[2]) .'&desc='.encode($line[3]).'&img='.encode($line[0]).'" style="    text-decoration: none;">'; ?>
					<span class="div_link"><!-- Makes div a link  --></span>
					<?php if (!empty($line[8])) echo '<img id="img_aux" src="normas/img/' .$line[8] .'">' ?>
					<?php echo '<img id="' .$css_3 .'" src="normas/img/' .$line[0] .'">' ?>
					<?php echo '<div class="' .$css_2 .'">';
								if (!empty($line[4])) echo '<span id="blue_sq" class="color_bar" ></span>';
								if (!empty($line[5])) echo '<span id="red_sq" class="color_bar" ></span>';
								if (!empty($line[6])) echo '<span id="gray_sq" class="color_bar" ></span>';
								if (!empty($line[7])) echo '<span id="yellow_sq" class="color_bar" ></span>';
					?></div>
					<?php if($grupo=='ani' || $grupo=='por'){ ?><p style="font-size:4px;"><br></p><?php } ?>
					<h5><?php echo $line[1] .' '; if(!empty($line[2])){?><span class="barra_vertical">|</span><?php } ?><span class="catitemeq"><?php echo ' ' .$line[2]; ?></span></h5>
					<?php echo '<p id="' .$css_1 .'">'; echo$line[3]; ?></p>
					<div style=" z-index: 4; width: 100%; position: absolute; bottom: 0px; right: 0px; display: block; height: 10px; background-color: white;"></div>						
			</a>
			</div>
		</div>
		
	<?php } 
	fclose($file)?>
</div>