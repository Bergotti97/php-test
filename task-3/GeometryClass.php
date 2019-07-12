<?php

interface IFigure
{
    public function area();
}

class Rectangle implements IFigure
{
    public $length;
    public $width;

    function __construct() 
    {
        $this->length = random_int(10, 30); 
        $this->width = random_int(10, 30);
    }
 
    public function area() 
    {
        $area = $this->length * $this->width;   
        echo "Figures area is  ", $area,"\n";
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    
}

class Circle implements IFigure
{
    public $radius;

    function __construct() 
    {
        $this->radius = random_int(10, 30); 
    }

    public function area()
    {
        $area = pi()* pow($this->radius, 2);
        echo "Figures area is  ", $area,"\n";
    }
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

class Pyramid implements IFigure
{
    public $base;
    public $edge;

    function __construct()
    {
        $this->base = random_int(10, 30); 
        $this->edge = random_int(10, 30);
    }

    public function area()
    {
        $area = 2*$this->base * sqrt(pow($this->edge, 2)-pow($this->base, 2)/2) 
        + pow($this->base, 2);
        if (is_nan($area)) {
            echo "Figures area is  ", 0,"\n";
        } else {
            echo "Figures area is  ", $area,"\n";
        }         
    }
}

echo "Select Class\n";
echo "1.Rectangle\n";
echo "2.Circle\n";
echo "3.Pyramid\n";
echo "4.Random Class\n";
$SelClass = readline("SelClass = "); 

if ($SelClass == 1) {
    $figure = new Rectangle;
    echo "Figure is a Rectangle\n";
    echo "Please specify size of your figure (empty set for random)\n";
    $myLength = readline("Length = ");
    $myWidth = readline("Width = ");
    if (!strlen($myLength) == 0) {
        $figure->length = $myLength;
    }
    if (!strlen($myWidth) == 0) {
        $figure->width = $myWidth;
    }
} elseif ($SelClass == 2) {
    $figure = new Circle;
    echo "Figure is a Circle\n";
    echo "Please specify size of your figure (empty set for random)\n";
    $myRadius = readline("Radius = ");
    if (!strlen($myRadius) == 0) {
        $figure->radius = $myRadius;
    }
} elseif ($SelClass == 3) {
    $figure = new Pyramid;
    echo "Figure is a Pyramid\n"; 
    echo "Please specify size of your figure (empty set for random)\n";
    $myBase = readline("Base = ");
    $myEdge = readline("Edge = ");
    if (!strlen($myBase) == 0) {
        $figure->base = $myBase;
    }
    if (!strlen($myEdge) == 0) {
        $figure->edge = $myEdge;
    }
} elseif ($SelClass == 4) {
    $input = array("Rectangle", "Circle", "Pyramid");
    $rand_keys = array_rand($input, 1);
    echo "Figure is a ", $input[$rand_keys], "\n";
    $class = $input[$rand_keys];
    $figure = new $class;
} elseif ($SelClass > 4 or $SelClass < 1) {
    echo "Error: Class not selected";
    return;
}



$figure->area();
$myFigure[] = (array) $figure;

$json = json_encode($myFigure);
echo "Saved object is ", $json ,"\n";

$savedJson = file_get_contents('Figure.txt');
$savedObj = json_decode($savedJson);
echo "Loaded object is ", $savedJson;

$obj = json_decode($json);
file_put_contents('Figure.txt', $json, LOCK_EX);
