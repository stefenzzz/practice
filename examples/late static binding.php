<?php
declare(strict_types = 1);

//========== late static binding ==============
class Smartphone
{
    protected string $camera = '13mp';

    /**
     * Get the value of camera
     */ 
    public function getCamera()
    {
      
        return $this->camera;
    }

    public static function createInstance()
    {
        return new self();
        // return new static();
    }
}

 class Iphone extends Smartphone
{
    protected string $camera = '20mp';

  

}

echo Iphone::createInstance()->getCamera();
