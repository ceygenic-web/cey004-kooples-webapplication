<?php

class Cart
{

    private mixed $function;

    public function __construct(array $apiCall)
    {
        $this->function = ($apiCall[2]) ?? null;
    }



    public  function callFunction(): mixed
    {
        if ($this->function) {
            switch ($this->function) {
                case 'view':
                    return [$this->view(($_SERVER["REQUEST_METHOD"]) ? $_GET : []), false];
                    break;

                case 'add':
                    return [$this->add(), true];
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }

    public function view($params)
    {
        $array = [];
        foreach ($params as $key => $value) {
            array_push($array, $value);
        }

        return $array;
    }

    public  function add()
    {
        return "card data added";
    }
}
