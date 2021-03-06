<?php
/**
 * ------------------------------------------------------------------------
 * JA Directory Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

// no direct access
defined('_JEXEC') or die('Restricted access');	

// Template helper
JLoader::register('JATemplateHelper', T3_TEMPLATE_PATH . '/helper.php');
?>
<div class="ja-twitter">
	<?php if( $params->get('showtextheading') ) : ?>
	<h4><?php echo $params->get('headingtext'); ?></h4>
	<?php endif; ?>
	
	<!-- ACCOUNT INFOMATION -->
	<?php if( $useDisplayAccount && !empty($accountInfo)): ?>
	<div class="ja-twitter-account">
		<?php include( JModuleHelper::getLayoutPath( 'mod_jatwitter', 'screen_name') ); ?>
	</div>
	<?php endif; ?>
	<!-- // ACCOUNT INFOMATION -->
	
	<!-- LISTING TWEETS -->
	<?php if( is_array($list) && !empty($list) ) : ?>	
	<div class="ja-twitter-tweets">
	
		<?php foreach( $list as $item ) : ?>
		<div class="ja-twitter-item">
			<?php if( $showIcon ) : ?>
			<div class="ja-twitter-image">
		 		<a href="http://twitter.com/<?php echo $item->screen_name; ?>" target="_blank">
					<img src="<?php echo $item->profile_image_url; ?>" style="width:<?php echo $iconsize; ?>px;" alt="<?php echo $item->name; ?>" class="ja-twitter-avatar" />
				</a>
			</div>
			<?php endif ; ?>
			
			<?php if( $showSource ) : ?>
			<div class="ja-twitter-source">
				<?php echo JText::_( 'FROM' ); ?> <span><?php echo $item->source; ?></span>
			</div>
			<?php endif ; ?>
			
			<div class="ja-twitter-text">
				<?php if( $showUsername ) : ?>
			    <a href="http://twitter.com/<?php echo $item->screen_name; ?>" target="_blank"><?php echo $item->name; ?></a>
				<?php endif ; ?>
					
				<?php echo $jatHerlper->convert( $item->text ); ?>

				<span lass="ja-twitter-date"><?php echo JATemplateHelper::relTime($item->created_at); ?></span>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>	
	<!-- //LISTING TWEETS -->
	
	<!-- LISTING FRIENDS -->
	<?php if ( $useFriends && isset($friends) && is_array($friends) ): ?>
	<div class="ja-twitter-friends clearfix">
		<h4><?php echo  JText::_( 'MY_FRIENDS' ); ?></h4>
		<?php foreach( $friends as $friend ) :	?>
		<?php if( isset( $friend ) ) :	?>

			<a href="http://twitter.com/<?php echo $friend->screen_name; ?>" title="<?php echo $friend->name; ?>" target="_blank">
				<img style="width:<?php echo $sizeIconfriend; ?>px;" alt="<?php echo $friend->name; ?>" src="<?php echo $friend->profile_image_url; ?>" />	
			</a>	
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<?php elseif ( !$useFriends):?>
	<?php else:?>
		<center>
			<h4><?php echo JText::_('NO_FRIEND');?></h4>
		</center>
	<?php endif; ?>
	<!-- //LISTING FRIENDS -->
	<?php if ( $showfollowlink == "1" ){ ?>
	<br />
	<center>
	<?php echo $jatHerlper->getFollowButton($params);  ?>
	</center>
	<?php }  ?>
</div>