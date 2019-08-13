<?php 
/**
 * PHP version 7.3.6
 * 
 * @category Figures
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     github.com/Bergotti97/php-test/blob/master/task-3/classes/Circle.php 
 */

namespace classes;

/**
 * Class Circle
 * 
 * @category Figure
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     github.com/Bergotti97/php-test/blob/master/task-3/classes/Circle.php
 */
class Circle implements IFigure, \JsonSerializable
{
    /**
     * Свойства класса
     * 
     * @var int $_radius Радиус круга
     * @var int $_area Площадь круга
     */
    private $_radius;
    private $_area;
    
    /**
     * Конструктор класса 
     * 
     * @param int $radius Радиус круга
     */
    public function __construct($radius)
    {
        $this->_radius = $radius;
        $this->area();
    }

    /**
     * Функция для посчета площади круга
     * 
     * @return int
     */
    public function area()
    {
        $this->_area = pi() * pow($this->_radius, 2);
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
            'area' => $this->_area
        ];
    }
}
