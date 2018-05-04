<html>

<?php
	session_start();
	include "connect.php";
	$action = "";
	$x ="";
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<?php

	if($action=="Addboard"){
		$sql="insert into board_main set u_id='".$session["SS_u_id"]."',b_title='$b_title',b_detail='$b_detail',b_date='".date("y-m-d H:I:s")."'";
		mysqli_query($sql);
	}
		
	if($action=="save"){
		$sql="insert into board_main set b_id='$b_id',u_id='".$session["SS_u_id"]."',b_detail='$b_detail',b_date='".date("y-m-d H:I:s")."'";
		mysqli_query($sql);
	}

	if(isset($_GET["u_name"]) && isset($_GET["u_password"]) && isset($_GET["action"])){
			$action = $_GET["action"]; 
			$u_name = $_GET["u_name"];
			$u_password = $_GET["u_password"];
	}
		 
	if($action=="Login"){
		$sql="select * from user WHERE u_name='".$u_name."' and u_password = '".$u_password."'";
		$Query=mysqli_query($conn,$sql);
		if(mysqli_num_rows($Query) > 0){
			while($row = mysqli_fetch_assoc($Query)){
				$_session["SS_u_id"]=$row["u_id"];
				$_session["SS_u_name"]=$row["u_name"];
			 }
		}else{
			echo "<script type=\"text/javascript\">alert(\"ERROR\");</script>";
		}
	}
		
	if($action=="Register"){
		if($u_name==""){
			echo "<script type=\"text/javascript\">alert(\"โปรดระบุUsername\");</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"index.php?x=register\";</script>";
		}else{
			$confirm_password = $_GET["confirm_password"];
			$sql="select * from user WHERE u_name='".$u_name."'";
			$rows=mysqli_num_rows(mysqli_query($conn,$sql));
		}

		if($rows){
			echo "<script type=\"text/javascript\">alert(\"Sorry, Usernameนี้มีคนใช้แล้ว\");</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"index.php?x=register\";</script>";
		}else{
			if($u_password==$confirm_password){
				$sql="insert into user set u_name='".$u_name."',u_password='".$u_password."',u_date='".date("y-m-d")."',u_type='User'";
				mysqli_query($conn,$sql);
				echo "<script type=\"text/javascript\">alert(\"Welcome คุณได้เป็นสมาชิกแล้ว โปรดเข้าสู่ระบบ\");</script>";
				echo "<script type=\"text/javascript\">window.location.href=\"index.php?x=login\";</script>";
			}else{
				echo "<script type=\"text/javascript\">alert(\"Sorry, Username and Comfirm ไม่ตรงกัน กรุณาลองใหม่\");</script>";
				echo "<script type=\"text/javascript\">window.location.href=\"index.php?x=register\";</script>";
			}
		}
	}
		
	if($x=="logout"){
		$_session["SS_u_id"]="";
		$_session["SS_u_name"]="";
	}	
?>


<table width="90%" border="1" align="center" cellpadding="1">
	<tr>
		<td colspan="2" align="center" style="font-size:30px"; color:"#666666">WEBBOARD</td>
	</tr>
	<tr>
		<?php if(isset($_session["SS_u_id"])) {?>
		WELCOME <b><?php echo $_session["SS_u_name"] ?></b> <a href="index.php?x=logout">Logout</a>
		<td width="50%" align="center"></td>
		<td width="50%" align="center"><a href="index.php?x=addboard">New topic</a></td>
	<?php }else{?> 
  		<td width="50%" height="50" align="center"><a href="index.php?x=login">Login</a> | <a href="index.php?x=register">Register</a> 
  		<td width="50%" align="center"></td>
	</tr>
	
	<tr>
	
    	<td height="192" colspan="2"  valign="top">
			<?php
                if(isset($_GET["x"])) {
                    $x = $_GET["x"];
                    if($x=="") include "home.php"; 
                    if($x=="login") include "login.php"; 
                    if ($x=="register") include "register.php";
                    if ($x=="addboard") include "addboard.php";
                    if($x=="show") include "show.php";
				}
			}
            ?>
    	</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>
</html>