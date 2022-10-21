<?php


namespace App\Core;

use Exception;

class View extends Singleton
{

    public function render($name, $path = 'views/')
    {
        $path = APP_ROOT . '/' . $path . $name . '.php';
        try {
            if (is_file($path)) {
                require $path;
            } else {
                throw new Exception('Can not open template ' . $name . ' in: ' . $path);
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br />
                File: ' . $e->getFile() . '<br />
                Code line: ' . $e->getLine() . '<br />
                Trace: ' . $e->getTraceAsString();
            exit;
        }
    }

    public function set($name, $value)
    {
        $this->$name = $value;
    }

    public function get($name)
    {
        return $this->$name;
    }
}