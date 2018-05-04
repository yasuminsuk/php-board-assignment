<html>
<head>
<title>ConnectDB</title>
</head>
<body>
<?php
  		$serverName = "localhost";
  		$userName = "root";
   		$userPassword = "";
   		$dbName = "webboard";
   		$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   		mysqli_set_charset($conn, 'utf8');
		
		
		if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 
		// echo "Connected successfully";

?>
</body>
</html>