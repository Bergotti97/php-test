<?php

class Rectangle implements IFigure, JsonSerializable
{
    private $_length;
    private $_width;
    private $_area;
 
    public function area() 
    {
        $this->_area = $this->_length * $this->_width;   
        echo "Figures area is  ", $this->_area,"\n";

        return $this->_area;
    }

    public function jsonSerialize()
    {
        return [
        'length' => $this->_length,
        'width' => $this->_width,
        'area' => $this->area()
        ];
    }

    public function setLength($length)
    {
        $this->_length = $length;
    }

    public function setWidth($width)
    {
        $this->_width = $width;
    }

    public function setArea($area)
    {
        $this->_area = $area;
    }

    public function getArea()
    {
        return $this->_area;
    }

    public static function makeFigure()
    {
        $Rectangle = new Rectangle;
        $Rectangle->setLength(random_int(10, 30));
        $Rectangle->setWidth(random_int(10, 30));
        return $Rectangle;
    }

    public static function loadFigure($savedRec)
    {
        $rectangle = new Rectangle;
        $rectangle->setLength($savedRec->{"length"});
        $rectangle->setWidth($savedRec->{"width"});
        $rectangle->setArea($savedRec->{"area"});
        return $rectangle;
    }
}
