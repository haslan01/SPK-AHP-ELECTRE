<?php
include 'koneksi.php';



$username=$_POST['Username'];
$password=$_POST['Password'];
$query = "SELECT * FROM user WHERE id='$username' AND password='$password'";
$hasil=mysqli_query($conn,$query) or die("Query Error : ".mysql_error());
if(mysqli_num_rows($hasil)==1)//jika id admin ditemukan dan password
{
$data=mysqli_fetch_array($hasil);
session_start();

$_SESSION['Username']=$data['Username'];
$_SESSION['Password']=$data['Password'];

header("location:home.php");

}
else
{
?>
<script language="JavaScript">alert('Username atau password Anda salah'); document.location='index.php'</script>
<?php }
?>