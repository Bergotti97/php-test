<?php

class Circle implements IFigure, JsonSerializable
{
    private $_radius;
    private $_area;

    public function area()
    {
        $this->_area = pi()* pow($this->_radius, 2);

        return $this->_area;
    }

    public function jsonSerialize()
    {
        return [
            'radius' => $this->_radius,
            'area' => $this->area()
        ];
    }

    public function setRadius($radius)
    {
        $this->_radius = $radius;
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
        $Circle = new Circle;
        $Circle->setRadius(random_int(10, 30));

        return $Circle;
    }

    public static function loadFigure($savedCir)
    {
        $circle = new Circle;
        $circle->setRadius($savedCir["radius"]);
        $circle->setArea($savedCir["area"]);
        
        return $circle;
    }
}
