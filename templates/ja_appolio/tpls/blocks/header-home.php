<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// get params
$sitename  = $this->params->get('sitename');
$slogan    = $this->params->get('slogan', '');
$logotype  = $this->params->get('logotype', 'text');
$logoimage = $logotype == 'image' ? $this->params->get('logoimage', 'templates/' . T3_TEMPLATE . '/images/logo.png') : '';
$logoimgsm = ($logotype == 'image' && $this->params->get('enable_logoimage_sm', 0)) ? $this->params->get('logoimage_sm', '') : false;

if (!$sitename) {
	$sitename = JFactory::getConfig()->get('sitename');
}

$logosize = 'col-md-12';
if ($headright = $this->countModules('action or social or head-search or languageswitcherload')) {
	$logosize = 'col-md-2';
}
?>

<!-- HEADER -->
<header id="t3-header" class="t3-header">
	<div class="clearfix">

		<!-- LOGO -->
		<div class="pull-left logo">
			<div class="logo-<?php echo $logotype, ($logoimgsm ? ' logo-control' : '') ?>">
  				<a href="<?php echo JURI::base(true) ?>" title="<?php echo strip_tags($sitename) ?>">
            <?php if($logotype == 'image'): ?>
              <img class="logo-img" src="<?php echo JURI::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
            <?php endif ?>
            <?php if($logoimgsm) : ?>
              <img class="logo-img-sm visible-sm visible-xs" src="<?php echo JURI::base(true) . '/' . $logoimgsm ?>" alt="<?php echo strip_tags($sitename) ?>" />
            <?php endif ?>
            <span><?php echo $sitename ?></span>
          </a>
  				<small class="site-slogan hidden-xs"><?php echo $slogan ?></small>
  			</div>
		</div>
		<!-- //LOGO -->
		
		<?php
			if ($this->getParam('addon_offcanvas_enable')):
				$this->loadBlock ('off-canvas');
			endif;
		?>
		
		<div class="t3-mainnav">
			<div class="container">

			<?php if($this->getParam('mm_type', 'mainmenu') != 'none') : ?>
				
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				
					<?php if ($this->getParam('navigation_collapse_enable', 1) && $this->getParam('responsive', 1)) : ?>
						<?php $this->addScript(T3_URL.'/js/nav-collapse.js'); ?>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".t3-navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					<?php endif ?>

				</div>

				<?php if ($this->getParam('navigation_collapse_enable')) : ?>
					<div class="t3-navbar-collapse navbar-collapse collapse"></div>
				<?php endif ?>

				<div class="t3-navbar navbar-collapse collapse">
					<jdoc:include type="<?php echo $this->getParam('navigation_type', 'megamenu') ?>" name="<?php echo $this->getParam('mm_type', 'mainmenu') ?>" />
				</div>
			<?php endif ?>
			</div>
		</div>


		<?php if ($headright): ?>
			<div class="pull-right clearfix">
				<div class="head-right">
				<?php 
					if ($this->countModules('action') && $this->getParam('addon_offcanvas_enable') ) : 
							$this->loadBlock ('off-canvas-login');
 					endif;
				?>

				<?php if ($this->countModules('social')) : ?>
					<!-- SOCIAL -->
					<div class="social <?php $this->_c('social') ?>">
						<jdoc:include type="modules" name="<?php $this->_p('social') ?>" style="raw" />
					</div>
					<!-- //SOCIAL -->
				<?php endif ?>

				<?php if ($this->countModules('head-search')) : ?>
					<!-- HEAD SEARCH -->
					<div class="head-search <?php $this->_c('head-search') ?>">
						<jdoc:include type="modules" name="<?php $this->_p('head-search') ?>" style="raw" />
					</div>
					<!-- //HEAD SEARCH -->
				<?php endif ?>

				<?php if ($this->countModules('languageswitcherload')) : ?>
					<!-- LANGUAGE SWITCHER -->
					<div class="languageswitcherload">
						<jdoc:include type="modules" name="<?php $this->_p('languageswitcherload') ?>" style="raw" />
					</div>
					<!-- //LANGUAGE SWITCHER -->
				<?php endif ?>
				</div>
			</div>
		<?php endif ?>

	</div>
</header>
<!-- //HEADER -->
