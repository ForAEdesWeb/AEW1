<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="registration<?php echo $this->pageclass_sfx?> col-xs-12">
<?php if ($this->params->get('show_page_heading')) : ?>
	<div class="page-header">
		<h1 class="page-title"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	</div>
<?php endif; ?>

	<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal">
	<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
		<?php $fields = $this->form->getFieldset($fieldset->name);?>
		<?php if (count($fields)):?>
			<fieldset>
			<?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend.
			?>
				<h1><?php echo JText::_($fieldset->label);?></h1>
			<?php endif;?>
      <div class="row">

        <?php foreach ($fields as $field) :// Iterate through the fields in the set and display them.?>
          <?php if ($field->hidden):// If the field is hidden, just display the input.?>
            <?php echo $field->input;?>
          <?php else:?>
            <div class="form-input col-md-5 col-sm-5 col-xs-12">
                <?php echo $field->label; ?>
                <?php echo $field->input;?>
            </div>
          <?php endif;?>
        <?php endforeach;?>
      </div>
			</fieldset>
		<?php endif;?>
	<?php endforeach;?>
		<div class="form-actions">
			<div class="clearfix">
				<button type="submit" class="btn btn-primary validate"><?php echo JText::_('JREGISTER');?></button>
        <input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="registration.register" />
				<?php echo JHtml::_('form.token');?>
			</div>
		</div>
	</form>
</div>
