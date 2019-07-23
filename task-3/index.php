<?php

require 'IFigure.php';
require 'Rectangle.php';
require 'Circle.php';
require 'Pyramid.php';

function cmp($a, $b)
{
    $al = strtolower($a->getArea());
    $bl = strtolower($b->getArea());
    if ($al == $bl) {
        return 0;
    }

    return ($al < $bl) ? +1 : -1;
}

//Генерация случайных объектов классов
$input = array("Rectangle", "Circle", "Pyramid");
$rand_keys = array_rand($input, 1);

$figure = $input[$rand_keys]::makeFigure();
echo "Figure is a ", $input[$rand_keys], "\n";
echo "Figures area is  ", $figure->area() ,"\n";
$json = json_encode($figure);
file_put_contents($input[$rand_keys].".txt", $json, LOCK_EX);

//Получение объектов из файлов
$figures = []; 
$savedRec = json_decode(file_get_contents('Rectangle.txt'));
$rectangle = Rectangle::loadFigure($savedRec);
    
$savedCir = json_decode(file_get_contents('Circle.txt'));
$circle = Circle::loadFigure($savedCir);
        
$savedPyr = json_decode(file_get_contents('Pyramid.txt'));
$pyramid = Pyramid::loadFigure($savedPyr);
     
//Сортировка объектов по убыванию площади фигуры
array_push($figures, $rectangle, $circle, $pyramid);
usort($figures, "cmp");
print_r($figures);
