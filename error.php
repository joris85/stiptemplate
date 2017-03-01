<?php
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$params = $app->getTemplate(true)->params;
$error_message = $params->get('error-message');
$error_title = $params->get('error-title');
$error_image = $params->get('error-image');
$stipbase = JURI::base();
$templateDir = JPATH_SITE . '/templates/' . $this->template;
$templateUrl = '/templates/' . $this->template;
// Compile error.less
require $templateDir . '/libraries/less.php/Less.php';

$parser = new Less_Parser();
$parser->parseFile( $templateDir . '/less/error.less', $templateUrl );
$css = $parser->getCss();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $this->error->getCode(); ?> - <?php echo $this->error->getMessage();?></title>
	<style>
		<?php echo $css; ?>
	</style>
</head>
<body>
    <div class="error-page">
	<div class="logo"><img src="<?php echo $stipbase . "" . $error_image; ?>"></div>
	<div class="error_message">
		<span style="font-weight:bold;">error <?php echo $this->error->getCode(); ?></span> pagina niet gevonden
		<br />
		<h1 class="groot">
			<?php echo $error_title; ?>
		</h1>
		<div class="klein">
			<?php echo $error_message; ?>
			<br />
			<br />
            <p class="btn btn-home">
			<a href="/index.php" class="backhome">naar de homepage</a>
                </p>
		</div>
	</div>
        </div>
</body>
</html>