<?php

declare(strict_types=1);

namespace App;

use PDO;
use PDOException;

class DB 
{
    private PDO $pdo;

    public function __construct(array $db)
    {


        try{
            $dsn =  'mysql:dbname='.$db['name'].';host='.$db['host'];
            $user = $db['user'];
            $pass = $db['pass'];
    
            $this->pdo = new PDO($dsn, $user, $pass);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function __call($name, $arguments)
    {
        
        return call_user_func_array([$this->pdo,$name],$arguments);
    }
}
