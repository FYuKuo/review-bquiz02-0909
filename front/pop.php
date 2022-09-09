<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table class="w-100">
        <tr>
            <th class="w-33">標題</th>
            <th class="w-33">內容</th>
            <th class="w-33">人氣</th>
        </tr>

        <?php
            $num = $News->math('COUNT','id',['sh'=>1]);
            $limit = 3;
            $pages = ceil($num/$limit);
            $page = ($_GET['page'])??1;
            if($page <= 0 || $page > $pages){
                $page = 1;
            }
            $start = ($page-1)*$limit;
            $limitSql = " LIMIT $start,$limit";
            $rows = $News->all(['sh'=>1]," ORDER BY `good` DESC".$limitSql);
            $i=0;
            foreach ($rows as $key => $row) {
                $i++;
        ?>
        <tr>
            <td class="clo myHover">
                <?=$row['title']?>
                <div id="alerr">
                    <h3><?=$row['title']?></h3>
                    <pre id="ssaa"><?=$row['text']?></pre>
                </div>
            </td>
            <td class="myHover">
                <span>
                    <?=mb_substr($row['text'],0,10)?>...
                </span>
                <div id="alerr">
                    <h3><?=$row['title']?></h3>
                    <pre id="ssaa"><?=$row['text']?></pre>
                </div>
            </td>
            <td class="ct">
                <?php
                if(isset($_SESSION['user'])){
                    if(empty($Log->find(['user'=>$_SESSION['user'],'news'=>$row['id']]))){
                ?>
                <?=$row['good']?>個人說<span class="good"></span><span class="goodBtn"
                    onclick="add_good(<?=$row['id']?>,1,<?=$row['good']+1?>)">讚</span>
                <?php
                    }else{
                ?>
                <?=$row['good']?>個人說<span class="good"></span><span class="goodBtn"
                    onclick="add_good(<?=$row['id']?>,0,<?=$row['good']-1?>)">收回讚</span>
                <?php
                    }
                }else{
                ?>
                <?=$row['good']?>個人說<span class="good"></span>
                <?php  
                }
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    <div class="page">
        <?php
        if($page > 1){
        ?>
        <a href="?do=pop&page=<?=$page-1?>">&lt;</a>
        <?php
        }
        for ($i=1; $i <= $pages ; $i++) { 
        ?>
        <a href="?do=pop&page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
        <?php
        }
        if($page < $pages){
        ?>
        <a href="?do=pop&page=<?=$page+1?>">&gt;</a>
        <?php
        }
        ?>
    </div>
</fieldset>

<script>
$('.myHover').hover(function() {
    $(this).children('#alerr').toggle();
})

function add_good(id, type, good) {

    $.post('./api/add_good.php', {
        id,
        type,
        good
    }, () => {
        location.reload();
    })
}
</script>