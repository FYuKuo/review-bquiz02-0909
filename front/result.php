<?php
$que = $Que->find($_GET['id']);
$opts = $Opt->all(['que'=>$_GET['id']]);
$que['sum'] = ($que['sum'] == 0)?1:$que['sum'];
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$que['name']?></legend>

    <p>
        <b><?=$que['name']?></b>
    </p>

    <?php
    foreach ($opts as $key => $opt) {
        $width = round(($opt['sum']/$que['sum'])*100,0);
    ?>
    <div class="d-f a-c">
        <div class="w-40">
            <?=($key+1).'.'.$opt['name']?>
        </div>
        <div class="w-60 d-f a-c">
            <div style="background-color: #ddd;height: 20px; width:<?=$width?>%;"></div>
            <?=$opt['sum']?>票(<?=$width?>%)
        </div>
    </div>
    <?php
    }
    ?>
    <div class="ct">
        <input type="button" value="返回" onclick="location.href='?do=que'">
    </div>

</fieldset>