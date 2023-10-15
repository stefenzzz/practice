<?php

namespace App\Exceptions;

use Exception;

class RouteNotFound extends Exception
{
  protected $message = 'route not found';
}
