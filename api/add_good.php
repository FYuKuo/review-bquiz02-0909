<?php
include('./base.php');
if($_POST['type'] == 1){
    echo $_SESSION['user'];
    $Log->save(['user'=>$_SESSION['user'],'news'=>$_POST['id']]);
}else{
    $Log->del(['user'=>$_SESSION['user'],'news'=>$_POST['id']]);
}
unset($_POST['type']);
$News->save($_POST);
?>