<?php


class marticle extends Database
{
    function getArticles()
    {
        $data = self::query('SELECT * FROM cms.articles');
        return $data;
    }

    function getChosenArticles($articlesIds)
    {
        $field = array_keys($articlesIds);
        $query = 'SELECT * FROM cms.articles WHERE articleId IN (' . ':' . implode(',:', $field) . ')';
        $data = self::query($query, $articlesIds);
        return $data;
    }

    function delete($articleId)
    {
        $query = 'DELETE FROM cms.articles WHERE articleId =:articleId';
        self::query($query, ['articleId' => $articleId]);
    }

    function add($data)
    {
        $data['date'] = date('Y-m-d');
        $query = 'INSERT INTO cms.articles (`title`, `content`, `date`, `userId`) VALUES (:title, :content, :date, :userId);';
        self::query($query, $data);
    }

    function getArticle($articleId)
    {
        $data = self::query('SELECT * FROM cms.articles WHERE articleId=:articleId', ['articleId' => $articleId]);
        return $data;
    }

    function edit($data)
    {
        $query = 'UPDATE cms.articles SET title=:title, content=:content WHERE articleId=:articleId;';
        self::query($query, $data);
    }
}