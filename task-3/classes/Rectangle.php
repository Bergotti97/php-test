<?php
/**
 * PHP version 7.3.6
 * 
 * @category Figures
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     github.com/Bergotti97/php-test/blob/master/task-3/classes/Rectangle.php 
 */

namespace classes;

/**
 * Class Rectangle
 *
 * @category Figure
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     github.com/Bergotti97/php-test/blob/master/task-3/classes/Rectangle.php 
 */
class Rectangle implements IFigure, \JsonSerializable
{
    /**
     * Свойства класса
     *  
     * @var int $_length Длина прямоугольника
     * @var int $_width Ширина прямоугольника
     * @var int $_area Площадь прямоугольника
     */ 
    private $_length;
    private $_width;
    private $_area;
    
    /**
     * Конструктор класса 
     * 
     * @param int $length Длина прямоугольника
     * @param int $width  Ширина прямоугольника 
     */
    public function __construct($length, $width)
    {
        $this->_length = $length;
        $this->_width = $width;
        $this->area();
    }

    /**
     * Функция для посчета площади пирамиды
     * 
     * @return int
     */
    public function area() 
    {
        $this->_area = $this->_length * $this->_width;  
    }

    /**
     * Функция для сериализации в JSON
     * 
     * @return array  
     */
    public function jsonSerialize()
    {
        return [
            'length' => $this->_length,
            'width' => $this->_width,
            'area' => $this->_area
        ];
    }
}
