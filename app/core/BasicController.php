<?php

namespace App\Core;

use Exception;

abstract class BasicController extends Singleton
{


    public function __construct()
    {
        parent::__construct();
    }

    public function redirect($url)
    {
        header("location: " . $url);
    }


    public function loadModel($name, $path = 'model/')
    {
        $path = $path . $name . '.php';
        $name = $name . 'Model';
        try {
            if (is_file($path)) {
                require $path;
                $ob = new $name();
            } else {
                throw new Exception('Can not open model ' . $name . ' in: ' . $path);
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br />
                File: ' . $e->getFile() . '<br />
                Code line: ' . $e->getLine() . '<br />
                Trace: ' . $e->getTraceAsString();
            exit;
        }
        return $ob;
    }
}