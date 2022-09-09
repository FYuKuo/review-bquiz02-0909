<?php
include('./base.php');
$news = $News->all(['type'=>$_GET['type']]);

foreach ($news as $key => $new) {
    echo "<p class='cup' onclick='get_news({$new['id']},this)'>{$new['title']}</p>";
}
?>