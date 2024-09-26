<?php

namespace Database;
use PDO;
use  PDOStatement;

class DB
{
    private static DB $instance;
    private PDO $pdo;    

    private function __construct()
    {       

        $connectionString = strtr(
            '%connect%:dbname=%dbname%;host=%host%;port=%port%',
            ['%connect%' => getenv('DATABASE_CONNECTION'),
             '%dbname%' => getenv('DATABASE_DB'),
             '%host%' => getenv('DATABASE_HOST'),
             '%port%' => getenv('DATABASE_PORT'),
            ]
        );

        $this->pdo = new PDO($connectionString, getenv('DATABASE_USERNAME'), getenv('DATABASE_PASSWORD'));
    }


    public static function getInstance(): self
    {
        if(!isset(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function query(string $sql) : PDOStatement
    {
        return $this->pdo->query($sql, PDO::FETCH_ASSOC);
    }

    public function getRowByClass(string $sql, string $class, bool $single = false) : mixed
    {
        $result = $this->pdo->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
      

        $list = [];

        foreach($result as $item){
            if($single) return $item;
            $list[] = $item;
        }

        return $list;
    }

    public function getSingleRowByClass(string $sql, string $class): mixed {
        return $this->getRowByClass($sql, $class, true);
    }

    

}