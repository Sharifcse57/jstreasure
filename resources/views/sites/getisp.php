<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>getsip</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo $hostname;
?>


</body>
</html>