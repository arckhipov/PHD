<?php
require "functions.php";
require "db.php";

$option[] = $_GET['option1'];
$option[] = $_GET['option2'];
$option[] = $_GET['option3'];
$option[] = $_GET['option4'];
$option[] = $_GET['option5'];
$option[] = $_GET['option6'];
$option[] = $_GET['option7'];
$option[] = $_GET['option8'];
$option[] = $_GET['option9'];
$option[] = $_GET['option10'];

// удаляем из массива пустые эллементы
$new_arr = array_diff($option, array(''));

//echo count($new_arr);

// получаем дату
$de = $new_arr; // дублируем массив для получения время, чтобы очищенный массив остался не тронутым
$d = array_shift($de);

if (count($new_arr) == 1) {
    list($weekday, $month, $week, $year) = explode(".", $d);
} else {
    list($weekday, $month, $week, $year, $fio) = explode(".", $d);
}

// месяц день
$weekk = $weekday . $month;
// дата
$dat = $month . '.' . $week . '.' . $year;

// вырезаем в каждом ключе массива, до точки (получаем фамилии)
$el = array_pop($new_arr); // удаляем элемент без фамилии
//print_r($new_arr);
foreach ($new_arr as $value) {
    $no = substr($value, strrpos($value, '.') + 1);
    $noNeed[] = (int)$no;
}

// если массив с id фамилий пуст, то добавляем туда, любое число, которое больше 9
if(!$noNeed){
    $noNeed[] = 11;
}
//print_r($noNeed);

$res = $db->query("SET NAMES 'UTF8'");
$res = $db->query("SELECT * FROM `weekdaySub` WHERE `weekday` = '$weekk'");
$row = mysqli_fetch_array($res);
$yesNet = $row['yesNet'];
$id = $row['id'];
// проверяем назначался ли на этот день ПХД
if ($yesNet == 0) {
    PHD($noNeed);
    $fab = addPHD();
    // обновляем данные в БД
    updateBD($id);
    while ($fab) {
        $id1 = array_shift($fab);
        $rt = insert($id1);
        list($fio, $rank) = explode(".", $rt);
        insertBD($fio, $rank, $dat);

        $a[] = $fio;
    }
    echo "ПХД успешно назначен" . '<br>';
    echo 'На ПХД привлекается ';
    foreach ($a as $value) {
        echo $value . ' ';
    }
} else
    echo "На этe дату уже был назначен ПХД";

// функция для обновления данных в БД
function updateBD($id)
{
    global $db;
    $db->query("UPDATE `weekdaySub` SET `yesNet` = '1' WHERE `weekdaySub`.`id` = $id");
}

// функция для добавления данных в БД
function insertBD($fio, $rank, $dat)
{
    global $db;
    $db->query("INSERT INTO `attracting` (`id`, `fio`, `rank`, `dateAttracting`) VALUES (NULL, '$fio', '$rank', '$dat')");
}

function insert($id)
{
    global $db;
    $res = $db->query("SET NAMES 'UTF8'");
    $res = $db->query("SELECT fio, rank FROM cntPHD WHERE id = $id");
    $row = mysqli_fetch_array($res);
    $fio = $row['fio'];
    $rank = $row['rank'];
    return $fio . '.' . $rank;
}

//print_r($dataInstruct);

?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
<p>
    <a href="/">Главная</a>
</p>