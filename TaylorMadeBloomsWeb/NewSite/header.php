<!DOCTYPE HTML>
<html>
<head>
    <title>Taylor Made Blooms</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->    
    <?php
    $pagename = strtolower(ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)));
    ?>

    <?php
    if(strcmp($pagename,'work')==0){
    ?>
    <link rel="stylesheet" href="assets/css/blueimp-gallery.css">
    <link rel="stylesheet" href="assets/css/blueimp-gallery-indicator.css">
    <link rel="stylesheet" href="assets/css/blueimp-gallery-video.css">
    
    <style>
        @media (min-width: 481px) {
          .navigation {
            list-style: none;
            padding: 0;
          }
          .navigation li {
            display: inline-block;
          }
          .navigation li:not(:first-child):before {
            content: '| ';
          }
        }
    </style>
    <?php
    }
    ?>

    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <meta name="description" content="Manchester Wedding Florist, Weddings and Funeral Flowers in Manchester ">
    <meta name="keywords" content="Manchester Wedding Florist,Manchester,Wedding,Funerals,Florist,Flowers, ">
    <meta name="author" content="Helen Taylor">
</head>
