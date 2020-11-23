<!DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
		<title>ЛР4 Биненда А.</title> 
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="Osn"> 
		<h4>Биненда А.Д.</h4>
		<h1>лабораторная работа №4</h1>
		<H2>Редактирование данных жильца:</H2>

<?php

$connect = mysqli_connect("localhost", "root", "root", "property" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
$rows=mysqli_query($connect, "SELECT fio, date_r, adress_t FROM tenants WHERE id=".$_GET['id']);
while ($st = mysqli_fetch_array($rows)) {
$id=$_GET['id'];
$fio = $st['fio'];
$date_r = $st['date_r'];
$adress_t = $st['adress_t'];
}
print "<form action='lab5-4.php' method='get'>";
print "ФИО: <input name='fio' size='20' type='varchar'value='".$fio."'>";
print "<br>Дата рождения: <input name='date_r' size='20' type='date'value='".$date_r."'><br>";
$rows1 = mysqli_query($connect, "SELECT id, Address FROM tproperty ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows1)) {
            $adress[$i] = $st['Address'];
            $id_zh[$i] = $st['id'];
            $i++;
        }
?>
Адрес:
<select name='adress'>
        <?php
        for($i = 0; $adress[$i] != null; $i++): ?>
            <option value="<?=$adress[$i].$i?>"><?=$adress[$i]?></option>
        <?php endfor;
        for($i = 0; $adress[$i] != null; $i++){
$name = "num_res". $i;
$value = "" . $id_zh[$i];
print "<input type='hidden' name='".$name."' value='".$value."'>";
}
        ?>
        </select><br>
<?php
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"lr4.php\"> Вернуться к списку</a>";
?> 
		
</div>
	</body>
</html>