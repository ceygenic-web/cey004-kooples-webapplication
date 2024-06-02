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
                $this->view("product", "Kooples Sri Lanka | Product", ["product", "modules/uiBuilder"], ["product"]);
                break;

            case 'about':
                $this->view("about", "Kooples Sri Lanka | About Us", [], ["about"]);
                break;

            case 'contact':
                $this->view("contact", "Kooples Sri Lanka | Contact", [], ["contact"]);
                break;

            case 'purchase':
                $this->view("purchase", "Kooples Sri Lanka | Purchase", ["purchase"], []);
                break;

            case 'terms-and-conditions':
                $this->view("terms-&-condition", "Kooples Sri Lanka | T&C", [], []);
                break;

            case 'refund-policy':
                $this->view("refund-policy", "Kooples Sri Lanka | Refund and Returns", [], []);
                break;

            case 'privacy-policy':
                $this->view("privacy-policy", "Kooples Sri Lanka | Privacy", [], []);
                break;

            default:
                $this->view("404", "Kooples Sri Lanka | 404 Not found");
                break;
        }
    }
}
