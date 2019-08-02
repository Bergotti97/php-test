<?php
/**
 * PHP version 7.3.6
 * 
 * @category Figures
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/Rectangle.php 
 */

/**
 * Class Rectangle
 *
 * @category Figure
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/Rectangle.php 
 */
class Rectangle implements IFigure, JsonSerializable
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
     * Функция для посчета площади пирамиды
     * 
     * @return int
     */
    public function area() 
    {
        $this->_area = $this->_length * $this->_width;  

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
            'length' => $this->_length,
            'width' => $this->_width,
            'area' => $this->area()
        ];
    }

    /**
     * Функция для изменения свойства(длины)
     * 
     * @param int $length Новое значения длины прямугольника
     *  
     * @return void
     */
    public function setLength($length)
    {
        $this->_length = $length;
    }

    /**
     * Функция для изменения свойства(ширины)
     * 
     * @param int $width Новое значения ширины прямугольника
     *  
     * @return void
     */
    public function setWidth($width)
    {
        $this->_width = $width;
    }

    /**
     * Функция для изменения площади прямоугольника
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
     * Генерация прямоугольника со случайными параметрами методом "Обычной Фабрики"
     * 
     * @return object
     */     
    public static function makeFigure()
    {
        $rectangle = new Rectangle;
        $rectangle->setLength(random_int(10, 30));
        $rectangle->setWidth(random_int(10, 30));

        return $rectangle;
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
        if (file_exists($filename)) {
            $savedRec = json_decode(file_get_contents($filename), true);
        } else {
            $defaultRec = new Rectangle;
            $defaultRec->setLength(0);
            $defaultRec->setWidth(0);
            $json = json_encode($defaultRec);

            file_put_contents("Rectangle.txt", $json);
            $savedRec = json_decode(file_get_contents($filename), true);
        } 

        $rectangle = new Rectangle;
        $rectangle->setLength($savedRec["length"]);
        $rectangle->setWidth($savedRec["width"]);
        $rectangle->setArea($savedRec["area"]);
        
        return $rectangle;
    }
}
