<?php

namespace App;

use App\Exceptions\ViewNotFound;

class View
{


  public function __construct(private string $path, public array $params =[])
  {
    
  }

  public function resolve():string
  { 
    
    $path = VIEWS_PATH.$this->path.'.php';

    extract($this->params);
    
    if(!file_exists($path))
    {
        throw new ViewNotFound();
    }

    ob_start();

    include_once $path;

   return (string) ob_get_clean();
    
  }

  public static function render(string $path, array $params = [])
  { 
     return new static($path,$params);
  }


  public function __toString()
  {
    return $this->resolve();
  }

}