
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head><table width="90%" border="1">

<?
  $sql="select board_main.*,user_.u_name from board_main,user WHERE (board_main.u_id=user.u_id) and board_main.b_id='$b_id' order by board_main.b_id DESC";
  $Query=mysql_query($sql);
  $data=mysql_fetch_array($Query);
  ?>
  
  <tr style="font-weight:bold;">
    <td width="51%" height="37" >
    
	<table width="100%">
	<tr>
	<td width="92%"><?=$data['b_title']?></td>
    <td width="8%" align="right">Delete</td>
     <?if($_session["SS_u_type"]=="Admin"){?>
    <a href="index.php?action=Delete_Bm&b_id=<?=$b_id?>">Delete</a></td>
    <?}?>
  </tr>
  </table>
 
  
  <tr>
    <td height="41"><?=$data['b_detail']?></td>
  </tr> 
  
  
   <tr>
    <td height="41" align="right"> By <?=$data['u_name']?> when <?=$data['b_date']?> </td>
  </tr>
  </table>
  

<!--<?
  $sql="select board_sub.*,user_.u_name from board_sub,user WHERE (board_sub.u_id=user.u_id) and board_sub.b_id='$b_id' order by board_sub.s_id ASC";
  $Query=mysql_query($sql);
  while($data=mysql_fetch_array($Query)){
	  $num++;
  ?>-->
   <br>
  <table width="90%" border="1">

  <tr>
    <td width="51%" height="37" >
    <table width="100%">
	<tr>
	<td width="92%">ความคิดเห็นที่ <?=$num?></td>
    <td width="8%" align="right">
    <?if($_session["SS_u_type"]=="Admin"){?>
    <a href="index.php?action=Delete_Bs&s_id=<?=$data['s_id']?>&x=show&b_id=<?=$b_id?>">Delete</a></td>
    <?}?>
    </td>
  </tr>
  </table>
  
    </td>
  </tr>
 
 
  <tr>
    <td height="41"><?=$data['s_detail']?></td>
  </tr> 
  </td>
  
   <tr>
    <td height="41" align="right"> By <?=$data['u_name']?> when <?=$data['s_date']?> </td>
  </tr>
  </table>
  
  <?}?>
  
  <br>
  <form action="index.php?x=show&b_id=<?=$b_id?>&action=save"method="post" enctype="multipart/form-data">
  <table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr>
  <td>ตอบกระทู้</td>
  </tr>
  <tr>
  <td align="right"><textarea name="s_detail" cols="162" rows="10"><?if(!$_session["SS_u_id"])echo"Please Login...";?></textarea></td>
  </tr>
  <tr>
  <td align="right"><input type="submit" name="Submit" value="ตอบกระทู้" <?if(!$_session["SS_u_id"])echo"disabled";?>></td>
 </tr>
  
</table>
</form>

