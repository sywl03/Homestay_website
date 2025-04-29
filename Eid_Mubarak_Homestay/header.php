<?PHP
# Memulakan fungsi Session
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur"); 
#----------------- Bahagian login & logout Session ------------

$namafail = basename($_SERVER['PHP_SELF']);

if(($namafail !='index.php'  and $namafail !='tempahan_bayar.php' and $namafail !='tempahan_senarai.php' and $namafail !='penyewa_daftar.php' and $namafail !='penyewa_login.php')  and empty($_SESSION['nama_penyewa']))
{
    die("<script>alert('Sila daftar Masuk');window.location.href='logout.php'</script>");
}
?>

<!-- bahagian antaramuka mula -->
<!DOCTYPE html>
<html>
<title>Sistem Pendaftaran Homestay</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/w3.css">
<body>

<!-- --- Bahagian antaramuka mula --- -->

<!-- tajuk -->
<div class='w3-container w3-amber'>
    <h1>Sistem Tempahan Homestay</h1>
</div>

<div class="w3-bar w3-black">
<!-- menu -->


<?PHP if(empty($_SESSION["nama_penyewa"])) { ?>  

  <div class="w3-dropdown-hover w3-mobile">
  
    <button class="w3-button">Register <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-dark-grey">
      <a href="penyewa_daftar.php" class="w3-bar-item w3-button w3-mobile">New Member <i class="fa fa-sign-in"></i></a>
      <a href="penyewa_login.php" class="w3-bar-item w3-button w3-mobile">Login <i class="fa fa-sign-in"></i></a>
    </div>
  </div>

<?PHP } else{ ?>
  <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-black">Home <i class="fa fa-home"></i></a>
  <a href="logout.php" class="w3-bar-item w3-button w3-mobile w3-right">Logout <i class="fa fa-sign-out"></i></a>
  
<?PHP } ?>
</div>