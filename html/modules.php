<?php
defined('_JEXEC') or die;

function modChrome_basis($module, &$params, &$attribs) 
{
	$moduleTag 		= $params->get('module_tag', 'div');
	$headerTag 		= htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize 	= (int)$params->get('bootstrap_size', 0);
	$moduleClass 	= $bootstrapSize != 0 ? ' col-md-' . $bootstrapSize : '';
	// Temporarily store header class in variable
	$headerClass 	= $params->get('header_class');
	$headerClass 	= ($headerClass) ? ' class="moduletitle ' . htmlspecialchars($headerClass) . '"' : 'moduletitle';
	
	if (!empty($module->content)) 
	{
		echo '<' . $moduleTag . ' class="module ' . htmlspecialchars($params->get('moduleclass_sfx')) . '' . $moduleClass . '">
			<div class="modulecontent">';
		if ((bool)$module->showtitle) 
		{
			echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
		}
		echo $module->content;
		echo '</div>
		</' . $moduleTag . '>';
	}
}
?>