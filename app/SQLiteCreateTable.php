<?php

namespace App;

class SQLiteCreateTable
{

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * connect to the SQLite database
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * create tables
     */
    public function createTables(): void
    {
        $command = 'CREATE TABLE IF NOT EXISTS favorit (
            id INTEGER PRIMARY KEY,
            id_post  INTEGER (255) NOT NULL,
            category_id  VARCHAR (255) NOT NULL
            )';
        $this->pdo->exec($command);
    }

    /**
     * get the table list in the database
     */
    public function getTableList(): array
    {
        $stmt = $this->pdo->query(
            "SELECT name
                               FROM sqlite_master
                               WHERE type = 'table'
                               ORDER BY name"
        );
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['name'];
        }

        return $tables;
    }
}