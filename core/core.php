<?php
class core
{

    public function __construct()
    {
        $this->run();
    }

    public function run()
    {
        if (isset($_GET['pag'])) {

            $page = explode("/", $_GET['pag']);
            $class = $page[0] . "Controller";
            array_shift($page);

            if (!empty($page[0])) {
                $metodo = $page[0];
                array_shift($page);
            } else {
                $metodo = "index";
            }
            if ($page > 0) {
                $params = $page;
            }
        } else {
            $class = 'homeController';
            $metodo = 'index';
        }

        self::autoload($class);
        $startController = new $class();
        $startController->$metodo();

    }

    public static function autoload($nameArquivo)
    {
        spl_autoload_register(function ($nameArquivo) {
            if (file_exists("controllers/" . $nameArquivo . ".php")) {
                require "controllers/" . $nameArquivo . ".php";
            } elseif (file_exists("models/" . $nameArquivo . ".php")) {
                require "models/" . $nameArquivo . ".php";
            } elseif (file_exists("core/" . $nameArquivo . ".php")) {
                require "core/" . $nameArquivo . ".php";
            }
        });
    }
}