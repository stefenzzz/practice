<?php

declare(strict_types=1);


namespace App\Models;

use App\Model;

class User extends Model
{
    protected string $firstName;
    protected string $lastName;
    protected string $email;
   
 
 
    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setFirstName($firstName):static
    {
       $this->firstName = $firstName;
 
       return $this;
    }
 
    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName):static
    {
       $this->lastName = $lastName;
 
       return $this;
    }
 
    
 
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
     * return the last inteserted ID from database
     *
     * @return integer
     */
    public function save():int
    {
         $stmt = static::prepare('
             INSERT INTO users(email,first_name,last_name,date_created)
             values(?,?,?,NOW())
         ');
         $stmt->execute([
             $this->email,
             $this->firstName,
             $this->lastName,
             ]);
         return (int) static::lastInsertId();
    }
}
