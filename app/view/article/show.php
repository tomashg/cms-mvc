<?php include VIEW . 'header.php'; ?>

<h1 class="text-center">Articles</h1>

<?php foreach ($this->viewData['articles'] as $article) : ?>
    <div class="card my-2">
        <h3><?= $article['title'] ?></h3>
        <h5><?= $article['date'] ?> :: <?= $article['userId'] ?> </h5>
        <div class="card-body">
            <?= $article['content'] ?>
        </div>
    </div>
<?php endforeach; ?>

<?php include VIEW . 'footer.php'; ?>
