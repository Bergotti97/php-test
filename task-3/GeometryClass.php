<?php

interface IFigure
{
    public function area();
    public function setArea($area);
    public function getArea();
}

class Rectangle implements IFigure, JsonSerializable 
{
    private $length;
    private $width;
    private $area;

    function __construct() 
    {
        $this->length = random_int(10, 30); 
        $this->width = random_int(10, 30);
    }
 
    public function area() 
    {
        $this->area = $this->length * $this->width;   
        echo "Figures area is  ", $this->area,"\n";

        return $this->area;
    }

    public function jsonSerialize()
    {
        return [
            'length' => $this->length,
            'width' => $this->width,
            'area' => $this->area()
        ];
    }
    
    public function setLength($length)
    {
        $this->length = $length;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setArea($area)
    {
        $this->area = $area;
    }

    public function getArea()
    {
        return $this->area;
    }
}

class Circle implements IFigure, JsonSerializable
{
    private $radius;
    private $area;

    function __construct() 
    {
        $this->radius = random_int(10, 30); 
    }

    public function area()
    {
        $this->area = pi()* pow($this->radius, 2);
        echo "Figures area is  ", $this->area,"\n";

        return $this->area;
    }

    public function jsonSerialize()
    {
        return [
            'radius' => $this->radius,
            'area' => $this->area()
        ];
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    public function setArea($area)
    {
        $this->area = $area;
    }

    public function getArea()
    {
        return $this->area;
    }
}

class Pyramid implements IFigure, JsonSerializable
{
    private $base;
    private $edge;
    private $area;

    function __construct()
    {
        $this->base = random_int(10, 30); 
        $this->edge = random_int(10, 30);
    }

    public function area()
    {
        $this->area = 2*$this->base * sqrt(pow($this->edge, 2)-pow($this->base, 2)/2)
        + pow($this->base, 2);

        if (is_nan($this->area)) {
            echo "Figures area is  ", 0,"\n";
        } else {
            echo "Figures area is  ", $this->area,"\n";
        } 

        return $this->area;        
    }

    public function jsonSerialize()
    {
        return [
            'edge' => $this->edge,
            'base' => $this->base,
            'area' => $this->area()
        ];
    }

    public function setBase($base)
    {
        $this->base = $base;
    }
    
    public function setEdge($edge)
    {
        $this->edge = $edge;
    }
    
    public function setArea($area)
    {
        $this->area = $area;
    }

    public function getArea()
    {
        return $this->area;
    }
}

function cmp($a, $b)
{
    return strcmp($b->getArea(), $a->getArea());
}

echo "Select Class\n";
echo "1.Rectangle\n";
echo "2.Circle\n";
echo "3.Pyramid\n";
echo "4.Random Class\n";
echo "5.Sort areas\n";
$SelClass = readline("SelClass = "); 

if ($SelClass == 1) {
    $figure = new Rectangle;
    echo "Figure is a Rectangle\n";
    echo "Please specify size of your figure (empty set for random)\n";
    $myLength = readline("Length = ");
    $myWidth = readline("Width = ");
    
    if (!strlen($myLength) == 0) {
        $figure->setLength($myLength);
    }
    
    if (!strlen($myWidth) == 0) {
        $figure->setWidth($myWidth);
    }
   
    //Сохранение объекта в файл
    $json = json_encode($figure);
    file_put_contents('Rectangle.txt', $json, LOCK_EX);
} elseif ($SelClass == 2) {
    $figure = new Circle;
    echo "Figure is a Circle\n";
    echo "Please specify size of your figure (empty set for random)\n";
    $myRadius = readline("Radius = ");
    
    if (!strlen($myRadius) == 0) {
        $figure->setRadius($myRadius);
    }
    
    //Сохранение объекта в файл
    $json = json_encode($figure);
    file_put_contents('Circle.txt', $json, LOCK_EX);
} elseif ($SelClass == 3) {
    $figure = new Pyramid;
    echo "Figure is a Pyramid\n"; 
    echo "Please specify size of your figure (empty set for random)\n";
    $myBase = readline("Base = ");
    $myEdge = readline("Edge = ");
    
    if (!strlen($myBase) == 0) {
        $figure->setBase($myBase);
    }
    
    if (!strlen($myEdge) == 0) {
        $figure->setEdge($myEdge);
    }
    
    //Сохранение объекта в файл
    $json = json_encode($figure);
    file_put_contents('Pyramid.txt', $json, LOCK_EX);
} elseif ($SelClass == 4) { 
    //Генерация случайных объектов классов
    $input = array("Rectangle", "Circle", "Pyramid");
    $rand_keys = array_rand($input, 1);
    echo "Figure is a ", $input[$rand_keys], "\n";
   
    $figure = new $input[$rand_keys];
    $json = json_encode($figure);
    file_put_contents($input[$rand_keys].".txt", $json, LOCK_EX);
} elseif ($SelClass == 5) {
    //Получение объектов из файлов
    $figures = []; 
    $savedRec = json_decode(file_get_contents('Rectangle.txt'));
    $rectangle = new Rectangle;
    $rectangle->setLength($savedRec->{"length"});
    $rectangle->setWidth($savedRec->{"width"});
    $rectangle->setArea($savedRec->{"area"});

    $savedCir = json_decode(file_get_contents('Circle.txt'));
    $circle = new Circle;
    $circle->setRadius($savedCir->{"radius"});
    $circle->setArea($savedCir->{"area"});
    
    $savedPyr = json_decode(file_get_contents('Pyramid.txt'));
    $pyramid = new Pyramid;
    $pyramid->setBase($savedPyr->{"base"});
    $pyramid->setEdge($savedPyr->{"edge"});
    $pyramid->setArea($savedPyr->{"area"});

    //Сортировка объектов по убыванию площади фигуры
    array_push($figures, $rectangle, $circle, $pyramid);
    usort($figures, "cmp");
    print_r($figures);

} elseif ($SelClass > 5 or $SelClass < 1) {
    echo "Error: Class not selected";
    return;
}
