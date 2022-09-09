<?php
include('./base.php');

if(!empty($_POST['name'])){

    $Que->save(['name'=>$_POST['name'],'sum'=>0]);

    $que = $Que->find(['name'=>$_POST['name']]);

    foreach ($_POST['opt'] as $key => $opt) {
        if($opt != ''){
            $Opt->save(['name'=>$opt,'sum'=>0,'que'=>$que['id']]);
        }
    }

}

to('../back.php?do=que');
?>