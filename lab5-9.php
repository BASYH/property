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
		<H2>Редактирование данных должника:</H2>

<?php
$connect = mysqli_connect("localhost", "root", "root", "property" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
$rows=mysqli_query($connect, "SELECT fio_man, debt FROM debtor WHERE id=".$_GET['id']);
while ($st = mysqli_fetch_array($rows)) {
$id=$_GET['id'];
$fio_man = $st['fio_man'];
$debt = $st['debt'];
}
print "<form action='lab5-10.php' method='get'>";
$rows1 = mysqli_query($connect, "SELECT id, fio FROM tenants ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows1)) {
            $fio[$i] = $st['fio'];
            $id_zh[$i] = $st['id'];
            $i++;
        }
?>
ФИО:
<select name='fio'>
        <?php
        for($i = 0; $fio[$i] != null; $i++): ?>
            <option value="<?=$fio[$i].$i?>"><?=$fio[$i]?></option>
        <?php endfor;
        for($i = 0; $fio[$i] != null; $i++){
$name = "num_res". $i;
$value = "" . $id_zh[$i];
print "<input type='hidden' name='".$name."' value='".$value."'>";
}
        ?>
        </select><br>
<?php
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<br>Долг: <input name='debt' size='20' type='varchar'value='".$debt."'><br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"lr4.php\"> Вернуться к списку</a>";
?> 
		
</div>
	</body>
</html>