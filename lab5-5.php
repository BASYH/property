<?php
$connect = mysqli_connect("localhost", "root", "root", "property" );
mysqli_query($connect, "SET NAMES utf8");
$zapros1="DELETE FROM tenants WHERE id=".$_GET['id'];
mysqli_query($connect, $zapros1);
echo "<script>window.location.href='lr4.php'</script>";
exit;
?>