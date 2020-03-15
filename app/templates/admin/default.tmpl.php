<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $data['title'] ?></title>
  <meta name="description" content="<?= $data['description'] ?>">
  <meta name="keywords" content="<?= $data['keywords'] ?>">
  <meta name="robots" content="<?= $data['robots'] ?>">

  <link rel="stylesheet" type="text/css" href="/themes/<?= $data['theme'] ?>/css/style.css">
</head>
<body>

<?php
include __DIR__ . '/../common/top_bar.tmpl.php';
?>

<!-- Head -->

<div id="head">

</div>

<!-- /Head -->


<!-- Menu -->

<div id="menu">
  <ul>
    <li><a href="/">Homepage</a></li>
    <li><a href="/admin/">Main</a></li>
    <li><a href="/admin/users/">Users</a></li>
    <li><a href="/admin/pages/">Pages</a></li>
    <li><a href="/admin/settings/">Settings</a></li>
    <li><a href="/admin/query/">Database query</a></li>
  </ul>
</div>

<!-- /Menu -->


<!-- Content -->

<div id="content">

</div>

<!-- /Content -->


<!-- Footer -->

<div id="footer">

</div>

<!-- /Footer -->

</body>
</html>