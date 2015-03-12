<?php


$score = 6;
$score = 6;
$condition = "(5 < {$score} ) && ({$score} < 8);";

$result =  str_replace("{$score}",$score, $condition);
$result = eval("return ".$result);
echo $result === false ?"false":"true";
