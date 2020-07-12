<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/themes/<?= $this->theme; ?>/css/style.css">
  <title><?= $data['title'] ?></title>
  <meta name="description" content="<?= $data['description'] ?>">
  <meta name="keywords" content="<?= $data['keywords'] ?>">
  <meta name="robots" content="<?= $data['robots'] ?>">
</head>
<body>

<?php
    include 'top_bar.tmpl.php';
?>

  <div id="body">

<!-- Head -->

<div id="head">
  <img src="/themes/<?= $this->theme; ?>/img/logo.png">
</div>


<!-- /Head -->

<!-- Middle -->

<div id="middle">

<?php

include __DIR__ . '/../main_menu.tmpl.php';

?>

<div id="content">
