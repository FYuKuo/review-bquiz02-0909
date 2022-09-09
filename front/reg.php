<fieldset class="w-60 aut">
<legend>會員註冊</legend>
    <table class="w-100">
        <tr>
            <td colspan="2" style="color: red;">
                *請設定您要註冊的帳號及密碼(最長12個字元)
            </td>
        </tr>
        <tr>
            <td class="clo w-50">Step:1帳號</td>
            <td><input type="text" name="acc" id="acc" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">Step:2密碼</td>
            <td><input type="password" name="pw" id="pw" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">Step:3再次確認密碼</td>
            <td><input type="password" name="pwCh" id="pwCh" style="width: 90%;"></td>
        </tr>
        <tr>
            <td class="clo w-50">Step:4信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email" style="width: 90%;"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="button" value="註冊" onclick="reg()">
                <input type="button" value="清除" onclick="reset()">
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reg(){
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        let pwCh = $('#pwCh').val();
        let email = $('#email').val(); 
        
        if(acc == '' || pw == '' || pwCh == '' || email == ''){
            alert('不可空白');

        }else{

            if(pw == pwCh){

                $.post('./api/reg.php',{acc,pw,email},(res)=>{
                    if(parseInt(res) == 1){
                        alert('註冊完成，歡迎加入');
                        location.href='?do=login';
                    }else{
                        alert('帳號重複');
                    }
                })
            }else{
                alert('密碼錯誤');
            }

        }

    }

</script>