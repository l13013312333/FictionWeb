
<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'dbuser';
$dbpwd = 'linda93060';
$dbname = 'i4010db';
$dsn = "mysql:host=$dbhost;dbname=$dbname";
try {
    $db_conn = new PDO($dsn, $dbuser, $dbpwd);
}
catch (PDOException $e) {
    echo $e->getMessage();
    die ("錯誤: 無法連接到資料庫");
}
?>
<html>
<title>查詢簽到簽退</title>
<head>
	<style>
	div{ text-align:center; font-weight:bold; font-family:標楷體; }
	
	<!-- // 標題框 -->
	.Outerbox { width:100%; margin:0px auto; overflow:auto; height:auto; background:#FFFFEE; z-index:10; }
	
	<!-- // 手機顯示 -->
	@media only screen and (min-width:480px) { .Outerbox { width:480px; } }
	@media only screen and (min-width:800px) { .Outerbox { width:800px; } }
	@media only screen and (min-width:1000px) { .Outerbox { width:1000px; } }
	
	table.imagetable { <!-- // table + 圖片背景 -->
		font-family: verdana,arial,sans-serif;
		font-size:25px;
		color:#333333;
		border-width: 1px;
		border-color: #999999;
		border-collapse: collapse;
	}
	table.imagetable th {
		background:#b5cfd2 url('cell-grey.jpg');
		border-width: 1px;
		padding: 4px;
		border-style: solid;
		border-color: #999999;
	}
	table.imagetable td {
		background:#dcddc0 url('cell-blue.jpg');
		border-width: 1px;
		padding: 4px;
		border-style: solid;
		border-color: #999999;
	}
	
	<!-- // FB link -->
	ul { text-align:left; }
	</style>
</head>
<?php
$id_number = $_SESSION['id_number'];
$sql= "SELECT * FROM checklist WHERE id_number=\"$id_number\"";
$result = $db_conn->query($sql);
$data=$result->fetchall();
if(count($data) == 0){
	echo '此員工沒有簽到簽退紀錄';
	//header("refresh:1; url=administrator.php");
}
else{

?>
<div style="text-align:center;color: white;">
<form align = 'center' method='post' action=''>
    <table class="imagetable" align="center">
            <caption style="color:red; text-align:left; font-size:18px;"><?php echo $id_number . '本月和上個月的簽到簽退紀錄'; ?></caption>
            <tr><td>日期</td><td>簽到狀態</td><td>簽到時間</td><td>簽退狀態</td><td>簽退時間</td></tr>
<?php
    foreach($data AS $item){
            $getDate= date("Y-m-d");
            $o1 = substr($getDate,5,2);
            $date=$item['date'];
            $o2 = substr($date,5,2);
            if($o2 == $o1 || $o2 == $o1 - 1){
                $morning=$item['morning'];
                $check_in=$item['check_in'];
                $afternoon=$item['afternoon'];
                $check_out=$item['check_out'];
?>
<tr>
<th><?php echo $date;?></th>
<th><?php 
if($morning == 1)
    echo '已簽到';
else if($morning == 2)
    echo '遲到';
?></th>
<th><?php echo $check_in;?></th>
<th><?php
if($afternoon == 0)
    echo '未簽退';
else if($afternoon == 1)
    echo '已簽退';
?></th>
<th><?php echo $check_out;?></th>
</tr>

<?php }}?>

    </table>
</form>
<?php
	/*echo '刪除員工編碼成功';
	header("refresh:1; url=administrator.php");*/
}
?>
<body>
<div style="text-align:center;color: white;">

</div>
</body>
</html>