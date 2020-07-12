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

if ($edit === true) {

  $form_action = '/test/edit/' . $form_data['id'];
  $submit_value = 'Save';
} else {

  $form_action = '/test/add';
  $submit_value = 'Add';
}

?>

<form action="<?= @$form_action ?>" method="post">
  <?php echo_errors(@$errors['brand']); ?>
  <input type="text" name="brand" placeholder="Brand" value="<?= @$form_data['brand'] ?>"><br><br>
  <?php echo_errors(@$errors['model']); ?>
  <input type="text" name="model" placeholder="Model" value="<?= @$form_data['model'] ?>"><br><br>
  Description:<br>
  <?php echo_errors(@$errors['description']); ?>
  <textarea name="description" id="" cols="30" rows="10"><?= @$form_data['description'] ?></textarea><br><br>
  <?php echo_errors(@$errors['color']); ?>
  <input type="text" name="color" placeholder="Color" value="<?= @$form_data['color'] ?>"><br><br>
  <?php echo_errors(@$errors['price']); ?>
  <input type="text" name="price" placeholder="Price" value="<?= @$form_data['price'] ?>"><br><br>
  <input type="submit" name="submit" value="<?= @$submit_value ?>"><br><br>
</form>

