<?php
/**
 * PHP version 7.3.6
 * 
 * @category Database
 * @package  Task-2
 * @author   Margaryan Grigor <gishmg97@gmail.com>
 * @license  https://www.php.net/license/index.php PHP Public License
 * @link     https://github.com/Bergotti97/php-test/blob/master/task-1/Fibonacci.php 
 */

/**
 * Конфигурация соединения с базой данных
 * 
 * @var string $localhost Имя хоста
 * @var string $user Имя пользователя
 * @var string $password Пороль
 * @var string $database Наименование базы данных
 */
$localhost = 'localhost';
$user = 'root';
$password = '';
$database = 'books_authors';

// Подключение к базе данных
$mysqli = new mysqli($localhost, $user, $password, $database);

//Кодировка бд
$mysqli->set_charset("utf8");

// При ошибке подлкючения к бд
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " 
    . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";
echo "Авторы, написавшие меньше 6 книг\n";

// Запрос 
$request = "SELECT authors.id,authors.name FROM authors 
JOIN book_author ON authors.id=book_author.author_id 
JOIN books ON books.id=book_author.book_id 
GROUP BY authors.id HAVING(COUNT(authors.id)<6)";

$result = $mysqli->query($request, MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id(". $row['id'].") Автор - ". $row['name']."\n";
    }
}

// Закрытие соединения
mysqli_close($mysqli);
