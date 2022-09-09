<fieldset class="w-50 aut">
    <legend>忘記密碼</legend>
    <table class="w-100">
        <tr>
            <td>
                請輸入信箱以查詢密碼
            </td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="message">

            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="尋找" onclick="find_pw()">
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function find_pw(){
        let email = $('#email').val();
        $.get('./api/find_pw.php',{email},(res)=>{
            $('.message').text(res);
        })
    }
</script>