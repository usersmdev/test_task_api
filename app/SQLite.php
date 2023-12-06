<?php

namespace App;

class SQLite
{
    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Insert a new project into the projects table
     * @param string $projectName
     * @return the id of the new project
     */
    public function insertPost($postId, $category_id): string
    {
        $sql = 'INSERT INTO favorit(id_post, category_id) VALUES(:id_post, :category_id)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_post' => $postId,
            ':category_id' => $category_id,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getPosts(): array
    {
        $stmt = $this->pdo->query(
            'SELECT id_post, category_id '
            . 'FROM favorit'
        );
        $posts = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $posts[] = [
                'id_post' => $row['id_post'],
                'category_id' => $row['category_id']
            ];
        }
        return $posts;
    }

    public function getPostById($cetegoryId): array
    {
        // prepare SELECT statement
        $stmt = $this->pdo->prepare(
            'SELECT id_post, category_id
                                 FROM favorit
                                WHERE category_id = :category_id;'
        );

        $stmt->execute([':category_id' => $cetegoryId]);
        $posts = [];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $posts[] = [
                'id_post' => $row['id_post'],
                'category_id' => $row['category_id'],

            ];
        }

        return $posts;
    }
}