<?php
require "functions.php";
require "db.php";

$_GET['month'];
$_GET['weekday'];
$dat = $_GET['dat'];

// название месяца и дня недели числом
$week = $_GET['month'] . $_GET['weekday'];

$res = $db->query("SET NAMES 'UTF8'");
$res = $db->query("SELECT * FROM `weekdaySub` WHERE `weekday` = '$week'");
$row = mysqli_fetch_array($res);
$yesNet = $row['yesNet'];
$id = $row['id'];
$fab = addPHD();
// проверяем назначался ли на этот день ПХД
if ($yesNet == 0) {
    // обновляем данные в БД
//    updateBD($id);
    while ($fab) {
        $id1 = array_shift($fab);
        $rt = insert($id1);
        list($fio, $rank) = explode(".", $rt);
        insertBD($fio, $rank, $dat);
    }
    echo "ПХД успешно назначенно";
} else
    echo "На этот день уже было назначено ПХД";

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

function insert($id){
    global $db;
    $res = $db->query("SET NAMES 'UTF8'");
    $res = $db->query("SELECT fio, rank FROM cntPHD WHERE id = $id");
    $row = mysqli_fetch_array($res);
    $fio = $row['fio'];
    $rank = $row['rank'];
    return $fio.'.'.$rank;
}
//print_r($dataInstruct);

?>
<p>
    <a href="/">Главная</a>
</p>