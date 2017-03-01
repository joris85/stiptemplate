<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.tabstate');
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

//load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);

$this->form->loadFile( dirname(__FILE__) . "/profile.xml");
?>
<div class="profile-edit<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h3><?php echo $this->escape($this->params->get('page_heading')); ?></h3>
		</div>
	<?php endif; ?>

	<script type="text/javascript">
		Joomla.twoFactorMethodChange = function(e)
		{
			var selectedPane = 'com_users_twofactor_' + jQuery('#jform_twofactor_method').val();

			jQuery.each(jQuery('#com_users_twofactor_forms_container>div'), function(i, el) {
				if (el.id != selectedPane)
				{
					jQuery('#' + el.id).hide(0);
				}
				else
				{
					jQuery('#' + el.id).show(0);
				}
			});
		}
	</script>

	<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" class="form-validate" enctype="ultipart/form-data">
		<div class="btn-toolbar">
			<div class="btn-group">
				<button type="submit" class="btn btn-primary validate"><?php echo JText::_('JSUBMIT'); ?></button>
			</div>
			<div class="btn-group">
				<a class="btn btn-default" href="<?php echo JRoute::_(''); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
			</div	
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="profile.save" />
		</div>

		<ul class="nav nav-tabs">
			<li class="active"><a href="#default" data-toggle="tab"><?php echo JText::_('COM_USERS_PROFILE_DEFAULT_LABEL'); ?></a></li>
			<?php if (count($this->twofactormethods) > 1): ?>
				<li><a href="#twofactor" data-toggle="tab"><?php echo JText::_('COM_USERS_PROFILE_TWO_FACTOR_AUTH'); ?></a></li>
			<?php endif; ?>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="default">
				<?php echo $this->form->renderfield('id'); ?>
				<?php echo $this->form->renderfield('name'); ?>
				<?php echo $this->form->renderfield('username'); ?>
				<?php echo $this->form->renderfield('password1'); ?>
				<?php echo $this->form->renderfield('password2'); ?>
				<?php echo $this->form->renderfield('email1'); ?>
				<?php echo $this->form->renderfield('email2'); ?>
				<?php echo $this->form->renderfield('twofactor'); ?>
			</div>
			<div class="tab-pane" id="twofactor">
				<?php if (count($this->twofactormethods) > 1): ?>
					<fieldset>

						<div class="form-group">
							<label id="jform_twofactor_method-lbl" for="jform_twofactor_method" class="hasTooltip"
								   title="<strong><?php echo JText::_('COM_USERS_PROFILE_TWOFACTOR_LABEL') ?></strong><br/><?php echo JText::_('OM_USERS_PROFILE_TWOFACTOR_DESC') ?>">
								<?php echo JText::_('COM_USERS_PROFILE_TWOFACOR_LABEL'); ?>
							</label>
							<?php echo JHtml::_('select.genericlist', $this->twofactormethods, 'jform[twofactor][method]', array('onchange' => 'Joomla.woFactorMethodChange()'), 'value', 'text', $this->otpConfig->method, 'jform_twofactor_method', false) ?>
						</div>
						<div id="com_users_twofactor_forms_container">
							<?php foreach($this->twofactorform as $form): ?>
							<?php $style = $form['method'] == $this->otpConfig->method ? 'display: block' : 'display: none'; ?>
							<div id="com_users_twofactor_<?php echo $form['method'] ?>" style="<?php echo $style; ?>">
								<?php echo $form['form'] ?>
							</div>
							<?php endforeach; ?>
						</div>
					</fieldset>

					<fieldset>
						<legend>
							<?php echo JText::_('COM_USERS_PROFILE_OTEPS') ?>
						</legend>
						<div class="alert alert-info" style="display:block;">
							<?php echo JText::_('COM_USERS_PROFILE_OTEPS_DESC') ?>
						</div>
						<?php if (empty($this->otpConfig->otep)): ?>
						<div class="alert alert-warning" style="display:block;">
							<?php echo JText::_('COM_USERS_PROFILE_OTEPS_WAIT_DESC') ?>
						</div>
						<?php else: ?>
						<?php foreach ($this->otpConfig->otep as $otep): ?>
						<span class="col-lg-4">
							<?php echo substr($otep, 0, 4) ?>-<?php echo substr($otep, 4, 4) ?>-<?php echo substr($otep, 8, 4) ?>-<?php echo substr($otep, 12, 4) ?>
						</span>
						<?php endforeach; ?>
						<div class="clearfix"></div>
						<?php endif; ?>
					</fieldset>
				<?php endif; ?>
			</div>
		</div>

		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>