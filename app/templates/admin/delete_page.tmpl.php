
<h2>Do you really want to delete this page?</h2>

<div><b>Location:</b> <?=$data['page']['url']; ?></div>
<div><b>Title:</b> <?=$data['page']['title']; ?></div>
<div><b>Description:</b> <?=$data['page']['description']; ?></div>
<br>
<form action="/admin/pages/?do=delete&id=<?=$data['page']['id']; ?>" method="POST">
    <input type="hidden" name="confirm" value="confirm">
    <input type="submit" name="submit" value="Delete">
</form>