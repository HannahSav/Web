<?php

function checkHit($x,$y,$r){

    if(($x>=0) and ($x<=$r/2) and ($y<=$r-2*$x) and ($y>=0)) return "ДА";

    if (($x<=0) and ($x>=-$r) and ($y<=$r/2) and ($y>=0)) return "ДА";

    if (($x<=0) and ($x>=-$r) and ($y<=0) and ($x*$x+$y*$y<=$r*$r)) return "ДА";

    return "НЕТ";
}

session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(400);
    exit;
}

$startTime = microtime(true);


$y_txt = (string) $_POST['y'];
$x = (double) $_POST['x'];
$y = (double) $_POST['y'];
$r = (double) $_POST['r'];

if($y == 0 && $y_txt[0] == "-") $y = 0;

$result = checkHit($x,$y,$r);
date_default_timezone_set('Europe/Moscow');
$currentTime = date("H:i:s");
$executionTime = number_format((microtime(true)-$startTime)*1000000,3,".","");

$response =
    "<tr>
<td>$x</td>
<td>$y</td>
<td>$r</td>
<td>$result</td>
<td>$currentTime</td>
<td>$executionTime мкс</td>
</tr>";
echo $response;
