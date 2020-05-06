<?php
    /*
    * App Core Class
    * Creates URL & laods core controller
    * URL FORMAT - /controller/method/params
    */

    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
            // print_r($this->getURL());

            $url = $this->getURL();

            // Look in controllers for first value
            // currently in index.php
            if(isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                // if exists, set as current controller
                // will overwrite Pages, which is the default
                $this->currentController = ucwords($url[0]);

                // Unset 0 index
                unset($url[0]);
            }

            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate controller class
            $this->currentController = new $this->currentController;
        }

        public function getURL(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }
