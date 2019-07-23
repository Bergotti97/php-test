<?php 
/**
 * PHP version 7.3.6
 * 
 * @category Figures
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/Circle.php 
 */

/**
 * Class Circle
 * 
 * @category Figure
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/Circle.php
 */
class Circle implements IFigure, JsonSerializable
{
    /**
     * Свойства класса
     * 
     * @param int $_radius Радиус круга
     * @param int $_area Площадь круга
     */
    private $_radius;
    private $_area;
    
    /**
     * Функция для посчета площади круга
     * 
     * @return int
     */
    public function area()
    {
        $this->_area = pi()* pow($this->_radius, 2);

        return $this->_area;
    }

    /**
     * Функция для сериализации в JSON
     * 
     * @return array 
     */
    public function jsonSerialize()
    {
        return [
            'radius' => $this->_radius,
            'area' => $this->area()
        ];
    }

    /**
     * Функция для изменения свойства(значения радиуса)
     * 
     * @param int $radius Новый радиус окружности
     * 
     * @return void
     */
    public function setRadius($radius)
    {
        $this->_radius = $radius;
    }

    /**
     * Функция для изменения площади круга
     * 
     * @param int $area Новое значения площади
     * 
     * @return void
     */
    public function setArea($area)
    {
        $this->_area = $area;
    }

    /**
     * Функция для получения значения площади
     * 
     * @return int
     */
    public function getArea()
    {
        return $this->_area;
    }

    /**
     * Генерация круга со случайным радиусом методом "Обычной Фабрики"
     * 
     * @return object
     */
    public static function makeFigure()
    {
        $circle = new Circle;
        $circle->setRadius(random_int(10, 30));

        return $circle;
    }

    /**
     * Реализация загрузки из файла используя паттерн "Фасад"
     *
     * @param string $filename Название файла
     * 
     * @return object
     */
    public static function load($filename)
    {
        $savedCir = json_decode(file_get_contents($filename), true);

        $circle = new Circle;
        $circle->setRadius($savedCir["radius"]);
        $circle->setArea($savedCir["area"]);
        
        return $circle;
    }
}
