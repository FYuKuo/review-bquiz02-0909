<?php
$que = $Que->find($_GET['id']);
$opts = $Opt->all(['que'=>$_GET['id']]);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$que['name']?></legend>

    <p>
        <b><?=$que['name']?></b>
    </p>
    <form action="./api/vote.php" method="post">
    <?php
    foreach ($opts as $key => $opt) {
    ?>
    <p>
        <input type="radio" name="opt" value="<?=$opt['id']?>"><?=$opt['name']?>
    </p>
    <?php
    }
    ?>
    <div class="ct">
        <input type="hidden" name="que" value="<?=$_GET['id']?>">
        <input type="submit" value="我要投票">
    </div>
    </form>
</fieldset>