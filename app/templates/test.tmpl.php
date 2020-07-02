<?php

function echo_errors($errors) {

  if (is_array($errors) AND count($errors) > 0) {
    ?>
    <ul>
      <?php
    foreach ($errors as $name => $message) {
      ?>  <li><?= $message ?></li>
      <?php
    }
    ?>
</ul><br>
    <?php 
  }
}

?>

<form action="/test/" method="post">
  <?php echo_errors(@$form_data['brand']['errors']); ?>
  <input type="text" name="brand" placeholder="Brand" value="<?= @$form_data['brand']['value'] ?>"><br><br>
  <?php echo_errors(@$form_data['model']['errors']); ?>
  <input type="text" name="model" placeholder="Model" value="<?= @$form_data['model']['value'] ?>"><br><br>
  Description:<br>
  <?php echo_errors(@$form_data['description']['errors']); ?>
  <textarea name="description" id="" cols="30" rows="10"><?= @$form_data['description']['value'] ?></textarea><br><br>
  <?php echo_errors(@$form_data['color']['errors']); ?>
  <input type="text" name="color" placeholder="Color" value="<?= @$form_data['color']['value'] ?>"><br><br>
  <?php echo_errors(@$form_data['price']['errors']); ?>
  <input type="text" name="price" placeholder="Price" value="<?= @$form_data['price']['value'] ?>"><br><br>
  <input type="submit" name="submit" value="Add"><br><br>
</form>

