<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplikacija za pracenje promena telesne tezine">
        <meta name="author" content="Svetlana Zecevic">
        <link rel="icon" href="../../favicon.ico">

        <title><?php echo $title?></title>
<?php
$group = Assets::HEAD_BEGIN;
if(!empty($assets[$group])) {
    foreach($assets[$group]['js'] as $filename){
        ?><script type="text/javascript" src="/assets/js/<?php echo $filename ?>"></script><?php
    }
    foreach($assets[$group]['css'] as $filename){
        ?><link type="text/css" href="/assets/css/<?php echo $filename ?>" rel="stylesheet"><?php
    }
}
?>
<?php
$group = Assets::HEAD_END;
if(!empty($assets[$group])) {
    foreach($assets[$group]['js'] as $filename){
        ?><script type="text/javascript" src="/assets/js/<?php echo $filename ?>"></script><?php
    }
    foreach($assets[$group]['css'] as $filename){
        ?><link type="text/css" href="/assets/css/<?php echo $filename ?>" rel="stylesheet"><?php
    }
}
?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
<?php
$group = Assets::BODY_BEGIN;
if(!empty($assets[$group])) {
    foreach($assets[$group]['js'] as $filename){
        ?><script type="text/javascript" src="/assets/js/<?php echo $filename ?>"></script><?php
    }
    foreach($assets[$group]['css'] as $filename){
        ?><link type="text/css" href="/assets/css/<?php echo $filename ?>" rel="stylesheet"><?php
    }
}
?>
        