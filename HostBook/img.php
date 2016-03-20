<!DOCTYPE html>
<html>
<head>
	<title>Zdjecie HostBook</title>
	
	<style type="text/css">
	body
	{
	background-color: blue;	
	}
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
if((isset($_GET['img']))&&(isset($_GET['id'])))
{
	require('connect.php');
	$connect= new mysqli($host,$user,$pass,$base);
    
	$return=$connect->query("SELECT * FROM file WHERE  id_user='{$_GET['id']}' AND file_name='{$_GET['img']}'");

	
$anwers=$return->fetch_assoc();
$share=$anwers['publiczne'];
if($share==1)
{


echo '<div class="image" ><img src="Upload/'.$_GET['id']."/".$_GET['img'].'"  class="image_class"></div>';
}
else
echo "<h1>Przykro nam ale takiego zdjecia nie ma lub autor nie udostępnił go!</h1>";

}
?>
</body>
</html>
