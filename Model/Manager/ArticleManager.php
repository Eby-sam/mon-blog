<?php

namespace App\Model\Manager;

use App\Model\Entity\Article;
use Connect;

class ArticleManager
{
    public const TABLE = 'article';

    /**
     * @return array
     */
    public static function findAll(): array
    {
        $articles = [];
        $query = Connect::dbConnect()->query("SELECT * FROM " . self::TABLE);
        if ($query) {
            $userManager = new UserManager();
            $format = 'Y-m-d H:i:s';

            foreach ($query->fetchAll() as $articleData) {
                $articles[] = (new Article())
                    ->setId($articleData['id'])
                    ->setAuthor(UserManager::getUserById($articleData['user_fk']))
                    ->setContent($articleData['content'])
                    ->setTitle($articleData['title']);
            }
        }
        return $articles;
    }


    /**
     * Add article in db.
     * @param Article $article
     * @param string $title
     * @param string $content
     * @param int $id
     * @return void
     */
    public static function addNewArticle(Article &$article, string $title, string $content, int $id): bool
    {
        $stmt = Connect::dbConnect()->prepare("
            INSERT INTO " . self::TABLE . " (title, content, user_fk)
            VALUES (:title, :content, :user_fk)
        ");

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam('user_fk', $id);


        $result = $stmt->execute();
        $article->setId(Connect::dbConnect()->lastInsertId());
        return $result;
    }

    /**
     * verify article exist
     * @param int $id
     * @return bool
     */
    public static function articleExists(int $id): bool
    {
        $result = Connect::dbConnect()->query("SELECT count(*) as cnt FROM " . self::TABLE . " WHERE id = $id");
        return $result ? $result->fetch()['cnt'] : 0;
    }

    /**
     * retrieve the article by its id
     * @param int $id
     * @return Article|null
     */
    public static function getArticleById(int $id): ?Article
    {
        $result = Connect::dbConnect()->query("SELECT * FROM " . self::TABLE . " WHERE id = $id");
        return $result ? self::makeArticle($result->fetch()) : null;
    }

    /**
     * @param array $data
     * @return Article
     */
    private static function makeArticle(array $data): Article
    {
        return (new Article())
            ->setId($data['id'])
            ->setTitle($data['title'])
            ->setContent($data['content'])
            ->setAuthor(UserManager::getUserById($data['user_fk']));
    }

    /**
     * @param Article|null $article
     * @return false|int
     */
    public static function deleteArticle(?Article $article)
    {
        if (self::articleExists($article->getId())) {
            return Connect::dbConnect()->exec("
            DELETE FROM " . self::TABLE . " WHERE id = {$article->getId()}
        ");
        }
        return false;
    }

    /**
     * modify article
     * @param int $id
     * @param string $title
     * @param string $content
     * @return void
     */
    public static function editArticle(int $id, string $title, string $content)
    {
            $stmt = Connect::dbConnect()->prepare("
            UPDATE " . self::TABLE . " SET title= :title, content = :content WHERE id = :id
                ");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);

            $stmt->execute();
    }
}