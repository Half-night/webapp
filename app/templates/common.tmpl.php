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

include 'login.tmpl.php';

?>

<?php

include 'main_menu.tmpl.php';

?>

<!-- Content -->

<div>
  <h1>Hello, World!</h1>

  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<!-- /Content -->


<!-- Footer -->

<div>
  &copy; 2020
</div>

<!-- /Footer -->

</body>
</html>