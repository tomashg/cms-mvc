<?php


class Article extends Controller
{
    function index()
    {
        $this->model('muser');
        $userId = $this->model->getUserId();
        $this->model('marticle');
        $data = $this->model->getArticles();
        $this->view('article/articles', ['articles' => $data, 'userId' => $userId]);
        $this->view->render();
    }

    function show()
    {
        $articlesIds = (!empty($_POST['articles'])) ? $_POST['articles'] : [];
        if ($articlesIds) {
            $this->model('marticle');
            $data = $this->model->getChosenArticles($articlesIds);
            $this->view('article/show', ['articles' => $data]);
            $this->view->render();
        } else {
            header('Location: /article');
            exit;
        }
    }

    function delete($articleId)
    {
        $this->model('muser');
        $userId = $this->model->getUserId();
        if ($userId) {
            $this->model('marticle');
            $this->model->delete($articleId);
            FlashMessage::add('success', 'Article removed');
            header('Location: /article');
            exit;
        }
    }

    function add()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->model('marticle');
            $_POST['userId'] = 1;
            $this->model->add($_POST);
            FlashMessage::add('success', 'Article added');
            header('Location: /article');
            exit;
        }
        $data['actionName'] = 'Add';
        $data['action'] = 'add';
        $this->view('article/edit', $data);
        $this->view->render();

    }

    function edit($articleId)
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $_POST['articleId'] = $articleId;
            $this->model('marticle');
            $this->model->edit($_POST);
            FlashMessage::add('success', 'Article edited');
            header('Location: /article');
            exit;
        }
        $this->model('marticle');
        $data = $this->model->getArticle($articleId);
        $data['actionName'] = 'edit';
        $data['action'] = 'edit/' . $articleId;
        $this->view('article/edit', $data);
        $this->view->render();
    }
}