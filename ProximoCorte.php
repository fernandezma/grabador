<?php
$segundos = 60-date('s');
$minutos = 60-date('i');
$fixsegundo = str_pad((int) $segundos,2,"0",STR_PAD_LEFT);
$fixminutos = str_pad((int) $minutos,2,"0",STR_PAD_LEFT);
echo "$fixminutos:$fixsegundo" ;
?>

