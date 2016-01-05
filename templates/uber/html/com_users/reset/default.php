<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
if(version_compare(JVERSION, '3.0', 'lt')){
	JHtml::_('behavior.tooltip');
}
JHtml::_('behavior.formvalidation');
?>
<div class="reset <?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<div class="page-header">
		<h1>
			<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
	</div>
	<?php endif; ?>

	<form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=reset.request'); ?>" method="post" class="form-validate form-horizontal">
		<div class="form-box">
			<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
			<p><?php echo JText::_($fieldset->label); ?></p>
	
			<fieldset>
				<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field): ?>
					<div class="form-group">
						<div class="control-label">
						<?php echo $field->label; ?>
					</div>
						<div>
						<?php echo $field->input; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</fieldset>
			<?php endforeach; ?>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn btn-rounded btn-primary btn-lg validate"><?php echo JText::_('JSUBMIT'); ?></button>
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</div>
	</form>
</div>
