<?php

class Pyramid implements IFigure, JsonSerializable
{
    private $_base;
    private $_edge;
    private $_area;

    public function area()
    {
        $this->_area = 2*$this->_base * 
        sqrt(pow($this->_edge, 2) - pow($this->_base, 2)/2) + pow($this->_base, 2);

        if (is_nan($this->_area)) {
            $this->_area = 0;
        }
        return $this->_area;        
    }

    public function jsonSerialize()
    {
        return [
            'edge' => $this->_edge,
            'base' => $this->_base,
            'area' => $this->area(),
        ];
    }

    public function setBase($base)
    {
        $this->_base = $base;
    }
    
    public function setEdge($edge)
    {
        $this->_edge = $edge;
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
        $Pyramid = new Pyramid;
        $Pyramid->setBase(random_int(10, 30));
        $Pyramid->setEdge(random_int(10, 30));
        return $Pyramid;
    }

    public static function loadFigure($savedPyr)
    {
        $pyramid = new Pyramid;
        $pyramid->setBase($savedPyr->{"base"});
        $pyramid->setEdge($savedPyr->{"edge"});
        $pyramid->setArea($savedPyr->{"area"});
        return $pyramid;
    }
}
