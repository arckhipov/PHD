<?php
require "db.php";
require "functions.php";
?>

<?php
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


foreach ($monthCnt as $keyMonthCnt => $valueMonthCnt) {
    if ($_GET['month'] == $keyMonthCnt) { // сравнивает месяц
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
echo "<h1>Субботы месяца $monGet </h1>";
echo '<div class="accordion">';
for ($cnt = 1; $cnt <= $valMoCn; $cnt++) {
    $date = $god . '-' . $mes . '-' . $den;
    $a = data("%A.%j.%d.%m.%Y.%u", strtotime($date));
    $den++;
    list($weekday, $numberYear, $weekdayNum, $mon, $Year, $numberDen) = explode(".", $a);
    // получаем номера дней суббот
    if ($weekday == 'суббота') {
        $dat = $weekdayNum . "." . $mon . "." . $Year;
        $Weekday = $weekdayNum;
//        echo $m = '<a href="phd.php?month='.$monGet.'&weekday='.$Weekday.'&dat='.$dat.'">'.$Weekday.'</a>'.'<br>';

        echo '<section class="accordion_item">
                <h1 class="title_block">' . $Weekday . '</h1>
                <div class="info">
                    <form method="get" action="input5.php">
   <div>
       <h6 class="mar">Выберите инстукторов которые не должны привлекаться на это ПХД</h6>
       <p><input type="checkbox" name="option1" value="'.$monGet.'.'.$dat.'.1">Шишкин Алексей Викторович<Br>
       <input type="checkbox" name="option2" value="'.$monGet.'.'.$dat.'.2">Козлов Николай Николаевич<Br>
       <input type="checkbox" name="option3" value="'.$monGet.'.'.$dat.'.3">Аникин Михаил Михайлович<Br> 
       <input type="checkbox" name="option4" value="'.$monGet.'.'.$dat.'.4">Гладышев Руслан Анатольевич<Br> 
       <input type="checkbox" name="option5" value="'.$monGet.'.'.$dat.'.5">Золотов Денис Юрьевич<Br> 
       <input type="checkbox" name="option6" value="'.$monGet.'.'.$dat.'.6">Исенко Игорь Владимирович<Br> 
       <input type="checkbox" name="option7" value="'.$monGet.'.'.$dat.'.7">Шамаков Андрей Леонидович<Br> 
       <input type="checkbox" name="option8" value="'.$monGet.'.'.$dat.'.8">Архипов Виталий Викторович<Br> 
       <input type="checkbox" name="option9" value="'.$monGet.'.'.$dat.'.9">Щеголихин Валерий Олегович<Br> 
       <input style="display: none;" type="checkbox" name="option10" value="'.$monGet.'.'.$dat.'" checked="checked"></p>
       <p><button class="btn btn-warning">Назначить<button></p>
   </div>
  </form>
                </div>
            </section>';
    }
}
echo '</div>';

//print_r($Weekday);
//echo $n = array_shift($Weekday);

?>
<p>
    <a href="/">Главная</a>
</p>