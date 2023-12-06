<?php

namespace App;


/**
 * SQLite connnection
 */
class SQLiteConnection
{

    /**
     * PDO instance
     * @var type
     */
    private $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     * @throws \Exception
     */
    public function connect(): \PDO|type
    {

        try{
            if($this->pdo==null){
                $this->pdo =new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE,"","",array(
                    \PDO::ATTR_PERSISTENT => true
                ));
            }
            return $this->pdo;
        }catch(PDOException $e){
            print "Error in openhrsedb ".$e->getMessage();
        }

    }
}