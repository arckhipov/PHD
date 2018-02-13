<?php
require "db.php";
require "functions.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Распрделение привлечений на ПХД</title>
    <link rel="stylesheet" href="style.css" media="screen" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <meta name="description" content="Пример создания блоков с скрытым содержанием в стиле аккордеон с помощью jQuery"/>
    <meta name="keywords" content="аккордеон, jQuery аккордеон, блок аккордеон, css3, html5, создать аккордеон"/>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        html, body {
            height: 100%
        }

        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            color: #555;
            background: #ededed;
            margin: 0
        }

        h1 {
            padding: 25px 0;
            font-weight: 400;
            text-align: center
        }

        .top-nav {
            background: #555555;
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
            left: 0;
            opacity: 0.95;
            padding: 8px;
            right: 0;
            top: 0;
            z-index: 9999;
            margin: 0 auto
        }

        .topnav-wrapper {
            margin: 0 auto;
            max-width: 980px
        }

        .top-nav a {
            color: #b8b8b8;
            text-decoration: none;
            text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.5)
        }

        .top-nav a:hover {
            color: #ddd
        }

        .topnav-right {
            float: right
        }

        .demo-wrap {
            width: 100%;
            max-width: 960px;
            margin: 25px auto;
            padding: 0
        }
    </style>
</head>
<body>
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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script type="text/javascript" src="/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    !function (i) {
        var o, n;
        i(".title_block").on("click", function () {
            o = i(this).parents(".accordion_item"), n = o.find(".info"),
                o.hasClass("active_block") ? (o.removeClass("active_block"),
                    n.slideUp()) : (o.addClass("active_block"), n.stop(!0, !0).slideDown(),
                    o.siblings(".active_block").removeClass("active_block").children(
                        ".info").stop(!0, !0).slideUp())
        })
    }(jQuery);
</script>
</body>
</html>