<?php
/**
 * ------------------------------------------------------------------------
 * JA Appolio Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */
defined('_JEXEC') or die('Restricted access');
$thumbWidth = $params->get('thumbWidth', 0);
$thumbHeight = $params->get('thumbHeight', 0);
?>
<div id="ja-ss-<?php echo $module->id;?>" class="ja-ss<?php echo $params->get( 'moduleclass_sfx' );?> ja-ss-wrap <?php echo $type; ?>"  style="visibility: hidden">
	<div class="ja-ss-items">
	<?php for ($i = 0; $i < count($images); $i++): ?>
		<div class="ja-ss-item">
			<img src="<?php echo $images[$i];?>" alt="<?php echo str_replace('"', '"/', strip_tags($captionsArray[$i]) );?>"/>

			<?php 
				$icaption = trim($captionsArray[$i]);
				$ititle = trim($titles[$i])
			?>
			<?php if(strlen($icaption) || strlen($ititle)): ?>
			<div class="ja-ss-desc">
				<?php if($ititle) : ?>
				<h3><?php echo $ititle ?></h3> 
				<?php endif; ?>
				<?php if($icaption) : ?>
				<p><?php echo $icaption ?></p>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="ja-ss-mask"></div>
		</div>
	<?php endfor; ?>
	</div>
	
	<?php if ($showThumbnail == 1): ?>
	<div class="ja-ss-thumbs-wrap" style="right: <?php echo (20*count($images) + 5*(count($images)-1) + 40); ?>px;">
		<div class="ja-ss-thumbs"><!--
		<?php for ($i=0;$i<count($images); $i++): ?>
			--><div class="ja-ss-thumb">
				<span>&nbsp;</span>
				
				<img src="<?php echo $thumbArray[$i]?>" alt="Photo Thumbnail" style="top: <?php echo -($thumbHeight + 15); ?>px; left: <?php echo -($thumbWidth/2)+5; ?>px;"/>
			</div><!-- //ja-ss-thumb
		<?php endfor; ?>
		--></div>
	</div>
	<?php endif; ?>
	<?php if ($showNavigation): ?>
	<div class="ja-ss-btns clearfix">
		<span class="ja-ss-prev">&laquo; <?php echo JText::_('PREVIOUS');?></span>
		<span class="ja-ss-playback">&lsaquo; <?php echo JText::_('PLAYBACK');?></span>
		<span class="ja-ss-stop"><?php echo JText::_('STOP');?></span>
		<span class="ja-ss-play"><?php echo JText::_('PLAY');?> &rsaquo;</span>
		<span class="ja-ss-next"><?php echo JText::_('NEXT');?>  &raquo;</span>
	</div>
	<?php endif; ?>
</div>