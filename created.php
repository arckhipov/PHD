<?php require "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Назначениие ПХД</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="jquery-ui.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Belleza" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
    <h1 class="qaz">Раскрыть</h1>
    <div class="splin">
    <div class="row">
        <?php
        $res = $db->query("SET NAMES 'UTF8'");
        $res = $db->query("SELECT * FROM cntPHD");
        while ($row = mysqli_fetch_array($res)) {
            $cnt = $row['cnt'];
            echo "<div class='col-sm-4 block'>
        <div class='panel'>";

            echo "<h5>{$row['fio']}</h5>";
            echo "<h6>Общее колличество нарядов</h6>";
            echo "<input type='text' size='1' value='$cnt'></p>";

            echo "</div></div>";
        }
        ?>
    </div>
    </div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script type="text/javascript" src="/jquery-3.3.1.min.js"></script>
<script src="jquery-ui.js"></script>
<script src="script.js"></script>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.qaz').click(function(){
            if($(".splin").css('display') == 'none')
             $(".splin").show();
            else
                $(".splin").hide();
        });
    });
</script>

</body>
</html>