<?php
/**
 * PHP version 7.3.6
 * 
 * @category Figures
 * @package  Task-3
 * @author   Display Name <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/Pyramid.php 
 */

/**
 * Class Pyramid
 * 
 * @category Figure
 * @package  Task-3
 * @author   Display Name <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/Pyramid.php 
 */
class Pyramid implements IFigure, JsonSerializable
{
    private $_base;
    private $_edge;
    private $_area;

    /**
     * Функция для посчета площади пирамиды
     * При невозможности реализации функции результат будет равен 0 
     * 
     * @return int
     */
    public function area()
    {
        $this->_area = 2*$this->_base * 
        sqrt(pow($this->_edge, 2) - pow($this->_base, 2)/2) + pow($this->_base, 2);

        if (is_nan($this->_area)) {
            $this->_area = 0;
        }
        
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
            'edge' => $this->_edge,
            'base' => $this->_base,
            'area' => $this->area(),
        ];
    }

    /**
     * Функция для изменения свойства(ширины базы)
     * 
     * @param int $base Новая ширина базы пирамиды
     *  
     * @return null
     */
    public function setBase($base)
    {
        $this->_base = $base;
    }
    
    /**
     * Функция для изменения свойства(длины ребра)
     * 
     * @param int $edge Новая длина ребра пирамиды
     *  
     * @return null
     */
    public function setEdge($edge)
    {
        $this->_edge = $edge;
    }
    
    /**
     * Функция для изменения площади пирамиды
     * 
     * @param int $area Новое значения площади
     * 
     * @return null
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
     * Генерация пирамиды со случайными параметрами методом "Обычной Фабрики"
     * 
     * @return object
     */   
    public static function makeFigure()
    {
        $Pyramid = new Pyramid;
        $Pyramid->setBase(random_int(10, 30));
        $Pyramid->setEdge(random_int(10, 30));

        return $Pyramid;
    }

    /**
     * Реализация чтения из файла "Pyramid.txt" используя паттерн "Фасад"
     * 
     * @param array $savedPyr Массив, полученный из файла
     *
     * @return object
     */
    public static function loadFigure($savedPyr)
    {
        $pyramid = new Pyramid;
        $pyramid->setBase($savedPyr["base"]);
        $pyramid->setEdge($savedPyr["edge"]);
        $pyramid->setArea($savedPyr["area"]);

        return $pyramid;
    }
}
