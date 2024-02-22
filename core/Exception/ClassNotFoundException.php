<?php

namespace app\core\exception;

class ClassNotFoundException extends \Exception
{
    protected $message = 'Class Not Found';
    protected $code = '404';
}