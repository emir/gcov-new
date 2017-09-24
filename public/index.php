<?php

/*
  +----------------------------------------------------------------------+
  | PHP QA GCOV Website                                                  |
  +----------------------------------------------------------------------+
  | Copyright (c) 2008-2009 The PHP Group                                |
  +----------------------------------------------------------------------+
  | This source file is subject to version 3.01 of the PHP license,      |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.php.net/license/3_01.txt                                  |
  | If you did not receive a copy of the PHP license and are unable to   |
  | obtain it through the world-wide-web, please send a note to          |
  | license@php.net so we can mail you a copy immediately.               |
  +----------------------------------------------------------------------+
  | Author: Emir Karşıyakalı <emirkarsiyakali@gmail.com>                 |
  +----------------------------------------------------------------------+
*/

require '../autoload.php';

$config = include '../config/config.php';

$version = $_GET['version'] ?? null;
$func = null;

if (isset($version) && !array_key_exists($version, $config['versions'])) {
    $version = false;
}

if (null !== $version && false !== $version) {
    $func = $_GET['func'] ?? 'stats';
}

$page = new \PHP\Gcov\Navigation($func ?? null, $config['versions'][$version] ?? null);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $page->getTitle(); ?></title>

    <link rel="shortcut icon" href="http://php.net/favicon.ico">

    <link rel="canonical" href="http://gcov.php.net/index.php">
    <link rel="shorturl" href="http://gcov.php.net/index">
    <link rel="alternate" href="http://gcov.php.net/index" hreflang="x-default">

    <link rel="stylesheet" type="text/css" href="http://php.net/cached.php?t=1421837618&amp;f=/fonts/Fira/fira.css"
          media="screen">
    <link rel="stylesheet" type="text/css"
          href="http://php.net/cached.php?t=1421837618&amp;f=/fonts/Font-Awesome/css/fontello.css" media="screen">
    <link rel="stylesheet" type="text/css" href="http://php.net/cached.php?t=1478800802&amp;f=/styles/theme-base.css"
          media="screen">
    <link rel="stylesheet" type="text/css" href="http://php.net/cached.php?t=1449787206&amp;f=/styles/theme-medium.css"
          media="screen">

    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="http://php.net/styles/workarounds.ie7.css" media="screen">
    <![endif]-->

    <!--[if lte IE 8]>
    <script type="text/javascript">
        window.brokenIE = true;
    </script>
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="http://php.net/styles/workarounds.ie9.css" media="screen">
    <![endif]-->

    <!--[if IE]>
    <script type="text/javascript" src="http://php.net/js/ext/html5.js"></script>
    <![endif]-->

    <!--    <base href="http://gcov.php.net/">-->

</head>

<body class="help ">

<nav id="head-nav" class="navbar navbar-fixed-top">
    <div class="navbar-inner clearfix">
        <a href="index.php" class="brand" style="position: relative;">
            <img src="http://php.net/images/logos/php-logo.svg" width="48" height="24" alt="php"><span style="position: absolute; color: #E2E4EF;">gcov</span>
        </a>
        <div id="mainmenu-toggle-overlay"></div>
        <input type="checkbox" id="mainmenu-toggle">
        <ul class="nav" style="margin-left: 30px;">
            <?php
            foreach ($config['versions'] as $url => $supportedVersion):
                ?>
                <li<?php if ($version === $url) {
                    echo ' class="active"';
                } ?>>
                    <a href="index.php?version=<?php echo $url; ?>"><?php echo $supportedVersion; ?></a>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <form class="navbar-search" id="topsearch" action="http://php.net/search.php">
            <input type="hidden" name="show" value="quickref">
            <input type="search" name="pattern" class="search-query" placeholder="Search" accesskey="s">
        </form>
    </div>
    <div id="flash-message"></div>
</nav>

<div id="layout" class="clearfix">

    <section id="layout-content">

        <?php
        switch ($version) {
            case null:
                include '../views/index.php';
                break;
            case false:
                include '../views/unsupported_version.php';
                break;
            default:
                include '../views/viewer.php';
                break;
        }
        ?>

    </section><!-- layout-content -->

    <?php
    if (null !== $version && false !== $version):
        ?>
        <aside class="tips">
            <div class="inner">
                <div class="panel">
                    <div class="headline">Navigation</div>
                    <div class="body">
                        <ul>
                            <?php
                            foreach ($config['menus'] as $url => $menu):
                                ?>
                                <li class="small active">
                                    <a href="index.php?version=<?php echo $version; ?>&func=<?php echo $url; ?>"><?php echo $menu; ?></a>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <?php
    endif;
    ?>

</div><!-- layout -->

<footer>
    <div class="container footer-content">
        <div class="row-fluid">
            <ul class="footmenu">
                <li><a target="_blank" href="http://php.net/copyright.php">Copyright &copy; 2001-<?php echo date('Y') ?>
                        The PHP Group</a></li>
                <li><a target="_blank" href="http://php.net/my.php">My PHP.net</a></li>
                <li><a target="_blank" href="http://php.net/contact.php">Contact</a></li>
                <li><a target="_blank" href="http://php.net/sites.php">Other PHP.net sites</a></li>
                <li><a target="_blank" href="http://php.net/mirrors.php">Mirror sites</a></li>
                <li><a target="_blank" href="http://php.net/privacy.php">Privacy policy</a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- External and third party libraries. -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://php.net/cached.php?t=1421837618&amp;f=/js/ext/modernizr.js"></script>
<script type="text/javascript" src="http://php.net/cached.php?t=1421837618&amp;f=/js/ext/hogan-2.0.0.min.js"></script>
<script type="text/javascript" src="http://php.net/cached.php?t=1421837618&amp;f=/js/ext/mousetrap.min.js"></script>
<script type="text/javascript" src="http://php.net/cached.php?t=1500560403&amp;f=/js/common.js"></script>

<a id="toTop" href="javascript:;"><span id="toTopHover"></span>
    <img width="40" height="40" alt="To Top" src="/images/to-top@2x.png"></a>

</body>
</html>