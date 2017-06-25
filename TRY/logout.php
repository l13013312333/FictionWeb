<!DOCTYPE html>
<?php
session_start();
session_unset();
session_destroy();
//header("Refresh: 1; url=index.html");
//exit;
?>
<html>
<head>
	<meta http-equiv="expires" content="0"> 
	<meta http-equiv="cache-control" content="no-cache"> 
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="refresh" content="1; url=index.html">
</head> 
<body>
	<div style="text-align:center; font-size:30px; height:300px; line-height:300px;">
	Redirecting... <strong>登出中</strong>
	</div>
</body>
</html>