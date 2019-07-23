<?php
/**
 * PHP version 7.3.6
 * 
 * @category Figures
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/index.php 
 */

require 'IFigure.php';
require 'Rectangle.php';
require 'Circle.php';
require 'Pyramid.php';

/**
 * Функия для сортировки
 * 
 * @param object $a Первый объект для сравнения
 * @param object $b Второй объект для сравнения
 * 
 * @return int
 */
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
echo "Figure is a " . $input[$rand_keys] . "\n";
echo "Figures area is  " . $figure->area() . "\n";
$json = json_encode($figure);
file_put_contents($input[$rand_keys] . ".txt", $json, LOCK_EX);

//Получение объектов из файлов
$figures = []; 
$rectangle = Rectangle::load("Rectangle.txt");
$circle = Circle::load("Circle.txt");
$pyramid = Pyramid::load("Pyramid.txt");
   
//Сортировка объектов по убыванию площади фигуры
array_push($figures, $rectangle, $circle, $pyramid);
usort($figures, "cmp");
print_r($figures);
