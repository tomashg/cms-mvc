<?php include VIEW . 'header.php'; ?>

<h1 class="text-center">Article <?= $this->viewData['actionName'] ?></h1>

<form method="post" action="/article/<?= $this->viewData['action'] ?>">
    Title <input type="text" name="title" value="<?= (!empty($this->viewData[0]['title'])) ? $this->viewData[0]['title'] : '' ?>" class="form-control"><br>
    Content<br>
    <textarea name="content" class="form-control" id="content" cols="30" rows="10"><?= (!empty($this->viewData[0]['title'])) ? $this->viewData[0]['title'] : '' ?></textarea><br>
    <input type="submit" class="btn btn-lg btn-primary btn-block">
</form>

<?php include VIEW . 'footer.php'; ?>
