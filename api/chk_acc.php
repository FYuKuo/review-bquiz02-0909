<?php
include('./base.php');
$user = $Admin->math('COUNT','id',['acc'=>$_GET['acc']]);

if($user > 0){
    echo 1;
}else{
    echo 0;
}
?>