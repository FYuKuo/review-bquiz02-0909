<?php
include('./base.php');
$user = $Admin->math('COUNT','id',['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);

if($user > 0){
    $_SESSION['user']  = $_GET['acc'];
    echo 1;
}else{
    echo 0;
}
?>