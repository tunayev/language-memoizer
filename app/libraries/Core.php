<?php
/*
 * App Core Class
 * Creates URL and loads the core controller
 * URL Format is: controller/method/params
 */

 class Core {
     protected $currentController   = 'Pages';
     protected $currentMethod       = 'index';
     protected $params              = [];

     public function __construct() {
         $url = $this->getUrl();

         // Controller should look for the first value in array
         if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
             //If exists, set as current
             $this->currentController = ucwords($url[0]);
             //Unset the 0 index
             unset($url[0]);
         }
         // Require Controller
         require_once '../app/controllers/' . $this->currentController . '.php';

         // Instantiate The Controller
         $this->currentController = new $this->currentController;

         // Then, controller should look for the second part of the array
         if(isset($url[1])) {
             if(method_exists($this->currentController, $url[1])) {
                 $this->currentMethod = $url[1];
                 //Unset the 1 index
                 unset($url[1]);
             }
         }

         //Get Params
         $this->params = $url ? array_values($url) : [];
         
         //Call a callback with array of params
         call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
     }

     public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
     }
 }