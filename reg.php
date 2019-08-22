<fieldset>
  <legend>會員註冊</legend>
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
      <td><input type="button" value="註冊" onclick="reg()"><input type="reset" value="清除"></td>
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
        alert("註冊成功，歡迎加入")
        lof('?do=login')
      }else{
        alert("帳號重複")
      }
    })
  }
}

</script>