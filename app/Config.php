<?php

declare(strict_types=1);

namespace App;

use PDOException;

class Config
{
    private array $config;
    public function __construct(array $env)
    {
     
            $this->config = [
                'db' =>[
                    'host' => $env['DB_HOST'],
                    'pass' => $env['DB_PASS'],
                    'user' => $env['DB_USER'],
                    'name' => $env['DB_NAME'],
                    'driver' => $env['DB_DRIVER'] ?? 'mysql'
                ],
                'apiKey' =>[
                    'mailchimp' => $env['MAILCHIMP_API_KEY']
                ]
            ];
    
    }
    

    public function __get($name)
    {
        return $this->config[$name];
    }
}
