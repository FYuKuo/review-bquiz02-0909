<?php
include('./base.php');
$user = $Admin->find(['email'=>$_GET['email']]);
if(empty($user)){
    echo "查無此資料";
}else{
    echo "您的密碼為：". $user['pw'];
}
?>