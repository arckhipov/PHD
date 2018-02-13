<?php
require "functions.php";
require "db.php";

$month = array(
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
);
$monthCnt = array(
    'January' => cal_days_in_month(CAL_GREGORIAN, 1, 2018),
    'February' => cal_days_in_month(CAL_GREGORIAN, 2, 2018),
    'March' => cal_days_in_month(CAL_GREGORIAN, 3, 2018),
    'April' => cal_days_in_month(CAL_GREGORIAN, 4, 2018),
    'May' => cal_days_in_month(CAL_GREGORIAN, 5, 2018),
    'June' => cal_days_in_month(CAL_GREGORIAN, 6, 2018),
    'July' => cal_days_in_month(CAL_GREGORIAN, 7, 2018),
    'August' => cal_days_in_month(CAL_GREGORIAN, 8, 2018),
    'September' => cal_days_in_month(CAL_GREGORIAN, 9, 2018),
    'October' => cal_days_in_month(CAL_GREGORIAN, 10, 2018),
    'November' => cal_days_in_month(CAL_GREGORIAN, 11, 2018),
    'December' => cal_days_in_month(CAL_GREGORIAN, 12, 2018)
);
// получаем колличество дней в месяце
$_GET['month'];
$monGet = $_GET['month'];
// Получаем значение месяца

//foreach()
foreach ($monthCnt as $keyMonthCnt => $valueMonthCnt) {
    if ($_GET['00'] == $keyMonthCnt) { // сравнивает месяц
        $valMoCn = $valueMonthCnt; // получили дни в месяце
    }
}
//echo $valMoCn;
// получаем номер месяца
foreach ($month as $keyMonth => $valueMonth) {
    if ($_GET['month'] == $valueMonth) // сравнивает месяц
        $mes = $keyMonth; // получили номер месяца
}


$god = 2018;
$den = 1;

setlocale(LC_ALL, 'ru_RU.UTF-8');


$v = 0;
$v = array();
for ($cnt = 1; $cnt <= $valMoCn; $cnt++) {
    $date = $god . '-' . $mes . '-' . $den;
    $a = data("%A.%j.%d.%m.%Y.%u", strtotime($date));
    $den++;
    list($weekday, $numberYear, $weekdayNum, $mon, $Year, $numberDen) = explode(".", $a);
//    echo $weekday . '<br>'; // Полное название дня недели
//    echo $numberYear . '<br>'; // Порядковый номер в году
//    echo $weekdayNum . '<br>'; // День месяца
//    echo $mon . '<br>'; // Месяц
//    echo $Year . '<br>'; // Год
//    echo $numberDen . '<br>'; // День недели цифрой
    // получаем номера дней суббот
    if($weekday == 'суббота'){
        $Weekday[] = $weekdayNum;
    }
}
print_r($Weekday);