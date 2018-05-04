
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head><table width="90%" border="1">
  <tr>
    <td height="52" colspan="3" align="center" style="font-weight:bold">All topic</td>
  </tr>
  <tr>
    <td width="51%" height="37" >Title</td>
    <td width="24%" align="center" >Date</td>
    <td width="25%" align="center" >User</td>
  </tr>
 
 <?
  $sql="select board_main.*,user_.u_name from board_main,user WHERE board_main.u_id=user.u_id order by board_main.b_id DESC";
  $Query=mysql_query($sql);
  while($data=mysql_fetch_array($Query)){
  ?>
  
  <tr>
    <td height="41"><a href="index.php?x=show&b_id=<?$data['b_id]?>"><?=$data['b_title']?></td>
    <td align="center"><?=$data['b_date']?></td>
    <td align="center"><?=$data['u_name']?></td>
  </tr>
  
  <?}?> 
</table>

