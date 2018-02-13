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
function PHD($neo = '')
{
    global $dataInstruct;
    $previous = $dataInstruct;
    $noNeed = array(1, 2, 3);
    for ($i = 0; $i < count($dataInstruct); $i++) {
        list($id, $fio, $rank, $cnt) = explode(".", $dataInstruct[$i]);
        if ($id != $neo) {
            if (!in_array($id, $noNeed)) {
                $Id[] = $id;
                $Fio[] = $fio;
                $Rank[] = $rank;
                $Cnt[] = $cnt;
            }
        }
    }
    $min = min($Cnt);

    for ($i = 0; $i < count($previous); $i++) {
        list($id, $fio, $rank, $cnt) = explode(".", $previous[$i]);
        // Если нет инструкторов которых не нжуно в эту субботу назначать, и min равно, то - действие
        if ($cnt == $min) {
            $ID[] = $id;
            $FIO[] = $fio;
            $RANK[] = $rank;
            $CNT[] = $cnt;
        }
    }
    return $ID;
}

print_r(PHD());
function result()
{
    // колличество инструкторов (id)
    $count = count(PHD());
    // массив с id инструкторов
    $PHD = PHD();
    // добавляем первого инструктора
    $b[] = array_shift($PHD);
    // Если более двух инстукторов, то выполняем действие
    if ($count >= 2) {
        $b[] = array_shift($PHD);
    }elseif ($count < 2) {
        // получаем массив с id одного инструктора
        $p = PHD();
        // получаем массив с id инстукторов без предыдущего инструктора
        $c = PHD($p[0]);
        // получаем ещё одного инструктора
        $d = min($c);
        $b[] = $d;
    } else {
        $b = 'что то пошло не так';
    }
    // возвращает массив с заступающими инстукторами
    return $b;
}

//result();
?>