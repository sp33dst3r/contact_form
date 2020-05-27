<?php
namespace App\Contracts;

class Saver {
    public $handler;
    public function __construct()
    {

    }
    public function save($type, $request){

        switch ($type) {
            case "one":
                $this->handler = new SaveEmailOne();
            break;
            case "two":
                $this->saver = new SaveEmailTwo();
            break;
            default:
                $this->handler = new SaveEmailOne();
            break;
        }
        return $this->handler->save($request);
    }
}
