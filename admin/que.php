<fieldset>
  <legend>新增問卷</legend>
  <form action="api.php?do=newque" method="post">
  <table width="60%">
    <tr>
      <td width="30%" class="clo">問卷名稱</td>
      <td width="30%"><input type="text" name="que"></td>
    </tr>
    <tr class="more">
      <td colspan="2" class="clo">選項<input type="text" name="opt[]"><input type="button" value="更多" onclick="moreque()"></td>
    </tr>
    <tr>
      <td><input type="submit" value="新增">|<input type="reset" value="清空"></td>
      <td></td>
    </tr>
  </table>
  </form>
</fieldset>

<script>
function moreque(){
  let newtr=`<tr>
      <td colspan="2" class="clo">選項<input type="text" name="opt[]"></td>
    </tr>`
    $(".more").before(newtr)
}


</script>