<?php
/**
 * PHP version 7.3.6
 * 
 * @category Figures
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     github.com/Bergotti97/php-test/blob/master/task-3/classes/Triangle.php 
 */

namespace classes;

/**
 * Class Rectangle
 *
 * @category Figure
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     github.com/Bergotti97/php-test/blob/master/task-3/classes/Triangle.php 
 */
class Triangle implements IFigure, \JsonSerializable
{
    /**
     * Свойства класса
     *  
     * @var int $_side1 Первая сторона триугольника
     * @var int $_side2 Вторая сторона триугольника
     * @var int $_side3 Третья сторона триугольника
     * @var int $_area Площадь триугольника
     */ 
    private $_side1;
    private $_side2;
    private $_side3;
    private $_area;
    
    /**
     * Конструктор класса 
     * 
     * @param int $side1 Первая сторона триугольника
     * @param int $side2 Вторая сторона триугольника
     * @param int $side3 Третья сторона триугольника 
     */
    public function __construct($side1, $side2, $side3)
    {
        $this->_side1 = $side1;
        $this->_side2 = $side2;
        $this->_side3 = $side3;
        $this->area();
    }

    /**
     * Функция для посчета площади пирамиды
     * Если сумма двух сторон меньше третей то вывести 0
     * Площадь находилось по формуле Герона
     * S = sqrt(p * (p − a) * (p − b) * (p − c)) 
     * где p = (1 / 2) * (a + b + c)
     *
     * @return int
     */
    public function area() 
    {   

        $sum = 0.5 * ($this->_side1 + $this->_side2 + $this->_side3);
        $sumMinSide1 = ($sum - $this->_side1);
        $sumMinSide2 = ($sum - $this->_side2);
        $sumMinSide3 = ($sum - $this->_side3);
        $this->_area =  sqrt($sum * $sumMinSide1 * $sumMinSide2 * $sumMinSide3);
        
        if (is_nan($this->_area)) {
            $this->_area = 0;
        }
    }

    /**
     * Функция для сериализации в JSON
     * 
     * @return array  
     */
    public function jsonSerialize()
    {
        return [
            'side1' => $this->_side1,
            'side2' => $this->_side2,
            'side3' => $this->_side3,
            'area' => $this->_area
        ];
    }
}
