<?php
$db = new mysqli("localhost", 'mysql', 'mysql', 'duty');
$p = "cntDutyWeekday";
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 1");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 2");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 3");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 4");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 5");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 6");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 7");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 8");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 9");

$p = "cntDutySaturday";
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 1");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 2");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 3");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 4");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 5");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 6");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 7");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 8");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 9");

$p = "cntDutySunday";
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 1");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 2");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 3");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 4");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 5");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 6");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 7");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 8");
$res = $db->query("UPDATE `duty` SET `$p` = '0' WHERE `duty`.`id` = 9");

$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 1;");
$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 2;");
$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 3;");
$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 4;");
$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 5;");
$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 6;");
$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 7;");
$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 8;");
$res = $db->query("UPDATE `duty` SET `previousDay` = '0' WHERE `duty`.`id` = 9;");

$res = $db->query("TRUNCATE TABLE `accountingDuty`");




Header("Location: index.php");
echo "<a href='index.php'>Главная</a>";