<?php
defined('_JEXEC') or die;

// Include the helper-class
include_once dirname(__FILE__) . '/helper.class.php';

// Variables
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$user				= JFactory::getUser();
$input				= $app->input;

// Detecting Active Variables
$option				= $input->get('option', '');
$view				= $input->get('view', '');
$layout				= $input->get('layout', '');
$task				= $input->get('task', '');
$itemid				= $input->get('Itemid', '');
$sitename			= $app->get('sitename');
$template			= 'templates/' . $this->template;
$article 			= $app->getParams('com_content');
$parentid 			= '';

// Call frameworks to be able to unset them
JHtml::_('bootstrap.framework');

if (isset($app->getMenu()->getActive()->parent_id))
{
	$parentid = $app->getMenu()->getActive()->parent_id;
}

if (isset($app->getMenu()->getActive()->tree[0]))
{
	$firstparent = $app->getMenu()->getActive()->tree[0];
}

// Instantiate the helper class
$helper = new StipTemplateHelper;

// Get meta and social information
$helper->adjustHead($this);

// Get social meta data
if ($this->params->get('social-metadata'))
{
	$helper->socialMetadata($this);
}

// Include CSS and JS
$helper->loadCssJs($this);

// User menu ACL
$usermenu = $helper->usermenuAcl($this);

// Get col number
if ($this->countModules('left') && $this->countModules('right'))
{
	$left = $this->params->get('col-left_both');
	$content = $this->params->get('col-content_both') . ' content';
	$right = $this->params->get('col-right_both');
}

if ($this->countModules('left') && !$this->countModules('right'))
{
	$left = $this->params->get('col-left_single');
	$content = $this->params->get('col-content_left_single') . ' content';
}

if ($this->countModules('right') && !$this->countModules('left'))
{
	$right = $this->params->get('col-right_single');
	$content = $this->params->get('col-content_right_single') . ' content';
}

if (!$this->countModules('left') && !$this->countModules('right'))
{
	$content = $this->params->get('col-content_alone') . ' content';
}

if ($option == 'com_content' && $view == 'form')
{
	$content = 'col-md-12';
}

if ($option == 'com_users' && $layout == 'edit')
{
	$content = 'col-md-12';
}
