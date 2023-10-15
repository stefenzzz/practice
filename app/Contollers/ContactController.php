<?php

namespace App\Contollers;

use App\View;

class ContactController
{
    public function index()
    {
        return View::render('/contacts/index');
    }
}
