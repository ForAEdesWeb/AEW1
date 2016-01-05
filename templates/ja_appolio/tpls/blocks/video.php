<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ($this->countModules('video')) : ?>
<!-- SLIDESHOW -->
<div class="wrap t3-video hidden-xs <?php $this->_c('video') ?>">
	<jdoc:include type="modules" name="<?php $this->_p('video') ?>" style="T3Xhtml" />
</div>
<!-- //SLIDESHOW -->
<?php endif ?>