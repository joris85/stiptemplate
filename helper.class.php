<?php
defined('_JEXEC') or die;

class StipTemplateHelper
{
	protected $app    = null;
	protected $config = null;
	protected $doc    = null;
	protected $input  = null;
	protected $user   = null;

	public function __construct()
	{
		// Fetch system variables
		$this->config   = JFactory::getConfig();
		$this->doc		= JFactory::getDocument();
		$this->app		= JFactory::getApplication();
		$this->input	= $this->app->input;
		$this->user		= JFactory::getUser();
	}

	public function adjustHead($template)
	{
		// Set new meta
		$this->doc->setMetadata('X-UA-Compatible', 'IE=edge');
		$this->doc->setMetadata('viewport', 'width=device-width, initial-scale=1.0, user-scalable=yes');
	}

	public function socialMetadata($template)
	{
		// Get meta site description
		if ($this->doc->getMetaData("description") != '')
		{
			$description = $this->doc->getMetaData("description");
		}
		else
		{
			$description = $this->config->get('MetaDesc');
		}

		// Get social image
		if ($this->input->get('option') == 'com_content' && $this->input->get('view') == 'article')
		{
			// Get current article information
			$id      = $this->input->getInt('id');
			$article = JTable::getInstance("content");
			$article->load($id);
			$images  = json_decode($article->get('images'));

			// Check if the <img tag is used in the article
			if (strpos($article->introtext, '<img') !== false)
			{
				// Get img tag from article
				preg_match('/(?<!_)src=([\'"])?(.*?)\\1/', $article->introtext, $articleimages);

				$socialimage = $articleimages[2];
			}
			elseif ($images->image_intro != '')
			{
				$socialimage = $images->image_intro;
			}
			elseif ($images->image_fulltext != '')
			{
				$socialimage = $images->image_fulltext;
			}
			else
			{
				$socialimage = $template->params->get('meta-image');
			}
		}
		else
		{
			$socialimage = $template->params->get('meta-image');
		}

		// Set Twitter metadata
		$this->doc->setMetadata('twitter:card', 'summary');
		$this->doc->setMetadata('twitter:site', JURI::current());
		$this->doc->setMetadata('twitter:title', $this->doc->getTitle());
		$this->doc->setMetadata('twitter:description', $description);
		$this->doc->setMetadata('twitter:image', $socialimage);

		// Set Facebook metadata
		$this->doc->addCustomTag('<meta property="og:type" content="article" />');
		$this->doc->addCustomTag('<meta property="og:title" content="' . $this->doc->getTitle() . '" />');
		$this->doc->addCustomTag('<meta property="og:site_name" content="' . $this->config->get('sitename') . '" />');
		$this->doc->addCustomTag('<meta property="og:url" content="' . JURI::current() . '" />');
		$this->doc->addCustomTag('<meta property="og:description" content="' . $description . '" />');
		$this->doc->addCustomTag('<meta property="og:image" content="' . $socialimage . '" />');
	}

	public function loadCssJs($template)
	{
		// Determine the variables
		$templateUrl = $this->baseurl . 'templates/' . $template->template;
		$templateDir = JPATH_SITE . '/templates/' . $template->template . '/';

		// Remove CSS/JS
		unset($this->doc->_scripts['/media/jui/js/bootstrap.min.js']);

		// Add Bootstrap 3.x
		$this->doc->addScript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js');
		$this->doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css');
		$this->doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

		// Add other scripts
		$this->doc->addScript($templateUrl . '/js/html5.min.js');
		$this->doc->addScript($templateUrl . '/js/respond.min.js');
		$this->doc->addScript($templateUrl . '/js/template.js');
        $this->doc->addScript($templateUrl . '/js/input-validation.js');

		// Compile LESS files
		require_once $templateDir . 'libraries/less.php/Less.php';

		// Convert template parameters to an array
		$templateparams = json_decode(json_encode($template->params), true);
		$lessparams     = array();

		if ($template->params->get('xml-variables'))
		{
			foreach ($templateparams as $param => $value)
			{
				// Filter for less_ parameters
				if (strpos($param, "less_") !== false)
			    {
					// Delete less_ prefex
					$param = str_replace("less_", "", $param);

					// Add parameter to lessparameters array
					$lessparams[$param] = $value;
			    }
			}
		}
		else
		{
			// Theme parameter is necessary for loading the correct LESS files in the index.less
			$lessparams['theme'] = $template->params->get('less_theme');
		}

		// Compile less files to css with parameters
		try
		{
			$less_files = array($templateDir . '/less/index.less' => JURI::base());
			$options = array(
				'cache_dir' => $templateDir . '/cache/',
				'sourceMap' => true,
				'compress' => true
			);
			$css_file_name = Less_Cache::Get($less_files, $options, $lessparams);
			$this->doc->addStyleSheet($templateUrl . '/cache/' . $css_file_name);
		}
		catch (Exception $e)
		{
			$error_message = $e->getMessage();
			$this->app->enqueueMessage($error_message, 'warning');
		}
	}

	public function usermenuAcl($template)
	{
		$usermenuaccess = $template->params->get("usermenu-access");
		$usermenu = false;

		foreach ($usermenuaccess as $group)
		{
			if (in_array($group, $this->user->groups, false))
			{
				$usermenu = true;

				return $usermenu;
			}
		}
	}
}
