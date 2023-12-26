<?php

require_once("Controller.php");

final class Router extends Controller
{

    private string $request;

    public function __construct(array $server)
    {
        $this->request = $server["REQUEST_URI"];
    }

    public function init()
    {

        $uri = explode("?", $this->request);
        $routes = explode("/", substr($uri[0], 1));

        switch ($routes[0]) {
            case 'api':
                $this->api($routes);
                break;

            case 'admin':
                $this->admin($routes);
                break;


            case '':
                $this->view("landing", "Kooples Sri Lanka", ["landing"], ["landing"]);
                break;

            case "home":
                $this->view("landing", "Kooples Sri Lanka", ["landing"], ["landing"]);
                break;

            case 'shop':
                $this->view("shop", "Kooples Sri Lanka | Shop", ["shop"], ["shop"]);
                break;

            case 'product':
                $this->view("product", "Kooples Sri Lanka | Product", ["product"], ["product"]);
                break;

            default:
                $this->view("404", "Kooples Sri Lanka | 404 Not found");
                break;
        }
    }
}
