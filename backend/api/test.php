<?php

class Test
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
                case 'print':
                    $test = null;
                    return [var_dump($test), false];
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }
}
