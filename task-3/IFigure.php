<?php
/**
 * PHP version 7.3.6
 * 
 * @category Figures
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/IFigure.php 
 */

/**
 * PHP version 7.3.6
 * 
 * @category Interface
 * @package  Task-3
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-3/IFigure.php 
 */ 
interface IFigure
{
    /**
     * Функция для подсчет площади
     * 
     * @return void
     */
    public function area();

    /**
     * Функция для изменения свойства(площади)
     * 
     * @param int $area Новое значение площади
     * 
     * @return void
     */
    public function setArea($area);
    
    /**
     * Функия для получения значения площади
     * 
     * @return int
     */
    public function getArea();
}
