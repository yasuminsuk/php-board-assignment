
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title >Board</title>



<form action="index.php?action=Addboard" method="get" enctype="multipart/form-data">
  <table width="90%" align="center">
    <tr>
    <td height="31" colspan="2" align="center" style="font-weight:bold">New topic</td>
  </tr>
  <tr>
  
    <td width="28%" height="27" align="right" valign="top">Title :</td>
    <td width="72%"><input name="b_title" type="text"  id="b_title" size="79" value=<?if(!$_session["SS_u_id"])echo"Please Login...";?>/></td>
  </tr>
  <tr>
    <td height="72" align="right" valign="top">Details:</td>
    <td><textarea name="b_detail" cols="80" rows="10" id="b_detail"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Confirm" <?if(!$_session["SS_u_id"])echo"disabled";?>/></td>
  </tr>
</table>
</form>