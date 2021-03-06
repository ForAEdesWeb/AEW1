<?php
/** 
 *------------------------------------------------------------------------------
 * @package       T3 Framework for Joomla!
 *------------------------------------------------------------------------------
 * @copyright     Copyright (C) 2004-2013 JoomlArt.com. All Rights Reserved.
 * @license       GNU General Public License version 2 or later; see LICENSE.txt
 * @authors       JoomlArt, JoomlaBamboo, (contribute to this project at github 
 *                & Google group to become co-author)
 * @Google group: https://groups.google.com/forum/#!forum/t3fw
 * @Link:         http://t3-framework.org 
 *------------------------------------------------------------------------------
 */


defined('_JEXEC') or die;
$user =JFactory::getUser();
$jaloginclass='';
if($user->id)
{
    $jaloginclass=' login';
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class="<jdoc:include type="pageclass" />">

<head>
	<jdoc:include type="head" />
	<?php $this->loadBlock('head') ?>
</head>

<body onload="prettyPrint()">
<!-- Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->
<div class="t3-wrapper">
<!-- // Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->

<?php $this->loadBlock('video') ?>

<?php $this->loadBlock('header-home') ?>

<?php $this->loadBlock('home-1') ?>

<?php $this->loadBlock('footer') ?>

<!-- Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->
</div>
<!-- // Need these wrapper for off-canvas menu. Remove if you don't use of-canvas -->

</body>

</html>