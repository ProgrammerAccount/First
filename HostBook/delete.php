<?php
session_start();
session_regenerate_id( );
echo '<script>alert("Hello! I am an alert box!!")</script>';
$name=$_POST['plik'];
require("connect.php");
$connect= new mysqli($host,$user,$pass,$base);
if($connect->connect_error)
{
echo "Error".$connect->connect_errno();

}
else
{
$connect->query("DELETE FROM file WHERE file_name='$name'");
@unlink("Upload/".$_SESSION['id_user']."/".$name);
echo "Upload/".$_SESSION['id_user']."/".$name;
$connect->close();
header("Location: manager.php");

}




?>
<?php session_regenerate_id( );  ?>