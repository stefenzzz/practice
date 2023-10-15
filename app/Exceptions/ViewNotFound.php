<?php

namespace App\Exceptions;

use Exception;

class ViewNotFound extends Exception
{
    protected  $message = 'View not Found';
}
