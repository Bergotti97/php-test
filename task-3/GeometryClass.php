<?php
interface IFigure
{
    public function area();
}

class Rectangle implements IFigure
{

    protected $length;
    protected $width;

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
    protected $radius;

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
    protected $base;
    protected $edge;

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
$input = array("Rectangle", "Circle", "Pyramid");
$rand_keys = array_rand($input, 1);
echo "Figure is a ", $input[$rand_keys], "\n";
$class = $input[$rand_keys];
$figure = new $class;

$figure->area();
$myfigure[] = (array) $figure;

$json = json_encode($myfigure);
echo "Saved object is ", $json ,"\n";


$savedJson = file_get_contents('Figure.txt');
$savedObj = json_decode($savedJson);
echo "Loaded object is ", $savedJson;


$obj = json_decode($json);
file_put_contents('Figure.txt', $json, LOCK_EX);
?>