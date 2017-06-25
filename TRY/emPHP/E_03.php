<!DOCTYPE html>
<html>
<body>
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
$db_conn->query("SET NAMES UTF8");
$id_number = $_SESSION['id_number'];
$sql = "SELECT * FROM staff WHERE id_number='$id_number'";
$result = $db_conn->query($sql);
$user = $result->fetchall();
if(count($user)==0){
	
}
else{
	foreach($user AS $item){
		$name=$item['name'];
	}
}
echo "我是編號 ".$item['id_number']." 員工</br></br>";
echo "姓名 ".$item['name'];
if(isset($_POST['name'])) //$item['name'] = $_POST['name'];
{
	$namesql = "UPDATE staff SET name ='". $_POST['name']."' WHERE id_number='$id_number'";
	$result = $db_conn->query($namesql);
	$user = $result->fetchall();
}
if(isset($_POST['email'])) //$item['email'] = $_POST['email'];
{
	
}
?>
<form method="POST" action="" >
請輸入正確姓名 : 
<input type="text" name="name" value=""  >
<input type="submit" value="修改">
</form>
<?php
echo "性別 : ";
if($item['sex'] == "M") echo "男性</br></br>";
else if($item['sex'] == "F")echo "女性</br></br>";
else echo "中性</br></br>";
echo "生日 : ".$item['birth']."</br></br>";
echo "電子信箱 : ".$item['email'];
?>
<form method="POST" action="" >
請輸入正確信箱 :
<input type="text" name="email" value=""  >
<input type="submit" value="修改">
</form>
請注意!如員工資料有變更請盡速修改,蒼龍公司感謝您的配合!

</body>
</html>