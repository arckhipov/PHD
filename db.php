<?php
$db = new mysqli("localhost",'mysql','mysql','PHD');
if ($mysqli->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
    exit();
}