<?php
include('./base.php');
$user = $Admin->find(['acc'=>$_POST['acc']]);

if(empty($user)){
    $Admin->save($_POST);
    echo 1;
}else{
    echo 0;
}
?>