<?php
require "db.php";

header("Content-Type: text/html; charset=utf-8");

setlocale(LC_ALL, "russian");

function data($p, $p2)
{
    return iconv("cp1251", "UTF-8", strftime($p, $p2));
}

// Получаем массив с данными инстукторов
class Fio
{
    public function instruct()
    {
        global $db;
        $row = array();
        $res = $db->query("SET NAMES 'UTF8'");
        $res = $db->query("SELECT * FROM cntPHD");
        $inctruct = array();
        while ($row = mysqli_fetch_array($res)) {
            $inctruct[] = $row['id'] . '.' . $row['fio'] . '.' . $row['rank'] . '.' . $row['cnt'];
        }
        return $inctruct;
    }
}

$dataInstruct = Fio::instruct();

// Получаем минимальное количество привлечений на ПХД
function PHD($noNeed = array())
{
    global $dataInstruct;
    $previous = $dataInstruct;
    for ($i = 0; $i < count($dataInstruct); $i++) {
        list($id, $fio, $rank, $cnt) = explode(".", $dataInstruct[$i]);
        if ( !in_array($id, $noNeed) ) {
            $Id[] = $id;
            $Fio[] = $fio;
            $Rank[] = $rank;
            $Cnt[] = $cnt;
        }
    }
    $min = min($Cnt);

    for ($i = 0; $i < count($previous); $i++) {
        list($id, $fio, $rank, $cnt) = explode(".", $previous[$i]);
        // Если нет инструкторов которых не нжуно в эту субботу назначать, и min равно, то - действие
        if ($cnt == $min && !in_array($id, $noNeed)) {
            $ID[] = $id;
            $FIO[] = $fio;
            $RANK[] = $rank;
            $CNT[] = $cnt;
            return $ID;
            break;
        }
    }
}

// Привлекаем 2 инстуктора на ПХД
function addPHD()
{
    for ($i = 1; $i <= 2; $i++) {
        global $db;
        global $noNeed;
        global $dataInstruct;
        $dataInstruct = Fio::instruct();
        $id = PHD($noNeed);
        $id = $id[0];
        // массив с привлекающими НА ПХД
        $attracting[] = $id;
        $db->query("UPDATE `cntPHD` SET `cnt` = `cnt` + 1 WHERE `cntPHD`.`id` = '$id'");
    }
    return $attracting;
//    print_r($attracting);
}

//addPHD();
?>
