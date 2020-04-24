
<?php if(isset($data['errors'])): ?>
<div>
<b>Errors:</b><br>
<?php foreach($data['errors'] as $e): ?>
<?=$e ?><br>
<?php endforeach; ?>
</div>
<?php endif; ?>

<form action="/admin/pages/?do=create" method="POST">

    <label for="url">URL</label><br>
    <input type="text" name="url"><br><br>

    <label for="title">Title</label><br>
    <input type="text" name="title"><br><br>

    <label for="description">Description</label><br>
    <input type="text" name="description"><br><br>

    <label for="keywords">Keywords</label><br>
    <input type="text" name="keywords"><br><br>

    <label for="content">Content</label><br>
    <textarea name="content">Some HTML</textarea><br><br>

    <input type="submit" name="submit" value="Create">

</form>
