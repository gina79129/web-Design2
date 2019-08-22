<fieldset>
  <legend>會員登入</legend>
  <form method="post">
  <table>
    <tr>
      <td class="clo">帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td class="clo">密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td><input type="button" value="登入" onclick="login()"><input type="reset" value="清除"></td>
      <td><a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></td>
    </tr>
  </table>
  </form>
</fieldset>
<script>
function login(){
  let acc=$("#acc").val();
  let pw=$("#pw").val();
  $.post("api.php?do=login",{acc,pw},function(x){
    switch(x){
      case "1":
      alert("登入成功")
      lof("admin.php")
      break;
      case "2":
      alert("登入成功")
      lof("index.php")
      break;
      case "3":
      alert("密碼錯誤")
      $("#acc,#pw").val("")
      break;
      case "4":
      alert("查無帳號")
      $("#acc,#pw").val("")
      break;
    }
  })
}


</script>