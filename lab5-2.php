<!DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
		<title>ЛР4-5 Биненда А.</title> 
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="Osn"> 
		<h4>Биненда А.Д.</h4>
		<h1>лабораторная работа №4-5</h1>
		<H2>Добавление нового жильца:</H2>
<?php
// Подключение к базе данных:
$connect1 = mysqli_connect("localhost", "root", "root", "property" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect1, "SET NAMES utf8");
$get_fio = $_GET['adress'];
	$name = substr($_GET['adress'], 0, (strlen($_GET['adress'])-1));
	$num = substr($_GET['adress'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];
$str = (int)$hid;

$sql_add = "INSERT INTO tenants SET fio='".$_GET['fio']."', date_r='".$_GET['date_r']."', id_house='" .$str ."', adress_t='" .$name."'";

mysqli_query($connect1, $sql_add);
if (mysqli_affected_rows($connect1)>0) // если нет ошибок при выполнении запроса
{ print "<p>Спасибо, вы зарегистрировали жильца в базе данных.";
print "<p><a href=\"lr4.php\"> Вернуться к списку</a>"; }
else { print "Ошибка сохранения.".mysqli_error($connect1)." <a href=\"lr4.php\"> Вернуться к списку</a>"; }

?>
		
</div>
	</body>
</html>