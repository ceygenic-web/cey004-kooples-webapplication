<?php
//import statement
require_once(__DIR__ . "/View.php");
require_once(__DIR__ . "/MiddleWares.php");

/**
 * this class initializes the application routes and identify API or View instances
 * @author: jantih nirmal
 */
class Router extends Controller
{
       use ResponseSender;

       protected  $urlPaths = [];
       protected $apiPath = __DIR__ . "/../api/";
       protected $URL = "";
       // initialize request - jantih nirmal
       public function routerInit()
       {
              // middelware implimentation - #bug
              // $middleware = new MiddleWares();
              // $middleware->security_layer_1();

              // get the URL
              $this->URL = explode('?', trim($_SERVER['REQUEST_URI'], '/'))[0];
              // get the url path
              $this->urlPaths = explode('/', $this->URL);
              // find the URL paths have a api
              if ($this->urlPaths[0] === 'api') {
                     array_shift($this->urlPaths);
                     $this->callApi($this->urlPaths);
              } else if ($this->urlPaths[0] === 'comp') {
                     array_shift($this->urlPaths);
                     $this->loadComp($this->URL);
              } else {
                     $this->loadView($this->URL);
              }
       }

       /**
        * call related api class
        * @param array $URLPath
        */
       public function callApi(array $URLPath)
       {
              //upper case first character url path
              $API = ucfirst(($URLPath[0]) ?? null);
              // check if file path is exist
              var_dump($this->apiPath . $API . ".php");
              if (file_exists($filePath = $this->apiPath . $API . ".php")) {
                     require_once $filePath;
                     array_shift($URLPath);
                     //create a related api object
                     new $API($URLPath);
              } else {
                     $this->sendJson(self::response(2, API_404_MESSAGE));
              }
       }

       /**
        * call page view class
        * @param string $URL
        */
       public function loadView(string $URL)
       {
              //initialize View class and pass the URL to View constructor
              new View($URL);
       }

       /**
        * load components
        * @param string $URL
        */
       public function loadComp(string $URL)
       {
              //initialize View class and pass the URL to View constructor
              new View($URL, true);
       }
}
