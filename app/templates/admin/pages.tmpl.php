<h1>Pages</h1>

<div>
<a href="/admin/pages/?do=create">Create new page</a>
</div>
<br>

<?php foreach ($data['pages'] as $page): ?>
<div><a href="/<?= $page['url'] ?>/" target="_blank"><?= $page['title'] ?></a> - <a href="/admin/pages/?do=edit&id=<?= $page['id'] ?>">Edit</a> - <a href="/admin/pages/?do=delete&id=<?= $page['id'] ?>">Delete</a></div>
<?php endforeach; ?>