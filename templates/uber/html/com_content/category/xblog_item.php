<?php
 /**
 *------------------------------------------------------------------------------
 * @package Purity III Template - JoomlArt
 * @version 1.0 Feb 1, 2014
 * @author JoomlArt http://www.joomlart.com
 * @copyright Copyright (c) 2004 - 2014 JoomlArt.com
 * @license GNU General Public License version 2 or later;
 *------------------------------------------------------------------------------
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
if(version_compare(JVERSION, '3.0', 'lt')){
	JHtml::_('behavior.tooltip');
}
JHtml::_('behavior.framework');

// Create a shortcut for params.
$params  = & $this->item->params;
$images  = json_decode($this->item->images);
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 2);
$aInfo1 = ($params->get('show_publish_date') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author'));
$aInfo2 = ($params->get('show_create_date') || $params->get('show_modify_date') || $params->get('show_hits'));
$topInfo = ($aInfo1 && $info != 1) || ($aInfo2 && $info == 0);
$botInfo = ($aInfo1 && $info == 1) || ($aInfo2 && $info != 0);
$icons = $params->get('access-edit') || $params->get('show_print_icon') || $params->get('show_email_icon');
$hasCtrl = ($params->get('show_print_icon') ||
  $params->get('show_email_icon') ||
  $canEdit);

// update catslug if not exists - compatible with 2.5
if (empty ($this->item->catslug)) {
  $this->item->catslug = $this->item->category_alias ? ($this->item->catid.':'.$this->item->category_alias) : $this->item->catid;
}
?>
<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00' )) : ?>
<div class="system-unpublished">
	<?php endif; ?>

	<!-- Article -->
	<article>

		<!-- Intro image -->
      <div class="intro-image col-md-12">
        <?php echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
      </div>
    
      <div class="col-md-2">
        <!-- Aside -->
        <?php if ($topInfo || $hasCtrl) : ?>
        <aside class="article-aside clearfix">
          <?php if ($topInfo): ?>
          <?php echo JLayoutHelper::render('joomla.content.info_block.block_blog', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
          <?php endif; ?>

          <?php if ($params->get('show_print_icon')) : ?>
            <div class="print-icon"> <?php echo JHtml::_('icon.print_popup', $this->item, $params); ?> </div>
          <?php endif; ?>

          <?php if ($params->get('show_email_icon')) : ?>
            <div class="email-icon"> <?php echo JHtml::_('icon.email', $this->item, $params); ?> </div>
          <?php endif; ?>

          <?php if ($canEdit) : ?>
            <div class="edit-icon"> <?php echo JHtml::_('icon.edit', $this->item, $params); ?> </div>
          <?php endif; ?>
        </aside>  
        <?php endif; ?>
        <!-- //Aside -->
      </div>
      
      <div class="col-md-10">
        <?php if ($params->get('show_title')) : ?>
          <?php echo JLayoutHelper::render('joomla.content.item_title', array('item' => $this->item, 'params' => $params, 'title-tag'=>'h2')); ?>
        <?php endif; ?>

        <section class="article-intro clearfix">
          <?php if (!$params->get('show_intro')) : ?>
            <?php echo $this->item->event->afterDisplayTitle; ?>
          <?php endif; ?>

          <?php echo $this->item->event->beforeDisplayContent; ?>

          <?php echo $this->item->introtext; ?>
        </section>
        
        <!-- footer -->
        <?php if ($botInfo) : ?>
        <footer class="article-footer clearfix">
          <?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
        </footer>
        <?php endif; ?>
        <!-- //footer -->

        <?php if ($params->get('show_readmore') && $this->item->readmore) :
          if ($params->get('access-view')) :
            $link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
          else :
            $menu      = JFactory::getApplication()->getMenu();
            $active    = $menu->getActive();
            $itemId    = $active->id;
            $link1     = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
            $returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
            $link      = new JURI($link1);
            $link->setVar('return', base64_encode($returnURL));
          endif;
          ?>
          <section class="readmore">
            <a class="btn btn-default" href="<?php echo $link; ?>" itemprop="url">
              <span>
              <?php if (!$params->get('access-view')) :
                echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
              elseif ($readmore = $this->item->alternative_readmore) :
                echo $readmore;
                if ($params->get('show_readmore_title', 0) != 0) :
                  echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
                endif;
              elseif ($params->get('show_readmore_title', 0) == 0) :
                echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
              else :
                echo JText::_('COM_CONTENT_READ_MORE');
                echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
              endif; ?>
              </span>
            </a>
          </section>
        <?php endif; ?>
      </div>
	</article>
	<!-- //Article -->

<?php if ($this->item->state == 0 || strtotime($this->item->publish_up) > strtotime(JFactory::getDate())
|| ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00' )) : ?>
</div>
<?php endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?> 
