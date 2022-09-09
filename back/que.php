<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
    <div class="d-f">
        <div class="w-30 clo">問卷名稱</div>
        <input type="text" name="name" id="name" style="width: 30%;">
    </div>
    <br>
    <div class="clo moreDiv">
        <div>
            選項<input type="text" name="opt[]" class="opt" style="width: 30%;">
            <input type="button" value="更多" onclick="more()">
        </div>
    </div>
    <div>
        <input type="submit" value="新增"> | 
        <input type="reset" value="清空">
    </div>
    </form>
</fieldset>

<script>
function more() {
    $('.moreDiv').prepend(`<div>選項<input type="text" name="opt[]" class="opt" style="width: 30%;"></div>`);
}
</script>