<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if (version_compare(JVERSION, '3.0', 'ge')) {
	JHtml::_('bootstrap.tooltip');
}


JLoader::register('JAAppolioHelper', T3_TEMPLATE_PATH . '/templateHelper.php');

$lang = JFactory::getLanguage();
$class = ' class="category-item col-md-4 col-xs-12 first"';

//$item->description = 
if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
	?>
	<?php foreach ($this->items[$this->parent->id] as $id => $item) : 
			//Category images
			$desimg = JAAppolioHelper::image($item->description);
			if ($this->params->get('show_description_image') && $item->getParams()->get('image')){
				$item->catimg = '<img src="'.$item->getParams()->get('image').'"/>';
			}else{
				
				if(count($desimg)>0){
					if(isset($desimg->img)){
						$item->catimg = $desimg->img;
					}
				}
			}
			$item->description = $desimg->des;
	?>
	<?php
	if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		if (!isset($this->items[$this->parent->id][$id + 1])) {
			$class = ' class="category-item col-md-4 col-xs-12 last"';
		}
		?>
		<div<?php echo $class; ?>>
			<?php $class = ' class="category-item col-md-4 col-xs-12"'; ?>
			<div class="category-inner">
			<div class="category-header">
				<?php echo $item->catimg;?>
				<h3 class="page-header item-title"><a
						href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
						<?php echo $this->escape($item->title); ?></a>
					<?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
						<span class="badge badge-info tip hasTooltip" rel="tooltip"
							  title="<?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?>">
						<?php echo $item->numitems; ?> 
					</span>
					<?php endif; ?>
					<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat != 1) : ?>
						<a href="#category-<?php echo $item->id; ?>" data-toggle="collapse" data-toggle="button"
						   class="btn btn-default btn-xs pull-right"><span class="fa fa-plus"></span></a>
					<?php endif; ?>
				</h3>
			</div>
			<?php if ($this->params->get('show_subcat_desc_cat') == 1) : ?>
				<?php if ($item->description) : ?>
					<div class="category-desc">
						<?php 
						echo JHtml::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			</div>
			<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat != 1) : ?>
				<div class="collapse fade" id="category-<?php echo $item->id; ?>">
					<?php
					$this->items[$item->id] = $item->getChildren();
					$this->parent = $item;
					$this->maxLevelcat--;
					echo $this->loadTemplate('items');
					$this->parent = $item->getParent();
					$this->maxLevelcat++;
					?>
				</div>
			<?php
			endif; ?>

		</div>
	<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
