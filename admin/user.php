<fieldset>
  <legend>會員管理</legend>
  <form action="api.php?do=edituser" method="post">
  <table style="width:90%;margin:auto;" class="ct">
    <tr class="clo">
      <td width="30%">帳號</td>
      <td width="30%">密碼</td>
      <td width="10%">刪除</td>
    </tr>
    <?
    $user=all('users','');
    foreach($user as $u){
 
    ?>
    <tr>
      <td><?=$u['acc']?></td>
      <td><?=str_repeat("*",strlen($u['pw']))?></td>
      <td><input type="checkbox" name="del[]" value="<?=$u['id']?>">
      <input type="hidden" name="id[]" value="<?=$u['id']?>">
    </td>
    </tr>
    <?
        }
    ?>
    <tr>
      <td colspan="3"><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></td>
    </tr>
  </table>
  </form>

  <h1>新增會員</h1>
  <form method="post">
  <table>
    <tr>
      <td colspan="2"><span style="font-size:12px;color:red">*請設定您要註冊的帳號密碼(最長12個字元)</span></td>
    </tr>
    <tr>
      <td class="clo">Step1:登入帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td class="clo">Step2:登入密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td class="clo">Step3:再次確認密碼</td>
      <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
      <td class="clo">Step4:信箱(忘記密碼時使用)</td>
      <td><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
      <td><input type="button" value="新增" onclick="reg()"><input type="reset" value="清除"></td>
      <td></td>
    </tr>
  </table>
  </form>
</fieldset>
<script>
function reg(){
  let acc=$("#acc").val()
  let pw=$("#pw").val()
  let pw2=$("#pw2").val()
  let email=$("#email").val()
  if(acc=="" || pw=="" || pw2=="" || email==""){
    alert("不可空白")
  }else{
    $.post("api.php?do=reg",{acc,pw,email},function(x){
      if(x==1){
        location.reload();
      }else{
        alert("帳號重複")
      }
    })
  }
}

</script>