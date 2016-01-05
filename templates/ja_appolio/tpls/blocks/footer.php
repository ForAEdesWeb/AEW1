<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<!-- FOOTER -->
<div id="back-to-top" class="back-to-top">
  <button class="btn btn-primary"><i class="icon-angle-up"></i></button>
</div>

<footer id="t3-footer" class="wrap t3-footer">
	<div class="container">
		<div class="mask">&nbsp;</div>
		<div class="row">
			<?php
				$hasSpotlight  = $this->checkSpotlight('footnav', 'footer-1, footer-2, footer-3, footer-4');
				$hasFooterLogo = $this->countModules('footer-logo');
			?>

			<?php if($hasSpotlight): ?>
			<div class="<?php echo $hasFooterLogo ? 'col-md-8 col-sm-9 col-xs-10' : 'col-xs-12' ?>">
				<?php $this->spotlight ('footnav', 'footer-1, footer-2, footer-3, footer-4') ?>
			</div>
			<?php endif; ?>
				
			<?php if($hasFooterLogo): ?>
			<div class="<?php echo ($hasSpotlight) ? 'col-md-4 col-sm-3 col-xs-2' : 'col-xs-12' ?> pull-right footer-logo text-hide <?php $this->_c('footer-logo')?>">
				<jdoc:include type="modules" name="<?php $this->_p('footer-logo') ?>" />
			</div>
			<?php endif; ?>
		</div>
		
		<section class="t3-copyright">
			<div class="row">
				<?php
          $hasT3Logo = $this->getParam('t3-rmvlogo', 1);
        ?>
				
				<div class="<?php echo $hasT3Logo ? 'col-md-10 col-sm-10 col-xs-12' : 'col-xs-12' ?> <?php $this->_c('footer') ?>">	
          <div class="copyright <?php $this->_c('footer')?>">
						<div class="ja-copyright">
							<jdoc:include type="modules" name="<?php $this->_p('footer') ?>" />
						</div>
						
						<small>
							<a href="http://twitter.github.io/bootstrap/" target="_blank">Bootstrap</a> is a front-end framework of Twitter, Inc. Code licensed under <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>.
						</small>
						<small>
							<a href="http://fortawesome.github.io/Font-Awesome/" target="_blank">Font Awesome</a> font licensed under <a href="http://scripts.sil.org/OFL">SIL OFL 1.1</a>.
						</small>
          </div>
        </div>
				
				<?php if($hasT3Logo): ?>
				<div class="col-md-2 col-sm-2 col-xs-12 text-hide">
					<div class="poweredby">
						<a class="t3-logo-small t3-logo-light" href="http://t3-framework.org" title="Powered By T3 Framework"
							 target="_blank"  <?php echo method_exists('T3', 'isHome') && T3::isHome() ? '' : 'rel="nofollow"' ?> >Powered by <strong>T3 Framework</strong></a>
					</div>
        </div>
        <?php endif; ?>
			</div>
		</section>
	</div>

</footer>
<!-- //FOOTER -->