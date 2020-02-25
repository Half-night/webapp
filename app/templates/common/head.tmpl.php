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

<!-- Head -->

<div>
  <img src="/themes/<?= $this->theme; ?>/img/logo.png">
</div>

<!-- /Head -->

<?php

include  __DIR__ . '/../login.tmpl.php';

?>

<?php

include __DIR__ . '/../main_menu.tmpl.php';

?>