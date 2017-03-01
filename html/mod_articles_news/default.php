<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="newsflash<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
    <div class="newsflash-item col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<?php require JModuleHelper::getLayoutPath('mod_articles_news', '_item'); ?>
        </div>
	<?php endforeach; ?>
</div>
