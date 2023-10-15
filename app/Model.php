<?php

namespace App;

abstract class Model
{
   

   protected DB $db;

   public function __construct()
   {
      $this->db = App::db();
   }

   public static function __callStatic($name, $arguments)
   {
        return call_user_func_array([App::db(),$name],$arguments);
   }


}
