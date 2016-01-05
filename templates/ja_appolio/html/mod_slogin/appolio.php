<?php
/**
 * Social Login
 *
 * @version 	1.0
 * @author		SmokerMan, Arkadiy, Joomline
 * @copyright	© 2012. All rights reserved.
 * @license 	GNU/GPL v.3 or later.
 */

// No direct access.
defined('_JEXEC') or die('(@)|(@)');
?>
<noindex>
<?php if ($type == 'logout') : ?>

<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">

    <?php if (!empty($avatar)) : ?>
        <div class="slogin-avatar">
			<a href="<?php echo $profileLink; ?>">
				<img src="<?php echo $avatar; ?>" alt=""/>
			</a>
        </div>
    <?php endif; ?>

    <div class="login-greeting">
	<?php echo JText::sprintf('MOD_SLOGIN_HINAME', htmlspecialchars($user->get('name')));	 ?>
	</div>
	<div class="logout-button">
		<input type="submit" name="Submit" class="btn btn-primary" value="<?php echo JText::_('JLOGOUT'); ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<?php else : ?>
<?php if ($params->get('inittext')): ?>
	<div class="pretext">
	<p><?php echo $params->get('inittext'); ?></p>
	</div>
<?php endif; ?>
<div class="slogin-buttons <?php echo $moduleclass_sfx?> appolio">

    <?php if (count($plugins)): ?>
    <?php
        foreach($plugins as $link):
            $linkParams = '';
            if(isset($link['params'])){
                foreach($link['params'] as $k => $v){
                    $linkParams .= ' ' . $k . '="' . $v . '"';
                }
            }
            
            switch ($link['class']) {
            
						case 'facebookslogin':				
							$btnClass = 'fb-btn';	
							$iClass		= 'fa-facebook';
							$label		= 'Sign in with Facebook';	
							break;
							
						case 'mailslogin':				
							$btnClass = 'mails-btn';	
							$iClass		= '';
							$label		= 'Sign in with Mail.ru';	
							break;
							
						case 'odnoklassnikislogin':				
							$btnClass = 'odnok-btn';	
							$iClass		= '';
							$label		= 'Odnoklassniki';	
							break;
							
						case 'twitterslogin':				
							$btnClass = 'twitter-btn';	
							$iClass		= 'fa-twitter';
							$label		= 'Sign in with Twitter';	
							break;
							
						case 'vkontakteslogin':				
							$btnClass = 'vkontak-btn';	
							$iClass		= '';
							$label		= 'Sign in with Vkontakte';	
							break;
							
						case 'yandexslogin':				
							$btnClass = 'yandex-btn';	
							$iClass		= '';
							$label		= 'Sign in with Yandex';	
							break;
							
						case 'linkedinslogin':				
							$btnClass = 'linkedin-btn';	
							$iClass		= 'fa-linkedin';
							$label		= 'Sign in with Linkedin';	
							break;
							
						case 'uloginslogin':				
							$btnClass = 'ulogin-btn';	
							$iClass		= '';
							$label		= 'Sign in with ULogin';	
							break;
							
						case 'liveslogin':				
							$btnClass = 'lives-btn';	
							$iClass		= '';
							$label		= 'Sign in with Live.com';	
							break;
							
						default:
							$btnClass = 'g-btn';		
							$iClass		= 'fa-google-plus';	
							$label		= 'Sign in with Google';		
							break;
						}
						?>
            
            <a  class="social-btn <?php echo $btnClass; ?>" rel="nofollow" <?php echo $linkParams;?> href="<?php echo JRoute::_($link['link']);?>">
							<i class="fa <?php echo $iClass; ?>"></i>
							<?php echo $label; ?>
						</a>
        <?php endforeach; ?>
    <?php endif; ?>

</div>
<div class="slogin-clear"></div>
<?php if ($params->get('pretext')): ?>
	<div class="pretext">
	<p><?php echo $params->get('pretext'); ?></p>
	</div>
<?php endif; ?>
<?php if ($params->get('show_login_form')): ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" >
	<fieldset class="userdata">
	<p id="form-login-username" class="control-group">
		<label for="modlgn-username"><?php echo JText::_('MOD_SLOGIN_VALUE_USERNAME') ?></label>
		<input id="modlgn-username" type="text" name="username" class="inputbox"  size="18" />
	</p>
	<p id="form-login-password" class="control-group">
		<label for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
		<input id="modlgn-passwd" type="password" name="password" class="inputbox" size="18"  />
	</p>
	<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
	<p id="form-login-remember" class="control-group">
		<label for="modlgn-remember" class="checkbox">
			<input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
			<?php echo JText::_('MOD_SLOGIN_REMEMBER_ME') ?>
		</label>
	</p>
	<?php endif; ?>
	<input type="submit" name="Submit" class="btn btn-primary" value="<?php echo JText::_('JLOGIN') ?>" />
	<input type="hidden" name="option" value="com_users" />
	<input type="hidden" name="task" value="user.login" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
	<?php echo JHtml::_('form.token'); ?>
	</fieldset>
	<ul class="unstyled">
		<li>
			<a  rel="nofollow" href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
			<?php echo JText::_('MOD_SLOGIN_FORGOT_YOUR_PASSWORD'); ?></a>
		</li>
		<li>
			<a  rel="nofollow" href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
			<?php echo JText::_('MOD_SLOGIN_FORGOT_YOUR_USERNAME'); ?></a>
		</li>
		<?php
		$usersConfig = JComponentHelper::getParams('com_users');
		if ($usersConfig->get('allowUserRegistration')) : ?>
		<li>
			<a  rel="nofollow" href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
				<?php echo JText::_('MOD_SLOGIN_REGISTER'); ?></a>
		</li>
		<?php endif; ?>
	</ul>
	<?php if ($params->get('posttext')): ?>
		<div class="posttext">
		<p><?php echo $params->get('posttext'); ?></p>
		</div>
	<?php endif; ?>
</form>
<?php endif; ?>
<?php endif; ?>
</noindex>
<?php if (isset($allow)) : ?>
	<div style="text-align: right;">
		<a style="text-decoration:none; color: #c0c0c0; font-family: arial,helvetica,sans-serif; font-size: 5pt; " target="_blank" href="http://joomclub.net/">joomclub.net</a>
	</div>
<?php endif; ?>