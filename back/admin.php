<fieldset>
    <legend>帳號管理</legend>
    <table class="w-90 aut ct">
        <tr class="clo">
            <th>帳號</th>
            <th>密碼</th>
            <th>刪除</th>
        </tr>
        <?php
        $rows = $Admin->all();
        foreach ($rows as $key => $row) {
            if($row['acc'] != 'admin'){
        ?>
        <tr>
            <td>
                <?=$row['acc']?>
            </td>
            <td>
                <?=str_repeat('*',strlen($row['acc']))?>
            </td>
            <td>
                <input type="checkbox" name="del[]" class="del" value="<?=$row['id']?>">
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
    <div class="ct">
        <input type="button" value="確定刪除" onclick="del()">
        <input type="button" value="清空選取" onclick="resetDel()">
    </div>

<h1>新增會員</h1>
    <table>
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

    function del(){
        let del = new Array();

        $('input[type=checkbox]:checked').each((key,val)=>{
            del.push($(val).val());
        });

        $.post('./api/del.php',{del},()=>{
            location.reload();

        })
    }

    function resetDel(){
        $('input[type=checkbox]:checked').prop('checked',false);
    }

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
                        location.reload();
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