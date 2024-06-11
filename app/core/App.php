<?php 

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        if (!isset($url[0])) {
            // Jika URL kosong, gunakan controller default
            $this->loadController($this->controller);
        } else {
            $controllerName = ucfirst($url[0]);
            if (file_exists("../app/controllers/{$controllerName}.php")) {
                // Jika controller ditemukan, gunakan controller tersebut
                $this->loadController($controllerName);
                unset($url[0]);
            } else {
                // Jika controller tidak ditemukan, gunakan controller default
                $this->loadController($this->controller);
            }
        }

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function loadController($controllerName)
    {
        require_once "../app/controllers/{$controllerName}.php";
        $this->controller = new $controllerName;
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

