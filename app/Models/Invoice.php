<?php

declare(strict_types=1);


namespace App\Models;

use App\Model;

class Invoice Extends Model
{
   protected string $email;
   protected int $userId;

   

   /**
    * Set the value of email
    *
    * @return  self
    */ 
   public function setEmail($email)
   {
      $this->email = $email;

      return $this;
   }

   /**
    * Set the value of userId
    *
    * @return  self
    */ 
   public function setUserId($userId)
   {
      $this->userId = $userId;

      return $this;
   }
    /**
     * return the last inteserted ID from database
     *
     * @return integer
     */
    public function save():int
    {
         $stmt = static::prepare('
             INSERT INTO invoice(email,user_id,date_created)
             values(?,?,NOW())
         ');
         $stmt->execute([
             $this->email,
             $this->userId,
             ]);
         return (int) static::lastInsertId();
    }
   
}