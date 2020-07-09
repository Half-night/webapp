
<h1>Test index template</h1>

<p><a href="/test/add">Add new test</a></p>

<?php

foreach ($data['test_index'] as $item) {
  ?>

<h2>#<?= @$item['id'] ?> <?= @$item['brand'] ?> <?= @$item['model'] ?></h2>
<p><?= @$item['description'] ?></p>
<p><?= @$item['price'] ?></p>
<p><?= @$item['color'] ?></p>
<hr>
  <?php
}

