<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
	<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" style="visibility:hidden; width:0px; height:0px;">
		<a href="img/normas/ani_9021 persp.png" itemprop="contentUrl" data-size="1419x889"><img src="" itemprop="thumbnail" alt="Image description" /></a>
		<figcaption itemprop="caption description">Image caption 2</figcaption>
	</figure>
	<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" style="visibility:hidden; width:0px; height:0px;" >
		<a href="img/normas/din/ani_din_9021.jpg" itemprop="contentUrl" data-size="1419x889"><img src="" itemprop="thumbnail"  alt="Image description" /></a>
		<figcaption itemprop="caption description">Image caption 3</figcaption>
	</figure>
	<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" >
		<a href="normas/img/<?php echo $img; ?>" itemprop="contentUrl" data-size="<?php echo $width_img .'x' .$height_img?>"><img src="normas/img/<?php echo $img; ?>" itemprop="thumbnail" alt="<?php echo $nm; ?>" /></a>
		<figcaption itemprop="caption description"><?php echo $nm; ?> - <?php echo $desc; ?></figcaption>
	</figure>
</div>