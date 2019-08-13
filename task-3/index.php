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

use classes\Rectangle;
use classes\Circle;
use classes\Triangle;

/**
 * Автозагрузщик классов
 * 
 * @param string $class Название класса
 * 
 * @return void
 */
function autoloder($class)
{
    $class = str_replace("\\", '/', $class);
    $file = __DIR__ . "/{$class}.php";
    if (file_exists($file)) {
        include_once $file;
    }
}
spl_autoload_register('autoloder');

/**
 * Функия для сортировки
 * 
 * @param object $obj1 Первый объект для сравнения
 * @param object $obj2 Второй объект для сравнения
 * 
 * @return int
 */
function sortByArea($obj1, $obj2)
{
    if ($obj1->area == $obj2->area) {
        return 0;
    } else {
        return ($obj1->area > $obj2->area) ? -1 : 1;
    }    
}

//Генерация случайных объектов классов
$rectangle = new Rectangle(
    random_int(1, 100), 
    random_int(1, 100)
);
$circle = new Circle(
    random_int(1, 100)
);
$triangle = new Triangle(
    random_int(1, 100), 
    random_int(1, 100), 
    random_int(1, 100)
);

// Сохранение объектов в файл
if (file_exists('data.json')) {
    $file = file_get_contents('data.json');
    $figures = json_decode($file);
}
unset($file);
$figures[] = $rectangle;
$figures[] = $circle;
$figures[] = $triangle;
file_put_contents('data.json', json_encode($figures));
echo "Saved figures\n";
foreach ($figures as $obj) {
    print_r($obj);
    echo "\n";
}
unset($figures);

// Загрузка объектов из файла
$data = file_get_contents('data.json');
$arr = json_decode($data);

echo "Loaded figures\n";
foreach ($arr as $obj) {
    print_r($obj);
    echo "\n";
}

//Сортировка объектов по убыванию площади фигуры
usort($arr, 'sortByArea');
echo "Sorted figures\n";
foreach ($arr as $obj) {
    print_r($obj);
    echo "\n";
}
