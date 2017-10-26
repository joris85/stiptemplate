<!-- index version file 3.0  last update 28-09-2017 -->

<?php
defined('_JEXEC') or die;

// Load This Template Helper
include_once JPATH_THEMES . '/' . $this->template . '/helper.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <?php if($this->params->get('loadbootstrap3') == '1') : ?>
    <!-- Laad bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <?php endif; ?>
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
    <div class="stickymenu menu-style <?php if($this->params->get('searchinmenu') == '1') : ?>menu-search<?php endif; ?> <?php if($this->params->get('menulines') == '1') : ?>menulines<?php endif; ?>">
        <div class="container container-sticky">
            <div class="row">
            <jdoc:include type="modules" name="sticky-top" style="basis" />
                 <?php if($this->params->get('searchinstickymenu') == '1') : ?>
                                    <ul class="nav navbar-right">
                                        <li id="sticksearch"> <a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                            data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                            data-trigger="click"> <i class="fal fa-search"></i> </a> </li>
                                    </ul>

                                <?php endif; ?>
            </div>
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
        <i class="fal fa-arrow-down"></i> </div>
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
                            <li class="dropdown"> <a href="#" class="dropdown-toggle fal fa-user" data-toggle="dropdown" role="button" aria-expanded="false"> <?php echo $user->name; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li> <a class="fal fa-user" href="<?php echo JRoute::_('index.php?option=com_users&view=profile&layout=edit'); ?>"> Mijn gegevens bewerken </a> </li>
                                    <li> <a class="fal fa-sign-out" href="<?php echo JRoute::_('index.php?option=com_users&task=user.logout&' . JSession::getFormToken() . '=1'); ?>"> Uitloggen </a> </li>
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
                    <div class="col-md-12">
                    <?php if ($this->countModules('top-menu')): ?>
                        <div class="top-menu">
                            <?php if($this->params->get('searchintop') == '1') : ?>
                                <div class="searchbox" >	<a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                               data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                               data-trigger="click"> <i class="fal fa-search"></i>  </a></div>
                            <?php endif; ?>
                            <jdoc:include type="modules" name="top-menu" style="none" />





                        </div>
                    <?php endif; ?>
                    <?php if ($this->countModules('top-logo')): ?>
                        <jdoc:include type="modules" name="top-logo" style="basis" />
                        <jdoc:include type="modules" name="top-slogan" style="basis" />
                    <?php endif; ?>
                    <?php if ($this->countModules('menu')): ?>
                        <div id="menu" class="menu-style <?php if($this->params->get('searchinmenu') == '1') : ?>menu-search<?php endif; ?> <?php if($this->params->get('menulines') == '1') : ?>menulines<?php endif; ?>">
                            <nav>
                                <jdoc:include type="modules" name="menu" style="none" />

                                <?php if($this->params->get('searchinmenu') == '1') : ?>
                                    <ul class="nav navbar-left">
                                        <li id="search"> <a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                            data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                            data-trigger="click"> <i class="fal fa-search"></i> </a> </li>
                                    </ul>

                                <?php endif; ?>
                            </nav>
                        </div>
                    <?php endif; ?>

                </div>
             </div>
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
        <!-- End top -->
    <?php endif; ?>



    <?php if ($this->countModules('menu-fullscreen')): ?>
        <div class="menu-fullscreen-section">
        <div id="menu" class="menu-style <?php if($this->params->get('searchinmenu') == '1') : ?>menu-search<?php endif; ?>">
            <nav>
                <jdoc:include type="modules" name="menu-fullscreen" style="none" />

                <?php if($this->params->get('searchinmenu') == '1') : ?>
                    <ul class="nav navbar-left">
                        <li id="search"> <a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                            data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                            data-trigger="click"> <i class="fal fa-search"></i> </a> </li>
                    </ul>

                <?php endif; ?>
            </nav>
        </div>
        </div>
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
            <div class="container menu-2 <?php if($this->params->get('menulines') == '1') : ?>menulines<?php endif; ?>">
                <div class="row">
                    <div id="menu" class="menu-style col-md-12 <?php if($this->params->get('searchinmenu') == '1') : ?>menu-search<?php endif; ?>">
                        <nav>
                            <jdoc:include type="modules" name="menu-2" style="none" />
                            <?php if($this->params->get('searchinmenu') == '1') : ?>
                                <ul class="nav navbar-left">
                                    <li id="search"> <a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                        data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                        data-trigger="click"> <i class="fal fa-search"></i> </a> </li>
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
                            <a href="<?php echo $this->params->get('linkedin'); ?>" class="linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                        <?php if($this->params->get('facebook') != '') : ?>
                            <a href="<?php echo $this->params->get('facebook'); ?>" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if($this->params->get('twitter') != '') : ?>
                            <a href="<?php echo $this->params->get('twitter'); ?>" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if($this->params->get('instagram') != ''): ?>
                            <a href="<?php echo $this->params->get('instagram'); ?>" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if($this->params->get('searchinsocial') == '1') : ?>
                            <div class="searchbox search-social" >	<a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                                                                         data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                                                                         data-trigger="click"> <i class="fal fa-search"></i>  </a></div>
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
                <div class="row">
                    <div class="col-md-12">
                <?php if($this->params->get('searchintopcontent' ) == '1') : ?>
                    <!-- START Search block -->
                    <div class="searchbox search-content" >
                        <a href="#" onclick="return false" data-container="body" data-toggle="popover" data-placement="bottom"
                           data-title="Zoeken" data-content='<jdoc:include type="modules" name="searchbox" style="none" />' data-html="true"
                           data-trigger="click"> <i class="fal fa-search"></i>  </a>
                    </div>
                    <!-- END Search block -->
                <?php endif; ?>


                <?php if($this->params->get('backpage') == '1') : ?>
                    <!-- START Arrow Back -->
                    <div class="arrow-back">
                        <a href="#" onclick="history.back(-1)"><i aria-hidden="true" class="fal fa-angle-left">&nbsp;</i></a>
                    </div>
                    <!-- END Arrow Back -->
                <?php endif; ?>
                    </div>
                    </div>
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
                            <div class="top top-block1 <?php if($this->params->get('section-1-equal') == '1') : ?>row-eq-height<?php endif; ?>">
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
                            <div class="top top-block2 <?php if($this->params->get('section-2-equal') == '1') : ?>row-eq-height<?php endif; ?>">
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
                            <div class="top top-block3 <?php if($this->params->get('section-3-equal') == '1') : ?>row-eq-height<?php endif; ?>">
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
                <?php if($this->params->get('content-left-position') == 'left') : ?>
                    <?php if ($this->countModules('left')): ?>
                        <div class="left <?php echo $left; ?> show-left">
                            <jdoc:include type="modules" name="left" style="xhtml" />
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="content <?php echo $content; ?>">
                    <div class="alerts-div">
                        <jdoc:include type="message" />
                    </div>

                    <jdoc:include type="modules" name="topcontent" style="xhtml" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="subcontent" style="xhtml" />
                </div>
                <?php if($this->params->get('content-left-position' ) == 'right') : ?>
                    <?php if ($this->countModules('left')): ?>
                        <div class="left <?php echo $left; ?> show-right">
                            <jdoc:include type="modules" name="left" style="xhtml" />
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
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


    <?php if ($this->countModules('bottom1 or bottom2 or bottom3 or bottom4 or bottom5 or bottom6 or bottom7 or bottom8 or bottom9 or bottom10 or bottom-contact')): ?>
        <!-- START Bottom -->
        <div id="bottom">
            <?php if ($this->countModules('bottom1')): ?>
                <a id="<?php echo $this->params->get('less-4-anchor'); ?>" name="<?php echo $this->params->get('less-4-anchor'); ?>"></a>
                <div class="section bottom-section section-04">
                    <div class="<?php echo $this->params->get('section-4-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom1 <?php if($this->params->get('section-4-equal') == '1') : ?>row-eq-height<?php endif; ?>">
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
                                <div class="bottom bottom2 <?php if($this->params->get('section-5-equal') == '1') : ?>row-eq-height<?php endif; ?>">
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
                                <div class="bottom bottom3 <?php if($this->params->get('section-6-equal') == '1') : ?>row-eq-height<?php endif; ?>">
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
                                <div class="bottom bottom4 <?php if($this->params->get('section-7-equal') == '1') : ?>row-eq-height<?php endif; ?>">
                                    <jdoc:include type="modules" name="bottom4" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if ($this->countModules('bottom5')): ?>
                <a id="<?php echo $this->params->get('less-8-anchor'); ?>" name="<?php echo $this->params->get('less-8-anchor'); ?>"></a>
                <div class="section bottom-section section-08">
                    <div class="<?php echo $this->params->get('section-8-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom5 <?php if($this->params->get('section-7-equal') == '1') : ?>row-eq-height<?php endif; ?>">
                                    <jdoc:include type="modules" name="bottom5" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
                        <?php if ($this->countModules('bottom6')): ?>
                <a id="<?php echo $this->params->get('less-9-anchor'); ?>" name="<?php echo $this->params->get('less-9-anchor'); ?>"></a>
                <div class="section bottom-section section-09">
                    <div class="<?php echo $this->params->get('section-9-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom6 <?php if($this->params->get('section-7-equal') == '1') : ?>row-eq-height<?php endif; ?>">
                                    <jdoc:include type="modules" name="bottom6" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            
            <?php if ($this->countModules('bottom7')): ?>
                <a id="<?php echo $this->params->get('less-10-anchor'); ?>" name="<?php echo $this->params->get('less-10-anchor'); ?>"></a>
                <div class="section bottom-section section-10">
                    <div class="<?php echo $this->params->get('section-10-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom7 <?php if($this->params->get('section-7-equal') == '1') : ?>row-eq-height<?php endif; ?>">
                                    <jdoc:include type="modules" name="bottom7" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            
            <?php if ($this->countModules('bottom8')): ?>
                <a id="<?php echo $this->params->get('less-11-anchor'); ?>" name="<?php echo $this->params->get('less-11-anchor'); ?>"></a>
                <div class="section bottom-section section-11">
                    <div class="<?php echo $this->params->get('section-11-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom8 <?php if($this->params->get('section-7-equal') == '1') : ?>row-eq-height<?php endif; ?>">
                                    <jdoc:include type="modules" name="bottom8" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            
            <?php if ($this->countModules('bottom9')): ?>
                <a id="<?php echo $this->params->get('less-12-anchor'); ?>" name="<?php echo $this->params->get('less-12-anchor'); ?>"></a>
                <div class="section bottom-section section-12">
                    <div class="<?php echo $this->params->get('section-12-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom9 <?php if($this->params->get('section-7-equal') == '1') : ?>row-eq-height<?php endif; ?>">
                                    <jdoc:include type="modules" name="bottom9" style="basis" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if ($this->countModules('bottom10')): ?>
                <a id="<?php echo $this->params->get('less-13-anchor'); ?>" name="<?php echo $this->params->get('less-13-anchor'); ?>"></a>
                <div class="section bottom-section section-13">
                    <div class="<?php echo $this->params->get('section-13-paralax'); ?>">
                        <div class="row">
                            <div class="bottom">
                                <div class="bottom bottom10 <?php if($this->params->get('section-13-equal') == '1') : ?>row-eq-height<?php endif; ?>">
                                    <jdoc:include type="modules" name="bottom10" style="basis" />
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
                                <div class="bottom bottom-contact <?php if($this->params->get('section-contact-equal') == '1') : ?>row-eq-height<?php endif; ?>">
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
            <a href="#" onclick="history.back(-1)"><i aria-hidden="true" class="fal fa-angle-left">&nbsp;</i></a>
        </div>
        <!-- END Arrow Back -->
    <?php endif; ?>

    <?php if ($this->countModules('footer1 or footer2 or footer3 or footer4')): ?>
        <!-- START Footer -->
        <footer id="footer">
            <a id="<?php echo $this->params->get('less-footer-anchor'); ?>" name="<?php echo $this->params->get('less-footer-anchor'); ?>"></a>
            <div class="<?php echo $this->params->get('section-footer-paralax'); ?>">
                <div class="row <?php if($this->params->get('section-footer-equal') == '1') : ?>row-eq-height<?php endif; ?>">
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
        </footer>
        <!-- END Footer -->
    <?php endif; ?>


    <?php if ($this->countModules('copyright')): ?>
        <!-- START Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <jdoc:include type="modules" name="copyright" style="xhtml" />
                    </div>
                </div>
            </div>
        </div>
        <!-- END Copyright -->
    <?php endif; ?>



    <?php if ($this->params->get('backtotop') == '1'): ?>
        <!-- START Back to top button -->
        <i class="fal fa-arrow-up backtotop scroll" data-target="body"></i>
        <!-- END Back to top button -->
    <?php endif; ?>


    <?php if ($this->countModules('hide')): ?>
        <!-- START module position not shown -->
        <div class="nodisplay" style="display:none;">
            <jdoc:include type="modules" name="hide" style="xhtml" />
        </div>
        <!-- END module position not shown -->
    <?php endif; ?>


  

