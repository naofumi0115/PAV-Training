<?php

class Square implements AreaInterface
{

    public $lengthSide;

    public function __construct($lengthSide)
    {
        $this->lengthSide = $lengthSide;
    }

    public  function calculateArea(){
        $area = $this->lengthSide *  $this->lengthSide;
        return $area;
    }

}