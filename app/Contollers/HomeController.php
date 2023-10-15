<?php

namespace App\Contollers;

use App\App;
use App\DB;
use App\Models\Invoice;
use App\Models\User;
use App\View;
use PDO;
use PDOException;
use Throwable;

class HomeController
{
    public function index()
    {   
        $email = 'johndoe10@gmail.com';
        try{

            App::db()->beginTransaction();

            $user = new User();
            $id = $user->setFirstName('John')
                    ->setLastName('Doe')
                    ->setEmail($email)
                    ->save();

            $invoice = new Invoice();
            $invoiceId = $invoice->setUserId($id)
                    ->setEmail($email)
                    ->save();
        
            App::db()->commit();

        }catch(Throwable $e){
            $e->getMessage();
            if(Invoice::inTransaction())
            {
                App::db()->rollBack();
            }
          throw $e;
        }

        if(!empty($invoiceId)){
            echo $invoiceId.'<br>';
            echo 'success';
        }else{
            echo 'failed';
        }

    }
}
