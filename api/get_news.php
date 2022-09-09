<?php
include('./base.php');
$new = $News->find($_GET['id']);


echo "<p>{$new['text']}</p>";

?>