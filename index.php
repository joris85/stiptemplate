<?php
defined('_JEXEC') or die;

// Load This Template Helper
include_once JPATH_THEMES . '/' . $this->template . '/helper.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
 
    <jdoc:include type="head" />

    <!-- START Metadata that is defined in the XML -->
    <?php echo $this->params->get('meta-head'); ?>
    <!-- END Metadata that is defined in the XML -->
    <!-- Get checkbox for paralax section -->

    <!-- START Link tag that is defined in the XML -->
    <?php echo $this->params->get('link-tag'); ?>
    <?php echo $this->params->get('link-tag2'); ?>
    <!-- END Link tag that is defined in the XML -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body id="body" class="<?php echo $option . ' view-' . $view
    . ($layout ? ' layout-' . $layout : ' no-layout')
    . ($task ? ' task-' . $task : ' no-task')
    . ($itemid ? ' itemid-' . $itemid : '')
    . ($parentid ? ' parentid-' . $parentid : '')
    . ($firstparent ? ' first-parent-' . $firstparent : '')
    . ($usermenu == true ? ' user-login' : '');
echo $article->get('pageclass_sfx'); ?>">


<?php if ($this->countModules('sticky-top')): ?>
    <!-- Start Stickymenu -->
    <div class="stickymenu menu-style">
        <div class="container container-sticky">
            <jdoc:include type="modules" name="sticky-top" style="basis" />
        </div>
    </div>
    <!-- End Stickymenu -->
<?php endif; ?>

<?php if ($this->countModules('menu-mobiel')): ?>
    <!-- Start mobile Navigation -->
    <jdoc:include type="modules" name="menu-mobiel" style="xhtml" />
    <!-- End mobile Navigation -->
<?php endif; ?>

<?php if ($this->countModules('fullscreen-intro')): ?>
    <div id="fullscreen-intro" class="scroll" data-scroll="fullcontainer">
        <jdoc:include type="modules" name="full-screen-intro" style="none" />
        <i class="fa fa-arrow-down"></i> </div>
<?php endif; ?>

