
<form action="/admin/pages/?do=edit&id=<?=$data['page']['id'] ?>" method="POST">

    <label for="url">URL</label><br>
    <input type="text" name="url" value="<?=$data['page']['url'] ?>"><br><br>

    <label for="title">Title</label><br>
    <input type="text" name="title" value="<?=$data['page']['title'] ?>"><br><br>

    <label for="description">Description</label><br>
    <input type="text" name="description" value="<?=$data['page']['description'] ?>"><br><br>

    <label for="keywords">Keywords</label><br>
    <input type="text" name="keywords" value="<?=$data['page']['keywords'] ?>"><br><br>

    <label for="content">Content</label><br>
    <textarea name="content"><?=$data['page']['content'] ?></textarea><br><br>

    <input type="hidden" name="confirm" value="confirm"><br><br>
    <input type="submit" name="submit" value="Save">

</form>