</div>
    
  <!-- STart loading data before the body -->  
      <script type="text/javascript">
        jQuery(function($) {
            $('.dropdown-toggle').dropdown();
            $('[data-toggle="popover"]').popover();
            $('[data-toggle="tooltip"], .hasTooltip').tooltip({html:true});
        });
    </script>
<?php if($this->params->get('templatejs') == '1') : ?>
    <script src="/templates/stiptemplate/js/template.js" ></script>
<?php endif; ?>

    <!-- START Metadata that is defined in the XML -->
    <?php echo $this->params->get('meta-body'); ?>
    <!-- END Metadata that is defined in the XML -->

    <!-- START Google analytics that is defined in the XML -->
    <?php echo $this->params->get('google-analytics'); ?>
    <!-- END Google analytics that is defined in the XML -->
    
    <?php if($this->params->get('loadbootstrap3') == '1') : ?>
    <!-- Laad bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <?php endif; ?>
    
      <?php if($this->params->get('loadbootstrap3') == '2') : ?>
    <!-- Laad bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <?php endif; ?>
    
    
    <?php if($this->params->get('fontawesome4') == '1') : ?>
    <!-- Laad fontawesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <?php endif; ?>
    
<?php if($this->params->get('loadoldhtmljs') == '1') : ?>
<!-- Laad oude javascripten voor compatibiliteit -->
<script src="/templates/stiptemplate/js/html5.min.js" ></script>
<script src="/templates/stiptemplate/js/respond.min.js" ></script>
<?php endif; ?>
    
       <?php if($this->params->get('inputvalidatie') == '1') : ?>
     <!-- Inputvalidatie -->
       <script src="/templates/stiptemplate/js/html5.min.js" ></script>
<?php endif; ?>
    
    <style>
    
.fadmin_menu_edit_buttons {
    z-index:2000 !important;
    border:none !important;
    box-shadow: none !important;
    font-size:20px !important;
}

    </style>
    
</body>
</html>