<div class="fullcontainer" id="fullcontainer">
    <?php if ($usermenu == true) : ?>
        <!-- START Navigation Usermenu -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="row">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#usermenu"> <span class="sr-only">Menu uitklappen</span> <span class="icon-bar"></span>            <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="usermenu">
                        <jdoc:include type="modules" name="menu-user" style="none" />
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo $user->name; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li> <a class="icos icos-user" href="<?php echo JRoute::_('index.php?option=com_users&view=profile&layout=edit'); ?>"> Mijn gegevens bewerken </a> </li>
                                    <li> <a class="icos icos-sign-out" href="<?php echo JRoute::_('index.php?option=com_users&task=user.logout&' . JSession::getFormToken() . '=1'); ?>"> Uitloggen </a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END Navigation Usermenu -->
    <?php endif; ?>


    <?php if ($this->countModules('top-menu or top-menu or top-logo or top-slogan or menu')): ?>
        <!-- Start top -->
        <div id="top">
            <div class="container">
                <div class="row">
                    <?php if ($this->countModules('top-menu')): ?>
                        <div class="top-menu">
                            <?php if($this->params->get('searchintop') == '1') : ?>
                                <div class="searchbox" >	<a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                               data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                               data-trigger="click"> <i class="sicon sicon-search"></i>  </a></div>
                            <?php endif; ?>
                            <jdoc:include type="modules" name="top-menu" style="none" />





                        </div>
                    <?php endif; ?>
                    <?php if ($this->countModules('top-logo')): ?>
                        <jdoc:include type="modules" name="top-logo" style="basis" />
                        <jdoc:include type="modules" name="top-slogan" style="basis" />
                    <?php endif; ?>
                    <?php if ($this->countModules('menu')): ?>
                        <div id="menu" class="menu-style <?php if($this->params->get('searchinmenu') == '1') : ?>menu-search<?php endif; ?>">
                            <nav>
                                <jdoc:include type="modules" name="menu" style="none" />

                                <?php if($this->params->get('searchinmenu') == '1') : ?>
                                    <ul class="nav navbar-left">
                                        <li id="search"> <a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                            data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                            data-trigger="click"> <i class="sicon sicon-search"></i> </a> </li>
                                    </ul>

                                <?php endif; ?>
                            </nav>
                        </div>
                    <?php endif; ?>

                </div>
                <?php if ($this->countModules('menu-fullwidth')): ?>
                    <div class="menu-fullwidth">
                        <div class="container menu-con-fullwidth">
                            <div id="menu" class="menu-style">
                                <jdoc:include type="modules" name="menu-fullwidth" style="none" />
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- End top -->
    <?php endif; ?>

    <?php if ($this->countModules('header-image')): ?>
        <!-- Start Header Image -->
        <div id="header">
            <jdoc:include type="modules" name="header-image" style="xhtml" />
        </div>

        <!-- End Header Image -->
    <?php endif; ?>


    <?php if ($this->countModules('header-slider')): ?>
        <!-- Start Header Slider -->
        <div id="fullscreen" class="header-slider">
            <jdoc:include type="modules" name="header-slider" style="xhtml" />
            <script type="text/javascript">//<![CDATA[
                function resize()
                {
                    var heights = window.innerHeight;
                    document.getElementById("camera_wrap_266").style.height = heights -110 + "px";
                }
                resize();
                window.onresize = function() {
                    resize();
                };
                //]]>

            </script>
        </div>
        <!-- End Header Slider -->
    <?php endif; ?>

    <?php if ($this->countModules('header-video')): ?>
        <!-- Start Header Video -->
        <div id="header" class="header-video">
            <jdoc:include type="modules" name="header-video" style="xhtml" />
        </div>
        <!-- End Header Video -->
    <?php endif; ?>

    <?php if ($this->countModules('menu-2')): ?>
        <!-- Start menu 2 -->

        <div class="menu-2-section">
            <div class="container menu-2">
                <div class="row">
                    <div id="menu" class="menu-style col-md-12 <?php if($this->params->get('searchinmenu') == '1') : ?>menu-search<?php endif; ?>">
                        <nav>
                            <jdoc:include type="modules" name="menu-2" style="none" />
                            <?php if($this->params->get('searchinmenu') == '1') : ?>
                                <ul class="nav navbar-left">
                                    <li id="search"> <a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                        data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                        data-trigger="click"> <i class="sicon sicon-search"></i> </a> </li>
                                </ul>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End menu 2 -->
    <?php endif; ?>



    <!-- START Subheader Breadcrumbs and social -->
    <div id="subheader">
        <div class="container">
            <div class="row">
                <?php if ($this->countModules('breadcrumbs')): ?>
                    <div  id="breadcrumbs">
                        <jdoc:include type="modules" name="breadcrumbs" style="none" />
                    </div>
                <?php endif; ?>
                <?php if($this->params->get('showsocial') == '1') : ?>
                    <div class="col-md-3" id="social">
                        <?php if($this->params->get('linkedin') != '') : ?>
                            <a href="<?php echo $this->params->get('linkedin'); ?>" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <?php endif; ?>
                        <?php if($this->params->get('facebook') != '') : ?>
                            <a href="<?php echo $this->params->get('facebook'); ?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <?php endif; ?>
                        <?php if($this->params->get('twitter') != '') : ?>
                            <a href="<?php echo $this->params->get('twitter'); ?>" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if($this->params->get('instagram') != ''): ?>
                            <a href="<?php echo $this->params->get('instagram'); ?>" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if($this->params->get('searchinsocial') == '1') : ?>
                            <div class="searchbox search-social" >	<a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                                         data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                                         data-trigger="click"> <i class="sicon sicon-search"></i>  </a></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- END Subheader Breadcrumbs and social -->

    <?php if($this->params->get('searchintopcontent') == '1' || $this->params->get('backpage' ) == '1' ) : ?>
        <!-- START Search and back buttons-->
        <div class="search-back-section">
            <div class="container">
                <?php if($this->params->get('searchintopcontent' ) == '1') : ?>
                    <!-- START Search block -->
                    <div class="searchbox search-content" >
                        <a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                           data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                           data-trigger="click"> <i class="sicon sicon-search"></i>  </a>
                    </div>
                    <!-- END Search block -->
                <?php endif; ?>


                <?php if($this->params->get('backpage') == '1') : ?>
                    <!-- START Arrow Back -->
                    <div class="arrow-back">
                        <a href="#" onclick="history.back(-1)"><i aria-hidden="true" class="fa fa-angle-left">&nbsp;</i></a>
                    </div>
                    <!-- END Arrow Back -->
                <?php endif; ?>
            </div>
        </div>
        <!-- END Search and back buttons-->
    <?php endif; ?>



    <?php if ($this->countModules('top1 or top2 or top3')): ?>
        <!-- START Blocks Top -->
        <div id="blocks">
            <?php if ($this->countModules('top1')): ?>
                <a id="<?php echo $this->params->get('less-1-anchor'); ?>" name="<?php echo $this->params->get('less-1-anchor'); ?>"></a>
                <div class="section top-section section-01">
                    <div class="<?php echo $this->params->get('section-1-paralax'); ?>">
                        <div class="row">
                            <div class="top top-block1">
                                <jdoc:include type="modules" name="top1" style="basis" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->countModules('top2')): ?>
                <a id="<?php echo $this->params->get('less-2-anchor'); ?>" name="<?php echo $this->params->get('less-2-anchor'); ?>"></a>
                <div class="section top-section section-02">
                    <div class="<?php echo $this->params->get('section-2-paralax'); ?>">
                        <div class="row">
                            <div class="top top-block2">
                                <jdoc:include type="modules" name="top2" style="basis" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->countModules('top3')): ?>
                <a id="<?php echo $this->params->get('less-3-anchor'); ?>" name="<?php echo $this->params->get('less-3-anchor'); ?>"></a>
                <div class="section top-section section-03">
                    <div class="<?php echo $this->params->get('section-3-paralax'); ?>">
                        <div class="row">
                            <div class="top top-block3">
                                <jdoc:include type="modules" name="top3" style="basis" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- END Blocks Top -->
    <?php endif; ?>

    <!-- START COMPONENT -->
    <div id="component">
        <div class="container">
            <div class="row">
                <?php if ($this->countModules('left')): ?>
                    <div class="left <?php echo $left; ?>">
                        <jdoc:include type="modules" name="left" style="xhtml" />
                    </div>
                <?php endif; ?>
                <div class="content <?php echo $content; ?>">
                    <div class="alerts-div">
                        <jdoc:include type="message" />
                    </div>

                    <jdoc:include type="modules" name="topcontent" style="xhtml" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="subcontent" style="xhtml" />
                </div>

                <?php if ($this->countModules('right')): ?>
                    <div class="right <?php echo $right; ?>">
                        <jdoc:include type="modules" name="right" style="basis" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- END COMPONENT -->

    <div style="clear:both;"></div>


    <?php if ($this->countModules('bottom1 or bottom2 or bottom3 or bottom4 or bottom-contact')): ?>
        <!-- START Bottom -->
        <div id="bottom">
            <?php if ($this->countModules('bottom1')): ?>
                <a id="<?php echo $this->params->get('less-4-anchor'); ?>" name="<?php echo $this->params->get('less-4-anchor'); ?>"></a>
                <div class="section bottom-section section-04">
                    <div class="<?php echo $this->params->get('section-4-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom1">
                                    <jdoc:include type="modules" name="bottom1" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($this->countModules('bottom2')): ?>
                <a id="<?php echo $this->params->get('less-5-anchor'); ?>" name="<?php echo $this->params->get('less-5-anchor'); ?>"></a>
                <div class="section bottom-section section-05">
                    <div class="<?php echo $this->params->get('section-5-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom2">
                                    <jdoc:include type="modules" name="bottom2" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->countModules('bottom3')): ?>
                <a id="<?php echo $this->params->get('less-6-anchor'); ?>" name="<?php echo $this->params->get('less-6-anchor'); ?>"></a>
                <div class="section bottom-section section-06">
                    <div class="<?php echo $this->params->get('section-6-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom3">
                                    <jdoc:include type="modules" name="bottom3" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->countModules('bottom4')): ?>
                <a id="<?php echo $this->params->get('less-7-anchor'); ?>" name="<?php echo $this->params->get('less-7-anchor'); ?>"></a>
                <div class="section bottom-section section-07">
                    <div class="<?php echo $this->params->get('section-7-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom4">
                                    <jdoc:include type="modules" name="bottom4" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($this->countModules('bottom-contact')) : ?>
                <a id="<?php echo $this->params->get('less-contact-anchor'); ?>" name="<?php echo $this->params->get('less-contact-anchor'); ?>"></a>
                <div class="section bottom-section section-contact">
                    <div class="<?php echo $this->params->get('section-contact-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom-contact">
                                    <jdoc:include type="modules" name="bottom-contact" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- END Bottom -->
    <?php endif; ?>

    <?php if($this->params->get('backpage') == '2') : ?>
        <!-- START Arrow Back -->
        <div class="arrow-back">
            <a href="#" onclick="history.back(-1)"><i aria-hidden="true" class="fa fa-angle-left">&nbsp;</i></a>
        </div>
        <!-- END Arrow Back -->
    <?php endif; ?>

    <?php if ($this->countModules('footer1 or footer2 or footer3 or footer4')): ?>
        <!-- START Footer -->
        <div id="footer">
            <a id="<?php echo $this->params->get('less-footer-anchor'); ?>" name="<?php echo $this->params->get('less-footer-anchor'); ?>"></a>
            <div class="<?php echo $this->params->get('section-footer-paralax'); ?>">
                <div class="row">
                    <?php if ($this->countModules('footer1')): ?>
                        <div class="<?php echo $this->params->get('footer1-col'); ?>">
                            <jdoc:include type="modules" name="footer1" style="xhtml" />
                        </div>
                    <?php endif; ?>
                    <?php if ($this->countModules('footer2')): ?>
                        <div class="<?php echo $this->params->get('footer2-col'); ?>">
                            <jdoc:include type="modules" name="footer2" style="xhtml" />
                        </div>
                    <?php endif; ?>
                    <?php if ($this->countModules('footer3')): ?>
                        <div class="<?php echo $this->params->get('footer3-col'); ?>">
                            <jdoc:include type="modules" name="footer3" style="xhtml" />
                        </div>
                    <?php endif; ?>
                    <?php if ($this->countModules('footer4')): ?>
                        <div class="<?php echo $this->params->get('footer4-col'); ?> footermenu">
                            <jdoc:include type="modules" name="footer4" style="xhtml" />
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- END Footer -->
    <?php endif; ?>


    <?php if ($this->countModules('copyright')): ?>
        <!-- START Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <jdoc:include type="modules" name="copyright" style="xhtml" />
                </div>
            </div>
        </div>
        <!-- END Copyright -->
    <?php endif; ?>



    <?php if ($this->params->get('backtotop') == '1'): ?>
        <!-- START Back to top button -->
        <i class="fa fa-arrow-up backtotop scroll" data-target="body"></i>
        <!-- END Back to top button -->
    <?php endif; ?>


    <?php if ($this->countModules('hide')): ?>
        <!-- START module position not shown -->
        <div class="nodisplay" style="display:none;">
            <jdoc:include type="modules" name="hide" style="xhtml" />
        </div>
        <!-- END module position not shown -->
    <?php endif; ?>


    <script type="text/javascript">
        jQuery(function($) {
            $('.dropdown-toggle').dropdown();
            $('[data-toggle="popover"]').popover();
            $('[data-toggle="tooltip"], .hasTooltip').tooltip({html:true});
        });
    </script>

    <!-- START Metadata that is defined in the XML -->
    <?php echo $this->params->get('meta-body'); ?>
    <!-- END Metadata that is defined in the XML -->

    <!-- START Google analytics that is defined in the XML -->
    <?php echo $this->params->get('google-analytics'); ?>
    <!-- END Google analytics that is defined in the XML -->



</div>
</body>
</html>
