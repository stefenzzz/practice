<?php

namespace App\Contollers;

use App\View;

class OrderController
{
    public function order()
    {
      return View::render('/order/index');
    }

    public function purchase()
    {

        $item = $_POST['item'];
       return View::render('/order/purchase',['item' => $item]);
    }
}

