<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php
	if (!$this->getParam('addon_offcanvas_enable')) return ;
?>
		<div class="action hidden-xs">
			<button class="btn btn-primary off-canvas-toggle" type="button" data-nav="#t3-off-canvas-login" data-pos="right" data-effect="<?php echo $this->getParam('addon_offcanvas_effect', 'off-canvas-effect-3') ?>">
		  		<?php echo JText::_('TPL_TRY_DISCOVER_FREE');?>
			</button>
			
		</div>
		
		<!-- OFF-CANVAS ACTION -->
		<div id="t3-off-canvas-login" class="t3-off-canvas">
		
		  <div class="t3-off-canvas-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  </div>
		
		  <div class="t3-off-canvas-body">
		    <jdoc:include type="modules" name="<?php $this->_p('action') ?>" style="T3Xhtml" />
		  </div>
		
		</div>
		<!-- //OFF-CANVAS ACTION -->