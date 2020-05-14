<?php include VIEW . 'header.php'; ?>

<h1 class="text-center">Articles</h1>

<?php if ($this->viewData['userId']) : ?>
    <div class="my-2">
        <a href="/article/add" class="btn btn-primary" role="button">Add new article</a>
    </div>
<?php endif; ?>

<form method="post" action="/article/show">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="Data"></th>
            <th scope="col">User</th>
            <?php if ($this->viewData['userId']) : ?>
                <th scope="col">Action</th>
                <th scope="col">Show article</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->viewData['articles'] as $article) : ?>
            <tr>
                <td><?= $article['title'] ?></td>
                <td><?= $article['date'] ?></td>
                <td><?= $article['userId'] ?></td>
                <?php if ($this->viewData['userId']) : ?>
                    <td>
                        <a href="/article/edit/<?= $article['articleId'] ?>" class="btn btn-primary"
                           role="button">Edit</a>
                        <a href="/article/delete/<?= $article['articleId'] ?>" class="btn btn-danger" role="button">Delete</a>
                    </td>
                    <td>
                        <input type="checkbox" class="checkbox-inline" id="article<?= $article['articleId'] ?>" name="articles[]" value="<?= $article['articleId'] ?>">
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn-lg btn-primary btn-block">
</form>

<?php include VIEW . 'footer.php'; ?>