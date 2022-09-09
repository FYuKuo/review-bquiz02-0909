<?php
include('./base.php');
$que = $Que->find($_POST['que']);
$que['sum']++;
$Que->save($que);

$opt = $Opt->find($_POST['opt']);
$opt['sum']++;
$Opt->save($opt);

to("../index.php?do=result&id={$_POST['que']}");
?>