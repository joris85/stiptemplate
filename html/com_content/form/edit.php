<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.tabstate');
JHtml::_('behavior.keepalive');
JHtml::_('behavior.calendar');
JHtml::_('behavior.formvalidator');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.modal', 'a.modal_jform_contenthistory');

// Create shortcut to parameters.
$params = $this->state->get('params');
//$images = json_decode($this->item->images);
//$urls = json_decode($this->item->urls);

// This checks if the editor config options have ever been saved. If they haven't they will fall back to the original settings.
$editoroptions = isset($params->show_publishing_options);
if (!$editoroptions)
{
	$params->show_urls_images_frontend = '0';
}

JFactory::getDocument()->addScriptDeclaration("
	Joomla.submitbutton = function(task)
	{
		if (task == 'article.cancel' || document.formvalidator.isValid(document.getElementById('adminForm')))
		{
			" . $this->form->getField('articletext')->save() . "
			Joomla.submitform(task);
		}
	}
");
?>
<div class="edit item-page<?php echo $this->pageclass_sfx; ?>">
	<?php if ($params->get('show_page_heading', 1)) : ?>
	<div class="page-header">
		<h1>
			<?php echo $this->escape($params->get('page_heading')); ?>
		</h1>
	</div>
	<?php endif; ?>

	<form action="<?php echo JRoute::_('index.php?option=com_content&a_id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
		<div class="btn-toolbar">
			<div class="btn-group">
				<button type="button" class="btn btn-success" onclick="Joomla.submitbutton('article.save')">
					<span class="fa fa-check"></span><?php echo JText::_('JSAVE') ?>
				</button>
			</div>
			<div class="btn-group">
				<button type="button" class="btn btn-default" onclick="Joomla.submitbutton('article.cancel')">
					<span class="fa fa-times-circle" style="color:#bd362f;"></span><?php echo JText::_('JCANCEL') ?>
				</button>
			</div>
			<?php if ($params->get('save_history', 0)) : ?>
			<div class="btn-group">
				<?php echo $this->form->getInput('contenthistory'); ?>
			</div>
			<?php endif; ?>
		</div>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#editor" data-toggle="tab"><?php echo JText::_('COM_CONTENT_ARTICLE_CONTENT') ?></a></li>
          	<?php foreach ($this->form->getFieldsets('easyseo') as $name => $fieldSet) : ?>
				<li><a href="#easyseo-<?php echo $name; ?>" data-toggle="tab"><?php echo JText::_($fieldSet->label); ?></a></li>
			<?php endforeach; ?>
			<li><a href="#publishing" data-toggle="tab"><?php echo JText::_('COM_CONTENT_PUBLISHING') ?></a></li>
			<?php if ($params->get('show_urls_images_frontend') ) : ?>
				<li><a href="#images" data-toggle="tab"><?php echo JText::_('COM_CONTENT_IMAGES_AND_URLS') ?></a></li>
			<?php endif; ?>
			
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="editor">
				<div class="col-lg-8">
					<div class="form-group">
						<?php $this->form->setFieldAttribute('title', 'class', 'input-lg inputbox'); ?>
						<?php echo $this->form->getInput('title'); ?>
					</div>

					<div class="form-group">
						Url achtervoegsel: <strong id="alias"><?php echo $this->item->alias; ?></strong>
					</div>

					<?php echo $this->form->getInput('articletext'); ?>
				</div>
				<div class="col-lg-4 publication-selector">
					<div class="well">
						<h3 class="page-header">Publicatie gegevens</h3>
                        	<div class="status-ps">
						<?php echo $this->form->renderField('state'); ?>
                            </div>
                        <div class="status-catid">
						<?php echo $this->form->renderField('catid'); ?>
                              </div>
                        <div class="status-tags">
						<?php echo $this->form->renderField('tags'); ?>
                              </div>
                        <div class="status-language">
						<?php echo $this->form->renderField('language'); ?>
                              </div>
                            <div class="status-pu">
						<?php echo $this->form->renderField('publish_up'); ?>
                                  </div>
                                <div class="status-pd">
						<?php echo $this->form->renderField('publish_down'); ?>
                                </div>
					</div>
				</div>
				<div class="col-lg-4 image-selector">
					<div class="well">
						<h3 class="page-header">Afbeelding</h3>
                         <div class="image-intro">
						<?php echo $this->form->renderField('image_intro', 'images'); ?>
                               </div>
                         <div class="image-fulltext">
						<?php echo $this->form->renderField('image_fulltext', 'images'); ?>
                            </div>
					</div>
				</div>
			</div>
         	<?php foreach ($this->form->getFieldsets('easyseo') as $name => $fieldSet) : ?>
          		<div class="tab-pane" id="easyseo-<?php echo $name; ?>">
					<?php foreach ($this->form->getFieldset($name) as $field) : ?>
                  		<?php echo $field->renderField(); ?>
                  	<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
			<div class="tab-pane" id="publishing">
				<?php if ($this->item->params->get('access-change')) : ?>
					<?php echo $this->form->renderField('access'); ?>
				<?php endif; ?>
				<?php echo $this->form->renderField('featured'); ?>
				<?php if ($params->get('save_history', 0)) : ?>
					<?php echo $this->form->renderField('version_note'); ?>
				<?php endif; ?>
				<?php echo $this->form->renderField('created_by_alias'); ?>
				<?php if (is_null($this->item->id)):?>
					<div class="form-group">
						<?php echo JText::_('COM_CONTENT_ORDERING'); ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($params->get('show_urls_images_frontend')): ?>
			<div class="tab-pane" id="images">
				<?php echo $this->form->renderField('image_intro_alt', 'images'); ?>
				<?php echo $this->form->renderField('image_intro_caption', 'images'); ?>
				<?php echo $this->form->renderField('float_intro', 'images'); ?>
				<?php echo $this->form->renderField('image_fulltext_alt', 'images'); ?>
				<?php echo $this->form->renderField('image_fulltext_caption', 'images'); ?>
				<?php echo $this->form->renderField('float_fulltext', 'images'); ?>
				<div class="no_class">
					<?php echo $this->form->renderField('urla', 'urls'); ?>
					<?php echo $this->form->renderField('urlatext', 'urls'); ?>
					<?php echo $this->form->getInput('targeta', 'urls'); ?>
					<?php echo $this->form->renderField('urlb', 'urls'); ?>
					<?php echo $this->form->renderField('urlbtext', 'urls'); ?>
					<div class="form-group">
						<?php echo $this->form->getInput('targetb', 'urls'); ?>
					</div>
					<?php echo $this->form->renderField('urlc', 'urls'); ?>
					<?php echo $this->form->renderField('urlctext', 'urls'); ?>
					<div class="form-group">
						<?php echo $this->form->getInput('targetc', 'urls'); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="tab-pane" id="metadata">
				<?php echo $this->form->renderField('metadesc'); ?>
				<?php echo $this->form->renderField('metakey'); ?>

				<input type="hidden" name="task" value="" />
				<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
				<?php if ($this->params->get('enable_category', 0) == 1) :?>
				<input type="hidden" name="jform[catid]" value="<?php echo $this->params->get('catid', 1); ?>" />
				<?php endif; ?>
			</div>
		</div>
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
<div class="hidden">
<?php if (is_null($this->item->id)) : ?>
	<?php echo $this->form->renderField('alias'); ?>
<?php endif; ?>
</div>

<script type="text/javascript">
	// Add title placeholder
	jQuery("#jform_title").attr("placeholder", "Artikel titel");

	// Transform title to alias while typing
	jQuery("#jform_title").keyup(function ()
	{
		var title = jQuery(this).val();
		alias = title.toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
		jQuery("#jform_alias").val(alias);
		jQuery("#alias").html(alias);
	});

	// Allow alias editing on click
	jQuery('#alias').click(function ()
	{
		var replaceWith = jQuery('<input id="temp" name="temp" type="text"></input>');
		var connectWith = jQuery('#jform_alias');
		var elem = jQuery(this);
		elem.hide();
		elem.after(replaceWith);
		replaceWith.val(elem.text());
		replaceWith.focus();
		replaceWith.blur(function ()
		{
			if (jQuery(this).val() != "")
			{
				connectWith.val(jQuery(this).val()).change();
				elem.text(jQuery(this).val());
			}
			jQuery(this).remove();
			elem.show();
		});

		// Only allow valid alias characters
		jQuery("#temp").bind('keypress', function (event)
		{
			var regex = new RegExp("^[a-z0-9\-]+$");
			var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			if (!regex.test(key))
			{
				event.preventDefault();
				return false;
			}
		});
	});

	jQuery(document).ready(function($) {
		$(".hasTipImgpath").addClass("inputbox");
	});
</script>
