<?php


namespace App\Message;


class ArticleMessage
{
    private $articleId;

    public function __construct(int $articleId)
    {
        $this->articleId = $articleId;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }


}