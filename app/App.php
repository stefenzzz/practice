<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFound;
use App\Exceptions\ViewNotFound;
use Dotenv\Dotenv;
use PDOException;

class App
{   
    private Config $config;
    private static DB $db;
    public function __construct(private Router $router)
    {
        
    }

  

    public function boot()
    {


        $this->config =  new Config($_ENV);
        
        self::$db = new DB($this->config->db);

        return $this;
    }

    public function run()
    {
        try{
    
            echo $this->router->resolve();
        }catch(RouteNotFound $e)
        {
            http_response_code(404);
            echo $e->getMessage();
        }
        catch(ViewNotFound $e)
        {
         
            echo $e->getMessage();
        }
        catch(PDOException $e)
        {
         
            echo $e->getMessage();
        }
    }

 

    /**
     * Get the value of db
     */ 
    public static function db()
    {
        return static::$db;
    }
}
